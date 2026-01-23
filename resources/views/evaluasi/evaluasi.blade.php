@extends('layouts.app')

@section('title', 'Evaluasi - Kecerdasan Buatan')

@section('content')
    <section class="quiz-section">
        <h1 class="quiz-title">📝 Evaluasi: Kecerdasan Buatan</h1>
        <p class="quiz-desc">
            Setelah mempelajari seluruh materi mengenai proses melatih dan menguji AI, kini saatnya Anda mengukur tingkat pemahaman Anda. Soal-soal berikut dirancang untuk menilai sejauh mana Anda menguasai konsep utama dalam proses pelatihan data, pembuatan model, serta pengujian hasil prediksi AI. Selamat mengerjakan!
            <br>Pilih satu jawaban yang paling benar pada setiap soal.
        </p>

        <form id="quizForm">

            {{-- SOAL 1 --}}
            <div class="quiz-card">
                <p class="quiz-question">
                    1. Sebuah sistem ingin dikembangkan untuk membedakan suara manusia dan suara hewan. Langkah awal yang paling tepat dalam proses Machine Learning adalah ....
                </p>
                <label><input type="radio" name="q1" value="a"> a.	Melatih model dengan suara acak</label>
                <label><input type="radio" name="q1" value="b"> b.	Mengumpulkan berbagai sampel suara manusia dan hewan</label>
                <label><input type="radio" name="q1" value="c"> c.	Menguji model tanpa data latih</label>
                <label><input type="radio" name="q1" value="d"> d.	Memberi nilai pada suara secara acak</label>
            </div>

            {{-- SOAL 2 --}}
            <div class="quiz-card">
                <p class="quiz-question">
                    2. Model untuk mengenali gambar kucing dan anjing memiliki akurasi tinggi saat pelatihan, tetapi rendah saat diuji. Penyebab paling mungkin adalah ....
                </p>
                <label><input type="radio" name="q2" value="a"> a.	Data pelatihan terlalu sedikit</label>
                <label><input type="radio" name="q2" value="b"> b.	Model hanya menghafal data pelatihan</label>
                <label><input type="radio" name="q2" value="c"> c.	Data uji terlalu banyak</label>
                <label><input type="radio" name="q2" value="d"> d.	Tidak dilakukan pengumpulan data</label>
            </div>

            {{-- SOAL 3 --}}
            <div class="quiz-card">
                <p class="quiz-question">
                    3. Sebuah perusahaan ingin membuat sistem rekomendasi makanan berdasarkan kebiasaan pengguna. 
                    <br>Tahap data preparation yang paling penting dilakukan adalah ....
                </p>
                <label><input type="radio" name="q3" value="a"> a.	Menyamakan format data dan memberi label sesuai kategori</label>
                <label><input type="radio" name="q3" value="b"> b.	Menghapus semua data pengguna</label>
                <label><input type="radio" name="q3" value="c"> c.	Menggunakan data tanpa memprosesnya</label>
                <label><input type="radio" name="q3" value="d"> d.	Melatih model tanpa pelabelan data</label>
            </div>

            {{-- SOAL 4 --}}
            <div class="quiz-card">
                <p class="quiz-question">
                    4. Perbedaan utama antara AI dan program biasa adalah ....
                </p>
                <label><input type="radio" name="q4" value="a"> a.	AI hanya bekerja untuk game</label>
                <label><input type="radio" name="q4" value="b"> b.	Program biasa dapat belajar dari data</label>
                <label><input type="radio" name="q4" value="c"> c.	AI dapat belajar dan beradaptasi dari data</label>
                <label><input type="radio" name="q4" value="d"> d.	Program biasa bisa memprediksi data baru</label>
            </div>

            {{-- SOAL 5 --}}
            <div class="quiz-card">
                <p class="quiz-question">
                    5. Saat menguji model, peneliti menggunakan data baru yang belum pernah dilihat oleh model sebelumnya.
                    <br>Tujuan utamanya adalah ....
                </p>
                <label><input type="radio" name="q5" value="a"> a.	Membuat model menghafal data</label>
                <label><input type="radio" name="q5" value="b"> b.	Menghindari pelatihan ulang</label>
                <label><input type="radio" name="q5" value="c"> c.	Mengetahui apakah model benar-benar memahami pola</label>
                <label><input type="radio" name="q5" value="d"> d.	Menghapus data pelatihanl</label>
            </div>

            {{-- SOAL 6 --}}
            <div class="quiz-card">
                <p class="quiz-question">
                    6. Dalam pembangunan sistem mendeteksi penyakit tanaman lewat gambar daun, langkah sebelum pelatihan yang paling tepat adalah ....
                </p>
                <label><input type="radio" name="q6" value="a"> a.	Menguji model dengan data baru</label>
                <label><input type="radio" name="q6" value="b"> b.	Membersihkan data dan memberi label setiap foto</label>
                <label><input type="radio" name="q6" value="c"> c.	Menggunakan model lain tanpa persiapan</label>
                <label><input type="radio" name="q6" value="d"> d.	Mengumpulkan data secara acak tanpa label</label>
            </div>

            {{-- SOAL 7 --}}
            <div class="quiz-card">
                <p class="quiz-question">
                    7. Model pendeteksi wajah gagal mengenali wajah di malam hari. Solusi yang paling tepat adalah ....
                </p>
                <label><input type="radio" name="q7" value="a"> a.	Mengurangi jumlah data pelatihan</label>
                <label><input type="radio" name="q7" value="b"> b.	Menambah data gambar dengan kondisi pencahayaan berbeda</label>
                <label><input type="radio" name="q7" value="c"> c.	Menghapus semua gambar wajah di siang hari</label>
                <label><input type="radio" name="q7" value="d"> d.	Menghapus fitur pengujian</label>
            </div>

            {{-- SOAL 8 --}}
            <div class="quiz-card">
                <p class="quiz-question">
                    8. Untuk memastikan model pengenalan emosi pada wajah layak digunakan, langkah evaluasi paling tepat adalah ....
                </p>
                <label><input type="radio" name="q8" value="a"> a.	Menguji model hanya dengan data pelatihan</label>
                <label><input type="radio" name="q8" value="b"> b.	Mengabaikan hasil prediksi yang salah</label>
                <label><input type="radio" name="q8" value="c"> c.	Menguji model dengan data baru dan mengevaluasi akurasi</label>
                <label><input type="radio" name="q8" value="d"> d.	Menggunakan model tanpa evaluasi</label>
            </div>

            {{-- SOAL 9 --}}
            <div class="quiz-card">
                <p class="quiz-question">
                    9. Sebuah model Machine Learning digunakan untuk mendeteksi ekspresi wajah. Namun, model sering salah saat wajah tertutup sebagian (misalnya memakai masker).
                    <br>Langkah pengembangan yang paling tepat untuk meningkatkan akurasi model adalah ....
                </p>
                <label><input type="radio" name="q9" value="a"> a.	Mengurangi jumlah data pelatihan</label>
                <label><input type="radio" name="q9" value="b"> b.	Menambahkan data wajah tanpa masker saja</label>
                <label><input type="radio" name="q9" value="c"> c.	Menambah variasi data wajah yang memakai masker saat pelatihan</label>
                <label><input type="radio" name="q9" value="d"> d.	Menghapus semua data yang berkualitas baik</label>
            </div>

            {{-- SOAL 10 --}}
            <div class="quiz-card">
                <p class="quiz-question">
                    10. Dalam proses Machine Learning, seorang peneliti menemukan banyak data gambar yang buram dan berwarna sangat gelap. Jika data tersebut tetap digunakan, kemungkinan yang terjadi adalah ....
                </p>
                <label><input type="radio" name="q10" value="a"> a.	Model lebih cepat memahami pola</label>
                <label><input type="radio" name="q10" value="b"> b.	Model tidak perlu diuji</label>
                <label><input type="radio" name="q10" value="c"> c.	Model menghasilkan prediksi yang kurang akurat</label>
                <label><input type="radio" name="q10" value="d"> d.	Model dapat langsung digunakan tanpa pelatihan</label>
            </div>

            {{-- SOAL 11 --}}
            <div class="quiz-card">
                <p class="quiz-question">
                    11. Seorang siswa ingin melatih AI untuk membedakan gambar daun sehat dan daun yang terserang penyakit. Jenis proyek yang paling sesuai untuk digunakan adalah ....
                </p>
                <label><input type="radio" name="q11" value="a"> a.	Audio Project</label>
                <label><input type="radio" name="q11" value="b"> b.	Image Project</label>
                <label><input type="radio" name="q11" value="c"> c.	Pose Project</label>
                <label><input type="radio" name="q11" value="d"> d.	Text Project</label>
            </div>

            {{-- SOAL 12 --}}
            <div class="quiz-card">
                <p class="quiz-question">
                    12.	Seorang siswa melakukan eksperimen menggunakan Image Project untuk mengenali jenis buah. Namun hasil prediksi sering salah. Langkah evaluasi terbaik yang dapat dilakukan adalah ....
                </p>
                <label><input type="radio" name="q12" value="a"> a.	Mengubah jenis proyek menjadi Audio Project</label>
                <label><input type="radio" name="q12" value="b"> b.	Menambah variasi data gambar dalam setiap kelas</label>
                <label><input type="radio" name="q12" value="c"> c.	Menghapus semua data yang sudah dikumpulkan</label>
                <label><input type="radio" name="q12" value="d"> d.	Mengurangi jumlah kelas</label>
            </div>

            {{-- SOAL 13 --}}
            <div class="quiz-card">
                <p class="quiz-question">
                    13.	Dalam praktik pembelajaran, siswa melatih model AI untuk membedakan antara suara kucing dan anjing. Namun setelah dicoba, model sulit membedakan keduanya karena banyak kebisingan pada sampel suara. Solusi terbaik adalah ....
                </p>
                <label><input type="radio" name="q13" value="a"> a.	Beralih ke Pose Project</label>
                <label><input type="radio" name="q13" value="b"> b.	Menggunakan lebih banyak data dengan kualitas suara yang lebih baik</label>
                <label><input type="radio" name="q13" value="c"> c.	Menambahkan gambar hewan untuk membantu</label>
                <label><input type="radio" name="q13" value="d"> d.	Mengurangi jumlah data latih</label>
            </div>

            {{-- SOAL 14 --}}
            <div class="quiz-card">
                <p class="quiz-question">
                    14.	Model AI yang dibuat menggunakan Pose Project dapat mendeteksi seseorang sedang jongkok. Kemampuan ini paling relevan diterapkan dalam konteks ....
                </p>
                <label><input type="radio" name="q14" value="a"> a.	Pengenalan pola suara panggilan</label>
                <label><input type="radio" name="q14" value="b"> b.	Input teks otomatis</label>
                <label><input type="radio" name="q14" value="c"> c.	Sistem pendeteksi aktivitas kebugaran</label>
                <label><input type="radio" name="q14" value="d"> d.	Klasifikasi warna objek</label>
            </div>

            {{-- SOAL 15 --}}
            <div class="quiz-card">
                <p class="quiz-question">
                    15.	Seorang siswa menggabungkan tiga model AI dari TM: pengenalan ekspresi wajah, suara, dan pose tubuh untuk membuat sistem emosi cerdas. Tantangan terbesar yang mungkin muncul adalah ....
                </p>
                <label><input type="radio" name="q15" value="a"> a.	Keterbatasan jumlah kelas</label>
                <label><input type="radio" name="q15" value="b"> b.	Kesulitan sinkronisasi antara data visual, audio, dan pose</label>
                <label><input type="radio" name="q15" value="c"> c.	Tidak ada fitur pengenalan suara</label>
                <label><input type="radio" name="q15" value="d"> d.	Semua data harus berbentuk teks</label>
            </div>

            {{-- SOAL 16 --}}
            <div class="quiz-card">
                <p class="quiz-question">
                    16.	Jika seorang siswa ingin membuat sistem yang dapat mengenali apakah seseorang sedang berbicara atau tidak hanya berdasarkan suara, namun juga ingin mendeteksi apakah orang itu bergerak saat berbicara, maka ia perlu ....
                </p>
                <label><input type="radio" name="q16" value="a"> a.	Menggabungkan Audio dan Pose Project</label>
                <label><input type="radio" name="q16" value="b"> b.	Menggunakan Image Project saja</label>
                <label><input type="radio" name="q16" value="c"> c.	Hanya menggunakan Audio Project</label>
                <label><input type="radio" name="q16" value="d"> d.	Hanya menggunakan Pose Project</label>
            </div>

            {{-- SOAL 17 --}}
            <div class="quiz-card">
                <p class="quiz-question">
                    17.	Seseorang melatih model Image Project untuk mendeteksi ekspresi wajah, namun hasil prediksi menjadi tidak konsisten saat cahaya berubah. Solusi yang paling tepat adalah ....
                </p>
                <label><input type="radio" name="q17" value="a"> a.	Mengurangi jumlah gambar dalam setiap kelas</label>
                <label><input type="radio" name="q17" value="b"> b.	Menambahkan contoh gambar dengan variasi pencahayaan berbeda</label>
                <label><input type="radio" name="q17" value="c"> c.	Beralih menggunakan Audio Project</label>
                <label><input type="radio" name="q17" value="d"> d.	Melatih model hanya dengan satu ekspresi</label>
            </div>

            {{-- SOAL 18 --}}
            <div class="quiz-card">
                <p class="quiz-question">
                    18.	Saat melatih Audio Project, seorang siswa mendapatkan hasil prediksi yang kurang akurat karena suara latar cukup ramai. Langkah evaluasi paling efektif untuk meningkatkan kualitas model adalah ....
                </p>
                <label><input type="radio" name="q18" value="a"> a.	Mengubah proyek menjadi Image Project</label>
                <label><input type="radio" name="q18" value="b"> b.	Memperbanyak data suara latar</label>
                <label><input type="radio" name="q18" value="c"> c.	Merekam ulang data dengan lingkungan yang lebih tenang</label>
                <label><input type="radio" name="q18" value="d"> d.	Mengurangi jumlah kelas suara</label>
            </div>

            {{-- SOAL 19 --}}
            <div class="quiz-card">
                <p class="quiz-question">
                    19.	Seorang siswa ingin membuat model Pose Project untuk membedakan pose duduk, berdiri, dan jongkok. Namun, kelas jongkok dan duduk sering tertukar. Faktor yang paling mungkin menyebabkan masalah ini adalah ....
                </p>
                <label><input type="radio" name="q19" value="a"> a.	Model terlalu banyak menangani data suara</label>
                <label><input type="radio" name="q19" value="b"> b.	Data pose kurang bervariasi dari berbagai sudut</label>
                <label><input type="radio" name="q19" value="c"> c.	Gerakan terlalu cepat</label>
                <label><input type="radio" name="q19" value="d"> d.	Terlalu banyak perbedaan warna pakaian</label>
            </div>

            {{-- SOAL 20 --}}
            <div class="quiz-card">
                <p class="quiz-question">
                    20.	Guru meminta siswa membandingkan hasil model Audio dan Image untuk kasus yang sama: membedakan dua jenis burung. Pernyataan berikut yang paling tepat adalah ....
                </p>
                <label><input type="radio" name="q20" value="a"> a.	Model Image selalu lebih akurat dari Audio</label>
                <label><input type="radio" name="q20" value="b"> b.	Model Audio lebih tepat jika perbedaan ada pada suara, bukan bentuk</label>
                <label><input type="radio" name="q20" value="c"> c.	Kedua model memberikan hasil identik</label>
                <label><input type="radio" name="q20" value="d"> d.	Pose Project lebih cocok untuk kasus ini</label>
            </div>

            {{-- SOAL 21 --}}
            <div class="quiz-card">
                <p class="quiz-question">
                    21.	Seorang siswa ingin membuat sistem yang mampu melambaikan tangan untuk menyalakan lampu otomatis di kelas. Jenis proyek Teachable Machine yang paling sesuai adalah ....
                </p>
                <label><input type="radio" name="q21" value="a"> a.	Image Project</label>
                <label><input type="radio" name="q21" value="b"> b.	Audio Project</label>
                <label><input type="radio" name="q21" value="c"> c.	Pose Project</label>
                <label><input type="radio" name="q21" value="d"> d.	Any Project</label>
            </div>

            {{-- SOAL 22 --}}
            <div class="quiz-card">
                <p class="quiz-question">
                    22.	Dalam proyek Audio, hasil prediksi AI tidak akurat karena suara dari luar kelas sering terekam, menyebabkan model salah mengenali. Perbaikan terbaik adalah ....
                </p>
                <label><input type="radio" name="q22" value="a"> a.	Menambah jumlah kelas</label>
                <label><input type="radio" name="q22" value="b"> b.	Mengumpulkan data suara dalam kondisi lingkungan yang lebih tenang</label>
                <label><input type="radio" name="q22" value="c"> c.	Mengganti mikrofon dengan webcam</label>
                <label><input type="radio" name="q22" value="d"> d.	Mengurangi jumlah data suara</label>
            </div>

            {{-- SOAL 23 --}}
            <div class="quiz-card">
                <p class="quiz-question">
                    23.	Jika seorang siswa ingin mendeteksi perbedaan antara ekspresi senang, sedih, dan netral, langkah pertama yang harus dilakukan ketika membuat proyek Teachable Machine adalah ....
                </p>
                <label><input type="radio" name="q23" value="a"> a.	Menyimpan model</label>
                <label><input type="radio" name="q23" value="b"> b.	Membuat Image Project dengan menambahkan kelas ekspresi</label>
                <label><input type="radio" name="q23" value="c"> c.	Menambahkan audio</label>
                <label><input type="radio" name="q23" value="d"> d.	Menguji model </label>
            </div>

            {{-- SOAL 24 --}}
            <div class="quiz-card">
                <p class="quiz-question">
                    24.	Dalam proses supervised learning pada Teachable Machine, peran pengguna adalah ....
                </p>
                <label><input type="radio" name="q24" value="a"> a.	Membiarkan komputer mencari data sendiri</label>
                <label><input type="radio" name="q24" value="b"> b.	Mengumpulkan data dan memberi label untuk diajarkan ke model</label>
                <label><input type="radio" name="q24" value="c"> c.	Menghapus data secara otomatis</label>
                <label><input type="radio" name="q24" value="d"> d.	Membuat kode untuk melatih model</label>
            </div>

            {{-- SOAL 25 --}}
            <div class="quiz-card">
                <p class="quiz-question">
                    25.	Seorang siswa ingin AI membedakan tepuk tangan, siulan, dan suara jangkrik. Agar model lebih fleksibel, data terbaik yang ia kumpulkan adalah ....
                </p>
                <label><input type="radio" name="q25" value="a"> a.	Suara yang direkam dari 1 ruangan saja</label>
                <label><input type="radio" name="q25" value="b"> b.	Suara yang diambil dari berbagai situasi dan beberapa orang</label>
                <label><input type="radio" name="q25" value="c"> c.	Hanya suara dengan frekuensi rendah</label>
                <label><input type="radio" name="q25" value="d"> d.	Suara tegangan Listrik</label>
            </div>

            {{-- SOAL 26 --}}
            <div class="quiz-card">
                <p class="quiz-question">
                    26.	Tabel berikut menunjukkan kondisi proyek yang akan dibuat:
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Tujuan</th>
                                <th>Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Menilai vokal “A, I, U” dari siswa</td>
                                <td>Suara</td>
                            </tr>
                        </tbody>
                    </table>
                    <br>Jenis proyek yang tepat adalah ....
                </p>
                <label><input type="radio" name="q26" value="a"> a.	Image Project</label>
                <label><input type="radio" name="q26" value="b"> b.	Audio Project</label>
                <label><input type="radio" name="q26" value="c"> c.	Pose Project</label>
                <label><input type="radio" name="q26" value="d"> d.	Combination Project</label>
            </div>

            {{-- SOAL 27 --}}
            <div class="quiz-card">
                <p class="quiz-question">
                    27.	Seorang siswa membuat model gambar, tetapi hasil pengujiannya menunjukkan persentase yang sangat rendah pada semua kelas saat objek ditampilkan. Analisis paling logis adalah ....
                </p>
                <label><input type="radio" name="q27" value="a"> a.	Siswa belum melakukan Train Model</label>
                <label><input type="radio" name="q27" value="b"> b.	Siswa membuat terlalu banyak kelas</label>
                <label><input type="radio" name="q27" value="c"> c.	Data untuk setiap kelas tidak seimbang atau kurang bervariasi</label>
                <label><input type="radio" name="q27" value="d"> d.	Model tidak dapat digunakan tanpa mikrofon</label>
            </div>

            {{-- SOAL 28 --}}
            <div class="quiz-card">
                <p class="quiz-question">
                    28.	Seorang guru meminta siswa membuat model untuk mendeteksi apakah seseorang sedang berbicara atau diam. Setelah model dibuat, hasil prediksinya sering salah saat ruang kelas ramai. Analisis terbaik adalah ....
                </p>
                <label><input type="radio" name="q28" value="a"> a.	Model gagal karena jenis proyek yang digunakan salah</label>
                <label><input type="radio" name="q28" value="b"> b.	Data latih suara tidak mencakup variasi kondisi lingkungan</label>
                <label><input type="radio" name="q28" value="c"> c.	Kamera tidak mampu mendeteksi suara dengan baik</label>
                <label><input type="radio" name="q28" value="d"> d.	Label kelas terlalu banyak</label>
            </div>

            {{-- SOAL 29 --}}
            <div class="quiz-card">
                <p class="quiz-question">
                    29.	Model pose yang dibuat siswa dapat mendeteksi jongkok dengan baik, tetapi sering salah mengenali gerakan berdiri sebagai lambaian tangan. Perbaikan yang paling tepat adalah ....
                </p>
                <label><input type="radio" name="q29" value="a"> a.	Mengurangi jumlah kelas agar model tidak bingung</label>
                <label><input type="radio" name="q29" value="b"> b.	Menambah variasi data pose berdiri dengan sudut kamera dan pencahayaan berbeda</label>
                <label><input type="radio" name="q29" value="c"> c.	Mengganti proyek ke Audio Project</label>
                <label><input type="radio" name="q29" value="d"> d.	Menambahkan data berupa suara saat berdiri</label>
            </div>

            {{-- SOAL 30 --}}
            <div class="quiz-card">
                <p class="quiz-question">
                    30.	Seseorang ingin membuat sistem absensi otomatis berbasis wajah di kelas dengan Teachable Machine. Namun, kelas sering berpindah tempat sehingga background berubah. Agar sistem tetap akurat, strategi terbaik adalah ....
                <label><input type="radio" name="q30" value="a"> a.	Mengunci model agar tidak bisa dilatih ulang</label>
                <label><input type="radio" name="q30" value="b"> b.	Melatih model dengan latar belakang beragam sejak awal</label>
                <label><input type="radio" name="q30" value="c"> c.	Menggunakan mikrofon sebagai input data</label>
                <label><input type="radio" name="q30" value="d"> d.	Mengubah proyek menjadi Pose Project</label>
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

    <script src="{{ asset('js/evaluasi/evaluasi.js') }}"></script>
@endpush