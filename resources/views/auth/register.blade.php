{{-- resources/views/auth/register.blade.php --}}
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Register | AI Learning</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- FONT --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
</head>

<body>

    <div class="register-page">

        <div class="register-card">
            <h1 class="register-title">Buat Akun</h1>
            <p class="register-subtitle">
                Daftar sebagai siswa di platform AI
            </p>

            @if ($errors->any())
                <div class="register-error">
                    <ul>
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="/register">
                @csrf

                <div class="register-field">
                    <label>Nama</label>
                    <input name="name" placeholder="Nama lengkap" required>
                </div>

                <div class="register-field">
                    <label>Email</label>
                    <input name="email" type="email" placeholder="email@contoh.com" required>
                </div>

                <div class="register-field password-field">
                    <label>Password</label>

                    <input type="password" name="password" id="passwordInput" placeholder="Minimal 6 karakter" required>

                    
                </div>


                {{-- FIELD SISWA --}}
                <div class="role-siswa">
                    <div class="register-field">
                        <label>NIS (Siswa)</label>
                        <input name="nis" placeholder="Contoh: S123">
                    </div>

                    <div class="register-field">
                        <label>Token Kelas</label>
                        <input name="token_kelas" placeholder="Masukkan token dari guru">
                    </div>
                </div>

                <input type="hidden" name="role" value="siswa">

                <button type="submit" class="register-btn">
                    Daftar
                </button>
            </form>

            <div class="register-footer">
                Sudah punya akun?
                <a href="/login">Masuk</a>
            </div>
        </div>

    </div>


    <script>
        const passwordInput = document.getElementById('passwordInput');
        const togglePassword = document.getElementById('togglePassword');
        const eyeOpen = document.getElementById('eyeOpen');
        const eyeClosed = document.getElementById('eyeClosed');

        togglePassword.addEventListener('click', () => {
            const isHidden = passwordInput.type === 'password';

            passwordInput.type = isHidden ? 'text' : 'password';

            eyeOpen.classList.toggle('hidden', isHidden);
            eyeClosed.classList.toggle('hidden', !isHidden);
        });
    </script>




</body>

</html>