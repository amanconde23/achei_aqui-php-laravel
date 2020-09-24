@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="titulo-pagina">Editar Produto</h1>
                <div class="box-form-cadastrar-produto">
                    <form action="{{ route('product-edit', ['product' => $product->id]) }}" method="POST" enctype='multipart/form-data'>
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Nome do Produto:</label>
                            <input type="text" name="name" value="{{ $product->name }}">
                        </div>
                        <div class="form-group">
                            <label for="">Categoria do Produto:</label>
                            <input type="text" name="category" value="{{ $product->category }}">
                        </div>
                        <div class="form-group form-group-without-margin">
                            <label for="">Imagem do Produto:</label>
                            <input type="file" name="image">
                        </div>
                        <div class="btn-criar-produto">
                            <button type="submit" class="btn btn-warning">Editar Produto</button>
                        </div>
                    </form>
                </div>
                <a class="btn btn-info" href="{{ url()->previous() }}">Voltar</a>
            </div>
        </div>
    </div>
@endsection

