@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-center">
                        <h1 class="titulo-pagina">{{ $user->name }}</h1>
                    </div>
                    <div class="card-body card-body-content">
                        <p><strong>Email: </strong> {{ $user->email }}</p>
                        <p><strong>Telefone: </strong> {{ $user->phone }}</p>
                        <div class="btn-crud">
                            <a class="btn btn-warning" href="{{ route('user-edit-form', ['user' => Auth::user()->id]) }}">Editar Usuário</a>
                            <form action="{{ route('user-destroy', ['user' => $user->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="user-destroy" class="delete_val" value="{{ $user->id }}">
                                <button type="submit" class="btn btn-danger delete-user-btn">Excluir Conta</button>
                            </form>
                        </div>
                    </div>
                </div>
                <a class="btn btn-info btn-voltar" href="{{ url()->previous() }}">Voltar</a>
            </div>
        </div>
    </div>
@endsection
