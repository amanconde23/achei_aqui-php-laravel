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
                            <td>Avaliação:</td>
                            <td>Comentário:</td>
                        </tr>
                        @foreach($details as $userRating)
                        <tr>
                            <td>{{ $userRating->avaliado }}</td>
                            <td>{{ $userRating->rating }}</td>
                            <td>{{ $userRating->comment }}</td>
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