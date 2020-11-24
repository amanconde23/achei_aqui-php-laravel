@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="subtitulo-pagina usuario-bem-avaliado">{{ $message }}</h2>
                <div class="card card-space">
                    <div class="card-header d-flex justify-content-center">
                        <h1 class="titulo-pagina">{{ $user->name }}</h1>
                    </div>
                    <div class="card-body card-body-content">
                        <p><strong>Email: </strong> {{ $user->email }}</p>
                        <p><strong>Telefone: </strong> {{ $user->phone }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-center">
                        <h1 class="titulo-pagina">Avaliações dos Usuário</h1>
                    </div>
                    @foreach ($userRating as $userRating)
                    <div class="card-body card-body-content">
                        <p><strong>Avaliação: </strong> {{ $userRating->rating }}</p>
                        <p><strong>Comentário: </strong> {{ $userRating->comment }}</p>
                    </div>
                    @endforeach
                </div>
                <a class="btn btn-info btn-voltar" href="{{ url()->previous() }}">Voltar</a>
            </div>
        </div>
    </div>
@endsection
