@extends('layouts.app')

@section('content')
<div class="container conteudo-menor">
        <div class="row">
            <div class="col-md-12 ">
                <h1>Acesso Negado! Você não tem permissão para acessar esse conteúdo!</h1>
                <a class="btn btn-info btn-voltar" href="{{ url()->previous() }}">Voltar</a>
            </div>
        </div>
    </div>
@endsection
