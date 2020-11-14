@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <form class="searchbar-products-form" action="{{ route('search-user-admin-results') }}" method="GET">
                    <div class="form-group searchbar-products">
                        @csrf
                        <input type="text" name="searchUser" placeholder="Digite o usuário que procura" size="40">
                        <button type="submit" class="btn btn-success btn-searchbar">Buscar</button>
                    </div>
                </form>
                <h1 class="titulo-pagina">Usuários Cadastrados</h1>
                <table class="table table-bordered table-hover">
                    <tr>
                        <td>ID</td>
                        <td>Nome:</td>
                        <td>Telefone:</td>
                        <td>Permissão:</td>
                        <td>Email:</td>
                        <td>Ações:</td>
                    </tr>

                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->usertype }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="align-middle">
                            <div class="btn-crud">
                                <a class="btn btn-warning" href="{{ route('user-edit-form', ['user' => $user->id]) }}">Editar</a>
                                <form action="{{ route('user-destroy-admin', ['user' => $user->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="user-destroy-admin" class="delete_val" value="{{ $user->id }}">
                                    <div class="btn-crud">
                                        <button type="submit" class="btn btn-danger delete-user-admin-btn">Banir</button>
                                    </div>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>
                <a class="btn btn-info btn-voltar" href="{{ url()->previous() }}">Voltar</a>
            </div>
        </div>
    </div>
@endsection
