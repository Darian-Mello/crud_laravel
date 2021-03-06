@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="border-radius: 10px; box-shadow: 0 0 1em gray; border: solid 1px gray">
                <div class="card-header bg-dark">
                    <h3 class="text-white text-center">Criar publicação</h3>
                </div>
                <div class="card-body">
                    <form class="row g-3" action="/publicacao/inserir" method="POST">
                        @csrf
                        @method('POST')

                        <div class="col-12">
                            <h4 for="titulo" class="form-label">Títudo da publicação</h4>
                            <input type="text" class="form-control  @error('titulo') is-invalid @enderror" id="titulo" name="titulo" value="{{ old('descricao') }}">
                            @error('titulo')
                                <div class="col-12 invalid-feedback">Esse campo é obrigatório.</div>
                            @enderror
                        </div>
                        
                        <div class="col-12" style="margin: 15px 0;">
                            <h4 for="conteudo" class="form-label">Conteúdo da publicação</h4>
                            <textarea placeholder="Nos conte no que você está pensando..." class="form-control  @error('conteudo') is-invalid @enderror" name="conteudo" id="conteudo" rows="7">{{ old('observacao') }}</textarea>
                            @error('conteudo')
                                <div class="col-12 invalid-feedback">Esse campo é obrigatório.</div>
                            @enderror
                        </div>
                        <div class="col-12 mt-2">
                            <h4 for="titulo" class="form-label">Quem poderá ver essa publicação?</h4>
                            <select name="publica" id="publica" class="col-4 form-control" style="border-radius: 10px;">
                                <option value="1">Todos os usuários</option>
                                <option value="0">Somente você</option>
                            </select>
                        </div>
                        <div class="col-12 card-header mt-3">
                            <button type="submit" class=" btn btn-success">Cadastrar</button>
                            <a href="/" type="button" class="float-right btn btn-danger">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection