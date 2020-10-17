@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-center">
                        <h1 class="titulo-pagina">Editar Produto</h1>
                    </div>
                    <div class="card-body card-body-content d-flex justify-content-center">
                        <form id="form-cadastrar-produto" action="{{ route('product-edit', ['product' => $product->id]) }}" method="POST" enctype='multipart/form-data'>
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Nome do Produto:</label>
                                <input type="text" name="name" value="{{ $product->name }}">
                            </div>
                            <div class="form-group">
                                <label for="category">Categoria do Produto:</label>
                                <select class="form-control" id="category" name="category" required>
                                    <option value="" selected disabled>Selecione a categoria</option>
                                    <option value="Eletrodomestico">Eletrodomésticos</option>
                                    <option value="Eletronicos">Eletrônicos</option>
                                    <option value="Moveis">Móveis</option>
                                    <option value="Ferramentas">Ferramentas</option>
                                    <option value="Moveis">Móveis</option>
                                    <option value="Outros">Outros</option>
                                </select>
                            </div>          
                            <div class="form-group">
                                <label for="">Imagem do Produto:</label>
                                <input type="file" name="image">
                            </div>
                            <div class="form-group">
                                <label for="statusProduto">Status do Produto:</label>
                                <select class="form-control status" id="statusProduto" name="statusProduto" required>
                                    <option value="" selected disabled>Selecione o status</option>
                                    <option value="Disponivel">Disponível</option>
                                    <option value="Indisponivel">Indisponível</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <div id="erros" class="alert alert-danger"></div>
                            </div>
                            <div class="btn-crud">
                                <button type="submit" class="btn btn-warning">Editar Produto</button>
                            </div>
                        </form>
                    </div>
                </div>
                <a class="btn btn-info btn-voltar" href="{{ url()->previous() }}">Voltar</a>
            </div>
        </div>
    </div>
@endsection

