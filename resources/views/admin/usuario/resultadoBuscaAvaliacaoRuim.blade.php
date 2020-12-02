@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('search-user-results') }}" method="GET">
                    <div class="form-group searchbar-form">
                        @csrf
                        <input type="text" name="searchUser" placeholder="Digite o usuário que procura" size="40">
                        <button type="submit" class="btn btn-success btn-searchbar">Buscar</button>
                    </div>
                </form>
                <h1 class="titulo-pagina">Usuários com Avaliações Negativas</h1>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr class="bg-info header-table">
                                <td>Usuário Avaliado</td>
                                <td>Classificação</td>
                                <td>Comentário</td>
                                <td>Ações</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($userRatings as $userRating)
                            <tr>
                                <td class="align-middle">{{ $userRating->avaliado }}</td>
                                <td class="align-middle">{{ $userRating->rating }}</td>
                                <td class="align-middle">{{ $userRating->comment }}</td>
                                <td class="align-middle">
                                    <div class="btn-crud">
                                        <a class="btn btn-primary" href="{{ route('show-user-admin', ['user' => $userRating->user_id]) }}">Ver Usuário</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    <a class="btn btn-info btn-voltar" href="{{ url()->previous() }}">Voltar</a>
            </div>
        </div>
    </div>
@endsection
