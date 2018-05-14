@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">
                       {{ ucfirst($serie->titre)}}
                    </span>
                    <div class="row">
                        <div class="col l5">
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
                            <div class="center-align">
                                @if($type == "Animes")

                                    <b>Episodes:</b> {{ $serie->episode}} |
                                    <b>Oavs:</b> {{ $serie->oav}} |
                                    <b>Films:</b> {{ $serie->films}} |
                                    <b>Bonus:</b> {{ $serie->bonus}}

                                @elseif($type == "Scan")
                                    <li class="collection-item center-align">
                                        <b>Chapitres:</b> {{ $serie->scan}}
                                    </li>
                                @elseif($type == "Light-Novel")

                                    <b>Chapitres:</b> {{ $serie->light-novel}}

                                @elseif($type == "Light-Novel")

                                    <b>Visual Novel</b> {{ $serie->visual-novel}}

                                @endif
                            </div>

                        </div>
                        <div class="col l7">
                            <ul class="collection" style="margin: 0;">
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
                                <li class="collection-item">
                                    @foreach($serie->genres as $genre)
                                        <div class="chip ">
                                            {{ $genre->name }}
                                        </div>
                                    @endforeach
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-tabs">
                    <ul class="tabs tabs-fixed-width grey lighten-4">
                        <li class="tab col m2"><a class="active" href="#synopsis">Synopsis</a></li>
                        <li class="tab col m2"><a href="#staff">Staff</a></li>
                        <li class="tab col m2"><a id="episodes" href="#episode">Episodes</a></li>
                        <li class="tab col m2"><a href="#oavs">Oavs</a></li>
                        <li class="tab col m2"><a href="#films">Films</a></li>
                        <li class="tab col m2"><a href="#bonus">Bonus</a></li>
                    </ul>
                </div>
                <div class="card-content">
                    <div class="row ">
                        <div id="synopsis">
                            @include ('serie.detail.synopsis')
                        </div>
                        <div id="staff">
                            @include ('serie.detail.staff')
                        </div>
                        <div id="episode">
                            @include ('serie.detail.episode')
                        </div>
                        <div id="oavs">
                            @include ('serie.detail.staff')
                        </div>
                        <div id="films">
                            @include ('serie.detail.staff')
                        </div>
                        <div id="bonus">
                            @include ('serie.detail.staff')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection