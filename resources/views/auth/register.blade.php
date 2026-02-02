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
            <h1 class="register-title">🚀 Buat Akun</h1>
            <p class="register-subtitle">
                Daftar sebagai siswa atau guru di platform AI
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

                <div class="register-field">
                    <label>Password</label>
                    <input name="password" type="password" placeholder="Minimal 6 karakter" required>
                </div>

                {{-- ROLE --}}
                <div class="register-field">
                    <label>Role</label>
                    <select name="role" id="roleSelect" required>
                        <option value="">-- Pilih Role --</option>
                        <option value="siswa">Siswa</option>
                        <option value="guru">Guru</option>
                    </select>
                </div>

                {{-- FIELD SISWA --}}
                <div class="role-siswa hidden">
                    <div class="register-field">
                        <label>NIS (Siswa)</label>
                        <input name="nis" placeholder="Contoh: S123">
                    </div>

                    <div class="register-field">
                        <label>Kelas (Siswa)</label>
                        <input name="kelas" placeholder="Contoh: VIII A">
                    </div>
                </div>

                {{-- FIELD GURU --}}
                <div class="role-guru hidden">
                    <div class="register-field">
                        <label>NIP (Guru)</label>
                        <input name="nip" placeholder="Contoh: 1987xxxx">
                    </div>
                </div>

                <button type="submit" class="register-btn">
                    Daftar
                </button>
            </form>

            <div class="register-footer">
                Sudah punya akun?
                <a href="/login">Login</a>
            </div>
        </div>

    </div>

    {{-- JS ROLE TOGGLE --}}
    <script>
        const roleSelect = document.getElementById('roleSelect');
        const siswaFields = document.querySelector('.role-siswa');
        const guruFields = document.querySelector('.role-guru');

        function toggleRoleFields() {
            const role = roleSelect.value;

            siswaFields.classList.add('hidden');
            guruFields.classList.add('hidden');

            if (role === 'siswa') {
                siswaFields.classList.remove('hidden');
            }

            if (role === 'guru') {
                guruFields.classList.remove('hidden');
            }
        }

        roleSelect.addEventListener('change', toggleRoleFields);
        toggleRoleFields(); // init saat load
    </script>

</body>

</html>