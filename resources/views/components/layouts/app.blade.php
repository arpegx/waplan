<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>{{ $title ?? 'Page Title' }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="flex h-screen items-center justify-center  bg-teal-100 ">
        <div class="container mx-auto w-3/4 bg-white">
            {{ $slot }}
        </div>
    </body>
</html>
