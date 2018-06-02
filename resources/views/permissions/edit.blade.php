@extends('admin.layouts.admin')

@section('title', '| Edit Permission')

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Modifier la permission  <b>{{$permission->name}}</b>
                    </h2>
                </div>
                <div class="body">
                    <div class="row">
                        {{ Form::model($permission, array('route' => array('permissions.update', $permission->id), 'method' => 'PUT')) }}
                        <div class="col-md-12">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    {{ Form::label('name', 'Name',['class' => 'form-label']) }}
                                    {{ Form::text('name', $permission->name, array('class' => 'form-control')) }}
                                </div>
                            </div>
                        </div>
                        {!! Form::submit('Envoyer',['class' => 'btn btn-block btn-lg btn-success waves-effect']); !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection