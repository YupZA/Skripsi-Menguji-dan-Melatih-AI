<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/tes.css') }}">
</head>
<body>
    <div class="user">

        @auth
            <div class="user-info">
                <div class="avatar">👤</div>

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
</body>
</html>