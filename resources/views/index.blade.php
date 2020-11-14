<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AcheiAqui') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('site/jquery.js') }}" defer></script>
    <script src="{{ asset('site/bootstrap.js') }}" defer></script>
    <script src="{{ asset('site/main.js') }}" defer></script>
    <script src="{{ asset('site/jquery.mask.min.js') }}" defer></script>
    <script src="{{ asset('site/jquery.validate.min.js') }}" defer></script>
    <script src="{{ asset('site/sweetalert2.all.min.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Londrina+Solid:wght@300;400&family=Poppins:wght@300;500&display=swap" rel="stylesheet">

    <!-- Font awesome -->
    <script src="https://kit.fontawesome.com/a0b66fbad1.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('site/style.css') }}" rel="stylesheet">
    <link href="{{ asset('site/main.css') }}" rel="stylesheet">
</head>
<body>
    <div class="home-top">
        <div class="row home-navbar">
            <div class="md-col-12">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('painel-usuario') }}">Painel do Usuário</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Registrar</a>
                    @endif
                    @endauth
                @endif
            </div>
        </div>
        
        <div class="row home-hero">
            <div class="md-col-5">
                <div class="home-top-text">
                    <h1 class="home-title">AcheiAqui</h1>
                    <h2 class="home-subtitle">Seu Portal de Economia Colaborativa</h2>
                </div>
            </div>
            <div class="md-col-7">
                <div class="home-img">
                    <img src="{{ asset('images/hero-img.png') }}" alt="Pessoas montando um quebra-cabeça">
                </div>
            </div>
        </div>
    </div>
    

    <div class="container home-about-us">
        <div class="row">
            <div class="col-md-12 col-sm-8">
                <h3 class="home-about-us-h3">Sobre Nós</h3>
                <p class="home-about-us-p">
                    Buscamos oferecer um ambiente seguro de compartilhamento de objetos. Sabe aquele objeto que você comprou, usou uma vez, e deixou encostado em um canto? Que tal repassá-lo para alguém que irá fazer bom uso dele? Vamos promover a economia colaborativa e deixar de lado o consumismo!
                    Aqui você pode encontrar um objeto que esteja precisando, entrar em contato com o proprietário, e combinar a doação!
                </p>
                <a class="btn-participar-home" href="{{ route('register') }}">Participar</a>
            </div>
        </div>
    </div>

    <footer>
        <p>Desenvolvido por Amanda Martinez</p>
        <p class="copyright-img">Créditos da imagem: <a class="copyright-img-link" href="http://www.freepik.com" target="_blank">Designed by pikisuperstar / Freepik</a></p>
    </footer>
</body>
</html>