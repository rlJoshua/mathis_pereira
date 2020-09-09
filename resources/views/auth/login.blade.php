@extends('layout.template')

@section('content')
    <section class="main style3 secondary">
        <div class="content">
            <header>
                <h2>{{ __('Connexion') }}</h2>
                <p>{{ __('Espace de connexion réservé aux membres inscrits') }}.</p>
            </header>
            <div class="box">
                <form method="post" action="{{ route('login') }}">
                    @csrf
                    <div class="fields">
                        <div class="field"><input type="email" name="email" placeholder="Adresse e-mail" /></div>
                        <div class="field"><input type="password" name="password" placeholder="Mot de passe" /></div>
                    </div>
                    <ul class="actions special">
                        <li><input type="submit" value="{{ __('Se connecter') }}" /></li>
                    </ul>
                </form>
            </div>
        </div>
    </section>

@endsection
