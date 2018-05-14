@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12 l12">
                @foreach($series as $serie)
                <div class="col s12 l4">
                    <div class="card hoverable">
                        <div class="card-image waves-effect waves-block waves-light">
                            <a href="{{ route('serie.detail', [$type, $serie->slug]) }}">
                                <img class="activator relative" src="/storage/serie/{{ $serie->image}}">
                                @if($serie->etat == 0)
                                    <span class="titre-projets activator blue">
                                        En cours
                                    </span>
                                @elseif($serie->etat == 1)
                                    <span class="titre-projets activator green">
                                        Terminer
                                    </span>
                                @elseif($serie->etat == 2)
                                    <span class="titre-projets activator orange">
                                        Abandonner
                                    </span>
                                @elseif($serie->etat == 3)
                                    <span class="titre-projets activator red">
                                        Licencier
                                    </span>
                                @endif
                            </a>
                        </div>
                        <div class="card-content">
                            <span class="card-title grey-text text-darken-4 center">
                                <strong>{{ ucfirst($serie->titre) }} </strong>
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection