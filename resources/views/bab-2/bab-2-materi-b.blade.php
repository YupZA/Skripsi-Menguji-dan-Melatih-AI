@extends('layouts.app')

@section('title', 'Bab 2 - AI')

@section('content')
    <div>
        <h1 class="mt-4">PENGENALAN GOOGLE TEACHABLE MACHINE</h1>
        <div>
            <h2>2. <i>Google Teachable Machine</i> : Membuat <i>AI</i> Jadi Mudah</h2>
            <p>
                <strong>Google Teachable Machine</strong> adalah platform berbasis web yang dikembangkan oleh Google untuk
                memudahkan siapa
                pun dalam membuat dan melatih model kecerdasan buatan tanpa perlu menulis satu baris kode pun. Keunggulan
                utama <i>Teachable Machine</i> adalah sifatnya yang <i>user-friendly</i>. Pengguna dari berbagai latar
                belakang baik
                pelajar, guru, maupun peneliti dapat memahami konsep dasar <i>machine learning</i> secara praktis dan cepat.
                <i>Platform</i> ini dirancang untuk memberikan pengalaman belajar yang menyenangkan sekaligus edukatif.
            </p>
            <ol type="a">
                <li>Fungsi dan manfaat</li>
                <p>
                    <i>Google Teachable Machine</i> memiliki fungsi utama sebagai media pembelajaran interaktif untuk
                    mengenalkan
                    konsep dasar <i>machine learning</i> dengan cara yang sederhana. Melalui alat ini, peserta didik dapat
                    memahami
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
                        <br>Siswa dapat belajar menggunakan aplikasi berbasis kecerdasan buatan yang interaktif dan
                        menyesuaikan dengan
                        gaya belajar mereka.
                    </li>
                    <li>
                        Menumbuhkan pemahaman tentang etika dan tanggung jawab penggunaan kecerdasan buatan.
                        <br>Siswa belajar bahwa data harus dikumpulkan secara aman dan digunakan dengan bijak.
                    </li>
                    <li>
                        Mempermudah pekerjaan manusia
                        <br>Kecerdasan buatan dapat membantu melakukan tugas berulang dengan cepat dan akurat.
                    </li>
                    <li>
                        Meningkatkan efisiensi dan kenyamanan
                        <br>Misalnya, sistem otomatis yang menyalakan lampu atau AC berdasarkan suhu ruangan.
                    </li>
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-2/materi-b/gambar-1.png') }}" alt="Ilustrasi AI">
                        <span>Gambar B.4 Manfaat dan konsep pembelajaran kecerdasan buatan</span>
                    </div>

                    <div class="fun-fact">
                        <p>
                            <strong>Gambar B.4</strong> menunjukkan berbagai manfaat dan konsep dalam pembelajaran berbasis
                            kecerdasan buatan, seperti literasi teknologi, etika <i>AI</i>, berpikir komputasional,
                            efisiensi,
                            pembelajaran yang menarik, serta <i>project based learning</i>.
                        </p>
                    </div>

                </ol>

                <li>Penerapan Kecerdasan Buatan dalam Kehidupan Sehari-hari</li>
                <p>Kecerdasan buatan bekerja di balik layar untuk membantu manusia dalam berbagai aktivitas. Berikut
                    beberapa contoh penerapan kecerdasan buatan yang mudah dijumpai dalam kehidupan sehari-hari:
                </p>
                <ol>
                    <li><strong>Asisten Digital</strong>
                        <br>Contoh: Google Assistant, Siri, atau Alexa. AI membantu menjawab pertanyaan, memberikan
                        rekomendasi, bahkan mengatur jadwal atau alarm hanya melalui perintah suara.
                    </li>
                    <li>
                        <strong>Rekomendasi di Media Sosial dan Aplikasi</strong>
                        <br>Saat pengguna menonton video di YouTube atau mendengarkan musik di Spotify, sistem kecerdasan
                        buatan akan mempelajari preferensi pengguna dan memberikan rekomendasi konten yang serupa.
                    </li>
                    <li>
                        <strong>Pengenalan Wajah (<i>Face Recognition</i>)</strong>
                        <br>Kecerdasan buatan digunakan untuk membuka kunci ponsel dengan wajah atau untuk keamanan di
                        tempat tertentu.
                        Sistem ini bekerja dengan mengenali pola unik pada wajah seseorang.
                    </li>
                    <li>
                        Navigasi dan Transportasi
                        <br>Google Maps atau aplikasi ojek online seperti Gojek dan Grab menggunakan AI untuk menentukan
                        rute tercepat dan memprediksi waktu tiba.
                    </li>
                    <li>
                        Pendidikan dan Pembelajaran
                        <br>Kecerdasan buatan juga banyak digunakan dalam dunia pendidikan. Misalnya, aplikasi belajar yang
                        menyesuaikan
                        kesulitan soal dengan kemampuan pengguna, atau platform seperti Duolingo yang mengenali kesalahan
                        umum siswa dan memberikan latihan tambahan.
                    </li>
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-2/materi-b/gambar-2.png') }}" alt="Ilustrasi AI">
                        <span>Gambar B.5 Contoh penerapan kecerdasan buatan</span>
                    </div>

                    <div class="fun-fact">
                        <p>
                            <strong>Gambar B.5</strong> menunjukkan berbagai penerapan kecerdasan buatan, seperti asisten
                            suara, rekomendasi
                            media, pengenalan wajah, dan navigasi peta digital yang membantu aktivitas manusia.
                        </p>
                    </div>
                </ol>
            </ol>
        </div>
    </div>

    @php
        use App\Models\Materi;
        use App\Models\UserProgress;

        // ambil materi (karena kamu tidak pakai controller)
        $materi = Materi::where('slug', 'bab-2-materi-b')->first();

        // cek progress
        $isCompleted = UserProgress::where('user_id', auth()->id())
            ->where('materi_id', $materi->id ?? 0)
            ->where('status', 'completed')
            ->exists();
    @endphp

    <div id="progress"></div>

    <section class="ai-classification">
        <h2>Aktivitas 2 : Mengidentifikasi Program Biasa atau Kecerdasan Buatan</h2>
        <p>Petunjuk pengerjaan aktivitas 2 :</p>
        <ul>
            <li>Bacalah setiap pernyataan dengan teliti.</li>
            <li>Tentukan apakah contoh yang diberikan termasuk <strong>Program Biasa</strong> atau <strong>Kecerdasan Buatan (<i>Artificial Intelligence</i>)</strong>.</li>
            <li><i>Klik</i> salah satu pilihan jawaban yang sesuai pada setiap soal.</li>
            <li>Kerjakan seluruh soal hingga selesai.</li>
            <li>Setelah semua soal dijawab, <i>klik</i> tombol <strong>Kumpul Aktivitas</strong>.</li>
        </ul>

        <div class="classify-item" data-answer="ai">
            <p>1. Google Assistant menjawab pertanyaan berdasarkan suara pengguna.</p>
            <button onclick="classify(this, 'ai')">Kecerdasan Buatan</button>
            <button onclick="classify(this, 'program')">Program Biasa</button>
            <div class="feedback"></div>
        </div>

        <div class="classify-item" data-answer="program">
            <p>2. Kalkulator menghitung berdasarkan rumus yang sudah ditentukan.</p>
            <button onclick="classify(this, 'ai')">Kecerdasan Buatan</button>
            <button onclick="classify(this, 'program')">Program Biasa</button>
            <div class="feedback"></div>
        </div>

        <div class="classify-item" data-answer="ai">
            <p>3. Sistem rekomendasi YouTube menyarankan video sesuai tontonanmu.</p>
            <button onclick="classify(this, 'ai')">Kecerdasan Buatan</button>
            <button onclick="classify(this, 'program')">Program Biasa</button>
            <div class="feedback"></div>
        </div>

        <div class="classify-item" data-answer="program">
            <p>4. Alarm berbunyi tepat pukul 05.00 setiap hari.</p>
            <button onclick="classify(this, 'ai')">Kecerdasan Buatan</button>
            <button onclick="classify(this, 'program')">Program Biasa</button>
            <div class="feedback"></div>
        </div>

        <div class="classify-item" data-answer="ai">
            <p>5. Google Teachable Machine mengenali ekspresi wajah dari kamera.</p>
            <button onclick="classify(this, 'ai')">Kecerdasan Buatan</button>
            <button onclick="classify(this, 'program')">Program Biasa</button>
            <div class="feedback"></div>
        </div>

        <form method="POST" action="{{ url('/materi/selesai') }}" class="mt-4" id="formSelesai">
            @csrf
            <input type="hidden" name="materi_id" value="{{ $materi->id }}">

            <button
                type="submit"
                id="btnSelesai"
                class="btn {{ $isCompleted ? 'btn-secondary' : 'btn-success' }}"
                {{ $isCompleted ? 'disabled' : '' }}>

                {{ $isCompleted ? 'Aktivitas Selesai' : 'Kumpul Aktivitas' }}

            </button>

            <div id="scoreInfo" class="mt-2"></div>
        </form>
    </section>

@endsection

@push('scripts')
    <script src="{{ asset('js/interaktif/materi-2/materi-b.js') }}"></script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/interaktif/materi-2/materi-b.css') }}">
    <link rel="stylesheet" href="{{ asset('css/materi/style_materi.css') }}">
@endpush