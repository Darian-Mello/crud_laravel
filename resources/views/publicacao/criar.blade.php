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
                    <form class="row g-3" action="inserir_publicacao" method="POST">
                        @csrf
                        @method('POST')

                        <div class="col-12">
                            <input class="form-label" type="checkbox" id="publica" name="publica" checked>
                            <label class="mb-3" for="publica"><h3>Todos podem ver essa publicação</h3></label>
                        </div>
                        <div class="col-12">
                            <h4 for="titulo" class="form-label">Títudo da publicação</h4>
                            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('descricao') }}">
                        </div>
                        <div class="col-12" style="margin: 15px 0;">
                            <h4 for="conteudo" class="form-label">Nos conte no que você está pensando</h4>
                            <textarea class="form-control" name="conteudo" id="conteudo" rows="7">{{ old('observacao') }}</textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-success">Cadastrar</button>
                            <a href="{{ route('home') }}" type="button" class="float-right btn btn-danger">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection