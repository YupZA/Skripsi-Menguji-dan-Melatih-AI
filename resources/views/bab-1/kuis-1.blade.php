@extends('layouts.app')

@section('title', 'Kuis Bab 1 - Kecerdasan Buatan')

@section('content')
    <section class="quiz-section">
        <h1 class="quiz-title">Kuis Bab 1: Kecerdasan Buatan</h1>
        <p class="quiz-desc">
            Pilih satu jawaban yang paling benar pada setiap soal.
        </p>

        <!-- Timer -->
        <div class="quiz-timer">
            <span>Waktu tersisa:</span>
            <strong id="timeLeft">15:00</strong>
        </div>


        <!-- Layout Tata Pengerjaan -->
        <div id="quizIntro" class="quiz-intro">
            <h3>Petunjuk Pengerjaan</h3>

            <ul>
                <li>Kuis terdiri dari <strong>10 soal pilihan ganda</strong>.</li>
                <li>Waktu pengerjaan adalah <strong>10 menit</strong>.</li>
                <li>Setiap soal hanya memiliki <strong>1 jawaban benar</strong>.</li>
                <li>Kamu dapat berpindah soal menggunakan tombol <em>Selanjutnya</em> atau navigator nomor soal.</li>
                <li>Jika menekan <em>Selanjutnya</em> tanpa menjawab, soal akan ditandai <strong>ragu-ragu</strong>.</li>
                <li>Nilai minimum kelulusan adalah <strong>70</strong>.</li>
                <li>Jika waktu habis, kuis akan <strong>dikumpulkan otomatis</strong>.</li>
            </ul>

            <button type="button" class="btn-submit mt-4" onclick="startQuiz()">
                Mulai Kuis
            </button>
        </div>


        <!-- Layout Quiz -->
        <div class="quiz-layout d-none" id="quizContainer">
            <form id="quizForm">
                <div id="quizQuestions">
                    {{-- SOAL 1 --}}
                    <div class="quiz-card quiz-question-item active" data-index="0">
                        <p class="quiz-question">
                            1. Sebuah model kecerdasan buatan dilatih dengan ribuan gambar bekantan dan monyet. Namun,
                            ketika diuji menggunakan gambar baru, model sering salah menebak. Penyebab paling mungkin dari
                            masalah tersebut adalah ....
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
                            2. Seorang siswa membuat aplikasi yang selalu menampilkan pesan "Selamat Pagi" setiap pukul 06.00 tanpa memperhatikan cuaca, lokasi, atau kebiasaan pengguna. Berdasarkan cara kerjanya, aplikasi tersebut termasuk ....
                        </p>
                        <label><input type="radio" name="q2" value="a"> a. Model machine learning</label>
                        <label><input type="radio" name="q2" value="b"> b. Program biasa tanpa kemampuan belajar</label>
                        <label><input type="radio" name="q2" value="c"> c. Kecerdasan buatan yang telah dilatih</label>
                        <label><input type="radio" name="q2" value="d"> d. Sistem prediksi otomatis</label>
                    </div>

                    {{-- SOAL 3 --}}
                    <div class="quiz-card quiz-question-item active" data-index="2">

                        <p class="quiz-question">
                            3. Tahap data <i>cleaning</i> penting dilakukan sebelum melatih model <i>machine learning</i> karena ....
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
                            efektif berdasarkan konsep <i>machine learning</i> adalah ....
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
                        <label><input type="radio" name="q4" value="d"> d. Mengubah model <i>AI</i> menjadi program biasa</label>
                    </div>

                    {{-- SOAL 5 --}}
                    <div class="quiz-card quiz-question-item active" data-index="4">

                        <p class="quiz-question">
                            5.	Seorang siswa ingin membuat model kecerdasan buatan yang dapat membedakan suara marah, sedih, dan senang. Namun, ia hanya mengumpulkan rekaman suara marah. Kemungkinan masalah yang akan terjadi adalah ....
                        </p>
                        <label><input type="radio" name="q5" value="a"> a. Model dapat mengenali semua emosi dengan baik</label>
                        <label><input type="radio" name="q5" value="b"> b. Model kesulitan membedakan emosi selain marah</label>
                        <label><input type="radio" name="q5" value="c"> c. Model menjadi lebih cepat dilatih dan lebih akurat</label>
                        <label><input type="radio" name="q5" value="d"> d. Model tidak memerlukan data tambahan</label>
                    </div>

                    {{-- SOAL 6 --}}
                    <div class="quiz-card quiz-question-item active" data-index="5">

                        <p class="quiz-question">
                            6. Dua model kecerdasan buatan menghasilkan hasil berikut:
                            <ul>
                                <li>Model A: Akurasi data pelatihan 100%, akurasi data baru 55%</li>
                                <li>Model B: Akurasi data pelatihan 90%, akurasi data baru 88%</li>
                            </ul>
                            Model yang lebih baik adalah ….
                        </p>
                        <label><input type="radio" name="q6" value="a"> a. Model A karena memiliki akurasi pelatihan lebih tinggi</label>
                        <label><input type="radio" name="q6" value="b"> b. Model A karena mempelajari seluruh data pelatihan</label>
                        <label><input type="radio" name="q6" value="c"> c. Model B karena mampu bekerja lebih baik pada data baru</label>
                        <label><input type="radio" name="q6" value="d"> d. Keduanya sama baik</label>
                    </div>

                    {{-- SOAL 7 --}}
                    <div class="quiz-card quiz-question-item active" data-index="6">

                        <p class="quiz-question">
                            7.	Empat kelompok siswa membuat model untuk mengenali ikan gabus dan ikan papuyu.
                            <ul>
                                <li>Kelompok A: 20 gambar, latar sama</li>
                                <li>Kelompok B: 100 gambar, berbagai sudut dan pencahayaan</li>
                                <li>Kelompok C: 15 gambar, sebagian buram</li>
                                <li>Kelompok D: 20 gambar, hanya satu jenis ikan</li>
                                Kelompok yang kemungkinan menghasilkan model terbaik adalah ....
                            </ul>
                        </p>
                        <label><input type="radio" name="q7" value="a">a. Kelompok A</label>
                        <label><input type="radio" name="q7" value="b"> b. Kelompok B</label>
                        <label><input type="radio" name="q7" value="c"> c. Kelompok C</label>
                        <label><input type="radio" name="q7" value="d"> d. Kelompok D</label>
                    </div>

                    {{-- SOAL 8 --}}
                    <div class="quiz-card quiz-question-item active" data-index="7">

                        <p class="quiz-question">
                            8.	Sebuah model AI untuk mengenali ikan dilatih hanya menggunakan gambar ikan gabus yang berwarna gelap. Akibatnya, model kesulitan mengenali ikan gabus lain yang memiliki ukuran, posisi, atau pencahayaan yang berbeda. Masalah ini terjadi karena ....
                        </p>
                        <label><input type="radio" name="q8" value="a"> a. Data pelatihan terlalu beragam</label>
                        <label><input type="radio" name="q8" value="b"> b. Model terlatih terlalu cepat</label>
                        <label><input type="radio" name="q8" value="c"> c. Data pelatihan tidak cukup bervariasi</label>
                        <label><input type="radio" name="q8" value="d"> d. Ukuran gambar tidak seragam </label>
                    </div>

                    {{-- SOAL 9 --}}
                    <div class="quiz-card quiz-question-item active" data-index="8">

                        <p class="quiz-question">
                            9. Dalam proses <i>machine learning</i>, pengujian model atau <i>testing</i> tidak boleh menggunakan data yang
                            sama dengan data pelatihan karena ....
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
                            10. Seorang peserta didik membuat model <i>AI</i> menggunakan <i>Teachable Machine</i> untuk membedakan ikan gabus dan ikan papuyu. Setelah diuji menggunakan gambar baru, model sering salah mengenali kedua jenis ikan tersebut. Tindakan yang paling tepat untuk meningkatkan performa model adalah ....
                        </p>
                        <label><input type="radio" name="q10" value="a"> a.	Mengurangi jumlah gambar ikan pada data pelatihan.</label>
                        <label><input type="radio" name="q10" value="b"> b.	Menambahkan data pelatihan berupa gambar ikan gabus dan ikan papuyu dengan berbagai sudut, pencahayaan, dan posisi.</label>
                        <label><input type="radio" name="q10" value="c"> c.	Menguji model menggunakan data pelatihan yang sama.</label>
                        <label><input type="radio" name="q10" value="d"> d.	Menghapus fitur prediksi pada model.</label>
                    </div>

                    <!-- tombol navigasi quiz -->
                    <div class="quiz-navigation">

                        <div class="nav-top">
                            <button type="button" id="prevBtn" onclick="prevQuestion()">
                                Sebelumnya
                            </button>

                            <span id="questionIndicator">Soal 1 dari 10</span>

                            <button type="button" id="nextBtn" onclick="nextQuestion()">
                                Selanjutnya
                            </button>
                        </div>
                    </div>
                </div>
                <div id="quizResult" class="quiz-result"></div>

            </form>

            <!-- indikator soal -->
            <aside class="quiz-nav">
                <h4>Nomor Soal</h4>

                <div class="quiz-nav-grid">

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

                <div class="nav-bottom">
                    <button type="button" id="doubtBtn" onclick="markDoubt()">
                        Ragu-ragu
                    </button>

                    <button type="button" class="btn-submit" id="submitBtn" onclick="validateBeforeSubmit()">
                        Selesai
                    </button>
                </div>
            </aside>
        </div>

        <!-- QUIZ ALERT MODAL -->
        <div class="modal-overlay hidden" id="quizAlertModal">
            <div class="modal-card glass alert-modal">

                <div class="modal-header">
                    <h3>Perhatian</h3>
                    <span class="modal-close" onclick="closeQuizAlert()">×</span>
                </div>

                <p id="quizAlertMessage" class="alert-message"></p>

                <div class="alert-actions">
                    <button class="btn-submit" onclick="closeQuizAlert()">
                        Mengerti
                    </button>
                </div>

            </div>
        </div>
    </section>

@endsection

@push('scripts')

    <script>
        document.addEventListener("DOMContentLoaded", function () {

            document.body.classList.add("quiz-mode", "sb-sidenav-toggled");

            const toggleBtn = document.getElementById("sidebarToggle");
            if (toggleBtn) {
                toggleBtn.style.display = "none";
            }

            document.querySelector(".quiz-timer")?.classList.add("d-none");
            document.getElementById("quizContainer")?.classList.add("d-none");

            document.querySelectorAll('input[type="radio"]').forEach(radio => {
                radio.addEventListener("change", function () {

                    const navBtn = document.querySelector(
                        `.nav-item[data-index="${currentQuestion}"]`
                    );

                    navBtn.classList.remove("doubt");
                    navBtn.classList.add("answered");
                });
            });
        });
    </script>

    <script src="{{ asset('js/quiz/quiz_1.js') }}"></script>
@endpush