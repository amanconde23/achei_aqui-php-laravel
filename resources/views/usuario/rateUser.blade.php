@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-center">
                        <h1 class="titulo-pagina">Avaliar Usuário</h1>
                    </div>
                    <div class="card-body card-body-content d-flex justify-content-center">
                        <form action="{{ route('rate-user-store') }}" method="POST" enctype='multipart/form-data'>
                            @csrf
                            <div class="form-group">
                                <label for="avaliado">Qual usuário você quer avaliar?</label>
                                <select class="form-control" id="avaliado" name="avaliado" required>
                                    <option value="" selected disabled></option>
                                    @foreach ($users as $user)<option value="{{$user->name}}">{{$user->name}}</option>@endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="rating">Avaliação:</label>
                                <select class="form-control" id="rating" name="rating" required>
                                    <option value="" selected disabled></option>
                                    <option value="Ruim">Ruim</option>
                                    <option value="Bom">Bom</option>
                                    <option value="Otimo">Ótimo</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="comment">Comentário</label>
                                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <div id="erros" class="alert alert-danger"></div>
                            </div>
                            <button type="submit" class="btn btn-primary">Avaliar Usuário</button>
                        </form> 
                    </div>
                </div>
                <a class="btn btn-info btn-voltar" href="{{ url()->previous() }}">Voltar</a>
            </div>
        </div>
    </div>
@endsection
