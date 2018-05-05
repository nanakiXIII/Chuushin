@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-content">
                    <span class="card-title flow-text center-align valign-wrapper">
                        <b>{{ ucfirst($serie->titre)}}</b>
                    </span>
                    <div class="row">
                        <div class="col l4">
                            <div class=" relative">
                                <img src="/storage/serie/{{ $serie->image}}" width="100%">
                                @if($serie->etat == 0)
                                    <span class="titre-projets-detail blue">
                                        En cours
                                    </span>
                                @elseif($serie->etat == 1)
                                    <span class="titre-projets-detail green">
                                        Terminer
                                    </span>
                                @elseif($serie->etat == 2)
                                    <span class="titre-projets-detail orange">
                                        Abandonner
                                    </span>
                                @elseif($serie->etat == 3)
                                    <span class="titre-projets-detail red">
                                        Licencier
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col l8">
                            <div class="card blue-grey lighten-5" style="margin-top: 0px!important;">

                                    <ul id="tabs-swipe-demo" class="tabs blue lighten-4 " >
                                        <li class="tab col s4"><a class="active" href="#test-swipe-1" ><b>Résumé</b></a></li>
                                        <li class="tab col s4"><a href="#test-swipe-2"><b>Informations</b></a></li>
                                        <li class="tab col s4"><a href="#test-swipe-3"><b>Staff</b></a></li>
                                    </ul>

                                <div class="card-content">
                                    <p>
                                        {{ $serie->synopsis }}
                                    </p>
                                </div>
                            </div>
                            <ul class="collection">
                                <li class="collection-item">
                                    <b>Titre original:</b> {{ $serie->titre_original}}
                                </li>
                                <li class="collection-item">
                                    <b>Année de production:</b> {{ $serie->annee}}
                                </li>
                                <li class="collection-item">
                                    <b>Studio:</b> {{ $serie->studio}}
                                </li>
                                <li class="collection-item">
                                    <b>Auteur:</b> {{ $serie->auteur}}
                                </li>
                                @if($type == "Animes")
                                    <li class="collection-item center-align">
                                        <b>Episodes:</b> {{ $serie->episode}} |
                                        <b>Oavs:</b> {{ $serie->oav}} |
                                        <b>Films:</b> {{ $serie->films}} |
                                        <b>Bonus:</b> {{ $serie->bonus}}
                                    </li>
                                @elseif($type == "Scan")
                                    <li class="collection-item center-align">
                                        <b>Chapitres:</b> {{ $serie->scan}}
                                    </li>
                                @elseif($type == "Light-Novel")
                                    <li class="collection-item center-align">
                                        <b>Chapitres:</b> {{ $serie->light-novel}}
                                    </li>
                                @elseif($type == "Light-Novel")
                                    <li class="collection-item center-align">
                                        <b>Visual Novel</b> {{ $serie->visual-novel}}
                                    </li>
                                @endif
                                <li class="collection-item">
                                    @foreach($serie->genres as $genre)
                                        <div class="chip orange lighten-4">
                                            <b>{{ $genre->name }}</b>
                                        </div>
                                    @endforeach
                                </li>

                                <li class="collection-item">
                                    <b>Co-prod:</b>
                                    <a href=""></a>
                                </li>

                            </ul>
                        </div>
                    </div>
        </div>
    </div>
@endsection