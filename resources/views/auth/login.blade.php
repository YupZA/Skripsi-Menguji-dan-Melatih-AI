{{-- resources/views/auth/login.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | AI Learning</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- FONT --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
</head>
<body>

<div class="login-page">

    <div class="login-card">
        <h1 class="login-title">Login</h1>

        <p class="login-subtitle">
            Masuk ke platform pembelajaran kecerdasan buatan
        </p>

        @if ($errors->any())
            <div class="login-error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="/login">
            @csrf

            <div class="login-field">
                <label>Email</label>
                <input type="email" name="email" placeholder="masukkan email" required>
            </div>

            <div class="login-field">
                <label>Password</label>
                <input type="password" name="password" placeholder="masukkan password" required>
            </div>

            <button type="submit" class="login-btn">
                Login
            </button>
        </form>

        <div class="login-footer">
            Belum punya akun?
            <a href="/register">Daftar di sini</a>
        </div>
    </div>

</div>

</body>
</html>