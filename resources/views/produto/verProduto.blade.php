@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-space">
                    <div class="card-header d-flex justify-content-center">
                        <h1 class="titulo-pagina">{{ $product->name }}</h1>
                    </div>
                    <div class="card-body card-body-content">
                        <p><strong>Categoria: </strong>{{ $product->category }}</p>
                        <p><strong>Proprietário: </strong>{{ $product->user->name }}</p>
                        <p><strong>Status: </strong>{{ $product->statusProduto }}</p>
                        <p><img class="img-ver-produto" src="{{ env('APP_URL') }}/storage/{{ $product->image }}" alt=""></p>
                        <p><a href="https://api.whatsapp.com/send?1=pt_BR&phone=55{{$product->user->phone}}&text=Tenho interesse no seu produto: {{$product->name}}" class="btn-whatsapp" target="_blank">
                            <img class="whatsapp-icon" src="{{ asset('images/whatsapp.svg') }}" alt="Whatsapp">Entrar em contato
                        </a></p>
                        
                    </div>
                </div>

                <div class="card card-space">
                    <div class="card-header d-flex justify-content-center">
                        <h1 class="titulo-pagina">Avaliações do Proprietário</h1>
                    </div>
                    @foreach ($userRating as $userRating)
                    <div class="card-body card-body-content">
                        <p><strong>Avaliação: </strong> {{ $userRating->rating }}</p>
                        <p><strong>Comentário: </strong> {{ $userRating->comment }}</p>
                    </div>
                    @endforeach
                </div>

                
            <a class="btn btn-info btn-voltar" href="{{ url()->previous() }}">Voltar</a>
        </div>
    </div>
@endsection
