@extends('layouts.navbar_dashboard')

@section('title', 'Petunjuk Penggunaan')

@section('content')

    <div class="petunjuk-wrapper">

        <div class="petunjuk-header">

            <h1>PETUNJUK PENGGUNAAN</h1>

            <div class="petunjuk-line"></div>

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


                        <img src="{{ asset('images/petunjuk/beranda.jpg') }}" alt="Tampilan Halaman Beranda"
                            class="petunjuk-img">

                        <div class="petunjuk-list">

                            <div class="petunjuk-step">
                                <div class="step-number">1</div>

                                <div class="step-text">
                                    <strong>Navigasi Atas</strong>
                                    <p>
                                        Digunakan untuk berpindah dan mengakses halaman utama, seperti Beranda, Materi,
                                        Latih AI, Informasi, dan Petunjuk Penggunaan.
                                    </p>
                                </div>
                            </div>

                            <div class="petunjuk-step">
                                <div class="step-number">2</div>

                                <div class="step-text">
                                    <strong>Tombol Akses Modul</strong>
                                    <p>
                                        Digunakan untuk membuka dan mempelajari materi pembelajaran yang tersedia pada media
                                        pembelajaran.
                                    </p>
                                </div>
                            </div>

                            <div class="petunjuk-step">
                                <div class="step-number">3</div>

                                <div class="step-text">
                                    <strong>Tombol Mulai Melatih</strong>
                                    <p>
                                        Digunakan untuk mengakses fitur pelatihan AI dan mencoba simulasi pelatihan model
                                        kecerdasan buatan secara interaktif.
                                    </p>
                                </div>
                            </div>

                        </div>



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

            <!-- ITEM -->
            <div class="petunjuk-item">

                <button class="petunjuk-btn">

                    <div class="petunjuk-left">

                        <div class="petunjuk-icon">
                            <i class="fa-solid fa-phone"></i>
                        </div>

                        <span>Hubungi Kami</span>

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

        </div>

    </div>

@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/landing-page/petunjuk.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/landing/petunjuk.js') }}"></script>
@endpush