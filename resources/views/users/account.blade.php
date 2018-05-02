@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card-panel account_info">
                <div class="row">
                    <div class="col s2 account_img">
                        <a href="{{ route('users.avatar') }}">
                            <img src="/storage/avatars/{{ $user->avatar }}" alt="" class="responsive-img ">
                            <div class="overlay">
                                <div class="text"><i class="material-icons medium">mode_edit</i></div>
                            </div>
                        </a>
                    </div>
                    <div class="col s10">
                      <span class="flow-text">
                          <button id="demo">Notifier</button>
                          <b>{{ ucfirst($user->name)}}</b><br>
                          {{ $user->email }} <br>
                          {{ $user->roles()->pluck('name')->implode(' ') }}
                      </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection