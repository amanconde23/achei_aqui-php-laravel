@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="titulo-pagina">Meus Produtos Cadastrados</h1>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td>Imagem</td>
                                <td>Nome:</td>
                                <td>Categoria:</td>
                                <td>Proprietário:</td>
                                <td>Telefone:</td>
                                <td>Ações:</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td><img class="img-produto" src="{{ env('APP_URL') }}/storage/{{ $product->image }}" alt=""></td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category }}</td>
                                <td>{{ $product->user->name }}</td>
                                <td>{{ $product->user->phone }}</td>
                                <td>
                                    <div class="btn-crud">
                                        <a class="btn btn-primary" href="{{ route('product-show-details', ['product' => $product->id]) }}">Ver Produto</a>
                                        <a class="btn btn-warning" href="{{ route('product-edit-form', ['product' => $product->id]) }}">Editar Produto</a>
                                        <form action="{{ route('product-destroy', ['product' => $product->id]) }}" method="post">
                                            @csrf
                                            <!-- form spoofing (falsifica a verbalização) -->
                                            @method('delete')
                                            <input type="hidden" name="product-destroy" value="{{ $product->id }}">
                                            <button type="submit" class="btn btn-danger">Excluir Perfil</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
@endsection
