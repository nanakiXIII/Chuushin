@extends('admin.layouts.admin')

@section('title', '| Add Role')

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Nouveau grade
                    </h2>
                </div>
                <div class="body">
                    <div class="row">
                        {{ Form::open(['url' => route('roles.store')]) }}
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
                                    @foreach ($permissions as $permission)
                                        {{ Form::checkbox('permissions[]',$permission->id, null ,['id' => $permission->name, 'class' => 'chk-col-deep-orange'])}}
                                        {{ Form::label($permission->name, ucfirst($permission->name)) }}
                                        <br>
                                    @endforeach
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