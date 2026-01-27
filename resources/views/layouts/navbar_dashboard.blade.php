<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Dashboard AI')</title>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <!-- css -->
    <link rel="stylesheet" href="{{ asset('css/landing-page/style_dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/landing-page/materi.css') }}">
    <link rel="stylesheet" href="{{ asset('css/landing-page/informasi.css') }}">
    <link rel="stylesheet" href="{{ asset('css/latih/latih-ai.css') }}">
    <link rel="stylesheet" href="{{ asset('css/landing-page/beranda.css') }}">
    
</head>

<body>

    <!-- ================= NAVBAR ================= -->
    <header class="nav">
        <div class="brand">
            <span class="brand-core">AI</span>
            <span class="brand-dot"></span>
        </div>

        <nav class="menu">
            <a href="{{ url(path: '/landing-page/beranda') }}">Beranda</a>
            <a href="{{ url(path: '/landing-page/materi') }}">Materi</a>
            <a href="{{ url(path: '/landing-page/latih-ai') }}">Latih AI</a>
            <a href="{{ url(path: '/landing-page/informasi') }}">Informasi</a>
        </nav>

        <div class="user">
            <div class="avatar">👤</div>
        </div>
    </header>

    <!-- ================= CONTENT ================= -->
    <main>
        @yield('content')
    </main>

    @stack('scripts')

</body>

</html>