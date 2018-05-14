@extends('admin.layouts.admin')

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        {{ $type }}
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="{{ route('admin.serie.new', [$type]) }}">Nouvelle Série</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="list-group">
                        @foreach($series as $serie)
                            <a href="{{ route('admin.serie.detail', [$type, $serie->slug]) }}" class="list-group-item">
                                <h4 class="list-group-item-heading">
                                    @if($serie->publication == false)
                                        <i class="material-icons p-r-10 text-danger">visibility_off</i>
                                    @endif
                                    {{ $serie->titre }}

                                    @if($serie->etat == 0)
                                        <span class="label label-info right">
                                            En cours
                                        </span>
                                    @elseif($serie->etat == 1)
                                        <span class="label label-success right">
                                            Terminer
                                        </span>
                                    @elseif($serie->etat == 2)
                                        <span class="label label-warning right">
                                            Abandonner
                                        </span>
                                    @elseif($serie->etat == 3)
                                        <span class="label label-danger right">
                                            Licencier
                                        </span>
                                    @endif


                                </h4>
                            </a>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection