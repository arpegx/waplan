<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>{{ $title ?? 'Page Title' }}</title>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <link rel="stylesheet" href="{{asset('assets/styles/build.css')}}">
    </head>
    <body class="flex h-screen items-center justify-center"
        style="background-image: url('assets/images/calathea_korbmarante.jpeg');
            background-repeat: no-repeat;
            background-size: cover;"
        > 
        <div class="rounded container mx-auto w-4/5 bg-white h-5/6">
            {{ $slot }}
        </div>
    </body>
</html>