@extends('admin.layouts.admin')

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        {{ $serie->titre }}
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li>
                                    <a href="javascript:void(0);">
                                        <i class="material-icons">attach_file</i> Fichiers
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.serie.edit', [$type, $serie->slug]) }}">
                                        <i class="material-icons">update</i> Modifier
                                    </a>
                                </li>
                                @if($serie->publication == 0)
                                    <li>
                                        <a href="{{ route('admin.serie.pub', [$serie, true]) }}">
                                            <i class="material-icons">visibility_off</i> Hors Ligne
                                        </a>
                                    </li>
                                    @else
                                    <li>
                                        <a href="{{ route('admin.serie.pub', [$serie, 0]) }}">
                                            <i class="material-icons">visibility</i> En Ligne
                                        </a>
                                    </li>
                                @endif
                                <li>
                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#modalEtat">
                                        <i class="material-icons">build</i>
                                        @if($serie->etat == 0)
                                            En cours
                                        @elseif($serie->etat == 1)
                                            Terminé
                                        @elseif($serie->etat == 2)
                                            Abandonné
                                        @elseif($serie->etat == 3)
                                            Licencié
                                        @endif
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#modalDelete">
                                        <i class="material-icons">delete</i> Supprimer
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="row">
                        <div class="col-lg-4 align-center">
                            <img src="/storage/serie/{{ $type }}/large_{{ $serie->image }}" alt="" width="100%">
                            <span><b>Episodes:</b> {{ $serie->episode }} | <b>Oavs:</b> {{ $serie->oav }} | <b>Films:</b> {{ $serie->films }} | <b>Bonus:</b> {{ $serie->bonus }}</span>
                        </div>
                        <div class="col-lg-8">
                            <ul class="list-group">
                                <li class="list-group-item"><b>Titre original: </b>{{ $serie->titre_original }}</li>
                                <li class="list-group-item"><b>Titre alternatif: </b>{{ $serie->titre_alternatif }}</li>
                                <li class="list-group-item"><b>Année de production: </b>{{ $serie->annee }}</li>
                                <li class="list-group-item"><b>Studio: </b>{{ $serie->studio }}</li>
                                <li class="list-group-item"><b>Auteur: </b>{{ $serie->auteur }}</li>
                                <li class="list-group-item"><b>Genres: </b>
                                    @foreach($serie->genres as $genre)
                                        {{ $genre->name }}
                                    @endforeach

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="header">
                    <h2> Synopsis </h2>
                </div>
                <div class="body">
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $serie->synopsis }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="header">
                    <h2> Staff </h2>
                </div>
                <div class="body">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            {{ $serie->staff }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalEtat" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">{{$serie->titre_original}}</h4>
                </div>
                <div class="modal-body">
                    {!!Form::open(['url' => route('admin.serie.etat', [$serie]), 'method' => 'put', 'files'=> 'true'])!!}
                        <div class="col-md-12">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    {{ Form::select('etat',['En cours', 'Terminé', 'Abandonné', 'Licencié'],$serie->etat,['class' => 'form-control show-tick']) }}
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    {!! Form::submit('Envoyer',['class' => 'btn btn-link  waves-effect']); !!}
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Fermer</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">{{$serie->titre_original}}</h4>
                </div>
                <div class="modal-body align-center">
                    Êtes-vous sûr de vouloir supprimer <b>{{ $serie->titre_original }}</b> ?
                </div>
                <div class="modal-footer">
                    {!!Form::open(['url' => route('admin.serie.delete', [ $type, $serie]), 'method' => 'delete'])!!}
                        {!! Form::submit('Oui',['class' => 'btn btn-link  waves-effect']); !!}
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Non</button>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
@endsection