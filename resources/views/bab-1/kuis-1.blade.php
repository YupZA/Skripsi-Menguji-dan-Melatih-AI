@extends('layouts.app')

@section('title', 'Kuis Bab 1 - Kecerdasan Buatan')

@section('content')
    <section class="quiz-section">
        <h1 class="quiz-title">Kuis Bab 1: Kecerdasan Buatan</h1>
        <p class="quiz-desc">
            Pilih satu jawaban yang paling benar pada setiap soal.
        </p>

        <div class="quiz-timer">
            <span>Waktu tersisa:</span>
            <strong id="timeLeft">15:00</strong>
        </div>

        <div class="quiz-layout">
            <form id="quizForm">
                <div id="quizQuestions">
                    {{-- SOAL 1 --}}
                    <div class="quiz-card quiz-question-item active" data-index="0">
                        <p class="quiz-question">
                            1. Sebuah model kecerdasan buatan dilatih dengan ribuan gambar kucing dan anjing. Namun, ketika
                            diuji
                            menggunakan gambar baru, model sering salah menebak. Apa penyebab paling mungkin dari masalah
                            tersebut?
                        </p>
                        <label><input type="radio" name="q1" value="a"> a. Data pelatihan terlalu bervariasi sehingga model
                            bingung</label>
                        <label><input type="radio" name="q1" value="b"> b. Model hanya menghafal data pelatihan dan tidak
                            benar-benar memahami pola
                            manusia</label>
                        <label><input type="radio" name="q1" value="c"> c. Ukuran gambar pada data uji lebih besar dari data
                            pelatihan</label>
                        <label><input type="radio" name="q1" value="d"> d. Jumlah data uji lebih sedikit dibanding data
                            pelatihan</label>
                    </div>

                    {{-- SOAL 2 --}}
                    <div class="quiz-card quiz-question-item active" data-index="1">

                        <p class="quiz-question">
                            2. Jika sebuah sistem AI dapat mengikuti instruksi tetapi tidak bisa beradaptasi ketika kondisi
                            berubah,
                            sistem tersebut kemungkinan termasuk ....
                        </p>
                        <label><input type="radio" name="q2" value="a"> a. Model machine learning yang sudah dilatih
                            lama</label>
                        <label><input type="radio" name="q2" value="b"> b. Program biasa tanpa kemampuan belajar</label>
                        <label><input type="radio" name="q2" value="c"> c. Model AI dengan data pelatihan kurang</label>
                        <label><input type="radio" name="q2" value="d"> d. Model prediksi yang sangat akurat</label>
                    </div>

                    {{-- SOAL 3 --}}
                    <div class="quiz-card quiz-question-item active" data-index="2">

                        <p class="quiz-question">
                            3. Mengapa tahap data cleaning penting sebelum melatih model machine learning?
                        </p>
                        <label><input type="radio" name="q3" value="a"> a. Agar model dapat menyimpan data dalam jumlah
                            lebih
                            besar</label>
                        <label><input type="radio" name="q3" value="b"> b. Agar model dapat memprediksi lebih cepat meskipun
                            tidak
                            akurat</label>
                        <label><input type="radio" name="q3" value="c"> c. Agar pola yang dipelajari tidak salah karena data
                            yang
                            rusak atau tidak rapi</label>
                        <label><input type="radio" name="q3" value="d"> d. Agar data uji memiliki kualitas yang sama dengan
                            data
                            pelatihan</label>
                    </div>

                    {{-- SOAL 4 --}}
                    <div class="quiz-card quiz-question-item active" data-index="3">

                        <p class="quiz-question">
                            4. Sebuah model wajah pada ponsel sering salah mengenali pemiliknya saat cahaya redup. Solusi
                            paling
                            efektif berdasarkan konsep machine learning adalah ....
                        </p>
                        <label><input type="radio" name="q4" value="a"> a. Menambah data pelatihan dengan gambar wajah pada
                            kondisi
                            pencahayaan berbeda</label>
                        <label><input type="radio" name="q4" value="b"> b. Mengurangi jumlah data pelatihan agar model lebih
                            cepat
                            memproses</label>
                        <label><input type="radio" name="q4" value="c"> c. Menghapus semua data wajah dan melatih model dari
                            awal
                            tanpa data lama</label>
                        <label><input type="radio" name="q4" value="d"> d. Mengubah model AI menjadi program biasa</label>
                    </div>

                    {{-- SOAL 5 --}}
                    <div class="quiz-card quiz-question-item active" data-index="4">

                        <p class="quiz-question">
                            5. Jika seorang siswa ingin membuat model AI yang mampu mengenali emosi manusia melalui suara,
                            jenis
                            data paling relevan untuk dikumpulkan adalah ....
                        </p>
                        <label><input type="radio" name="q5" value="a"> a. Foto berbagai ekspresi wajah</label>
                        <label><input type="radio" name="q5" value="b"> b. Rekaman suara dengan variasi emosi</label>
                        <label><input type="radio" name="q5" value="c"> c. Teks percakapan digital</label>
                        <label><input type="radio" name="q5" value="d"> d. Video gerakan tubuh tanpa suara</label>
                    </div>

                    {{-- SOAL 6 --}}
                    <div class="quiz-card quiz-question-item active" data-index="5">

                        <p class="quiz-question">
                            6. Model machine learning dinyatakan “baik” jika ....
                        </p>
                        <label><input type="radio" name="q6" value="a"> a. Mampu menebak dengan benar hanya pada data
                            pelatihan</label>
                        <label><input type="radio" name="q6" value="b"> b. Perlu diubah setiap kali ada data baru</label>
                        <label><input type="radio" name="q6" value="c"> c. Bisa mengenali pola pada data yang belum pernah
                            dilihat
                            sebelumnya</label>
                        <label><input type="radio" name="q6" value="d"> d. Memiliki jumlah data pelatihan lebih sedikit
                            daripada
                            data uji</label>
                    </div>

                    {{-- SOAL 7 --}}
                    <div class="quiz-card quiz-question-item active" data-index="6">

                        <p class="quiz-question">
                            7. Leonardo da Vinci pernah merancang robot mekanik yang dapat bergerak seperti manusia. Apa
                            relevansi
                            temuan ini terhadap perkembangan AI modern?
                        </p>
                        <label><input type="radio" name="q7" value="a"> a. Robot tersebut sudah menggunakan algoritma
                            modern</label>
                        <label><input type="radio" name="q7" value="b"> b. Temuan tersebut menunjukkan bahwa konsep mesin
                            cerdas
                            sudah ada jauh sebelum teknologi digital</label>
                        <label><input type="radio" name="q7" value="c"> c. Robot tersebut adalah model machine learning
                            pertama</label>
                        <label><input type="radio" name="q7" value="d"> d. Da Vinci menggunakan data pelatihan berupa
                            gerakan
                            manusia</label>
                    </div>

                    {{-- SOAL 8 --}}
                    <div class="quiz-card quiz-question-item active" data-index="7">

                        <p class="quiz-question">
                            8. Sebuah model AI untuk mengenali hewan diberi data pelatihan hanya berupa gambar anjing
                            berwarna
                            coklat. Akibatnya, model gagal mengenali anjing berwarna putih. Masalah ini terjadi karena ....
                        </p>
                        <label><input type="radio" name="q8" value="a"> a. Data pelatihan terlalu beragam</label>
                        <label><input type="radio" name="q8" value="b"> b. Model terlatih terlalu cepat</label>
                        <label><input type="radio" name="q8" value="c"> c. Data pelatihan tidak cukup bervariasi</label>
                        <label><input type="radio" name="q8" value="d"> d. Ukuran gambar tidak seragam </label>
                    </div>

                    {{-- SOAL 9 --}}
                    <div class="quiz-card quiz-question-item active" data-index="8">

                        <p class="quiz-question">
                            9. Dalam proses machine learning, mengapa pengujian model (testing) tidak boleh menggunakan data
                            yang
                            sama dengan data pelatihan?
                        </p>
                        <label><input type="radio" name="q9" value="a"> a. Karena penggunaan data yang sama akan mempercepat
                            proses
                            belajar</label>
                        <label><input type="radio" name="q9" value="b"> b. Agar model terlihat memiliki akurasi
                            tinggi</label>
                        <label><input type="radio" name="q9" value="c"> c. Karena model harus menunjukkan kemampuan memahami
                            pola,
                            bukan menghafal</label>
                        <label><input type="radio" name="q9" value="d"> d. Agar ukuran data pelatihan menjadi lebih
                            kecil</label>
                    </div>

                    {{-- SOAL 10 --}}
                    <div class="quiz-card quiz-question-item active" data-index="9">

                        <p class="quiz-question">
                            10. Seorang peneliti ingin membuat model yang dapat membedakan antara burung elang dan burung
                            lainnya.
                            Setelah menguji model, hasilnya kurang akurat. Tindakan paling tepat untuk meningkatkan performa
                            model
                            adalah ....
                        </p>
                        <label><input type="radio" name="q10" value="a"> a. Mengurangi jumlah contoh burung dalam data
                            pelatihan</label>
                        <label><input type="radio" name="q10" value="b"> b. Menambah data pelatihan dengan berbagai jenis
                            burung
                            elang dalam kondisi berbeda</label>
                        <label><input type="radio" name="q10" value="c"> c. Menguji model menggunakan data pelatihan yang
                            sama</label>
                        <label><input type="radio" name="q10" value="d"> d. Menghapus fitur prediksi pada model</label>
                    </div>

                    <div class="quiz-navigation">
                        <button type="button" id="prevBtn" onclick="prevQuestion()" disabled>
                            Sebelumnya
                        </button>

                        <span id="questionIndicator">Soal 1 dari 10</span>

                        <button type="button" id="nextBtn" onclick="nextQuestion()">
                            Selanjutnya
                        </button>

                        {{-- TOMBOL --}}
                        <button type="button" class="btn-submit d-none" id="submitBtn" onclick="submitQuiz()">
                            Selesai & Lihat Nilai
                        </button>
                    </div>
                </div>
                <div id="quizResult" class="quiz-result"></div>

            </form>

            <aside class="quiz-nav">
                <h4>Nomor Soal</h4>

                <div class="quiz-nav-grid">
                    <!-- Contoh 10 soal -->
                    <button class="nav-item" data-index="0">1</button>
                    <button class="nav-item" data-index="1">2</button>
                    <button class="nav-item" data-index="2">3</button>
                    <button class="nav-item" data-index="3">4</button>
                    <button class="nav-item" data-index="4">5</button>
                    <button class="nav-item" data-index="5">6</button>
                    <button class="nav-item" data-index="6">7</button>
                    <button class="nav-item" data-index="7">8</button>
                    <button class="nav-item" data-index="8">9</button>
                    <button class="nav-item" data-index="9">10</button>
                </div>

                <div class="quiz-nav-legend">
                    <span class="legend answered">Dijawab</span>
                    <span class="legend doubt">Ragu-ragu</span>
                    <span class="legend empty">Belum dijawab</span>
                </div>
            </aside>
        </div>

    </section>


@endsection

@push('scripts')

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            startTimer();
            document.body.classList.add("quiz-mode", "sb-sidenav-toggled");

            const toggleBtn = document.getElementById("sidebarToggle");
            if (toggleBtn) {
                toggleBtn.style.display = "none";
            }
        });
    </script>

    <script src="{{ asset('js/quiz/quiz_1.js') }}"></script>
@endpush