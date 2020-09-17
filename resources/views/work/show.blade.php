@extends('layout.template')

@section('content')
    <section id="work" class="main style3 primary">
        <div class="content">
            <header>
                <h2>{{ $work->title }}</h2>
                <h3>{{ $work->post }}</h3>
            </header>

            @auth
                <ul class="actions special">
                    <li><a class="button" href="{{ route('add-work') }}">{{ __('Modifier') }}</a></li>
                </ul>
            @endauth
            <p class="description">{!! nl2br(e($work->description)) !!}</p>
            <h4>Date : {{ Carbon\Carbon::parse($work->date)->format('M Y') }}</h4>
        </div>
    </section>
@endsection
