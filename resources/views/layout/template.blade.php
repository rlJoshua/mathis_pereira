<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Mathis Pereira @yield('title')</title>

        <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}" />
        <noscript>
            <link rel="stylesheet" type="text/css" href="{{ asset('css/noscript.css') }}" />
        </noscript>

    </head>
    <body class="is-preload">

        @include('layout.header')

        @yield('content')

        @include('layout.footer')

        <!-- Scripts -->
        <script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/jquery.poptrox.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/jquery.scrolly.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/jquery.scrollex.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/browser.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/breakpoints.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/util.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/main.js') }}" type="text/javascript"></script>
    </body>
</html>
