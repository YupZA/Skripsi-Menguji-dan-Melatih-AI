@extends('layouts.app')

@section('title', 'Kuis Bab 3 - Kecerdasan Buatan')

@section('content')
    <section class="quiz-section">
        <h1 class="quiz-title">Kuis Bab 3: Kecerdasan Buatan</h1>
        <p class="quiz-desc">
            Pilih satu jawaban yang paling benar pada setiap soal.
        </p>


        <!-- Timer -->
        <div class="quiz-timer">
            <span>Waktu tersisa:</span>
            <strong id="timeLeft">10:00</strong>
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
                    <!-- soal 1 -->
                    <div class="quiz-card quiz-question-item active" data-index="0">
                        <p class="quiz-question">
                            1. Seorang siswa membuat model gambar untuk mengenali bentuk tangan “terbuka” dan “tertutup”.
                            Namun model sering salah saat latar belakang berubah. Apa langkah terbaik untuk meningkatkan
                            akurasi model?
                        </p>
                        <label><input type="radio" name="q1" value="a"> a. Menghapus seluruh gambar dan memulai ulang
                            proyek</label>
                        <label><input type="radio" name="q1" value="b"> b. Menambahkan data gambar dengan variasi latar
                            belakang dan pencahayaan</label>
                        <label><input type="radio" name="q1" value="c"> c. Mengurangi jumlah kelas menjadi hanya
                            satu</label>
                        <label><input type="radio" name="q1" value="d"> d. Beralih ke model suara agar tidak terpengaruh
                            latar belakang</label>
                    </div>

                    <!-- soal 2 -->
                    <div class="quiz-card quiz-question-item active" data-index="1">

                        <p class="quiz-question">
                            2. Model suara untuk mengenali tepuk tangan sering salah mendeteksi suara hujan sebagai tepuk
                            tangan. Berdasarkan konsep training data, apa penyebab utamanya?
                        </p>
                        <label><input type="radio" name="q2" value="a"> a. Data untuk kelas lain tidak memiliki variasi
                            suara yang cukup</label>
                        <label><input type="radio" name="q2" value="b"> b. Data untuk kelas tepuk tangan berasal dari banyak
                            orang</label>
                        <label><input type="radio" name="q2" value="c"> c. Jumlah kelas terlalu banyak</label>
                        <label><input type="radio" name="q2" value="d"> d. Model dilatih terlalu lama</label>
                    </div>

                    <!-- soal 3 -->
                    <div class="quiz-card quiz-question-item active" data-index="2">

                        <p class="quiz-question">
                            3. Saat membuat model pose tubuh, siswa hanya merekam gerakan berdiri dari satu sudut saja.
                            Ketika dites dari samping, model gagal mengenali. Apa kesimpulan yang tepat?
                        </p>
                        <label><input type="radio" name="q3" value="a"> a. Kamera tidak cukup canggih</label>
                        <label><input type="radio" name="q3" value="b"> b. Model pose tidak cocok untuk gerakan
                            berdiri</label>
                        <label><input type="radio" name="q3" value="c"> c. Data pelatihan tidak bervariasi sehingga model
                            tidak memahami pola secara menyeluruh</label>
                        <label><input type="radio" name="q3" value="d"> d. Model perlu diganti menjadi model suara</label>
                    </div>

                    <!-- soal 4 -->
                    <div class="quiz-card quiz-question-item active" data-index="3">

                        <p class="quiz-question">
                            4. Seorang siswa membuat dua model gambar untuk mengenali bekantan dan monyet. Model A dilatih
                            menggunakan 20 gambar per kelas, sedangkan Model B dilatih menggunakan 200 gambar per kelas
                            dengan variasi sudut dan pencahayaan yang berbeda. Ketika diuji menggunakan gambar baru, Model B
                            menghasilkan prediksi yang lebih akurat. Kesimpulan yang paling tepat adalah ....
                        </p>
                        <label><input type="radio" name="q4" value="a"> a. Data yang lebih banyak dan bervariasi membantu
                            model mengenali pola dengan lebih baik</label>
                        <label><input type="radio" name="q4" value="b"> b. Jumlah data tidak memengaruhi kemampuan
                            model</label>
                        <label><input type="radio" name="q4" value="c"> c. Model dengan data lebih sedikit selalu lebih
                            cepat dan lebih akurat</label>
                        <label><input type="radio" name="q4" value="d"> d. Akurasi model hanya dipengaruhi oleh jenis
                            perangkat yang digunakan</label>
                    </div>

                    <!-- soal 5 -->
                    <div class="quiz-card quiz-question-item active" data-index="4">

                        <p class="quiz-question">
                            5. Seorang siswa ingin membuat permainan yang mengharuskan pemain melambaikan tangan untuk
                            menggerakkan karakter dan berjongkok untuk menghindari rintangan. Jenis model yang paling sesuai
                            digunakan adalah ....
                        </p>
                        <label><input type="radio" name="q5" value="a"> a. Image Model</label>
                        <label><input type="radio" name="q5" value="b"> b. Audio Model</label>
                        <label><input type="radio" name="q5" value="c"> c. Standard Model</label>
                        <label><input type="radio" name="q5" value="d"> d. Pose Model</label>
                    </div>

                    <!-- soal 6 -->
                    <div class="quiz-card quiz-question-item active" data-index="5">

                        <p class="quiz-question">
                            6. Sebuah model memberikan hasil prediksi berikut:
                            <br>Tangan Terbuka: 40%
                            <br>Tangan Tertutup: 60%
                            <br>Berdasarkan hasil tersebut, tindakan yang paling tepat dilakukan pengguna adalah ....
                        </p>
                        <label><input type="radio" name="q6" value="a"> a. Menganggap hasil prediksi pasti salah</label>
                        <label><input type="radio" name="q6" value="b"> b. Mengabaikan hasil prediksi karena persentase tidak mencapai 100%</label>
                        <label><input type="radio" name="q6" value="c"> c. Menyimpulkan bahwa model lebih yakin gambar termasuk kelas Tangan Tertutup, tetapi masih terdapat kemungkinan kesalahan prediksi</label>
                        <label><input type="radio" name="q6" value="d"> d. Menghapus model dan membuat model baru</label>
                    </div>

                    <!-- soal 7 -->
                    <div class="quiz-card quiz-question-item active" data-index="6">

                        <p class="quiz-question">
                            7.	Dua kelompok siswa membuat model audio project untuk mengenali tepuk tangan. Kelompok pertama merekam suara di ruang kelas yang tenang, sedangkan kelompok kedua merekam suara di kantin yang ramai. Ketika diuji, model kelompok pertama menghasilkan prediksi yang lebih akurat. Penyebab yang paling mungkin adalah ....
                        </p>
                        <label><input type="radio" name="q7" value="a"> a. Ruang yang ramai menghasilkan lebih banyak data</label>
                        <label><input type="radio" name="q7" value="b"> b. Kebisingan lingkungan mengganggu model dalam mengenali pola suara utama</label>
                        <label><input type="radio" name="q7" value="c"> c. Audio Project hanya dapat digunakan di ruang tertutup</label>
                        <label><input type="radio" name="q7" value="d"> d. Jumlah siswa yang merekam suara terlalu banyak</label>
                    </div>

                    <!-- soal 8 -->
                    <div class="quiz-card quiz-question-item active" data-index="7">

                        <p class="quiz-question">
                            8. Dalam proyek gambar, seorang siswa menambahkan 200 gambar pada Class 1 dan hanya 20 gambar
                            pada Class 2. Akibat yang paling mungkin terjadi adalah ....
                        </p>
                        <label><input type="radio" name="q8" value="a"> a. Model menolak melatih data</label>
                        <label><input type="radio" name="q8" value="b"> b. Model lebih sering memilih Class 2</label>
                        <label><input type="radio" name="q8" value="c"> c. Model bias dan lebih cenderung memprediksi Class
                            1</label>
                        <label><input type="radio" name="q8" value="d"> d. Model menghasilkan kesalahan pada semua
                            kelas</label>
                    </div>

                    <!-- soal 9 -->
                    <div class="quiz-card quiz-question-item active" data-index="8">

                        <p class="quiz-question">
                            9. Seorang guru ingin memperagakan tiga proyek berbeda menggunakan teachable machine:
                            <ul>
                                <li>Mengenali ekspresi wajah siswa.</li>
                                <li>Mengenali suara tepuk tangan.</li>
                                <li>Mengenali gerakan jongkok.</li>
                            </ul>
                            Kesimpulan yang paling tepat mengenai ketiga proyek tersebut adalah ....
                        </p>
                        <label><input type="radio" name="q9" value="a"> a. Ketiganya menggunakan jenis data yang sama</label>
                        <label><input type="radio" name="q9" value="b"> b. Ketiganya menggunakan input berbeda, tetapi memiliki tujuan yang sama yaitu mengenali pola dari data</label>
                        <label><input type="radio" name="q9" value="c"> c. Ketiganya hanya dapat digunakan untuk gambar</label>
                        <label><input type="radio" name="q9" value="d"> d. Ketiganya tidak memerlukan proses pelatihan</label>
                    </div>

                    <!-- soal 10 -->
                    <div class="quiz-card quiz-question-item active" data-index="9">

                        <p class="quiz-question">
                            10. Jika seorang siswa ingin membuat sistem otomatis yang memberi peringatan ketika seseorang
                            berjongkok, hal yang paling penting dalam proses pengumpulan data adalah ....
                        </p>
                        <label><input type="radio" name="q10" value="a"> a. Menggunakan kamera dengan kualitas
                            tertinggi</label>
                        <label><input type="radio" name="q10" value="b"> b. Mengumpulkan pose jongkok dan berdiri dari
                            berbagai sudut dan kondisi pencahayaan</label>
                        <label><input type="radio" name="q10" value="c"> c. Menggunakan data suara sebagai tambahan</label>
                        <label><input type="radio" name="q10" value="d"> d. Menggunakan latar belakang yang sama pada semua
                            rekaman</label>
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

    <script src="{{ asset('js/quiz/quiz_3.js') }}"></script>
@endpush