@extends('layouts.app')

@section('title', 'Bab 1 - AI')

@section('content')
    <div>
        <h1 class="mt-4">PRAKTIK MEMBUAT MODEL <i>AI</i> SEDERHANA</h1>
        <div>
            <h2>3. Membuat Model Deteksi Pose Tubuh</h2>
            <p>
                Proyek ini melatih AI untuk mengenali posisi atau gerakan tubuh manusia. Cocok untuk aktivitas seperti
                pengenalan gerakan olahraga, tarian, atau isyarat tangan.
            </p>
            <ol type="a">
                <li>Langkah 1: Membuka Halaman <i>AI</i>
                    <p>Buka website pembelajaran AI melalui browser, kemudian masuk ke halaman utama aplikasi.</p>

                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-c/gambar-1.png') }}" alt="Ilustrasi AI">
                        <span>Gambar C.19 Tampilan halaman utama website pembelajaran <i>AI</i>.</span>
                    </div>
                </li>

                <li>Langkah 2: Memilih Menu Latih AI</i>
                    <p>Klik menu Latih AI pada navigasi atau tombol Mulai Melatih yang tersedia pada halaman beranda.</p>

                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-c/gambar-2.jpg') }}" alt="Ilustrasi AI">
                        <span>Gambar C.20 Pengguna memilih menu Latih AI atau tombol Mulai Melatih untuk masuk ke halaman
                            pelatihan <i>AI</i></span>
                    </div>
                </li>

                <li>Langkah 3: Memilih Mode Latih Pose Tubuh</i>
                    <p>Pada halaman pilihan mode, pilih Latih Pose Tubuh untuk melatih AI menggunakan data berupa pose atau
                        gerakan tubuh yang ditangkap oleh kamera.</p>

                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-c/gambar-3.jpg') }}" alt="Ilustrasi AI">
                        <span>Gambar C.21 Memilih menu Latih Pose Tubuh untuk melatih <i>AI</i> mengenali berbagai pose atau
                            posisi tubuh melalui kamera</span>
                    </div>
                </li>

                <li>Langkah 4: Membuat Kelas Pose</i>
                    <p>Masukkan nama kelas pada kolom yang tersedia sesuai dengan pose yang akan dilatih, misalnya Berdiri,
                        Duduk, atau Jongkok. Jika ingin menambahkan kategori pose lainnya, klik tombol Tambah Kelas.</p>

                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-c/gambar-4.jpg') }}" alt="Ilustrasi AI">
                        <span>Gambar C.22 Membuat kelas pose tubuh dan mengumpulkan data untuk setiap kelas sebagai contoh
                            yang akan dipelajari oleh <i>AI</i></span>
                    </div>
                </li>

                <li>Langkah 5: Mengumpulkan Data Pose</i>
                    <p>Arahkan tubuh ke kamera, kemudian lakukan pose yang sesuai dengan nama kelas yang telah dibuat. Ambil
                        beberapa contoh data untuk setiap pose agar AI dapat mempelajari ciri-ciri dari masing-masing posisi
                        tubuh.</p>

                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-c/gambar-5.jpg') }}" alt="Ilustrasi AI">
                        <span>Gambar C.23 Mengarahkan tubuh ke kamera dan menekan tombol Ambil Data untuk mengumpulkan
                            contoh pose yang akan dipelajari oleh <i>AI</i></span>
                    </div>
                </li>

                <li>Langkah 6: Melatih AI</i>
                    <p>Setelah data pose untuk setiap kelas terkumpul, klik tombol Latih AI untuk memulai proses pelatihan.
                        Pada tahap ini, AI akan mempelajari pola dari setiap pose yang telah direkam.</p>

                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-c/gambar-6.jpg') }}" alt="Ilustrasi AI">
                        <span>Gambar C.24 Menekan tombol Latih <i>AI</i> untuk memulai proses pelatihan berdasarkan data
                            pose tubuh yang telah dikumpulkan</span>
                    </div>
                </li>
                <li>Langkah 7: Melihat Hasil Prediksi</i>
                    <p>Setelah pelatihan selesai, tampilkan salah satu pose di depan kamera. <i>AI</i> akan mengenali pose
                        tersebut dan menampilkan hasil prediksi secara <i>real-time</i> (langsung) pada layar.</p>

                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-c/gambar-7.jpg') }}" alt="Ilustrasi AI">
                        <span>Gambar C.25 Hasil prediksi <i>AI</i> ditampilkan secara <i>real-time</i>, menunjukkan bahwa
                            pose tubuh yang terdeteksi termasuk ke dalam kelas Tangan di bawah</span>
                    </div>
                </li>

            </ol>

            <p>
                <strong>Catatan Penting</strong>
            <ul>
                <li>Pastikan seluruh tubuh atau bagian tubuh yang diamati terlihat jelas oleh kamera.</li>
                <li>Gunakan pencahayaan yang cukup agar pose dapat terdeteksi dengan baik.</li>
                <li>Ambil data pose dalam jumlah yang cukup untuk setiap kelas agar hasil prediksi lebih akurat.</li>
                <li>Hindari pose yang terlalu mirip karena dapat menyulitkan AI dalam membedakan setiap kategori.</li>
            </ul>
            </p>
        </div>
    </div>

    @php
        use App\Models\Materi;
        use App\Models\UserProgress;

        // ambil materi (karena kamu tidak pakai controller)
        $materi = Materi::where('slug', 'bab-3-materi-c')->first();

        // cek progress
        $isCompleted = UserProgress::where('user_id', auth()->id())
            ->where('materi_id', $materi->id ?? 0)
            ->where('status', 'completed')
            ->exists();
    @endphp

    <div id="progress"></div>

    <section class="ai-debug">
        <h2>Aktivitas 3 : Menganalisis Penyebab Kesalahan pada Sistem Kecerdasan Buatan</h2>
        <p class="debug-desc">
            Petunjuk Pengerjaan :
        </p>

        <ul>
            <li>Bacalah setiap kasus dengan saksama.</li>
            <li>Analisis penyebab kesalahan yang paling mungkin terjadi pada model kecerdasan buatan.</li>
            <li>Pilih satu jawaban yang paling tepat berdasarkan materi tentang pembuatan model deteksi pose.</li>
            <li>Kerjakan seluruh kasus hingga selesai.</li>
            <li>Setelah semua jawaban dipilih, <i>klik</i> tombol <strong>Submit Aktivitas</strong>.</li>
        </ul>

        <div class="debug-card" data-answer="b">
            <h4>Kasus 1</h4>
            <p>
                Model kecerdasan buatan sering salah membedakan antara berdiri dan jongkok, terutama saat diuji oleh siswa lain. Penyebab
                paling masuk akal adalah ....
            </p>
            <div class="debug-options">
                <button onclick="checkDebug(this, 'a')">Nama kelas terlalu panjang</button>
                <button onclick="checkDebug(this, 'b')">Jumlah data pose antar kelas tidak seimbang</button>
                <button onclick="checkDebug(this, 'c')">Tombol <i>Train Model</i> belum ditekan</button>
                <button onclick="checkDebug(this, 'd')"><i>Browser</i> yang digunakan berbeda</button>
            </div>

            <div class="debug-feedback"></div>
        </div>

        <div class="debug-card" data-answer="c">
            <h4>Kasus 2</h4>
            <p>
                Saat diuji di ruang kelas, kecerdasan buatan sering salah mengenali pose, tetapi saat diuji di rumah hasilnya lebih akurat.
                Penyebab paling masuk akal adalah ....
            </p>

            <div class="debug-options">
                <button onclick="checkDebug(this, 'a')">Kamera laptop rusak</button>
                <button onclick="checkDebug(this, 'b')">Model kecerdasan buatan hanya bisa digunakan di rumah</button>
                <button onclick="checkDebug(this, 'c')">Perbedaan pencahayaan ruangan</button>
                <button onclick="checkDebug(this, 'd')">Kecerdasan buatan belum selesai dilatih</button>
            </div>

            <div class="debug-feedback"></div>
        </div>

        <div class="debug-card" data-answer="b">
            <h4>Kasus 3</h4>
            <p>
                Model mendeteksi pose “Lambaikan Tangan” meskipun pengguna hanya berdiri diam. Penyebab paling masuk akal
                adalah ....
            </p>

            <div class="debug-options">
                <button onclick="checkDebug(this, 'a')">Terlalu banyak kelas pose</button>
                <button onclick="checkDebug(this, 'b')">Data pose terlalu sedikit dan kurang variasi</button>
                <button onclick="checkDebug(this, 'c')"><i>Webcam</i> tidak aktif</button>
                <button onclick="checkDebug(this, 'd')">Nama kelas salah ketik</button>
            </div>

            <div class="debug-feedback"></div>
        </div>

        <div class="debug-card" data-answer="b">
            <h4>Kasus 4</h4>
            <p>
                Model bekerja dengan baik untuk siswa yang melatihnya, tetapi sering salah saat diuji oleh teman lain.
                Penyebab paling masuk akal adalah ....
            </p>

            <div class="debug-options">
                <button onclick="checkDebug(this, 'a')">Kecerdasan buatan tidak bisa mengenali orang lain</button>
                <button onclick="checkDebug(this, 'b')">Data hanya berasal dari satu orang sehingga kurang variasi</button>
                <button onclick="checkDebug(this, 'c')">Pose terlalu sulit</button>
                <button onclick="checkDebug(this, 'd')">Kecerdasan buatan hanya bisa digunakan sekali</button>
            </div>

            <div class="debug-feedback"></div>
        </div>

        <div class="debug-card" data-answer="c">
            <h4>Kasus 5</h4>
            <p>
                Persentase prediksi kecerdasan buatan sering rendah (misalnya: Berdiri 45%, Jongkok 40%, Lambaikan Tangan 15%). Penyebab
                paling masuk akal adalah ....
            </p>

            <div class="debug-options">
                <button onclick="checkDebug(this, 'a')">Kecerdasan buatan rusak</button>
                <button onclick="checkDebug(this, 'b')">Kelas terlalu sedikit</button>
                <button onclick="checkDebug(this, 'c')">Model belum yakin karena data pose kurang jelas atau kurang
                    banyak</button>
                <button onclick="checkDebug(this, 'd')">Pose tidak bisa dideteksi oleh kecerdasan buatan</button>
            </div>

            <div class="debug-feedback"></div>
        </div>

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
    </section>

@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/interaktif/materi-3/materi-c.css') }}">
    <link rel="stylesheet" href="{{ asset('css/materi/style_materi.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/interaktif/materi-3/materi-c.js') }}"></script>
@endpush