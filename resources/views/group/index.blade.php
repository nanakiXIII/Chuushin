@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach($groups as $group)
            <div class="col m4">
                <strong>{{ $group->name }}</strong>
                <hr>
                <ul>
                    @foreach($group->users as $user)

                        <li><a href="{{ route('spy', $user->id) }}">{{ $user->name }}</a></li>
                    @endforeach
                </ul>
                <form action="{{ route('notify', $group->id) }}" method="post">
                    {{ csrf_field() }}
                    <button class="btn">Notifier</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection