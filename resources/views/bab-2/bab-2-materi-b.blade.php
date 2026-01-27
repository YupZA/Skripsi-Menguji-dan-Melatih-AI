@extends('layouts.app')

@section('title', 'Bab 2 - AI')

@section('content')
    <div>
        <h1 class="mt-4">PENGENALAN GOOGLE TEACHABLE LEARNING MACHINE</h1>
        <div>
            <h2>2. Google Teachable Machine : Membuat AI Jadi Mudah</h2>
            <p>
                <strong>Google Teachable Machine</strong> adalah platform berbasis web yang dikembangkan oleh Google untuk memudahkan siapa
                pun dalam membuat dan melatih model kecerdasan buatan (AI) tanpa perlu menulis satu baris kode pun.
                <strong>Keunggulan utama Teachable Machine</strong> adalah sifatnya yang <i>user-friendly</i>. Pengguna dari berbagai latar belakang
                baik pelajar, guru, maupun peneliti dapat memahami konsep dasar <i>machine learning</i> secara praktis dan cepat.
                Platform ini dirancang untuk memberikan pengalaman belajar yang menyenangkan sekaligus edukatif.
            </p>
            <ol type="a">
                <li>Fungsi dan manfaat</li>
                <p>
                    Google Teachable Machine memiliki fungsi utama sebagai media pembelajaran interaktif untuk mengenalkan
                    konsep dasar <i>Machine Learning</i> dengan cara yang sederhana. Melalui alat ini, peserta didik dapat memahami
                    bagaimana komputer dapat belajar dari contoh data yang diberikan tanpa harus mempelajari bahasa
                    pemrograman yang kompleks.
                </p>
                <ol>
                    <li>Meningkatkan literasi teknologi dan berpikir komputasional.
                        <br>Siswa belajar mengenali pola dan memahami bagaimana data digunakan untuk mengambil keputusan.
                    </li>
                    <li>Mendukung pembelajaran berbasis proyek (<i>Project-Based Learning</i>).
                        <br>Siswa dapat membuat proyek sederhana seperti pengenalan ekspresi wajah, suara, atau gerakan
                        tubuh.
                    </li>
                    <li>Mendukung pembelajaran yang lebih menarik.
                        <br>Siswa dapat belajar menggunakan aplikasi berbasis AI yang interaktif dan menyesuaikan dengan
                        gaya belajar mereka.
                    </li>
                    <li>
                        Menumbuhkan pemahaman tentang etika dan tanggung jawab penggunaan AI.
                        <br>Siswa belajar bahwa data harus dikumpulkan secara aman dan digunakan dengan bijak.
                    </li>
                    <li>
                        Mempermudah pekerjaan manusia.
                        <br>AI dapat membantu melakukan tugas berulang dengan cepat dan akurat.
                    </li>
                    <li>
                        Meningkatkan efisiensi dan kenyamanan.
                        <br>Misalnya, sistem otomatis yang menyalakan lampu atau AC berdasarkan suhu ruangan.
                    </li>
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-2/materi-b/gambar-1.png') }}" alt="Ilustrasi AI">
                        <span>Ilustrasi Kecerdasan Buatan</span>
                    </div>
                </ol>
                <li>Penerapan AI di Sekitar Kita</li>
                <p>AI bekerja di balik layar untuk membantu kita dalam banyak hal. Berikut beberapa contoh penerapan AI yang
                    mudah dijumpai:</p>
                <ol>
                    <li>Asisten Digital
                        <br>Contoh: Google Assistant, Siri, atau Alexa. AI membantu menjawab pertanyaan, memberikan
                        rekomendasi, bahkan mengatur jadwal atau alarm hanya melalui perintah suara.
                    </li>
                    <li>
                        Rekomendasi di Media Sosial dan Aplikasi
                        <br>Saat kamu menonton video di YouTube atau mendengarkan musik di Spotify, sistem AI akan
                        mempelajari apa yang kamu sukai dan memberikan rekomendasi konten serupa.
                    </li>
                    <li>
                        Pengenalan Wajah (<i>Face Recognition</i>)
                        <br>AI digunakan untuk membuka kunci ponsel dengan wajah atau untuk keamanan di tempat tertentu.
                        Sistem ini bekerja dengan mengenali pola unik pada wajah seseorang.
                    </li>
                    <li>
                        Navigasi dan Transportasi
                        <br>Google Maps atau aplikasi ojek online seperti Gojek dan Grab menggunakan AI untuk menentukan
                        rute tercepat dan memprediksi waktu tiba.
                    </li>
                    <li>
                        Pendidikan dan Pembelajaran
                        <br>AI juga banyak digunakan dalam dunia pendidikan. Misalnya, aplikasi belajar yang menyesuaikan
                        kesulitan soal dengan kemampuan pengguna, atau platform seperti Duolingo yang mengenali kesalahan
                        umum siswa dan memberikan latihan tambahan.
                    </li>
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-2/materi-b/gambar-2.png') }}" alt="Ilustrasi AI">
                        <span>Ilustrasi Kecerdasan Buatan</span>
                    </div>
                </ol>
            </ol>
        </div>
    </div>

    <section class="ai-classification">
        <h2>Aktivitas 2.2</h2>
        <p>Tentukan apakah contoh berikut termasuk <strong>Kecerdasan Buatan (AI)</strong> atau <strong>Program
                Biasa</strong>.</p>

        <div class="classify-item" data-answer="ai">
            <p>1. Google Assistant menjawab pertanyaan berdasarkan suara pengguna.</p>
            <button onclick="classify(this, 'ai')">AI</button>
            <button onclick="classify(this, 'program')">Program Biasa</button>
            <div class="feedback"></div>
        </div>

        <div class="classify-item" data-answer="program">
            <p>2. Kalkulator menghitung berdasarkan rumus yang sudah ditentukan.</p>
            <button onclick="classify(this, 'ai')">AI</button>
            <button onclick="classify(this, 'program')">Program Biasa</button>
            <div class="feedback"></div>
        </div>

        <div class="classify-item" data-answer="ai">
            <p>3. Sistem rekomendasi YouTube menyarankan video sesuai tontonanmu.</p>
            <button onclick="classify(this, 'ai')">AI</button>
            <button onclick="classify(this, 'program')">Program Biasa</button>
            <div class="feedback"></div>
        </div>

        <div class="classify-item" data-answer="program">
            <p>4. Alarm berbunyi tepat pukul 05.00 setiap hari.</p>
            <button onclick="classify(this, 'ai')">AI</button>
            <button onclick="classify(this, 'program')">Program Biasa</button>
            <div class="feedback"></div>
        </div>

        <div class="classify-item" data-answer="ai">
            <p>5. Google Teachable Machine mengenali ekspresi wajah dari kamera.</p>
            <button onclick="classify(this, 'ai')">AI</button>
            <button onclick="classify(this, 'program')">Program Biasa</button>
            <div class="feedback"></div>
        </div>
    </section>

@endsection

@push('scripts')
    <script src="{{ asset('js/interaktif/materi-2/materi-b.js') }}"></script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/interaktif/materi-2/materi-b.css') }}">
@endpush