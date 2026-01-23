<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Dashboard AI')</title>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS eksternal -->
    <link rel="stylesheet" href="{{ asset('css/style_dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style_materi_awal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/landing-page/informasi.css') }}">
</head>

<body>

    <!-- ================= NAVBAR ================= -->
    <header class="nav">
        <div class="brand">
            <span class="brand-core">AI</span>
            <span class="brand-dot"></span>
        </div>

        <nav class="menu">
            <a href="{{ url(path: '/dashboard') }}">Beranda</a>
            <a href="{{ url(path: '/materi') }}">Materi</a>
            <a href="{{ url(path: '/latih') }}">Latih AI</a>
            <a href="{{ url(path: '/informasi') }}">Informasi</a>
        </nav>

        <div class="user">
            <div class="avatar">👤</div>
        </div>
    </header>

    <!-- ================= CONTENT ================= -->
    <main>
        @yield('content')
    </main>

</body>

</html>