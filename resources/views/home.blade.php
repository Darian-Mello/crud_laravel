@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div></div>
            <div class="card-header text-center bg-dark text-white">Publicações</div>
                @foreach($posts as $post)
                    <div class="card pt-3">

                        <div class="card-header mt-3 bg-dark text-white">  </div>

                        <div class="card-body">

                                <p>
                                {{ $post->usuario_name }} -- {{ $post->titulo }}  --- {{ $post->conteudo }} 
                                </p>

                        </div>
                    </div>
                @endforeach
             </div>
    </div>
</div>
@endsection
