@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class=" col offset-m3 s6">
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="input-field col s12 row">
                                <input id="name" type="text" class="validate{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                <label for="name" class="">Pseudo</label>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-field col s12 row">
                                <input id="email" type="email" class="validate{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                <label for="email" class="">Adresse mail</label>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <div class="input-field col s12 row">
                                <input id="password" type="password" class="validate{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                <label for="password" class="">Mot de passe</label>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                @endif
                            </div>

                            <div class="input-field col s12 row">
                                <input id="password-confirm" type="password" class="validate" name="password_confirmation" required>
                                <label for="password-confirm" class="">Confirmer le mot de passe</label>
                            </div>

                            <div class="row col m12 center">
                                <button type="submit" class="waves-effect waves-light btn orange">
                                    S'enregistrer
                                </button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
