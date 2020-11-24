@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <form class="searchbar-products-form" action="{{ route('search-products-results') }}" method="GET">
                    <div class="form-group searchbar-products">
                        <div class="form-check searchbar-products-content">
                            @csrf
                            <input class="form-check-input" type="checkbox" value="check-produto-disponivel" name="check-produto-disponivel">
                            <label class="form-check-label  searchbar-products-check-label" for="check-produto-disponivel">
                                Mostrar somente produtos disponíveis
                            </label>
                            <input type="text" name="search" placeholder="Digite o produto que procura" size="40">
                            <button type="submit" class="btn btn-success btn-searchbar">Buscar</button>
                        </div>
                    </div>
                    
                </form>
                
                <h1 class="titulo-pagina">Produtos no Portal</h1>

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr class="bg-info header-table">
                            <td>Imagem</td>
                            <td>Nome</td>
                            <td>Categoria</td>
                            <td>Status</td>
                            <td>Ações</td>
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
