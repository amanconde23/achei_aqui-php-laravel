@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <form class="searchbar-products" action="{{ route('search-products-results') }}" method="GET">
                    <div class="form-group">
                        @csrf
                        <input type="text" name="search" placeholder="Digite a sua busca">
                        <button type="submit" class="btn btn-success btn-searchbar">Buscar</button>
                    </div>
                </form>
                
                <h1 class="titulo-pagina">Produtos no Portal</h1>

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <td>Imagem:</td>
                            <td>Nome:</td>
                            <td>Categoria:</td>
                            <td>Status:</td>
                            <td>Ações:</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td class="align-middle"><img class="img-produto" src="{{ env('APP_URL') }}/storage/{{ $product->image }}" alt=""></td>
                            <td class="align-middle">{{ $product->name }}</td>
                            <td class="align-middle">{{ $product->category }}</td>
                            <td class="align-middle">{{ $product->statusProduto }}</td>

                            <td class="align-middle">
                                <div class="btn-crud">
                                    <a class="btn btn-primary" href="{{ route('product-show-details', ['product' => $product->id]) }}">Ver</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a class="btn btn-info btn-voltar" href="{{ url()->previous() }}">Voltar</a>
            </div>
        </div>
    </div>
@endsection
