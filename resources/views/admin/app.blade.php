<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/admin.js') }}" defer></script>

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
    <div class="wrapper" id="app">
        @if (Auth::check())
        
        <header class="header">
            <a href="{{ route('logout') }}" class="header-logout" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{-- <i class="material-icons">logout</i> --}}
                Wyloguj
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </header>
    

        <nav class="nav" id="nav">

            <button class="nav-button">
                <span class="nav-button__toggle"></span>
            </button>
            <a class="nav-brand" href="{{ url('/admin') }}">
                    <img class="nav-image img-fluid" src="{{ asset('img/logo.png') }}" width="240" alt="{{ config('app.name', 'Laravel') }}"/>
            </a>
           
            <a href="{{ route('admin') }}" class="nav-item">
                <i class="material-icons nav-icon">dashboard</i>
                Dashboard
            </a>
            <a href="{{ route('orders.index') }}" class="nav-item">
                <i class="material-icons nav-icon">content_paste</i>
                Zamówienia
            </a>
            <a href="{{ route('attributes_groups.index') }}" class="nav-item">
                <i class="material-icons nav-icon">edit_attributes</i>
                Atrybuty
            </a>
            <a href="{{ route('combinations.index') }}" class="nav-item">
                <i class="material-icons nav-icon">
                assignment_turned_in
                </i>
                Kombinacje
            </a>
            <a href="{{ route('pages.index') }}" class="nav-item">
                <i class="material-icons nav-icon">pages</i>
                Strony
            </a>
            <a href="{{ route('slider.index') }}" class="nav-item">
                <i class="material-icons nav-icon">slideshow</i>
                Karuzela zdjęć
            </a>
            <a href="{{ route('groups.index') }}" class="nav-item">
                <i class="material-icons nav-icon">image_aspect_ratio</i>
                Grupy zdjęć
            </a>
            <a href="{{ route('gallery.index') }}" class="nav-item">
                <i class="material-icons nav-icon">image</i>
                Galeria zdjęć
            </a>
            <a href="{{ route('newsletter.index') }}" class="nav-item">
                <i class="material-icons nav-icon">email</i>
                Newsletter
            </a>
            <a href="{{ route('settings.index') }}" class="nav-item">
                <i class="material-icons nav-icon">settings</i>
                Ustawienia
            </a>

        </nav>

        @endif

        @if (Auth::check()) 
        <main class="content">
        @endif  
           
            @yield('content')

        @if (Auth::check()) 
        </main>
        @endif
    </div>
    <footer class="footer text-center">
        © Fotoadamski Fotografia 2019 | Created by wozniakr.pl
    </footer>
</body>
</html>
