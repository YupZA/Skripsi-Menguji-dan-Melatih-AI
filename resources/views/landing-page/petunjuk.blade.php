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

                        <img src="{{ asset('images/petunjuk/regist.jpg') }}" alt="Tampilan Halaman Mendaftar"
                            class="petunjuk-img">

                        <div class="petunjuk-list">

                            <div class="petunjuk-step">
                                <div class="step-number">1</div>

                                <div class="step-text">
                                    <strong>Kolom Pengisian Data</strong>
                                    <p>
                                        Isi data diri meliputi <strong>Nama Lengkap, Email, Password, NIS,</strong> dan
                                        <strong>Token Kelas</strong>.
                                    </p>
                                </div>
                            </div>

                            <div class="petunjuk-step">
                                <div class="step-number">2</div>

                                <div class="step-text">
                                    <strong>Tombol Daftar Akun</strong>
                                    <p>
                                        Setelah semua data terisi dengan benar, tekan tombol <strong>Daftar</strong> untuk
                                        membuat akun. Setelah berhasil, materi bisa diakses dan dipelajari
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

                        <img src="{{ asset('images/petunjuk/materi.jpg') }}" alt="Tampilan Halaman Mendaftar"
                            class="petunjuk-img">

                        <div class="petunjuk-list">

                            <div class="petunjuk-step">
                                <div class="step-number">1</div>

                                <div class="step-text">
                                    <strong>Nama Pengguna</strong>
                                    <p>
                                        Menampilkan identitas pengguna sebagai tanda bahwa pengguna telah berhasil masuk ke
                                        dalam akun.
                                    </p>
                                </div>
                            </div>

                            <div class="petunjuk-step">
                                <div class="step-number">2</div>

                                <div class="step-text">
                                    <strong>Sidebar Materi</strong>
                                    <p>
                                        Digunakan untuk berpindah antar bab dan submateri pembelajaran. Pengguna perlu
                                        mempelajari materi secara berurutan. Jika terdapat submateri yang masih terkunci
                                        dengan ikon gembok, pengguna harus menyelesaikan aktivitas pada submateri sebelumnya
                                        terlebih dahulu agar materi berikutnya terbuka.
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

                        <div class="petunjuk-list">

                            <div class="petunjuk-step">
                                <div class="step-number">1</div>

                                <div class="step-text">
                                    <strong>Kuis</strong>
                                    <p>
                                        Kuis digunakan untuk mengukur pemahaman pengguna pada setiap akhir bab. Pengguna
                                        harus memperoleh nilai minimal sesuai standar KKM, yaitu 70.
                                    </p>
                                </div>
                            </div>

                            <div class="petunjuk-step">
                                <div class="step-number">2</div>

                                <div class="step-text">
                                    <strong>Evaluasi</strong>
                                    <p>
                                        Evaluasi merupakan tes akhir yang mencakup seluruh materi pembelajaran. Halaman
                                        Evaluasi dapat diakses setelah pengguna menyelesaikan seluruh bab dan memenuhi
                                        persyaratan yang telah ditentukan.
                                    </p>
                                </div>
                            </div>

                            <div class="petunjuk-step">
                                <div class="step-number">3</div>

                                <div class="step-text">
                                    <strong>Syarat Kelulusan</strong>
                                    <p>
                                        Pengguna harus memperoleh nilai minimal 70 pada setiap kuis agar dapat melanjutkan
                                        ke bab berikutnya. Jika nilai belum memenuhi KKM, kuis dapat dikerjakan kembali
                                        hingga mencapai nilai yang ditentukan.
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
                            Jika pengguna mengalami kendala teknis atau memiliki pertanyaan terkait penggunaan media pembelajaran, pengguna dapat menghubungi kontak bantuan berikut.
                        </p>

                        <div class="petunjuk-list">

                            <div class="petunjuk-step">
                                <div class="step-number">1</div>

                                <div class="step-text">
                                    <strong>Email</strong>
                                    <p>
                                        muhammadazimi090@gmail.com
                                    </p>
                                </div>
                            </div>

                            <div class="petunjuk-step">
                                <div class="step-number">2</div>

                                <div class="step-text">
                                    <strong>WhatsApp</strong>
                                    <p>
                                        +6285251920994
                                    </p>
                                </div>
                            </div>

                            <div class="petunjuk-step">
                                <div class="step-number">3</div>

                                <div class="step-text">
                                    <strong>Institusi</strong>
                                    <p>
                                        Universitas Lambung Mangkurat
                                    </p>
                                </div>
                            </div>

                        </div>

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