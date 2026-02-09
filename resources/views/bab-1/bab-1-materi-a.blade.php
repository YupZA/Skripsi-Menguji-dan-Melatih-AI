@extends('layouts.app')

@section('title', 'Bab 1 - AI')

@section('content')
    <div class="materi-container">
        <h1 class="mt-4">Mengenal AI dan Dasar - Dasar Machine Learning</h1>

        <div class="row">
            <div class="col-xl-10 col-md-5">
                <div class="card bg-light text-black mb-4">
                    <div class="card-body">Tujuan Pembelajaran :</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <div>Setelah mempelajari materi ini, siswa diharapkan :
                            <ul>
                                <li>Memahami apa itu Kecerdasan Buatan (AI) dan konsep dasar pembelajaran mesin (machine
                                    learning).</li>
                                <li>Memahami perbedaan antara data latih (training data) dan data prediksi
                                    (testing/prediction).</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <h2>1. Apa Itu Kecerdasan Buatan</h2>
                <p>
                    <i><strong>(Artificial Intelligence)</strong></i> atau dalam Bahasa Indonesia disebut <strong>Kecerdasan
                        Buatan</strong>, adalah
                    sebuah teknologi yang memungkinkan mesin atau komputer untuk meniru kemampuan otak
                    manusia. Artinya, mesin bisa belajar, berpikir, mengenali pola, memecahkan masalah, dan
                    bahkan memahami bahasa, hampir seperti manusia.
                </p>
                <p>
                    Gagasan tentang kecerdasan buatan (<i>Artificial Intelligence</i>) telah ada jauh sebelum
                    istilah “AI” digunakan secara resmi. Salah satu tokoh penting dalam sejarah ini adalah
                    <strong>Alan Turing</strong>, seorang ilmuwan matematika dan komputer asal Inggris. Pada tahun 1950,
                    Turing mengajukan pertanyaan terkenal: “Bisakah mesin berpikir?” Pertanyaan ini menjadi
                    titik awal lahirnya <strong>konsep dasar kecerdasan buatan</strong>, yaitu upaya untuk membuat mesin
                    mampu meniru cara berpikir manusia. Ia juga memperkenalkan Tes Turing, sebuah cara untuk
                    menilai apakah mesin dapat menampilkan perilaku yang tidak dapat dibedakan dari manusia.
                </p>

                <div class="materi-image">
                    <img src="{{ asset('images/bab-1/materi-a/gambar-1.webp') }}" alt="Ilustrasi AI">
                    <span>Ilustrasi Kecerdasan Buatan</span>
                </div>

                <p>
                    Selanjutnya, pada tahun 1956, istilah “<i>Artificial Intelligence</i>” atau kecerdasan buatan
                    pertama kali digunakan dalam sebuah konferensi ilmiah di Dartmouth College, Amerika
                    Serikat.
                    Pertemuan ini dianggap sebagai momen resmi lahirnya bidang studi AI. Para ilmuwan pada
                    saat itu mulai berusaha merancang program komputer yang dapat belajar, bernalar, dan
                    memecahkan masalah secara otomatis.
                </p>
                <p>
                    Menariknya, gagasan tentang mesin yang dapat bergerak dan berperilaku seperti manusia
                    sebenarnya telah muncul jauh lebih awal. Pada tahun 1495, Leonardo da Vinci merancang
                    robot mekanik pertama yang menyerupai manusia. Robot tersebut mampu duduk, berdiri, dan
                    menggerakkan tangan menggunakan sistem katrol dan roda gigi. Meskipun belum didukung
                    teknologi digital seperti saat ini, karya da Vinci menunjukkan bahwa keinginan manusia
                    untuk menciptakan “mesin cerdas” sudah ada sejak berabad-abad lalu.
                </p>

                <div class="materi-image">
                    <img src="{{ asset('images/bab-1/materi-a/gambar-2.jpg') }}" alt="Ilustrasi AI">
                    <span>Ilustrasi Kecerdasan Buatan</span>
                </div>


                <p>
                    Perbedaan kecerdasan buatan dan program biasa :
                </p>

                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Program Biasa</th>
                            <th>Kecerdasan Buatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Hanya mengikuti instruksi tetap</td>
                            <td>Dapat belajar dari data</td>
                        </tr>
                        <tr>
                            <td>Tidak bisa berubah sendiri</td>
                            <td>Bisa berubah sesuai pengalaman</td>
                        </tr>
                        <tr>
                            <td>Tidak mengerti data</td>
                            <td>Bisa memahami pola dari data</td>
                        </tr>
                    </tbody>
                </table>

                <p>
                    Beberapa contoh manfaat kecerdasan buatan di berbagai bidang :
                </p>
                <ul>
                    <li>Bidang Kesehatan : kecerdasan buatan bisa membantu dokter mendeteksi penyakit lebih
                        cepat.</li>
                    <li>Bidang Pendidikan : Kecerdasan buatan bisa menjadi asisten belajar yang memahami
                        kebutuhan siswa.</li>
                    <li>Bidang Transportasi : Mobil tanpa sopir menggunakan kecerdasan buatan untuk
                        mengenali
                        jalan dan menghindari kecelakaan</li>
                    <li>Bidang Teknologi : Kecerdasan buatan bisa dipakai di asisten digital seperti Google
                        Assistant yang bisa diajak berbicara</li>
                </ul>

                <p>
                    Contoh kecerdasan buatan yang terkenal dan sering kita dengar :
                </p>
                <ul>
                    <li>Siri (Apple) dan Google Assistant – Membantu kita mencari informasi hanya dengan
                        suara.
                    </li>
                    <div class="materi-image inline">
                        <img src="{{ asset('images/bab-1/materi-a/gambar-3.png') }}">
                        <img src="{{ asset('images/bab-1/materi-a/gambar-4.png') }}">
                    </div>

                    <li>ChatGPT – Kecerdasan buatan yang bisa menjawab pertanyaan dan ngobrol seperti
                        manusia.
                    </li>
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-1/materi-a/gambar-5.png') }}" alt="Ilustrasi AI">
                        <span>Ilustrasi Kecerdasan Buatan</span>
                    </div>

                    <li>Deep Blue – Komputer kecerdasan buatan yang pernah mengalahkan juara dunia catur.
                    </li>
                    <li>Sophia – Robot kecerdasan buatan yang bisa berbicara dan punya wajah seperti
                        manusia.
                    </li>
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-1/materi-a/gambar-6.jpg') }}" alt="Ilustrasi AI">
                        <span>Ilustrasi Kecerdasan Buatan</span>
                    </div>

                    <li>Rekomendasi film atau musik di YouTube, Netflix, atau Spotify yang pas banget dengan
                        seleramu.</li>
                    <li>Filter spam email yang otomatis memisahkan email penting dan email sampah.</li>
                    <li>Fitur pendeteksi wajah di kamera ponsel untuk membuka kunci atau menambahkan efek.
                    </li>
                </ul>
            </div>
        </div>

        {{-- ===== TANDAI MATERI SELESAI ===== --}}
        @php use App\Models\UserProgress;
    $isCompleted = UserProgress::where('user_id', auth()->id())->where('materi_id', 1)->where('status', 'completed')->exists(); @endphp

    <div id="progress"></div>

    <form method="POST" action="{{ url('/materi/selesai') }}" class="mt-4">
        @csrf
        <input type="hidden" name="materi_id" value="1">

        <button type="submit" class="btn {{ $isCompleted ? 'btn-secondary' : 'btn-success' }}" {{ $isCompleted ? 'disabled' : '' }}>
            {{ $isCompleted ? 'Materi Sudah Selesai' : 'Tandai Materi Selesai' }}
        </button>
    </form>

        <section class="ai-interactive">
            <h2>Aktivitas 1.1</h2>
            <p>Pilih jawaban yang paling tepat untuk setiap pernyataan.</p>

            <?php
    $questions = [
        [
            'text' => 'Sistem dapat mengenali wajah pengguna dan membuka kunci ponsel secara otomatis.',
            'answer' => 'ai'
        ],
        [
            'text' => 'Sistem dapat belajar dari data dan meningkatkan hasilnya.',
            'answer' => 'ai'
        ],
        [
            'text' => 'Kalkulator hanya menghitung sesuai rumus.',
            'answer' => 'program'
        ],
        [
            'text' => 'Aplikasi rekomendasi musik yang menyarankan lagu berdasarkan kebiasaan mendengarkan pengguna.',
            'answer' => 'ai'
        ],
        [
            'text' => 'Aplikasi alarm yang berbunyi pada waktu yang sudah ditentukan tanpa perubahan perilaku.',
            'answer' => 'program'
        ],
    ];
                    ?>

            <?php foreach ($questions as $index => $q): ?>
            <div class="ai-question" data-answer="<?= $q['answer']; ?>">
                <p><strong><?= ($index + 1) ?>.</strong> <?= $q['text']; ?></p>

                <div class="ai-options">
                    <button onclick="checkAnswer(this, 'program')">Program Biasa</button>
                    <button onclick="checkAnswer(this, 'ai')">Kecerdasan Buatan</button>
                </div>

                <div class="ai-feedback"></div>
            </div>
            <?php endforeach; ?>

@endsection

        @push('scripts')
            <script src="{{ asset('js/interaktif/materi-1/materi-a.js') }}"></script>
        @endpush

        @push('styles')
            <link rel="stylesheet" href="{{ asset('css/interaktif/materi-1/materi-a.css') }}">
            <link rel="stylesheet" href="{{ asset('css/materi/style_materi.css') }}">
        @endpush