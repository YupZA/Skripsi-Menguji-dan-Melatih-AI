@extends('layouts.navbar_dashboard')

@section('title', 'Petunjuk Penggunaan')

@section('content')

    <div class="petunjuk-wrapper">

        <div class="petunjuk-header">

            <h1>PETUNJUK PENGGUNAAN</h1>

            <div class="petunjuk-line"></div>

            <p>
                Pilih salah satu daftar di bawah untuk melihat
                petunjuk penggunaan media pembelajaran.
            </p>

        </div>

        <!-- ACCORDION -->
        <div class="petunjuk-accordion">

            <!-- ITEM -->
            <div class="petunjuk-item">

                <button class="petunjuk-btn">

                    <div class="petunjuk-left">

                        <div class="petunjuk-icon">
                            <i class="fas fa-home"></i>
                        </div>

                        <span>Halaman Beranda</span>

                    </div>

                    <div class="petunjuk-arrow">
                        <i class="fas fa-chevron-down"></i>
                    </div>

                </button>

                <div class="petunjuk-content">

                    <div class="petunjuk-content-inner">

                        <p>
                            Halaman beranda menampilkan informasi umum,
                            navigasi utama, dan akses menuju materi pembelajaran.
                        </p>

                    </div>

                </div>

            </div>

            <!-- ITEM -->
            <div class="petunjuk-item">

                <button class="petunjuk-btn">

                    <div class="petunjuk-left">

                        <div class="petunjuk-icon">
                            <i class="fas fa-user"></i>
                        </div>

                        <span>Cara Mendaftar Akun</span>

                    </div>

                    <div class="petunjuk-arrow">
    <i class="fas fa-chevron-down"></i>
</div>

                </button>

                <div class="petunjuk-content">

                    <div class="petunjuk-content-inner">

                        <p>
                            Pengguna dapat membuat akun terlebih dahulu
                            kemudian login menggunakan email dan password.
                        </p>

                    </div>

                </div>

            </div>

            <!-- ITEM -->
            <div class="petunjuk-item">

                <button class="petunjuk-btn">

                    <div class="petunjuk-left">

                        <div class="petunjuk-icon">
                            <i class="fas fa-book"></i>
                        </div>

                        <span>Halaman Materi Belajar</span>

                    </div>

                    <div class="petunjuk-arrow">
    <i class="fas fa-chevron-down"></i>
</div>
                </button>

                <div class="petunjuk-content">

                    <div class="petunjuk-content-inner">

                        <p>
                            Materi pembelajaran tersedia secara bertahap
                            sesuai progres belajar pengguna.
                        </p>

                    </div>

                </div>

            </div>

            <!-- ITEM -->
            <div class="petunjuk-item">

                <button class="petunjuk-btn">

                    <div class="petunjuk-left">

                        <div class="petunjuk-icon">
                            <i class="fas fa-trophy"></i>
                        </div>

                        <span>Kuis dan Syarat Kelulusan</span>

                    </div>

                    <div class="petunjuk-arrow">
    <i class="fas fa-chevron-down"></i>
</div>

                </button>

                <div class="petunjuk-content">

                    <div class="petunjuk-content-inner">

                        <p>
                            Pengguna harus menyelesaikan kuis dan
                            mencapai nilai minimum untuk melanjutkan materi.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/landing-page/petunjuk.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/landing/petunjuk.js') }}"></script>
@endpush