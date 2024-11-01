<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @vite(['resources/css/style.bundle.css', 'resources/js/app.js', 'resources/js/menu.js'])
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    <link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
</head>
<style>
    body {
        background-color: #e2bf3283 !important;
    }
    [data-bs-theme="dark"] body {
        background-color: #333;
    }
    .logo {
        border-radius: 50% !important;
        object-fit: cover;
    }
</style>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.header')
        <div><br></div>
        @yield('content')
    </div>
</body>
</html>
