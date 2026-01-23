@extends('layouts.app')

@section('title', 'Bab 1 - AI')

@section('content')
    <div>
        <h1 class="mt-4">PENGENALAN GOOGLE TEACHABLE LEARNING MACHINE</h1>


        <div class="row">
            <div class="col-xl-10 col-md-5">
                <div class="card bg-light text-black mb-4">
                    <div class="card-body">Tujuan Pembelajaran :</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">

                        <div>Setelah mempelajari materi ini, siswa diharapkan :
                            <ul>
                                <li>Memahami fungsi dan fitur Google Teachable Machine sebagai platform pembelajaran AI
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
                Google Teachable Machine adalah alat berbasis web yang dikembangkan oleh Google untuk membantu siapa saja
                belajar tentang pembelajaran mesin (Machine Learning) dengan cara yang mudah dan menyenangkan. Melalui
                Teachable Machine, kita tidak perlu menjadi ahli pemrograman atau menulis kode rumit untuk membuat model
                kecerdasan buatan (Artificial Intelligence atau AI).
            </p>
            <p>
                Dengan Teachable Machine, kamu bisa melatih komputer agar mampu mengenali gambar, suara, atau pose tubuh
                manusia hanya dengan beberapa langkah sederhana. Misalnya, kamu bisa melatih komputer untuk membedakan
                antara foto kucing dan anjing, mengenali suara tepuk tangan, atau mendeteksi gerakan tertentu menggunakan
                kamera.
            </p>
            <p>
                Alat ini sangat cocok digunakan untuk pelajar, termasuk siswa SMP, karena tampilannya sederhana dan
                prosesnya cepat. Kamu hanya perlu menyiapkan contoh data (misalnya beberapa gambar atau suara), lalu
                Teachable Machine akan mempelajari pola dari data tersebut dan membuat model yang bisa digunakan untuk
                pengenalan otomatis. Dengan Teachable Machine, belajar tentang AI dan Machine Learning jadi lebih seru dan
                mudah dipahami
            </p>
            <p>
                Untuk memahami hubungan antara Teachable Machine dan konsep Machine Learning, kita perlu mengenal tiga
                konsep penting di dalamnya, yaitu supervised learning, input-output, dan training model secara visual.
            </p>
            <ol type="a">
                <li>
                    Supervised Learning (Pembelajaran Terbimbing)
                </li>
                <p>
                    Teachable Machine menggunakan pendekatan yang disebut supervised learning atau pembelajaran terbimbing.
                    Artinya, komputer belajar dari contoh data yang sudah diberi label oleh manusia.
                </p>
                <p>
                    Contohnya:
                </p>
                <ul>
                    <li>Gambar kucing diberi label kucing</li>
                    <li>Gambar anjing diberi label anjing</li>
                </ul>
                <div class="materi-image">
                    <img src="{{ asset('images/bab-2/materi-a/gambar-1.png') }}" alt="Ilustrasi AI">
                    <span>Ilustrasi Kecerdasan Buatan</span>
                </div>
                <p>
                    Dengan banyak contoh seperti ini, komputer dapat belajar mengenali ciri khas dari setiap kelas data.
                    Setelah proses pelatihan selesai, komputer dapat menebak apakah gambar baru termasuk “kucing” atau
                    “anjing”.
                </p>
                <li>
                    Konsep Input dan Output
                </li>
                <p>
                    Dalam Machine Learning, komputer bekerja dengan sistem input dan output.
                </p>
                <ol>
                    <li>• Input adalah data yang dimasukkan ke dalam sistem, seperti gambar, suara, atau pose tubuh.</li>
                    <li>• Output adalah hasil yang diberikan oleh model setelah memproses data tersebut, seperti label
                        “kucing”, “anjing”, “tepuk tangan”, atau “senyum”.</li>
                </ol>
                <p>
                    Di Teachable Machine, hubungan input-output ini dapat dilihat secara langsung, saat kita menunjukkan
                    gambar melalui kamera (input), komputer akan menampilkan hasil prediksi berupa label yang sesuai
                    (output).
                </p>
                <div class="materi-image">
                    <img src="{{ asset('images/bab-2/materi-a/gambar-2.png') }}" alt="Ilustrasi AI">
                    <span>Ilustrasi Kecerdasan Buatan</span>
                </div>
                <p>
                    Contoh: <br>
                    Jika kamu melatih model untuk membedakan ekspresi wajah, maka ketika kamu tersenyum di depan kamera,
                    output-nya bisa berupa tulisan “senyum”.
                </p>
                <li>
                    Training Model secara Visual
                </li>
                <p>
                    Salah satu keunggulan Teachable Machine adalah proses training model secara visual, yang membuat
                    pembelajaran menjadi lebih mudah dipahami.
                </p>
                <p>
                    Biasanya, pelatihan model Machine Learning dilakukan dengan menulis kode dan menggunakan data dalam
                    bentuk angka atau file teks. Namun di Teachable Machine, semua proses tersebut ditampilkan dalam bentuk
                    gambar dan tampilan visual yang interaktif.
                </p>
                <p>
                    Langkah-langkah pelatihan di Teachable Machine:
                </p>
                <ol>
                    <li>Mengunggah atau mengambil data secara langsung (misalnya gambar atau suara).</li>
                    <li>Memberi label pada setiap kelas (misalnya “kucing”, “anjing”, atau “burung”).</li>
                    <li>Menekan tombol Train Model untuk memulai proses pembelajaran.</li>
                    <li>Setelah selesai, model siap diuji dan digunakan untuk mengenali data baru.</li>
                </ol>
                <div class="materi-image">
                    <img src="{{ asset('images/bab-2/materi-a/gambar-3.png') }}" alt="Ilustrasi AI">
                    <span>Ilustrasi Kecerdasan Buatan</span>
                </div>
                <p>Dengan tampilan visual ini, siswa bisa melihat bagaimana model belajar dan bagaimana hasilnya berubah
                    ketika data yang diberikan berbeda.
                </p>
            </ol>
        </div>
    </div>

    <section class="ai-inline-interactive">
        <h2>Aktivitas 2.1</h2>
        <p>Perhatikan input berikut, lalu pilih output AI yang paling tepat.</p>

        <!-- SOAL 1 -->
        <div class="ai-question" data-answer="kucing">
            <p><strong>1. Input:</strong> Gambar seekor kucing</p>
            <div class="ai-options">
                <button onclick="checkOutput(this, 'anjing')">Anjing</button>
                <button onclick="checkOutput(this, 'kucing')">Kucing</button>
                <button onclick="checkOutput(this, 'burung')">Burung</button>
            </div>
            <div class="ai-feedback"></div>
        </div>

        <!-- SOAL 2 -->
        <div class="ai-question" data-answer="tepuk tangan">
            <p><strong>2. Input:</strong> Suara tepuk tangan</p>
            <div class="ai-options">
                <button onclick="checkOutput(this, 'bicara')">Bicara</button>
                <button onclick="checkOutput(this, 'tepuk tangan')">Tepuk tangan</button>
                <button onclick="checkOutput(this, 'musik')">Musik</button>
            </div>
            <div class="ai-feedback"></div>
        </div>

        <!-- SOAL 3 -->
        <div class="ai-question" data-answer="senyum">
            <p><strong>3. Input:</strong> Wajah tersenyum di depan kamera</p>
            <div class="ai-options">
                <button onclick="checkOutput(this, 'marah')">Marah</button>
                <button onclick="checkOutput(this, 'senyum')">Senyum</button>
                <button onclick="checkOutput(this, 'sedih')">Sedih</button>
            </div>
            <div class="ai-feedback"></div>
        </div>

        <!-- SOAL 4 -->
        <div class="ai-question" data-answer="berdiri">
            <p><strong>4. Input:</strong> Pose tubuh berdiri tegak</p>
            <div class="ai-options">
                <button onclick="checkOutput(this, 'duduk')">Duduk</button>
                <button onclick="checkOutput(this, 'berdiri')">Berdiri</button>
                <button onclick="checkOutput(this, 'melompat')">Melompat</button>
            </div>
            <div class="ai-feedback"></div>
        </div>

        <!-- SOAL 5 -->
        <div class="ai-question" data-answer="anjing">
            <p><strong>5. Input:</strong> Gambar hewan berkaki empat dengan gonggongan</p>
            <div class="ai-options">
                <button onclick="checkOutput(this, 'kucing')">Kucing</button>
                <button onclick="checkOutput(this, 'sapi')">Sapi</button>
                <button onclick="checkOutput(this, 'anjing')">Anjing</button>
            </div>
            <div class="ai-feedback"></div>
        </div>
    </section>



@endsection

@push('scripts')
    <script src="{{ asset('js/interaktif/materi-2/materi-a.js') }}"></script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/interaktif/materi-2/materi-a.css') }}">
@endpush