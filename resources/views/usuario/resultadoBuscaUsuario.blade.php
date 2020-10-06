@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12 ">
                @if(isset($details))
                    <h1 class="titulo-pagina">Resultado da busca por {{ $query }} :</h1>
                    <table class="table table-bordered table-hover">
                        <tr>
                            <td>Nome:</td>
                            <td>Ações:</td>
                        </tr>
                        @foreach($details as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td class="align-middle btn-crud">
                                <a class="btn btn-primary" href="{{ route('user', ['user' => $user->id]) }}">Avaliar Usuário</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                @else
                    <h1>{{ $message }}</h1>
                    <a class="btn btn-info" href="{{ url()->previous() }}">Voltar</a>
                @endif
            </div>
        </div>
    </div>
@endsection