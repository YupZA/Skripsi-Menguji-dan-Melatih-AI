@extends('layouts.app')

@section('title', 'Kuis Bab 2 - Kecerdasan Buatan')

@section('content')
    <section class="quiz-section">
        <h1 class="quiz-title">Kuis Bab 2: Kecerdasan Buatan</h1>
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
                    <!-- soal 1 -->
                    <div class="quiz-card quiz-question-item active" data-index="0">
                        <p class="quiz-question">
                            1. Seorang siswa melatih model Teachable Machine untuk mengenali suara tepuk tangan, tetapi model justru sering mendeteksi suara lain sebagai tepuk tangan. Penyebab paling mungkin dari masalah tersebut adalah ....
                        </p>
                        <label><input type="radio" name="q1" value="a"> a. Data pelatihan hanya berasal dari satu jenis
                            suara tepuk tangan</label>
                        <label><input type="radio" name="q1" value="b"> b. Jumlah label yang digunakan terlalu
                            banyak</label>
                        <label><input type="radio" name="q1" value="c"> c. Kamera tidak memiliki kualitas yang baik</label>
                        <label><input type="radio" name="q1" value="d"> d. Model tidak menggunakan fitur <i>Pose
                            Project</i></label>
                    </div>

                    <!-- soal 2 -->
                    <div class="quiz-card quiz-question-item active" data-index="1">

                        <p class="quiz-question">
                            2.	Dalam proyek Image Project, seorang siswa hanya mengunggah gambar ikan papuyu dari sudut depan saja. Ketika diuji dengan gambar ikan papuyu dari samping, model gagal mengenali. Berdasarkan konsep machine learning, hal yang seharusnya dilakukan adalah ....
                        </p>
                        <label><input type="radio" name="q2" value="a"> a. Mengurangi jumlah gambar agar proses <i>training</i>
                            lebih cepat</label>
                        <label><input type="radio" name="q2" value="b"> b. Menambahkan variasi gambar ikan papuyu dari berbagai sudut dan kondisi</label>
                        <label><input type="radio" name="q2" value="c"> c. Mengganti proyek ke <i>Audio Project</i></label>
                        <label><input type="radio" name="q2" value="d"> d. Menghapus semua label gambar</label>
                    </div>

                    <!-- soal 3 -->
                    <div class="quiz-card quiz-question-item active" data-index="2">

                        <p class="quiz-question">
                            3. Seorang guru ingin menunjukkan konsep <i>input-output</i> menggunakan <i>Teachable Machine</i>. Aktivitas yang paling tepat menggambarkan konsep tersebut adalah ....
                        </p>
                        <label><input type="radio" name="q3" value="a"> a. Menekan tombol <i>Train Model</i> hingga proses
                            selesai</label>
                        <label><input type="radio" name="q3" value="b"> b. Melihat label muncul secara otomatis ketika siswa
                            menunjukkan gambar ke kamera</label>
                        <label><input type="radio" name="q3" value="c"> c. Mengelompokkan data ke beberapa <i>folder</i> sebelum
                            mengunggahnya</label>
                        <label><input type="radio" name="q3" value="d"> d. Memilih jenis proyek (<i>Image, Audio</i>, atau
                            <i>Pose</i>)</label>
                    </div>

                    <!-- soal 4 -->
                    <div class="quiz-card quiz-question-item active" data-index="3">

                        <p class="quiz-question">
                            4. Jika siswa menggunakan <i>Teachable Machine</i> untuk membedakan ekspresi “senyum” dan “tidak
                            senyum”, tetapi kamera sering salah prediksi ketika kondisi cahaya berubah, langkah terbaik
                            untuk memperbaiki akurasi adalah ....
                        </p>
                        <label><input type="radio" name="q4" value="a"> a. Mengganti label “senyum” menjadi
                            “bahagia”</label>
                        <label><input type="radio" name="q4" value="b"> b. Menambahkan data pelatihan dengan berbagai
                            kondisi pencahayaan</label>
                        <label><input type="radio" name="q4" value="c"> c. Menghapus semua data dan memulai ulang dari
                            awal</label>
                        <label><input type="radio" name="q4" value="d"> d. Menggunakan <i>Audio Project</i> sebagai
                            tambahan</label>
                    </div>

                    <!-- soal 5 -->
                    <div class="quiz-card quiz-question-item active" data-index="4">

                        <p class="quiz-question">
                            5. Seorang siswa membuat model <i>Pose Project</i> untuk mengenali gerakan lari dan melompat. Namun
                            model sering tertukar ketika diuji. Penyebab yang paling masuk akal adalah ....
                        </p>
                        <label><input type="radio" name="q5" value="a"> a. Model dilatih menggunakan data suara pada <i>Pose
                            Project</i></label>
                        <label><input type="radio" name="q5" value="b"> b. Perbedaan gerakan antara lari dan melompat
                            terlalu kecil</label>
                        <label><input type="radio" name="q5" value="c"> c. Data pelatihan kurang bervariasi sehingga pola
                            gerakan tidak terbaca jelas</label>
                        <label><input type="radio" name="q5" value="d"> d. Tombol <i>Train Model</i> ditekan terlalu lama</label>
                    </div>

                    <!-- soal 6 -->
                    <div class="quiz-card quiz-question-item active" data-index="5">

                        <p class="quiz-question">
                            6. Dalam <i>Teachable Machine</i>, <i>supervised learning</i> sangat penting. Situasi yang paling tepat mencerminkan konsep <i>supervised learning</i> adalah ....
                        </p>
                        <label><input type="radio" name="q6" value="a"> a. Komputer menebak label acak tanpa contoh</label>
                        <label><input type="radio" name="q6" value="b"> b. Komputer belajar dari contoh gambar yang sudah
                            diberi label sesuai kelasnya</label>
                        <label><input type="radio" name="q6" value="c"> c. Komputer membuat label sendiri berdasarkan warna
                            dominan gambar</label>
                        <label><input type="radio" name="q6" value="d"> d. Komputer mengenali pola suara tanpa perlu data
                            pelatihan</label>
                    </div>

                    <!-- soal 7 -->
                    <div class="quiz-card quiz-question-item active" data-index="6">

                        <p class="quiz-question">
                            7. Teachable Machine dianggap efektif untuk pembelajaran berbasis proyek di sekolah karena ....
                        </p>
                        <label><input type="radio" name="q7" value="a"> a. Karena seluruh proses dilakukan dengan kode
                            pemrograman</label>
                        <label><input type="radio" name="q7" value="b"> b. Karena memungkinkan siswa melatih model <i>AI</i> tanpa
                            perlu memahami data</label>
                        <label><input type="radio" name="q7" value="c"> c. Karena menyediakan tampilan <i>visual</i> interaktif
                            yang memudahkan eksperimen langsung</label>
                        <label><input type="radio" name="q7" value="d"> d. Karena tidak membutuhkan kamera atau
                            mikrofon</label>
                    </div>

                    <!-- soal 8 -->
                    <div class="quiz-card quiz-question-item active" data-index="7">

                        <p class="quiz-question">
                            8. Seorang siswa melatih model <i>Audio Project</i> untuk membedakan suara “ya” dan “tidak”. Namun, saat suara diucapkan lebih keras atau lebih pelan, model sering salah. Solusi terbaik untuk mengatasi masalah tersebut adalah ....
                        </p>
                        <label><input type="radio" name="q8" value="a"> a. Menambah contoh suara dengan berbagai <i>volume</i> dan
                            intonasi</label>
                        <label><input type="radio" name="q8" value="b"> b. Mengubah label menjadi bahasa Inggris</label>
                        <label><input type="radio" name="q8" value="c"> c. Menghilangkan label “tidak” agar model
                            fokus</label>
                        <label><input type="radio" name="q8" value="d"> d. Menggunakan <i>Image Project</i> sebagai
                            perbandingan</label>
                    </div>

                    <!-- soal 9 -->
                    <div class="quiz-card quiz-question-item active" data-index="8">

                        <p class="quiz-question">
                            9. Jika siswa ingin membuat sistem otomatis yang dapat menyalakan lampu ketika seseorang
                            melambaikan tangan, proyek <i>Teachable Machine</i> yang paling sesuai adalah ....
                        </p>
                        <label><input type="radio" name="q9" value="a"> a. <i>Image Project</i></label>
                        <label><input type="radio" name="q9" value="b"> b. <i>Audio Project</i></label>
                        <label><input type="radio" name="q9" value="c"> c. <i>Pose Project</i></label>
                        <label><input type="radio" name="q9" value="d"> d. Semua proyek dapat digunakan</label>
                    </div>

                    <!-- soal 10 -->
                    <div class="quiz-card quiz-question-item active" data-index="9">

                        <p class="quiz-question">
                            10.	Seorang guru ingin mengajarkan etika penggunaan <i>AI</i> melalui <i>Teachable Machine</i>. Aktivitas yang paling tepat untuk menekankan aspek tanggung jawab dalam pengumpulan data adalah ....
                        </p>
                        <label><input type="radio" name="q10" value="a"> a. Menggunakan gambar orang asing tanpa izin untuk
                            data pelatihan</label>
                        <label><input type="radio" name="q10" value="b"> b. Mengambil data secara acak dari internet tanpa
                            sumber</label>
                        <label><input type="radio" name="q10" value="c"> c. Mengumpulkan gambar atau suara sendiri dengan
                            persetujuan peserta</label>
                        <label><input type="radio" name="q10" value="d"> d. Menggunakan data apa pun selama hasil prediksi
                            akurat</label>
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

    <script src="{{ asset('js/quiz/quiz_2.js') }}"></script>
@endpush