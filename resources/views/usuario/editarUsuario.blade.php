@extends('layouts.app')

@section('content')
    <div class="container conteudo">
        <div class="row">
            <div class="col-md-12">
                <form class="searchbar-products" action="{{ route('search-user-results') }}" method="GET">
                    <div class="form-group">
                        @csrf
                        <input type="text" name="searchUser" placeholder="Digite a sua busca">
                        <button type="submit" class="btn btn-success btn-searchbar">Buscar</button>
                    </div>
                </form>

                <h1 class="titulo-pagina">Editar um Usuário</h1>
                <div class="box-form-cadastrar-produto">
                    <form action="{{ route('user-edit', ['user' => $user->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Nome do Usuário:</label>
                            <input type="text" name="name" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label for="">Email do Usuário:</label>
                            <input type="text" name="email" value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <label for="">Telefone do Usuário:</label>
                            <input type="text" name="phone" value="{{ $user->phone }}">
                        </div>
                        <div class="form-group">
                            <label for="">Nova Senha do Usuário:</label>
                            <input type="text" name="password" value="">
                        </div>
                        <div class="btn-criar-produto">
                            <button type="submit" class="btn btn-warning">Editar Usuário</button>
                        </div>
                    </form>
                </div>
                <a class="btn btn-info btn-voltar" href="{{ url()->previous() }}">Voltar</a>
            </div>
        </div>
    </div>
@endsection
