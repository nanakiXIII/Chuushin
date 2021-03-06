@extends('admin.layouts.admin')

@section('title', '| Roles')

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Gestion des grades
                    </h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="{{ route('roles.create') }}"><i class="material-icons">add</i> Nouveau </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Rôle</th>
                                <th>Permissions</th>
                                <th>Opération</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($roles as $role)
                                <tr>

                                    <td>{{ $role->name }}</td>

                                    <td>{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}</td>{{-- Retrieve array of permissions associated to a role and convert to string --}}
                                    <td>
                                        <a href="{{ route('roles.edit', [$role->id])}}" class="btn btn-info">
                                            <i class="material-icons">update</i>
                                            <span>Modifier</span>
                                        </a>
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#modalDelete{{$role->id}}" class="btn btn-danger">
                                            <i class="material-icons">delete</i>
                                            <span>Supprimer</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach ($roles as $role)
        <div class="modal fade" id="modalDelete{{$role->id}}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    </div>
                    <div class="modal-body align-center">
                        Êtes-vous sûr de vouloir supprimer ?
                    </div>
                    <div class="modal-footer">
                        {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id] ]) !!}
                        {!! Form::submit('Oui',['class' => 'btn btn-link  waves-effect']); !!}
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Non</button>
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    @endforeach
@endsection