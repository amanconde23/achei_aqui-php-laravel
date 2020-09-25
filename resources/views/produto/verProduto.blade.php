@extends('layouts.app')

@section('content')
    <div class="container conteudo-menor">
        <div class="row">
            <div class="col-md-12 box-ver-produto">
                <h1>{{ $product->name }}</h1>
                <p><strong>Categoria: </strong>{{ $product->category }}</p>
                <p><strong>Proprietário: </strong>{{ $product->user->name }}</p>
                <p><strong>Telefone: </strong>{{ $product->user->phone }}</p>
                <p><strong>Status: </strong>{{ $product->statusProduto }}</p>
                <p class="p-without-margin"><img class="img-ver-produto" src="{{ env('APP_URL') }}/storage/{{ $product->image }}" alt="">
            </div>
            <a class="btn btn-info" href="{{ url()->previous() }}">Voltar</a>
        </div>
    </div>
@endsection
