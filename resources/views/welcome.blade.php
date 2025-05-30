<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Recapitulasi Data Pelayanan</title>

        <!-- Styles / Scripts -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>
        @vite('resources/css/app.css')
    </head>
    <body class="antialiased">
        <div class="container mx-auto mt-5 text-amber-200">
            <h1 class="text-2xl font-bold mb-4">Selamat Datang di Aplikasi Recapitulasi Data Pelayanan</h1>
            <p class="mb-4">Aplikasi ini digunakan untuk mengelola dan merekap data pelayanan.</p>
            {{-- <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Masuk ke Aplikasi</a> --}}
        </div>
</html>
