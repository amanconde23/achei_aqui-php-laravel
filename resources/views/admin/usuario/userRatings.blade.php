@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12">
                <form class="searchbar-products" action="{{ route('search-user-results') }}" method="GET">
                    <div class="form-group">
                        @csrf
                        <input type="text" name="searchUser" placeholder="Digite a sua busca">
                        <button type="submit" class="btn btn-success btn-searchbar">Buscar</button>
                    </div>
                </form>
                <h1 class="titulo-pagina">Avaliações dos Usuários</h1>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td>Usuário Avaliado:</td>
                                <td>Classificação:</td>
                                <td>Comentário:</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($userRatings as $userRating)
                            <tr>
                                <td class="align-middle">{{ $userRating->avaliado }}</td>
                                <td class="align-middle">{{ $userRating->rating }}</td>
                                <td class="align-middle">{{ $userRating->comment }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a class="btn btn-info btn-voltar" href="{{ url()->previous() }}">Voltar</a>
            </div>
        </div>
    </div>
@endsection
