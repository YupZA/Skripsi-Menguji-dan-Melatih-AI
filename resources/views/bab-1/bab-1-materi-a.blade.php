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
                    <i><b>Artificial Intelligence</b></i> atau dalam Bahasa Indonesia disebut <b>Kecerdasan Buatan</b>,
                    adalah sebuah teknologi
                    yang memungkinkan mesin atau komputer untuk meniru kemampuan otak manusia. Artinya, mesin bisa belajar,
                    mengenali pola, memecahkan masalah, dan bahkan memahami bahasa, hampir seperti manusia.
                </p>


                <p>
                    Kecerdasan buatan dapat mengenali suara, gambar, memahami perintah, dan membuat keputusan sendiri
                    berdasarkan data yang diterima. Kemampuan ini membuat kecerdasan buatan banyak digunakan dalam kehidupan
                    sehari-hari, terutama pada teknologi yang membutuhkan pengenalan pola.
                </p>

                <p>
                    Perbedaan kecerdasan buatan dan program biasa :
                </p>

                <table class="table table-sm">
                    <caption>Tabel A.1 Perbedaan kecerdasan buatan dengan program biasa</caption>
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
                        <figure>
                            <img src="{{ asset('images/bab-1/materi-a/gambar-1.png') }}">
                            <figcaption>Gambar A.1 Logo Siri</figcaption>
                        </figure>

                        <figure>
                            <img src="{{ asset('images/bab-1/materi-a/gambar-2.png') }}">
                            <figcaption>Gambar A.2 Ilustrasi Kecerdasan Buatan</figcaption>
                        </figure>
                    </div>

                    <li>ChatGPT – Kecerdasan buatan yang bisa menjawab pertanyaan dan ngobrol seperti
                        manusia.
                    </li>
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-1/materi-a/gambar-3.png') }}" alt="Ilustrasi AI">
                        <span>Gambar A.3 Logo OpenAI</span>
                    </div>

                    <li>Deep Blue – Komputer kecerdasan buatan yang pernah mengalahkan juara dunia catur.
                    </li>
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-1/materi-a/gambar-4.jpg') }}" alt="Ilustrasi AI">
                        <span>Gambar A.4 Superkomputer IBM Deep Blue</span>
                    </div>

                    <div class="fun-fact">
                        <strong>💡 Info Menarik</strong>
                        <p>
                            Gambar A.4 menunjukkan komputer mainframe dari IBM yang digunakan untuk mengolah data dalam
                            jumlah
                            besar. Komputer jenis ini banyak dimanfaatkan oleh perusahaan dan instansi besar pada masanya.
                        </p>
                    </div>

                    <li>Sophia – Robot kecerdasan buatan yang bisa berbicara dan punya wajah seperti
                        manusia.
                    </li>

                    <div class="materi-image">
                        <img src="{{ asset('images/bab-1/materi-a/gambar-5.jpg') }}" alt="Ilustrasi AI">
                        <span>Gambar A.5 Robot Humanoid Sophia</span>
                    </div>

                    <div class="fun-fact">
                        <strong>💡 Info Menarik</strong>
                        <p>
                            Gambar A.5 menunjukkan robot humanoid bernama Sophia yang dirancang untuk meniru ekspresi dan
                            interaksi manusia. Robot ini menjadi salah satu contoh perkembangan teknologi kecerdasan buatan
                            (AI)
                            di era modern.
                        </p>
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
        @php
            use App\Models\Materi;
            use App\Models\UserProgress;

            // ambil materi (karena kamu tidak pakai controller)
            $materi = Materi::where('slug', 'bab-1-materi-a')->first();

            // cek progress
            $isCompleted = UserProgress::where('user_id', auth()->id())
                ->where('materi_id', $materi->id ?? 0)
                ->where('status', 'completed')
                ->exists();
        @endphp

        <div id="progress"></div>

        

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

            <form method="POST" action="{{ url('/materi/selesai') }}" class="mt-4" id="formSelesai">
                @csrf
                <input type="hidden" name="materi_id" value="{{ $materi->id }}">

                <button
                    type="submit"
                    id="btnSelesai"
                    class="btn {{ $isCompleted ? 'btn-secondary' : 'btn-success' }}"
                    {{ $isCompleted ? 'disabled' : '' }}>

                    {{ $isCompleted ? 'Aktivitas Selesai' : 'Submit Aktivitas' }}

                </button>

                <div id="scoreInfo" class="mt-2"></div>
            </form>

        @endsection

        @push('scripts')
            <script src="{{ asset('js/interaktif/materi-1/materi-a.js') }}"></script>
        @endpush

        @push('styles')
            <link rel="stylesheet" href="{{ asset('css/interaktif/materi-1/materi-a.css') }}">
            <link rel="stylesheet" href="{{ asset('css/materi/style_materi.css') }}">
        @endpush