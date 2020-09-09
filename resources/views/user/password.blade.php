@extends('layout.template')

@section('content')
    <section class="main style3 secondary">
        <div class="content">
            <header>
                <h2>{{ __('Changement de mot de passe') }}</h2>
            </header>
            <div class="box">
                <form method="post" action="{{ route('password-post') }}">
                    @csrf
                    <div class="fields">
                        <div class="field">
                            <label for="password">{{ __('Nouveau mot de passe') }}</label>
                            <input id="password" type="password" name="password" value="{{ old('password') }}" placeholder="Nouveau mot de passe" />
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="field">
                            <label for="conf_password">{{ __('Confirmer le mot de passe') }}</label>
                            <input id="conf_password" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirmer le mot de passe" />
                            @error('password_confirmation')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <ul class="actions special">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <li><input type="submit" value="{{ __('Modifier') }}" /></li>
                    </ul>
                </form>
                <a href="{{ route('profil') }}">{{__('retour')}}</a>
            </div>
        </div>
    </section>
@endsection
