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
    <link rel="stylesheet" href="{{ asset('css/landing-page/beranda.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- <link rel="stylesheet" href="{{ asset('css/tes.css') }}"> -->

    @stack('styles')

</head>

<body>

    <!-- ================= NAVBAR ================= -->
    <header class="nav">
        <div class="brand">
            <span class="brand-core">TM AI</span>
            <span class="brand-dot"></span>
        </div>

        <nav class="menu">
            <a href="{{ url(path: '/landing-page/beranda') }}">Beranda</a>
            <a href="{{ url(path: '/landing-page/materi') }}">Materi</a>
            <a href="{{ url(path: '/landing-page/latih-ai') }}">Latih AI</a>
            <a href="{{ url(path: '/landing-page/informasi') }}">Informasi</a>
            <a href="{{ url(path: '/landing-page/petunjuk') }}">Petunjuk Penggunaan</a>
        </nav>

        <div class="user">

            @auth
                    <div class="user-info">
                        <div class="avatar">
                            <img src="{{ auth()->user()->profile_photo
                ? asset('storage/' . auth()->user()->profile_photo)
                : 'https://ui-avatars.com/api/?name=' . auth()->user()->name . '&background=0f172a&color=00f5ff' }}"
                                alt="Avatar">
                        </div>


                        <div class="user-meta">
                            <span class="user-name">
                                {{ auth()->user()->name }}
                            </span>

                            <span class="user-role">
                                {{ ucfirst(auth()->user()->role) }}
                            </span>
                        </div>

                        <form method="POST" action="/logout" class="logout-form">
                            @csrf
                            <button type="submit" class="logout-btn">Logout</button>
                        </form>
                    </div>
            @endauth

            @guest
                <a href="/login" class="login-link">Login</a>
            @endguest

        </div>
    </header>

    <!-- ================= CONTENT ================= -->
    <main>
        @yield('content')
    </main>

    @stack('scripts')

</body>

</html>