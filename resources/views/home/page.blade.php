@extends('layout.template')

@section('title')
    - Site Officiel
@endsection

@section('content')

    @include('home.intro')

    @include('home.presentation')

    @include('home.work')

    @include('home.contact')

@endsection
