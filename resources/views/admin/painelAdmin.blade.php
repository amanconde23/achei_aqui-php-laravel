@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 sidebar-dashboard">
                <nav class="nav flex-column ">
                    <a class="nav-link btn-sidebar-dashboard" href="{{ route ('admin-users') }}"><i class="fas fa-user"></i> Administrar Usuários</a>
                </nav>
            </div>

            <div class="col-md-8 col-sm-8">
                <h1 class="titulo-dashboard">Portal de Economia Colaborativa</h1>
                <img class="bg-img-dashboard" src="{{ asset('images/bg_image.jpg') }}" alt="">
            </div>
        </div>
    </div>

@endsection
