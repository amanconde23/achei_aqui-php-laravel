@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12 ">
                @if(isset($details))
                    <h1 class="titulo-pagina">Resultado da busca por {{ $query }} :</h1>
                    <table class="table table-bordered table-hover">
                        <tr class="bg-info header-table">
                            <td>ID</td>
                            <td>Nome</td>
                            <td>Telefone</td>
                            <td>Permissão</td>
                            <td>Email</td>
                            <td>Ações</td>
                        </tr>
                        @foreach($details as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->usertype }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <form action="{{ route('user-destroy-admin', ['user' => $user->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="user-destroy-admin" class="delete_val" value="{{ $user->id }}">
                                    <div class="btn-crud">
                                        <button type="submit" class="btn btn-danger delete-user-admin-btn">Banir Usuário</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                @else
                    <h1 class="msg-busca-empty">{{ $message }}</h1>
                    <div class="space"></div>
                @endif
                <a class="btn btn-info btn-voltar" href="{{ url()->previous() }}">Voltar</a>
            </div>
        </div>
    </div>
@endsection