@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class=" col offset-m3 s6">
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="input-field col s12 row">
                                <i class="material-icons prefix">mail</i>
                                <input id="email" type="email" class="icon_prefix validate{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                <label for="email" class="icon_prefix">Adresse E-mail</label>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <div class="input-field col s12 row">
                                <i class="material-icons prefix">lock</i>
                                <input id="password" type="password" class="icon_prefix validate{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                <label for="password" class="icon_prefix">Mot de passe</label>
                                @if ($errors->has('password'))
                                    {{dd($errors->first('password'))}}
                                    <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <div class="row col m12">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}/>
                                    <span> Se souvenir de moi ?</span>
                                </label>
                            </div>
                            <div class="row col m12">
                                {!!  Captcha::display() !!}
                            </div>
                            <div class="row col m6 left-align">
                                <button type="submit" class="waves-effect waves-light btn orange">
                                    Connexion
                                </button>
                            </div>
                            <div class="row col m6 right-align">
                                <a class="waves-effect waves-light btn orange" href="{{ route('password.request') }}">
                                    Mot de passe Oublié ?
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
