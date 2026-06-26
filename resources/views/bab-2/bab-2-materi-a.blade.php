@extends('layouts.app')

@section('title', 'Bab 2 - AI')

@section('content')
    <div>
        <h1 class="mt-4">PENGENALAN GOOGLE TEACHABLE MACHINE</h1>


        <div class="row">
            <div class="col-xl-10 col-md-5">
                <div class="card bg-light text-black mb-4">
                    <div class="card-body">Tujuan Pembelajaran :</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">

                        <div>Setelah mempelajari materi ini, siswa diharapkan :
                            <ul>
                                <li>Memahami fungsi dan fitur Google Teachable Machine sebagai platform pembelajaran
                                    kecerdasan buatan
                                    tanpa kode.</li>
                                <li>Menjelaskan jenis proyek yang tersedia dan cara kerja dasarnya.</li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div>
            <h2>1. Apa Itu Google Teachable Machine</h2>
            <p>
                <strong><i>Google Teachable Machine</i></strong> merupakan alat berbasis web yang dikembangkan oleh Google
                untuk membantu pengguna
                mempelajari pembelajaran mesin <i>(machine learning)</i> secara mudah dan menarik. Pengguna dapat membuat
                model
                kecerdasan buatan (<i>artificial intelligence</i>) melalui Teachable Machine tanpa harus menguasai
                pemrograman atau
                menulis kode yang rumit.
            </p>
            <p>
                Teachable Machine dapat digunakan untuk melatih komputer agar mampu mengenali gambar, suara, atau pose tubuh
                manusia melalui beberapa langkah sederhana. Misalnya, komputer dapat dilatih untuk membedakan foto bekantan
                dan monyet, mengenali suara tepuk tangan, atau mendeteksi gerakan tertentu menggunakan kamera.
            </p>
            <p>
                Alat ini sangat cocok digunakan oleh pelajar, termasuk siswa SMP, karena memiliki tampilan yang sederhana
                dan proses penggunaan yang cepat. Pengguna hanya perlu menyiapkan contoh data, seperti beberapa gambar atau
                suara. Selanjutnya, <i>Teachable Machine</i> akan mempelajari pola dari data tersebut dan membuat model yang
                dapat
                digunakan untuk pengenalan secara otomatis. Melalui <i>Teachable Machine</i>, pembelajaran tentang
                kecerdasan
                buatan dan <i>machine learning</i> menjadi lebih menarik dan mudah dipahami.

            </p>
            <p>
                Hubungan antara <i>Teachable Machine</i> dan konsep <i>machine learning</i> dapat dipahami melalui tiga
                konsep penting,
                yaitu <i>supervised learning</i>, <i>input-output</i>, dan pelatihan model secara <i>visual</i>.

            </p>
            <ol type="a">
                <li>
                    Pembelajaran Terbimbing (<i>Supervised Learning</i>)
                </li>
                <p>
                    Teachable Machine menggunakan pendekatan yang disebut <i>supervised learning</i> atau pembelajaran
                    terbimbing.
                    Artinya, komputer belajar dari contoh data yang sudah diberi label oleh manusia.
                </p>
                <p>
                    Contohnya:
                </p>
                <ul>
                    <li>Gambar ikan gabus diberi label Ikan Gabus</li>
                    <li>Gambar ikan papuyu diberi label Ikan Papuyu</li>
                </ul>
                <div class="materi-image">
                    <img src="{{ asset('images/bab-2/materi-a/gambar-1.png') }}" alt="Ilustrasi AI">
                    <span>Gambar B.1 Contoh proses <i>Supervised Learning</i>, di mana <i>AI</i> belajar mengenali perbedaan
                        antara Ikan
                        Gabus dan Ikan Papuyu berdasarkan data yang telah diberi label</span>
                </div>

                <div class="fun-fact">
                    <p>
                        <strong>Gambar B.1</strong> menunjukkan konsep <i>Supervised Learning</i> (Pembelajaran Terbimbing),
                        di mana komputer
                        belajar dari data yang telah diberi label oleh manusia. Pada gambar ini, data berupa gambar Ikan
                        Gabus dan Ikan Papuyu digunakan sebagai contoh pelatihan. Melalui data berlabel tersebut, model AI
                        mempelajari ciri-ciri masing-masing ikan sehingga dapat membedakan dan mengenali keduanya dengan
                        lebih akurat.
                    </p>
                </div>

                <p>
                    Dengan banyak contoh seperti ini, komputer dapat belajar mengenali ciri khas dari setiap kelas data.
                    Setelah proses pelatihan selesai, komputer dapat menebak apakah gambar baru termasuk “ikan gabus” atau
                    “ikan papuyu”.
                </p>
                <li>
                    Konsep <i>Input</i> dan <i>Output</i>
                </li>
                <p>
                    Dalam <i>Machine Learning</i>, komputer bekerja dengan sistem <i>input</i> dan <i>output</i>.
                </p>
                <ol>
                    <li><i><strong>Input</strong></i> adalah data yang dimasukkan ke dalam sistem, seperti gambar, suara,
                        atau pose tubuh.</li>
                    <li><i><strong>Output</strong></i> adalah hasil yang diberikan oleh model setelah memproses data
                        tersebut, seperti label
                        “ikan gabus”, “ikan papuyu”, “tepuk tangan”, atau “senyum”.</li>
                </ol>
                <p>
                    Teachable Machine memperlihatkan hubungan <i>input-output</i> secara langsung ketika pengguna
                    menunjukkan
                    gambar melalui kamera sebagai <i>input</i>, kemudian komputer menampilkan hasil prediksi berupa label
                    yang
                    sesuai sebagai <i>output</i>.
                </p>
                <div class="materi-image">
                    <img src="{{ asset('images/bab-2/materi-a/gambar-2.png') }}" alt="Ilustrasi AI">
                    <span>Gambar B.2 Alur input, model AI, dan output</span>
                </div>

                <div class="fun-fact">
                    <p>
                        <strong>Gambar B.2</strong> menunjukkan alur kerja kecerdasan buatan, dimulai dari data <i>input</i>
                        berupa gambar, kemudian
                        diproses oleh model <i>AI</i>, hingga menghasilkan <i>output</i> berupa pengenalan ekspresi, seperti
                        “senyum”.
                    </p>
                </div>

                <p>
                    Contoh: <br>
                    Apabila model dilatih untuk membedakan ekspresi wajah, ketika seseorang tersenyum di depan kamera,
                    <i>output</i> yang dihasilkan dapat berupa label “senyum”.
                </p>
                <li>
                    <i>Training Model</i> secara Visual
                </li>
                <p>
                    <strong>Salah satu keunggulan Teachable Machine</strong> adalah proses <i>training model</i> secara
                    visual, yang membuat
                    pembelajaran menjadi lebih mudah dipahami.
                </p>
                <p>
                    Biasanya, pelatihan model <i>Machine Learning</i> dilakukan dengan menulis kode dan menggunakan data
                    dalam
                    bentuk angka atau file teks. Namun di Teachable Machine, semua proses tersebut ditampilkan dalam bentuk
                    gambar dan tampilan visual yang interaktif.
                </p>
                <p>
                    Langkah-langkah pelatihan di Teachable Machine:
                </p>
                <ol>
                    <li>Mengunggah atau mengambil data secara langsung (misalnya gambar atau suara).</li>
                    <li>Memberi label pada setiap kelas (misalnya “ikan gabus” dan “ikan papuyu”).</li>
                    <li>Menekan tombol <i>Train Model</i> untuk memulai proses pembelajaran.</li>
                    <li>Setelah selesai, model siap diuji dan digunakan untuk mengenali data baru.</li>
                </ol>
                <div class="materi-image">
                    <img src="{{ asset('images/bab-2/materi-a/gambar-3.png') }}" alt="Ilustrasi AI">
                    <span>Gambar B.3 Tahapan pelatihan dan prediksi model AI</span>
                </div>

                <div class="fun-fact">
                    <p>
                        <strong>Gambar B.3</strong> menunjukkan tahapan dalam kecerdasan buatan, dimulai dari mengunggah
                        data gambar,
                        memberikan label (ikan gabus dan ikan papuyu), melatih model, hingga menghasilkan prediksi akhir.
                    </p>
                </div>

                <p>Dengan tampilan visual ini, siswa bisa melihat bagaimana model belajar dan bagaimana hasilnya berubah
                    ketika data yang diberikan berbeda.
                </p>
            </ol>
        </div>
    </div>

    @php
        use App\Models\Materi;
        use App\Models\UserProgress;

        // ambil materi (karena kamu tidak pakai controller)
        $materi = Materi::where('slug', 'bab-2-materi-a')->first();

        // cek progress
        $isCompleted = UserProgress::where('user_id', auth()->id())
            ->where('materi_id', $materi->id ?? 0)
            ->where('status', 'completed')
            ->exists();
    @endphp

    <div id="progress"></div>

    

    <section class="ai-inline-interactive">
    <h2>Aktivitas 1 : Menentukan <i>Output</i> dari <i>Input</i> pada Sistem <i>AI</i></h2>
    
    <ul>
        <li>Bacalah setiap <i>input</i> yang diberikan dengan teliti. </li>
        <li>Perhatikan pilihan jawaban yang tersedia pada setiap nomor.</li>
        <li>Perhatikan <i>input</i> berupa gambar, suara, ekspresi, atau pose.</li>
        <li>Pilih <i>output</i> yang paling sesuai.</li>
        <li>Setelah semua soal dijawab, <i>klik</i> tombol <strong>Kumpul Aktivitas</strong>.</li>
    </ul>

    <!-- SOAL 1 -->
    <div class="ai-question" data-answer="gabus" data-explain="Model AI mengenali ciri ikan gabus dari bentuk tubuh, warna, dan kepala yang khas.">
        <p><strong>1. <i>Image Project</i></strong></p>

        <div class="ai-flow">
            <div class="ai-input-box">
                <span class="ai-label"><i>Input</i></span>
                <img src="{{ asset('images/bab-2/materi-a/kuis-1.JPG') }}" alt="Gambar ikan gabus">
                <p>Gambar seekor ikan gabus</p>
            </div>

            <div class="ai-arrow">→</div>

            <div class="ai-model-box">
                <p>Model <i>AI</i></p>
            </div>

            <div class="ai-arrow">→</div>

            <div class="ai-output-box">
                <span class="ai-label"><i>Output</i>?</span>
                <div class="ai-options">
                    <button type="button" onclick="checkOutput(this, 'papuyu')">Ikan Papuyu</button>
                    <button type="button" onclick="checkOutput(this, 'gabus')">Ikan Gabus</button>
                    <button type="button" onclick="checkOutput(this, 'nila')">Ikan Nila</button>
                </div>
            </div>
        </div>

        <div class="ai-feedback"></div>
    </div>

    <!-- SOAL 2 -->
    <div class="ai-question" data-answer="tepuk tangan" data-explain="Model AI mengenali pola bunyi tepukan sehingga output yang tepat adalah tepuk tangan.">
        <p><strong>2. <i>Audio Project</i></strong></p>

        <div class="ai-flow">
            <div class="ai-input-box">
                <span class="ai-label"><i>Input</i></span>
                <button type="button" class="audio-btn" onclick="document.getElementById('audioTepuk').play()">▶ Putar Suara</button>
                <audio id="audioTepuk" src="{{ asset('audio/tepuk-tangan.mp3') }}"></audio>
                <p>Suara tepuk tangan</p>
            </div>

            <div class="ai-arrow">→</div>

            <div class="ai-model-box">
                <p>Model <i>AI</i></p>
            </div>

            <div class="ai-arrow">→</div>

            <div class="ai-output-box">
                <span class="ai-label"><i>Output</i>?</span>
                <div class="ai-options">
                    <button type="button" onclick="checkOutput(this, 'bicara')">Bicara</button>
                    <button type="button" onclick="checkOutput(this, 'tepuk tangan')">Tepuk tangan</button>
                    <button type="button" onclick="checkOutput(this, 'musik')">Musik</button>
                </div>
            </div>
        </div>

        <div class="ai-feedback"></div>
    </div>

    <!-- SOAL 3 -->
    <div class="ai-question" data-answer="senyum" data-explain="Model AI mengenali ekspresi wajah dari pola mata, pipi, dan mulut.">
        <p><strong>3. <i>Image Project</i></strong></p>

        <div class="ai-flow">
            <div class="ai-input-box">
                <span class="ai-label"><i>Input</i></span>
                <img src="{{ asset('images/aktivitas/wajah-senyum.jpg') }}" alt="Wajah tersenyum">
                <p>Wajah tersenyum di depan kamera</p>
            </div>

            <div class="ai-arrow">→</div>

            <div class="ai-model-box">
                <p>Model <i>AI</i></p>
            </div>

            <div class="ai-arrow">→</div>

            <div class="ai-output-box">
                <span class="ai-label"><i>Output</i>?</span>
                <div class="ai-options">
                    <button type="button" onclick="checkOutput(this, 'marah')">Marah</button>
                    <button type="button" onclick="checkOutput(this, 'senyum')">Senyum</button>
                    <button type="button" onclick="checkOutput(this, 'sedih')">Sedih</button>
                </div>
            </div>
        </div>

        <div class="ai-feedback"></div>
    </div>

    <!-- SOAL 4 -->
    <div class="ai-question" data-answer="berdiri" data-explain="Model AI mengenali posisi tubuh berdasarkan pola pose yang terlihat.">
        <p><strong>4. <i>Pose Project</i></strong></p>

        <div class="ai-flow">
            <div class="ai-input-box">
                <span class="ai-label"><i>Input</i></span>
                <img src="{{ asset('images/aktivitas/pose-berdiri.jpg') }}" alt="Pose berdiri">
                <p>Pose tubuh berdiri tegak</p>
            </div>

            <div class="ai-arrow">→</div>

            <div class="ai-model-box">
                <p>Model <i>AI</i></p>
            </div>

            <div class="ai-arrow">→</div>

            <div class="ai-output-box">
                <span class="ai-label"><i>Output</i>?</span>
                <div class="ai-options">
                    <button type="button" onclick="checkOutput(this, 'duduk')">Duduk</button>
                    <button type="button" onclick="checkOutput(this, 'berdiri')">Berdiri</button>
                    <button type="button" onclick="checkOutput(this, 'melompat')">Melompat</button>
                </div>
            </div>
        </div>

        <div class="ai-feedback"></div>
    </div>

    <!-- SOAL 5 -->
    <div class="ai-question" data-answer="gabus" data-explain="Ciri kepala menyerupai ular dan mampu hidup di air rendah oksigen merupakan ciri ikan gabus.">
        <p><strong>5. <i>Image Project</i></strong></p>

        <div class="ai-flow">
            <div class="ai-input-box">
                <span class="ai-label"><i>Input</i></span>
                <img src="{{ asset('images/bab-2/materi-a/kuis-2.JPG') }}" alt="Ciri ikan gabus">
                <p>Ikan dengan kepala menyerupai ular dan tahan di perairan rendah oksigen.</p>
            </div>

            <div class="ai-arrow">→</div>

            <div class="ai-model-box">
                <p>Model <i>AI</i></p>
            </div>

            <div class="ai-arrow">→</div>

            <div class="ai-output-box">
                <span class="ai-label"><i>Output</i>?</span>
                <div class="ai-options">
                    <button type="button" onclick="checkOutput(this, 'papuyu')">Ikan Papuyu</button>
                    <button type="button" onclick="checkOutput(this, 'gabus')">Ikan Gabus</button>
                    <button type="button" onclick="checkOutput(this, 'nila')">Ikan Nila</button>
                </div>
            </div>
        </div>

        <div class="ai-feedback"></div>
    </div>

    <!-- <div class="ai-progress-box">
        <p><strong>Progress Aktivitas:</strong> <span id="progressText">0/5 soal dijawab</span></p>
        <div class="ai-progress">
            <div id="progressBar"></div>
        </div>
    </div> -->

    <form method="POST" action="{{ url('/materi/selesai') }}" id="formSelesai" class="mt-4">
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
</section>

@endsection

@push('scripts')
    <script src="{{ asset('js/interaktif/materi-2/materi-a.js') }}"></script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/interaktif/materi-2/materi-a.css') }}">
    <link rel="stylesheet" href="{{ asset('css/materi/style_materi.css') }}">
@endpush