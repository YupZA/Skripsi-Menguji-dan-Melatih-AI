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

                <div class="register-field password-field">
                    <label>Password</label>

                    <input type="password" name="password" id="passwordInput" placeholder="Minimal 6 karakter" required>

                    <span class="toggle-password" id="togglePassword">
                        <!-- eye open -->
                        <svg id="eyeOpen" width="20" height="20" viewBox="0 0 24 24">
                            <path d="M1 12C1 12 5 5 12 5C19 5 23 12 23 12C23 12 19 19 12 19C5 19 1 12 1 12Z" fill="none"
                                stroke="currentColor" stroke-width="2" />
                            <circle cx="12" cy="12" r="3" fill="none" stroke="currentColor" stroke-width="2" />
                        </svg>

                        <!-- eye closed -->
                        <svg id="eyeClosed" width="20" height="20" viewBox="0 0 24 24" class="hidden">
                            <path d="M1 12C1 12 5 5 12 5C19 5 23 12 23 12C23 12 19 19 12 19C5 19 1 12 1 12Z" fill="none"
                                stroke="currentColor" stroke-width="2" />
                            <line x1="3" y1="21" x2="21" y2="3" stroke="currentColor" stroke-width="2" />
                        </svg>
                    </span>
                </div>






                {{-- ROLE --}}
                <div class="register-field">
                    <label>Role</label>
                    <select name="role" id="roleSelect" required>
                        <option value="">-- Pilih Peran --</option>
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
                <a href="/login">Masuk</a>
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