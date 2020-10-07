@extends('layouts.app')

@section('content')
    <div class="container conteudo">
        <div class="row">
            <div class="col-md-12 box-ver-produto">
                <h1>{{ $userRating->avaliado }}</h1>
                <p><strong>Categoria: </strong>{{ $userRating->rating }}</p>
                <p><strong>Proprietário: </strong>{{ $userRating->comment }}</p>
                <p><strong>Telefone: </strong>{{ $userRating->user->name }}</p>
            </div>
            <a class="btn btn-info" href="{{ url()->previous() }}">Voltar</a>
        </div>
    </div>
@endsection
