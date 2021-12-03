<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            $publicacoes = Post::Where('posts.publica', true)
                ->join('users', 'users.id', '=', 'posts.usuario')
                ->select('users.name',  'posts.*')
                ->orderBy('posts.created_at', 'desc')
                ->get();

            return view('home', ['publicacoes' => $publicacoes ]);
        }
        else
            return redirect('/login');
    }
    public function minhasPublicacoes()
    {
        if(Auth::check()){
            $publicacoes = Post::Where('posts.usuario', Auth::user()->id)
            ->join('users', 'users.id', '=', 'posts.usuario')
            ->select('users.name',  'posts.*')
            ->orderBy('posts.created_at', 'desc')
            ->get();

            return view('home', ['publicacoes' => $publicacoes ]);
        }
        else
            return redirect('/login');
    }

    public function criar()
    {
        if(Auth::check()){
            return view('publicacao.criar');
        }
        else
            return redirect('/login');
    }

    public function inserir(Request $request)
    {
            if(Auth::check()){
            $mensagem = [
                'required' =>  'Preencha todos os campos obrigatórios!',
            ];

            $request->validate([
                'titulo' => 'required',
                'conteudo' => 'required',
                'publica' => 'required'
            ], $mensagem);

            $post = new Post;

            $post->titulo = $request->titulo;
            $post->conteudo = $request->conteudo;
            $post->publica = $request->publica;
            $post->usuario = Auth::user()->id;

            $post->save();

            return redirect('/home');
        }
        else
            return redirect('/login');
    }

    public function editar($id){
        $publicacao = Post::findOrFail($id);

        return view('/publicacao/editar', ['publicacao' => $publicacao]);
    }

    public function atualizar(Request $request){
        Post::findOrFail($request->id)->update($request->All());

        return redirect('/home');
    }

    public function deletar($id){
        Post::findOrFail($id)->delete();

        return redirect('/home');
    }
}