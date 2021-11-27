<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::All();

        return view('home', ['posts' => $posts]);
    }

    public function criar()
    {
        return view('publicacao/criar');
    }

    public function inserir(Request $request)
    {
        $mensagem = [
            'required' =>  'Preencha todos os campos obrigatórios!',
        ];

        $request->validate([
            'titulo' => 'required',
            'conteudo' => 'required'
        ], $mensagem);

        try {
            Agenda::create([
                'titulo' => $request->get('descricao'),
                'data_planejada' => $request->get('data_planejada'),
                'publica' => $request->get('publica'),
                'usuario' => Auth::user()->id
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('home')->with('resposta', [
                'status' => 500,
                'mensagem' => 'Aconteceu algum erro, contate o administrador!'
            ]);
        }

        return redirect()->route('home')->with('resposta', [
            'status' => 200,
            'mensagem' => 'Publicação criada!'
        ]);
    }
}