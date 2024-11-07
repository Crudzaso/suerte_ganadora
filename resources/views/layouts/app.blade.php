<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJx3h8aQnRbu69SxvBYjQY3b69I5f6cHcZoU4k/c9XXZcL1p/pz8UktT1jwF" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @vite(['resources/css/style.bundle.css', 'resources/js/app.js', 'resources/js/menu.js'])

    <link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    @livewireStyles
</head>

<body class="font-sans antialiased">

    @include('layouts.header')

    <br>

    @yield('content')


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0wWlMhaFjd7Zrfv6Hh2u7z6Q9rq+x8+wN52l2pP54qBx+YoT" crossorigin="anonymous"></script>
    @livewireScripts
    
</body>
</html>
