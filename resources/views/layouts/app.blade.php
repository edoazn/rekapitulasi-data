<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Sistem Rekapitulasi Data Pelayanan Terpadu - Kelola, analisis, dan laporkan data pelayanan dengan mudah dan efisien">
    <meta name="keywords" content="rekapitulasi, data, pelayanan, sistem informasi, dashboard, analytics, reporting">
    <meta name="author" content="Sistem Rekapitulasi Data Pelayanan">
    <meta name="robots" content="index, follow">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Sistem Rekapitulasi Data Pelayanan">
    <meta property="og:description" content="Kelola, analisis, dan laporkan data pelayanan dengan mudah melalui sistem yang terintegrasi dan efisien">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:site_name" content="Rekapitulasi Data Pelayanan">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Sistem Rekapitulasi Data Pelayanan">
    <meta name="twitter:description" content="Kelola, analisis, dan laporkan data pelayanan dengan mudah dan efisien">

    <title>@yield('title', 'Sistem Rekapitulasi Data Pelayanan')</title>

    <!-- Preconnect to external domains -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    
    <!-- PWA -->
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <meta name="theme-color" content="#3A5FCD">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
    
    <!-- Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebApplication",
        "name": "Sistem Rekapitulasi Data Pelayanan",
        "description": "Kelola, analisis, dan laporkan data pelayanan dengan mudah melalui sistem yang terintegrasi dan efisien",
        "url": "{{ url('/') }}",
        "applicationCategory": "BusinessApplication",
        "operatingSystem": "Web Browser"
    }
    </script>
</head>
<body class="antialiased">
    <!-- Skip to content link for accessibility -->
    <a href="#main-content" class="skip-link">Skip to main content</a>
    
    <div id="main-content">
        @yield('content')
    </div>
    
    <!-- No-script fallback -->
    <noscript>
        <div style="background: #fef2f2; color: #991b1b; padding: 1rem; text-align: center;">
            <p>Untuk pengalaman terbaik, mohon aktifkan JavaScript di browser Anda.</p>
        </div>
    </noscript>
</body>
</html>
