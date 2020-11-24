@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-12 ">
                @if(isset($details))
                    <h2 class="subtitulo-pagina usuario-mal-avaliado">{{ $message }}</h2>
                    <h1 class="titulo-pagina">Resultado da busca por {{ $query }} :</h1>
                    <table class="table table-bordered table-hover">
                        <tr class="bg-info header-table">
                            <td>Nome</td>
                            <td>Avaliação</td>
                            <td>Comentário</td>
                        </tr>
                        @foreach($details as $userRating)
                        <tr>
                            <td>{{ $userRating->avaliado }}</td>
                            <td>{{ $userRating->rating }}</td>
                            <td>{{ $userRating->comment }}</td>

                        </tr>
                        @endforeach
                    </table>
                        
                    @foreach($user as $user)
                    <div class="card card-space">
                        <div class="card-header d-flex justify-content-center">
                            <h1 class="titulo-pagina">{{ $user->name }}</h1>
                        </div>
                        <div class="card-body card-body-content">
                            <p><strong>Email: </strong> {{ $user->email }}</p>
                            <p><strong>Telefone: </strong> <img class="whatsapp-icon" src="{{ asset('images/whatsapp.svg') }}" alt="Whatsapp"><a href="https://api.whatsapp.com/send?1=pt_BR&phone=55{{$user->phone}}&text=Olá {{$user->name}}, aqui é do site Achei Aqui, gostaríamos de informar que você recebeu muitas avaliações negativas, portanto terá sua conta excluída." target="_blank">{{ $user->phone }}</a></p>
                            <div class="btn-crud">
                                <form action="{{ route('user-destroy-admin', ['user' => $user->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" class="delete_val" value="{{ $user->id }}">
                                    <button type="submit" class="btn btn-danger ban-user-btn">Banir Usuário</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <h1 class="msg-busca-empty">{{ $message }}</h1>
                    <div class="space"></div>
                @endif
                <a class="btn btn-info btn-voltar" href="{{ url()->previous() }}">Voltar</a>
            </div>
        </div>
    </div>
@endsection