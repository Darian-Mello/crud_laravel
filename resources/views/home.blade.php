@extends('layouts.app')

@section('content')

@if(str_contains(url()->current(), 'http://127.0.0.1:8000/publicacao/minhas_publicacoes'))
    <h2 class="card-header text-center bg-dark text-white" style="width: 100%; margin-top: -20px; margin-bottom: 10px!important;">Minhas Publicações</h2>
@else
    <h2 class="card-header text-center bg-dark text-white" style="width: 100%; margin-top: -20px; margin-bottom: 10px!important;">Todas as Publicações</h2> 
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
                @if(count($publicacoes) > 0)
                    @foreach($publicacoes as $publicacao)
                    <div class="container mt-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                <div class="card" style="border-radius: 10px;">
                                    <div class="card-header bg-secondary">
                                        <h3 class="text-white">{{ $publicacao->name }} publicou: <small style="float:right; top: 0; font-size: 10pt;" class="text-light m-0 p-0">{{ $publicacao->created_at->format('d/m/Y') }}</small></h3>
                                    </div>
                                    <div class="p-2">
                                            
                                        <div class="col-12" style="margin: 15px 0;">
                                            <h4 for="conteudo" class="form-label">{{ $publicacao->titulo }}</h4>
                                        </div>
                                        <div class="col-12" style="margin: 15px 0;">
                                            <p for="conteudo" class="form-label p-2"style="border: solid 1px #DCDCDC; border-radius: 10px;">{{ $publicacao->conteudo }}</p>
                                        </div>

                                        <div class="col-12 card-header mt-3">
                                            <a href="/" type="button" class="btn btn-success">Ver Perfil</a>
                                            @if($publicacao->usuario == Auth::user()->id)
                                                <a href="/publicacao/editar/{{ $publicacao->id }}" type="button" class="float-right btn btn-info text-light">Editar</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                    @endforeach
                @else
                    <div style="text-align: center;">
                        <h2 class="card-header text-center bg-secondary text-white" style="width: 100%; margin-top: -20px; margin-bottom: 10px!important; border-radius: 10px;">Não há conteúdo aqui</h2>
                        <img style="border-radius: 10px;" src="img/discoVoador.jpg" alt="Página sem conteúdo">
                    </div>
                @endif
             </div>
    </div>
</div>
@endsection
