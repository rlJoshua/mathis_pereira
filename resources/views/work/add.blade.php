@extends('layout.template')

@section('content')
    <section class="main style3 secondary">
        <div class="content">
            <header>
                <h2>{{ __('Ajouter un projet') }}</h2>
            </header>
            <div class="box">
                <form method="post" action="{{ route('add-work-post') }}">
                    @csrf
                    <div class="fields">
                        <div class="field">
                            <input type="text" name="title" value="{{ old('title') }}" placeholder="{{ __('Titre de projet') }}" />
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="field">
                            <textarea name="description" placeholder="Description du projet">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="field half">
                            <select name="month">
                                @foreach($months as $key => $month)
                                    @if ($key === old('month'))
                                        <option selected value="{{ $key }}">{{ $month }}</option>
                                    @endif
                                    @if($loop->first && !old('month'))
                                        <option selected value="{{ $key }}">{{ $month }}</option>
                                    @else
                                        <option value="{{ $key }}">{{ $month }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('month')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="field half">
                            <select name="year">
                                @foreach($years as $year)
                                    @if ($year === old('year'))
                                        <option selected value="{{ $year }}">{{ $year }}</option>
                                    @endif
                                    @if($loop->first && !old('year'))
                                        <option selected value="{{ $year }}">{{ $year }}</option>
                                    @else
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('year')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="field">
                            <input type="text" name="post" value="{{ old('post') }}" placeholder="{{ __('Post occupé') }}" />
                            @error('post')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <ul class="actions special">
                        <li><input type="submit" value="{{ __('Ajouter') }}" /></li>
                    </ul>
                </form>
                <a href="{{ route('home') }}#work">{{__('retour')}}</a>
            </div>
        </div>
    </section>
@endsection
