@extends('layouts.app')

@section('title', 'Bab 1 - AI')

@section('content')
    <div>
        <h1 class="mt-4">PENGENALAN GOOGLE TEACHABLE LEARNING MACHINE</h1>
        <div>
            <h2>3. Membuat Model Deteksi Pose Tubuh</h2>
            <p>
                Proyek ini melatih AI untuk mengenali posisi atau gerakan tubuh manusia. Cocok untuk aktivitas seperti
                pengenalan gerakan olahraga, tarian, atau isyarat tangan.
            </p>
            <ol type="a">
                <li>Memulai Proyek Baru
                    <ul>
                        <li>Buka situs Teachable Machine.</li>
                        <li>Pilih “Pose Project”, lalu klik “Get Started”.</li>
                    </ul>
                </li>
                <li>
                    Mengatur Kelas
                    <br>Beri nama kelas sesuai posisi tubuh yang ingin dikenali, misalnya:
                    <ul>
                        <li>Class 1 → Berdiri</li>
                        <li>Class 2 → Jongkok</li>
                        <li>Class 3 → Lambaikan Tangan</li>
                    </ul>
                </li>
                <li>
                    Mengumpulkan Data Pose
                    <ul>
                        <li>Klik “Webcam”, kemudian izinkan akses kamera.</li>
                        <li>Lakukan gerakan yang sesuai dengan setiap kelas, misalnya berdiri, jongkok, atau melambaikan
                            tangan.</li>
                        <li>Tekan “Hold to Record” untuk merekam pose dari berbagai sudut pandang.</li>
                    </ul>
                    Tips
                    <ul>
                        <li>Gunakan pencahayaan yang cukup agar kamera bisa mengenali posisi tubuh dengan jelas.</li>
                        <li>Tambahkan beberapa variasi agar model tidak mudah keliru.</li>
                    </ul>
                </li>
                <li>
                    Melatih dan Menguji Model
                    <ul>
                        <li>Klik “Train Model” untuk memulai proses pelatihan.</li>
                        <li>Setelah selesai, uji model pada panel “Preview” dengan melakukan gerakan baru.</li>
                        <li>AI akan menunjukkan hasil prediksi berupa persentase keyakinan terhadap kelas tertentu.</li>
                    </ul>
                </li>
            </ol>
        </div>
    </div>

    <section class="ai-debug">
        <h2>Aktivitas 3.3</h2>
        <p class="debug-desc">
            Perhatikan kasus berikut, lalu pilih penyebab yang paling masuk akal.
        </p>

        <div class="debug-card" data-answer="b">
            <h4>Kasus 1</h4>
            <p>
                Model AI sering salah membedakan antara berdiri dan jongkok, terutama saat diuji oleh siswa lain. Penyebab paling masuk akal adalah ....
            </p>
            <div class="debug-options">
                <button onclick="checkDebug(this, 'a')">Nama kelas terlalu panjang</button>
                <button onclick="checkDebug(this, 'b')">Jumlah data pose antar kelas tidak seimbang</button>
                <button onclick="checkDebug(this, 'c')">Tombol Train Model belum ditekan</button>
                <button onclick="checkDebug(this, 'd')">Browser yang digunakan berbeda</button>
            </div>

            <div class="debug-feedback"></div>
        </div>

        <div class="debug-card" data-answer="c">
            <h4>Kasus 2</h4>
            <p>
                Saat diuji di ruang kelas, AI sering salah mengenali pose, tetapi saat diuji di rumah hasilnya lebih akurat. Penyebab paling masuk akal adalah ....
            </p>

            <div class="debug-options">
                <button onclick="checkDebug(this, 'a')">Kamera laptop rusak</button>
                <button onclick="checkDebug(this, 'b')">Model AI hanya bisa digunakan di rumah</button>
                <button onclick="checkDebug(this, 'c')">Perbedaan pencahayaan ruangan</button>
                <button onclick="checkDebug(this, 'd')">AI belum selesai dilatih</button>
            </div>

            <div class="debug-feedback"></div>
        </div>

        <div class="debug-card" data-answer="b">
            <h4>Kasus 3</h4>
            <p>
                Model mendeteksi pose “Lambaikan Tangan” meskipun pengguna hanya berdiri diam. Penyebab paling masuk akal adalah …
            </p>

            <div class="debug-options">
                <button onclick="checkDebug(this, 'a')">Terlalu banyak kelas pose</button>
                <button onclick="checkDebug(this, 'b')">Data pose terlalu sedikit dan kurang variasi</button>
                <button onclick="checkDebug(this, 'c')">Webcam tidak aktif</button>
                <button onclick="checkDebug(this, 'd')">Nama kelas salah ketik</button>
            </div>

            <div class="debug-feedback"></div>
        </div>

        <div class="debug-card" data-answer="b">
            <h4>Kasus 4</h4>
            <p>
                Model bekerja dengan baik untuk siswa yang melatihnya, tetapi sering salah saat diuji oleh teman lain. Penyebab paling masuk akal adalah ....
            </p>

            <div class="debug-options">
                <button onclick="checkDebug(this, 'a')">AI tidak bisa mengenali orang lain</button>
                <button onclick="checkDebug(this, 'b')">Data hanya berasal dari satu orang sehingga kurang variasi</button>
                <button onclick="checkDebug(this, 'c')">Pose terlalu sulit</button>
                <button onclick="checkDebug(this, 'd')">AI hanya bisa digunakan sekali</button>
            </div>

            <div class="debug-feedback"></div>
        </div>

        <div class="debug-card" data-answer="c">
            <h4>Kasus 5</h4>
            <p>
                Persentase prediksi AI sering rendah (misalnya: Berdiri 45%, Jongkok 40%, Lambaikan Tangan 15%). Penyebab paling masuk akal adalah …
            </p>

            <div class="debug-options">
                <button onclick="checkDebug(this, 'a')">AI rusak</button>
                <button onclick="checkDebug(this, 'b')">Kelas terlalu sedikit</button>
                <button onclick="checkDebug(this, 'c')">Model belum yakin karena data pose kurang jelas atau kurang banyak</button>
                <button onclick="checkDebug(this, 'd')">Pose tidak bisa dideteksi oleh AI</button>
            </div>

            <div class="debug-feedback"></div>
        </div>
    </section>

@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/interaktif/materi-3/materi-c.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/interaktif/materi-3/materi-c.js') }}"></script>
@endpush