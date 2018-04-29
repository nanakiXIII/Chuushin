<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.4/css/materialize.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/hover.css') }}">
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body class="grey lighten-4">
    <main>
        <div class="row">
            <img class="hide-on-small-only banniere" src="{{ asset('img/banniere.jpg') }}">
            <nav>
                <div class="nav-wrapper grey darken-4" >
                    <a href="/" class="brand-logo hide-on-med-and-up ">
                        Chuushin
                    </a>
                    <div class="container">
                        <ul class="hide-on-med-and-down">
                            <li><a href="/"><i class="material-icons left">home</i>Accueil</a></li>
                            <li><a href="" class="center"><i class="material-icons left">local_movies</i>Animés</a></li>
                            <li><a href="" class="center"><i class="material-icons left">brush</i>Scantrad</a></li>
                            <li><a href="" class="center"><i class="material-icons left">book</i>Light Novel</a></li>
                            <li><a href="" class="center"><i class="material-icons left">videogame_asset</i>Visual Novel</a></li>
                            <li><a href="" class="center"><i class="material-icons left">contact_mail</i> Nous Contacter</a></li>
                            @guest
                                <li>
                                    <a class="center" href="{{ route('login') }}">
                                        <i class="material-icons left">account_circle</i>Connexion
                                    </a>
                                </li>
                                <li>
                                    <a class="center" href="{{ route('register') }}">
                                        <i class="material-icons left">account_box</i>S'enregistrer
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a class="dropdown-trigger" href="#!" data-target="dropdown2">
                                        <i class="material-icons left">account_circle</i>{{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i>
                                    </a>
                                    <ul id="dropdown2" class="dropdown-content">
                                        <li><a href="#!">Mon Compte</a></li>
                                        <li><a href="#!">Mon Historique</a></li>
                                        <li>
                                            <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                                Déconnexion
                                            </a>
                                        </li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </ul>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="row">
            @if(Session::has('flash_message'))
                <div class="container">
                    <div class="alert alert-success"><em> {!! session('flash_message') !!}</em>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    @include ('errors.list') {{-- Including error file --}}
                </div>
            </div>

            @yield('content')
        </div>
    </main>
    <footer class="page-footer grey darken-4">
        <div class="container hide-on-small-only">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Informations</h5>
                    <p class="grey-text text-lighten-4">
                        Nous sommes un groupe de sous-titrage d’œuvres japonaises, créé le 24 juin 2013, ayant pour ambition de promouvoir, dans les règles de l’art et avec le plus grand respect, toute œuvre n’étant pas disponible légalement en France.
                    </p>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="white-text">Nos Activités</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-3" href="">Fansub</a></li>
                        <li><a class="grey-text text-lighten-3" href="">Visual Novel</a></li>
                        <li><a class="grey-text text-lighten-3" href="">Light Novel</a></li>
                        <li><a class="grey-text text-lighten-3" href="">Scantrad</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                © 2013 - {{ date('Y') }} Chuushin no Fansub
                <a class="grey-text text-lighten-4 right" href="">Actus</a>
            </div>
        </div>
    </footer>
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.4/js/materialize.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

</body>
</html>
