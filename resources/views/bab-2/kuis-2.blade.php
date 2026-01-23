@extends('layouts.app')

@section('title', 'Kuis Bab 1 - Kecerdasan Buatan')

@section('content')
    <section class="quiz-section">
        <h1 class="quiz-title">📝 Kuis Bab 1: Kecerdasan Buatan</h1>
        <p class="quiz-desc">
            Pilih satu jawaban yang paling benar pada setiap soal.
        </p>

        <form id="quizForm">

            {{-- SOAL 1 --}}
            <div class="quiz-card">
                <p class="quiz-question">
                    1. Seorang siswa melatih model Teachable Machine untuk mengenali suara tepuk tangan, tetapi model justru sering mendeteksi suara lain sebagai tepuk tangan. Apa penyebab paling mungkin?
                </p>
                <label><input type="radio" name="q1" value="a"> a.	Data pelatihan hanya berasal dari satu jenis suara tepuk tangan</label>
                <label><input type="radio" name="q1" value="b"> b.	Jumlah label yang digunakan terlalu banyak</label>
                <label><input type="radio" name="q1" value="c"> c.	Kamera tidak memiliki kualitas yang baik</label>
                <label><input type="radio" name="q1" value="d"> d.	Model tidak menggunakan fitur Pose Project</label>
            </div>

            {{-- SOAL 2 --}}
            <div class="quiz-card">
                <p class="quiz-question">
                    2. Dalam proyek Image Project, seorang siswa hanya mengunggah gambar kucing dari sudut depan saja. Ketika diuji dengan gambar kucing dari samping, model gagal mengenali. Berdasarkan konsep machine learning, apa yang seharusnya dilakukan?
                </p>
                <label><input type="radio" name="q2" value="a"> a.	Mengurangi jumlah gambar agar proses training lebih cepat</label>
                <label><input type="radio" name="q2" value="b"> b.	Menambahkan variasi gambar kucing dari berbagai sudut dan kondisi</label>
                <label><input type="radio" name="q2" value="c"> c.	Mengganti proyek ke Audio Project</label>
                <label><input type="radio" name="q2" value="d"> d.	Menghapus semua label gambar</label>
            </div>

            {{-- SOAL 3 --}}
            <div class="quiz-card">
                <p class="quiz-question">
                    3. Seorang guru ingin menunjukkan konsep input-output menggunakan Teachable Machine. Aktivitas manakah yang paling tepat menggambarkan konsep tersebut?
                </p>
                <label><input type="radio" name="q3" value="a"> a.	Menekan tombol Train Model hingga proses selesai</label>
                <label><input type="radio" name="q3" value="b"> b.	Melihat label muncul secara otomatis ketika siswa menunjukkan gambar ke kamera</label>
                <label><input type="radio" name="q3" value="c"> c.	Mengelompokkan data ke beberapa folder sebelum mengunggahnya</label>
                <label><input type="radio" name="q3" value="d"> d.	Memilih jenis proyek (Image, Audio, atau Pose)</label>
            </div>

            {{-- SOAL 4 --}}
            <div class="quiz-card">
                <p class="quiz-question">
                    4. Jika siswa menggunakan Teachable Machine untuk membedakan ekspresi “senyum” dan “tidak senyum”, tetapi kamera sering salah prediksi ketika kondisi cahaya berubah, langkah terbaik untuk memperbaiki akurasi adalah ....
                </p>
                <label><input type="radio" name="q4" value="a"> a.	Mengganti label “senyum” menjadi “bahagia”</label>
                <label><input type="radio" name="q4" value="b"> b.	Menambahkan data pelatihan dengan berbagai kondisi pencahayaan</label>
                <label><input type="radio" name="q4" value="c"> c.	Menghapus semua data dan memulai ulang dari awal</label>
                <label><input type="radio" name="q4" value="d"> d.	Menggunakan Audio Project sebagai tambahan</label>
            </div>

            {{-- SOAL 5 --}}
            <div class="quiz-card">
                <p class="quiz-question">
                    5. Seorang siswa membuat model Pose Project untuk mengenali gerakan lari dan melompat. Namun model sering tertukar ketika diuji. Penyebab yang paling masuk akal adalah ....
                </p>
                <label><input type="radio" name="q5" value="a"> a.	Model dilatih menggunakan data suara pada Pose Project</label>
                <label><input type="radio" name="q5" value="b"> b.	Perbedaan gerakan antara lari dan melompat terlalu kecil</label>
                <label><input type="radio" name="q5" value="c"> c.	Data pelatihan kurang bervariasi sehingga pola gerakan tidak terbaca jelas</label>
                <label><input type="radio" name="q5" value="d"> d.	Tombol Train Model ditekan terlalu lama</label>
            </div>

            {{-- SOAL 6 --}}
            <div class="quiz-card">
                <p class="quiz-question">
                    6. Dalam Teachable Machine, supervised learning sangat penting. Manakah situasi berikut yang paling tepat mencerminkan konsep supervised learning?
                </p>
                <label><input type="radio" name="q6" value="a"> a.	Komputer menebak label acak tanpa contoh</label>
                <label><input type="radio" name="q6" value="b"> b.	Komputer belajar dari contoh gambar yang sudah diberi label sesuai kelasnya</label>
                <label><input type="radio" name="q6" value="c"> c.	Komputer membuat label sendiri berdasarkan warna dominan gambar</label>
                <label><input type="radio" name="q6" value="d"> d.	Komputer mengenali pola suara tanpa perlu data pelatihan</label>
            </div>

            {{-- SOAL 7 --}}
            <div class="quiz-card">
                <p class="quiz-question">
                    7. Mengapa Teachable Machine dianggap efektif untuk pembelajaran berbasis proyek di sekolah? 
                </p>
                <label><input type="radio" name="q7" value="a"> a.	Karena seluruh proses dilakukan dengan kode pemrograman</label>
                <label><input type="radio" name="q7" value="b"> b.	Karena memungkinkan siswa melatih model AI tanpa perlu memahami data</label>
                <label><input type="radio" name="q7" value="c"> c.	Karena menyediakan tampilan visual interaktif yang memudahkan eksperimen langsung</label>
                <label><input type="radio" name="q7" value="d"> d.	Karena tidak membutuhkan kamera atau mikrofon</label>
            </div>

            {{-- SOAL 8 --}}
            <div class="quiz-card">
                <p class="quiz-question">
                    8. Seorang siswa melatih model Audio Project untuk membedakan suara “ya” dan “tidak”. Tetapi saat suara diucapkan lebih keras atau lebih pelan, model sering salah. Apa solusi terbaik?
                </p>
                <label><input type="radio" name="q8" value="a"> a.	Menambah contoh suara dengan berbagai volume dan intonasi</label>
                <label><input type="radio" name="q8" value="b"> b.	Mengubah label menjadi bahasa Inggris</label>
                <label><input type="radio" name="q8" value="c"> c.	Menghilangkan label “tidak” agar model fokus</label>
                <label><input type="radio" name="q8" value="d"> d.	Menggunakan Image Project sebagai perbandingan</label>
            </div>

            {{-- SOAL 9 --}}
            <div class="quiz-card">
                <p class="quiz-question">
                    9. Jika siswa ingin membuat sistem otomatis yang dapat menyalakan lampu ketika seseorang melambaikan tangan, proyek Teachable Machine yang paling sesuai adalah .... 
                </p>
                <label><input type="radio" name="q9" value="a"> a.	Image Project</label>
                <label><input type="radio" name="q9" value="b"> b.	Audio Project</label>
                <label><input type="radio" name="q9" value="c"> c.	Pose Project</label>
                <label><input type="radio" name="q9" value="d"> d.	Semua proyek dapat digunakan</label>
            </div>

            {{-- SOAL 10 --}}
            <div class="quiz-card">
                <p class="quiz-question">
                    10. Seorang guru ingin mengajarkan etika penggunaan AI melalui Teachable Machine. Aktivitas mana yang paling tepat untuk menekankan aspek tanggung jawab dalam pengumpulan data? 
                </p>
                <label><input type="radio" name="q10" value="a"> a.	Menggunakan gambar orang asing tanpa izin untuk data pelatihan</label>
                <label><input type="radio" name="q10" value="b"> b.	Mengambil data secara acak dari internet tanpa sumber</label>
                <label><input type="radio" name="q10" value="c"> c.	Mengumpulkan gambar atau suara sendiri dengan persetujuan peserta</label>
                <label><input type="radio" name="q10" value="d"> d.	Menggunakan data apa pun selama hasil prediksi akurat</label>
            </div>

            {{-- TOMBOL --}}
            <button type="button" class="btn-submit" onclick="submitQuiz()">
                Selesai & Lihat Nilai
            </button>

            <div id="quizResult" class="quiz-result"></div>

        </form>
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
        });
    </script>

    <script src="{{ asset('js/quiz/quiz_2.js') }}"></script>
@endpush