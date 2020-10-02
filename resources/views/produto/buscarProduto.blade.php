@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <h1 class="titulo-pagina">Buscar Produto</h1>
                <form action="{{ route('search-products-results') }}" method="GET">
                    <div id="searchbar-products-page" class="form-group">
                        @csrf
                        <input class="search-page" type="text" name="search" placeholder="Digite a sua busca">
                        <button type="submit" class="btn btn-success btn-searchbar">Buscar</button>
                    </div>
                </form>
                <a class="btn btn-info" href="{{ url()->previous() }}">Voltar</a>
            </div>
        </div>
    </div>
@endsection
