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
                                <option value="01" selected>{{ __('Janvier') }}</option>
                                <option value="02">{{ __('Février') }}</option>
                                <option value="03">{{ __('Mars') }}</option>
                                <option value="04">{{ __('Avril') }}</option>
                                <option value="05">{{ __('Mai') }}</option>
                                <option value="06">{{ __('Juin') }}</option>
                                <option value="07">{{ __('Juillet') }}</option>
                                <option value="08">{{ __('Août') }}</option>
                                <option value="09">{{ __('Septembre') }}</option>
                                <option value="10">{{ __('Octobre') }}</option>
                                <option value="11">{{ __('Novembre') }}</option>
                                <option value="12">{{ __('Décembre') }}</option>
                            </select>
                            @error('month')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="field half">
                            <select name="year">
                                @foreach($years as $key => $year)
                                    @if($loop->first)
                                        <option selected value="{{ $key }}">{{ $year }}</option>
                                    @else
                                        <option value="{{ $key }}">{{ $year }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('year')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="field">
                            <input type="text" name="post" value="{{ old('post') }}" placeholder="{{ __('Post') }}" />
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
