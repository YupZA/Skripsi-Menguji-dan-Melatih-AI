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

            {{-- Pilihan jenis pengguna --}}
            <div class="role-selector">
                <button
                    type="button"
                    class="role-btn {{ old('role', 'siswa') === 'siswa' ? 'active' : '' }}"
                    data-role="siswa"
                >
                    Siswa
                </button>

                <button
                    type="button"
                    class="role-btn {{ old('role') === 'guru' ? 'active' : '' }}"
                    data-role="guru"
                >
                    Guru
                </button>
            </div>

            {{-- Nilai ini akan dikirim ke controller --}}
            <input
                type="hidden"
                name="role"
                id="role"
                value="{{ old('role', 'siswa') }}"
            >

            <div class="login-field">
                <label for="email">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Masukkan email"
                    autocomplete="email"
                    required
                >
            </div>

            <div class="login-field">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan password"
                    autocomplete="current-password"
                    required
                >
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const roleButtons = document.querySelectorAll('.role-btn');
        const roleInput = document.getElementById('role');

        roleButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                roleButtons.forEach(function (item) {
                    item.classList.remove('active');
                });

                this.classList.add('active');
                roleInput.value = this.dataset.role;
            });
        });
    });
</script>

</body>
</html>