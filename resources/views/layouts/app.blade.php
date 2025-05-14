<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @include('components.css.app')
</head>
<body>
    <div id="app">
        @include('components.layout.nav')

        @auth
        {{-- @include('components.layout.sidebar') --}}
        @endauth

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @include('components.js.app')
    @stack('js')
</body>
</html>
