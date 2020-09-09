@extends('layout.template')

@section('content')
    <section class="main style3 secondary">
        <div class="content">
            <header>
                <h2>{{ __('Profil') }}</h2>
            </header>
            <div class="box">
                <strong>{{ $user->name }}</strong>
                <p>{{ $user->email }}</p>
            </div>
            <div class="box">
                <form method="post" action="{{ route('profil-post') }}">
                    @csrf
                    <div class="fields">
                        <div class="field">
                            <label for="name">{{ __('Nom et Prénom') }}</label>
                            <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}" placeholder="Nom & prénom" />
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="field">
                            <label for="email">{{ __('Adresse e-mail') }}</label>
                            <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Adresse e-mail" />
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <ul class="actions special">
                        <li><input type="submit" value="{{ __('Modifier') }}" /></li>
                    </ul>
                </form>
                <a href="{{ route('password') }}">{{ __('changer de mot de passe') }}</a>
            </div>
        </div>
    </section>
@endsection
