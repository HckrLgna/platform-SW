<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('/assets/backoffice/css/style.css')}}"  rel="stylesheet">
</head>
<body>
    <div id="app">
        <header id="header" class="page-topbar">
            <!-- start header nav-->
            <div class="navbar-fixed">
                <nav class="navbar-color gradient-45deg-light-blue-cyan">
                    <div class="nav-wrapper">
                        <ul class="left" style="padding: 10px; margin: 10px;">
                            <li>
                                <h1 class="logo-wrapper">
                                    <a href="{{route('home')}}" class="brand-logo darken-1">
                                        <img src="{{asset('/images/logo/materialize-logo.png')}}" alt="materialize logo">
                                        <span class="logo-text hide-on-med-and-down">Platform</span>
                                    </a>
                                </h1>
                            </li>
                        </ul>
                        <ul class="right hide-on-med-and-down">
                            <li><a href="http://127.0.0.1:8000/login" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a></li>
                            <li><a href="http://127.0.0.1:8000/register" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            <!-- end header nav-->
        </header>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
