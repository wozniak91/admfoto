<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index, follow" />
    <meta name="theme-color" content="#000000" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="manifest" href="/manifest.json">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="https://fonts.gstatic.com"> --}}
{{--     <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700&amp;subset=latin-ext" rel="stylesheet" type="text/css"> --}}
    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app"></div>
</body>
</html>
