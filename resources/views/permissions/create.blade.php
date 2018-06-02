@extends('admin.layouts.admin')

@section('title', '| Create Permission')

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Nouvelle permission
                    </h2>
                </div>
                <div class="body">
                    <div class="row">
                        {{ Form::open(['url' => route('permissions.store')]) }}
                        <div class="col-md-12">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    {{ Form::label('name', 'Name',['class' => 'form-label']) }}
                                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    @if(!$roles->isEmpty())
                                        <h4>Assigner permission à un grade</h4>
                                        @foreach ($roles as $role)
                                            {{ Form::checkbox('roles[]',$role->id, null ,['id' => $role->name, 'class' => 'chk-col-deep-orange'])}}
                                            {{ Form::label($role->name, ucfirst($role->name)) }}
                                        @endforeach
                                    @endif
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