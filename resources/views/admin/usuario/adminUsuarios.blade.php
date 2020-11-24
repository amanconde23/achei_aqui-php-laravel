@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <form class="searchbar-products"  action="{{ route('search-user-admin-results') }}" method="GET">
                    <div class="form-group searchbar-form">
                        @csrf
                        <input type="text" name="searchUser" placeholder="Digite o usuário que procura" size="70">
                        <button type="submit" class="btn btn-success btn-searchbar">Buscar</button>
                    </div>
                </form>
                <h1 class="titulo-pagina titulo-pagina-listar-produtos">Usuários Cadastrados</h1>
                <table class="table table-bordered table-hover">
                    <tr class="bg-info header-table">
                        <td>ID</td>
                        <td>Nome</td>
                        <td>Telefone</td>
                        <td>Permissão</td>
                        <td>Email</td>
                        <td>Ações</td>
                    </tr>

                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td><img class="whatsapp-icon" src="{{ asset('images/whatsapp.svg') }}" alt="Whatsapp"><a href="https://api.whatsapp.com/send?1=pt_BR&phone=55{{$user->phone}}&text=Olá {{$user->name}}, aqui é do site Achei Aqui, gostaríamos de entrar em contato com você" target="_blank">{{ $user->phone }}</a></td>
                        <td>{{ $user->usertype }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="align-middle">
                            <div class="btn-crud">
                                <form action="{{ route('user-destroy-admin', ['user' => $user->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="user-destroy-admin" class="delete_val" value="{{ $user->id }}">
                                    <div class="btn-crud">
                                        <button type="submit" class="btn btn-danger delete-user-admin-btn">Banir Usuário</button>
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
