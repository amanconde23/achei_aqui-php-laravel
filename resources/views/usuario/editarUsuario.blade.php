@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-center">
                        <h1 class="titulo-pagina">Editar Usuário</h1>
                    </div>
                    <div class="card-body card-body-content d-flex justify-content-center">
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
                                <input type="text" id="phone" name="phone" value="{{ $user->phone }}">
                            </div>
                            <div class="btn-crud">
                                <button type="submit" class="btn btn-warning">Editar Usuário</button>
                            </div>
                        </form>
                    </div>
                </div>
                <a class="btn btn-info btn-voltar" href="{{ url()->previous() }}">Voltar</a>
            </div>
        </div>
    </div>
@endsection
