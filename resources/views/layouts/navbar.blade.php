<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <link rel="stylesheet" href="{{ asset('css/landing-page/navbar_materi.css') }}">

    <a class="navbar-brand ps-3" href="{{ url('/landing-page/beranda') }}">AI</a>

    <!-- Sidebar Toggle -->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4" id="sidebarToggle">
        <i class="fas fa-bars"></i>
    </button>

    <div class="ms-auto"></div>

    <!-- User Dropdown (KANAN) -->
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
</nav>
