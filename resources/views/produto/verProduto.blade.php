@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-center">
                        <h1 class="titulo-pagina">{{ $product->name }}</h1>
                    </div>
                    <div class="card-body card-body-content">
                        <p><strong>Categoria: </strong>{{ $product->category }}</p>
                        <p><strong>Proprietário: </strong>{{ $product->user->name }}</p>
                        <p><strong>Telefone: </strong>{{ $product->user->phone }}</p>
                        <p><strong>Status: </strong>{{ $product->statusProduto }}</p>
                        <p><img class="img-ver-produto" src="{{ env('APP_URL') }}/storage/{{ $product->image }}" alt="">
                    </div>
                </div>
            <a class="btn btn-info btn-voltar" href="{{ url()->previous() }}">Voltar</a>
        </div>
    </div>
@endsection
