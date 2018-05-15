@extends('admin.layouts.admin')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Nouvelle série
                    </h2>
                </div>
                <div class="body">
                    <div class="row">
                        {!!Form::open(['url' => route('admin.serie.create', $type), 'method' => 'post', 'files'=> 'true'])!!}
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{ Form::text('titre',null,['class' => 'form-control', 'maxlength' => '23']) }}
                                        {{ Form::label('titre', 'Titre de la vignette', ['class' => 'form-label']) }}
                                        <div class="help-info"> Max 23 caractères</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{ Form::text('titre_original',null,['class' => 'form-control']) }}
                                        {{ Form::label('titre_original', 'Titre original', ['class' => 'form-label']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{ Form::text('titre_alternatif',null,['class' => 'form-control']) }}
                                        {{ Form::label('titre_alternatif', 'Titre alternatif', ['class' => 'form-label']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{ Form::text('studio',null,['class' => 'form-control']) }}
                                        {{ Form::label('studio', 'Studio', ['class' => 'form-label']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{ Form::text('auteur',null,['class' => 'form-control']) }}
                                        {{ Form::label('auteur', 'Auteur', ['class' => 'form-label']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{ Form::number('annee',null,['class' => 'form-control', 'min' => '0']) }}
                                        {{ Form::label('annee', 'Année de production', ['class' => 'form-label']) }}
                                    </div>
                                </div>
                            </div>
                            @if($type == 'Animes')
                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            {{ Form::number('episode',0,['class' => 'form-control', 'min' => '0']) }}
                                            {{ Form::label('episode', "Nombre d'épisode", ['class' => 'form-label']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            {{ Form::number('oav',0,['class' => 'form-control', 'min' => '0']) }}
                                            {{ Form::label('oav', "Nombre d'oav", ['class' => 'form-label']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            {{ Form::number('films',0,['class' => 'form-control', 'min' => '0']) }}
                                            {{ Form::label('films', 'Nombre de film', ['class' => 'form-label']) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            {{ Form::number('bonus',0,['class' => 'form-control', 'min' => '0']) }}
                                            {{ Form::label('bonus', 'Nombre de bonus', ['class' => 'form-label']) }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="col-md-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{ Form::select('genres_list[]',$genre,null,['multiple' => 'multiple', 'class' => 'form-control show-tick']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{ Form::textarea('synopsis',null,['class' => 'form-control no-resign', 'row' => '4']) }}
                                        {{ Form::label('synopsis', 'Synopsis', ['class' => 'form-label']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{ Form::textarea('staff',null,['class' => 'form-control no-resign', 'row' => '4']) }}
                                        {{ Form::label('staff', 'Staff', ['class' => 'form-label']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        {{ Form::file('image',['class' => 'form-control no-resign', 'row' => '4']) }}

                                    </div>
                                </div>
                            </div>
                        {{ Form::hidden('slug',null) }}
                            {!! Form::submit('Envoyer',['class' => 'btn btn-block btn-lg btn-success waves-effect']); !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection