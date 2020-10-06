@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="titulo-pagina">Criar Produto</h1>
                <div class="box-form-cadastrar-produto">
                    <form id="form-cadastrar-produto" action="{{ route('product-store') }}" method="POST" enctype='multipart/form-data'>
                        @csrf
                        <div class="form-group">
                            <label for="name">Nome do Produto:</label>
                            <input type="text" name="name">
                        </div>
                        <div class="form-group">
                            <label for="category">Categoria do Produto:</label>
                            <input type="text" name="category">
                        </div>                       
                        <div class="form-group form-group-without-margin">
                            <label for="image">Imagem do Produto:</label>
                            <input type="file" name="image">
                        </div>
                        <div class="form-group">
                            <label for="statusProduto">Status do Produto:</label>
                            <select class="form-control status" id="statusProduto" name="statusProduto" required>
                                <option value="" selected disabled></option>
                                <option value="Disponivel">Disponível</option>
                                <option value="Indisponivel">Indisponível</option>
                            </select>
                        </div>
                        <div class="btn-crud">
                            <button type="submit" class="btn btn-success">Cadastrar Produto</button>
                        </div>
                        <div class="form-group">
                            <div id="erros" class="alert alert-danger"></div>
                        </div>
                    </form> 
                </div>
                <a class="btn btn-info" href="{{ url()->previous() }}">Voltar</a>
            </div>
        </div>
    </div>
@endsection

