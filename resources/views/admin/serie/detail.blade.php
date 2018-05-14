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
                                    <a href="javascript:void(0);">
                                        <i class="material-icons">update</i> Modifier
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
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
                            <img src="/storage/serie/{{ $serie->image }}" alt="" width="100%">
                            <span><b>Episodes:</b> 0 | <b>Oavs:</b> 0 | <b>Films:</b> 0 | <b>Bonus:</b> 0</span>
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
        </div>
    </div>
@endsection