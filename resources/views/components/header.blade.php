<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Lordicon -->
    <script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
</head>
<header class="fixed w-full bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    @guest
        <div class="container h-16 mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
          <a href="/"><img src="./clover-logo.svg" alt="Logo" class="w-12 h-auto mr-6"></a>
            <div class="flex items-center">
                <a href="{{ route('login') }}"
                    class="text-white bg-green-700 hover:bg-green-400 hover:text-gray-900 rounded px-4 py-2 mr-4 transition-all delay-150 duration-400">Login</a>
                <a href="{{ route('register') }}"
                    class="text-white bg-green-700 hover:bg-green-200 hover:text-gray-900 rounded px-4 py-2 transition-all delay-150 duration-200">Cadastro</a>
            </div>
        </div>
    @endguest
    @auth
        @include('navigation-clover-menu')
    @endauth
</header>

<body>
    {{ $slot }}
</body>

</html>
