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
                                <td>Status:</td>
                                <td>Ações:</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <input type="hidden" class="delete_val" value="{{$product->id}}">
                                <td class="align-middle"><img class="img-produto" src="{{ env('APP_URL') }}/storage/{{ $product->image }}" alt=""></td>
                                <td class="align-middle">{{ $product->name }}</td>
                                <td class="align-middle">{{ $product->category }}</td>
                                <td class="align-middle">{{ $product->statusProduto }}</td>
                                <td class="align-middle">
                                    <div class="btn-crud">
                                        <a class="btn btn-primary" href="{{ route('product-show-details', ['product' => $product->id]) }}">Ver</a>
                                        <a class="btn btn-warning" href="{{ route('product-edit-form', ['product' => $product->id]) }}">Editar</a>
                                        <button type="submit" class="btn btn-danger delete-product-btn">Excluir</button>

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a class="btn btn-info" href="{{ url()->previous() }}">Voltar</a>
            </div>
        </div>
    </div>
@endsection
