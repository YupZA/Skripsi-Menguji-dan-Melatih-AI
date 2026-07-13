@extends('layouts.app')

@section('title', 'Bab 1 - AI')

@section('content')
    <div>
        <h1 class="mt-4">PRAKTIK MEMBUAT MODEL <i>AI</i> SEDERHANA</h1>
        <div>
            <h2>3. Membuat Model Deteksi Pose Tubuh</h2>
            <p>
                Proyek pose tubuh digunakan untuk melatih kecerdasan buatan agar dapat mengenali posisi atau gerakan tubuh manusia. Proyek ini dapat digunakan untuk mengenali pose seperti berdiri, jongkok, mengangkat tangan, atau gerakan lainnya yang ditangkap melalui kamera.
            </p>
            <ol type="a">
                <li>Langkah 1: Membuka Halaman Pembelajaran Kecerdasan Buatan
                    <p>
                        Buka website pembelajaran kecerdasan buatan melalui browser, kemudian masuk ke halaman utama aplikasi. Tampilan halaman utama website pembelajaran kecerdasan buatan yang akan digunakan untuk membuat model pose tubuh dapat dilihat pada Gambar C.19.
                    </p>

                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-c/gambar-1.png') }}" alt="Ilustrasi AI">
                        <span>Gambar C.19 Tampilan halaman utama website pembelajaran <i>AI</i>.</span>
                    </div>
                </li>

                <li>Langkah 2: Memilih Menu Latih AI</i>
                    <p>
                        Klik menu Latih AI pada navigasi atau tombol Mulai Melatih yang tersedia pada halaman beranda. Contoh tampilan menu Latih AI dan tombol Mulai Melatih yang digunakan untuk masuk ke halaman pelatihan kecerdasan buatan dapat dilihat pada Gambar C.20.
                    </p>
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-c/gambar-2.jpg') }}" alt="Ilustrasi AI">
                        <span>Gambar C.20 Pengguna memilih menu Latih AI atau tombol Mulai Melatih untuk masuk ke halaman
                            pelatihan <i>AI</i></span>
                    </div>
                </li>

                <li>Langkah 3: Memilih Mode Latih Pose Tubuh</i>
                    <p>
                        Pada halaman pilihan mode, pilih Latih Pose Tubuh untuk melatih kecerdasan buatan  menggunakan data berupa pose atau gerakan tubuh yang ditangkap oleh kamera. Tampilan halaman pemilihan mode pelatihan dengan opsi Latih Pose Tubuh dapat dilihat pada Gambar C.21.
                    </p>

                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-c/gambar-3.jpg') }}" alt="Ilustrasi AI">
                        <span>Gambar C.21 Memilih menu Latih Pose Tubuh untuk melatih <i>AI</i> mengenali berbagai pose atau
                            posisi tubuh melalui kamera</span>
                    </div>
                </li>

                <li>Langkah 4: Membuat Kelas Pose dan Data Pose</i>
                    <p>
                        Masukkan nama pose pada kolom Nama Kelas Pose, misalnya Berdiri atau Jongkok. Selanjutnya, isikan nama data pose pada kolom Nama Data Pose untuk memberi identitas pada data yang akan diambil. Jika ingin menambahkan kategori pose lainnya, klik tombol Tambah Kelas. Contoh pembuatan kelas pose dan pengisian data pose yang akan digunakan sebagai data pelatihan dapat dilihat pada Gambar C.22.
                    </p>

                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-c/gambar-4.jpg') }}" alt="Ilustrasi AI">
                        <span>Gambar C.22 Membuat kelas pose tubuh dan mengumpulkan data untuk setiap kelas sebagai contoh
                            yang akan dipelajari oleh <i>AI</i></span>
                    </div>
                </li>

                <li>Langkah 5: Mengambil Data Pose</i>
                    <p>
                        Posisikan tubuh di depan kamera sesuai dengan pose yang telah ditentukan, kemudian klik tombol Ambil Data Pose. Sistem akan menyimpan pose yang sedang ditampilkan sebagai data pelatihan. Lakukan pengambilan data beberapa kali untuk setiap kelas pose agar model memiliki cukup contoh untuk dipelajari. Proses pengambilan data pose menggunakan kamera sebagai data pelatihan kecerdasan buatan dapat dilihat pada Gambar C.23.
                    </p>

                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-c/gambar-5.jpg') }}" alt="Ilustrasi AI">
                        <span>Gambar C.23 Mengarahkan tubuh ke kamera dan menekan tombol Ambil Data untuk mengumpulkan
                            contoh pose yang akan dipelajari oleh <i>AI</i></span>
                    </div>
                </li>

                <li>Langkah 6: Melatih Kecerdasan Buatan</i>
                    <p>
                        Setelah setiap kelas memiliki beberapa data pose, klik tombol Latih AI untuk memulai proses pelatihan model kecerdasan buatan. Pada tahap ini, sistem akan mempelajari pola dari setiap pose yang telah dikumpulkan. Tampilan saat proses pelatihan model pose tubuh dimulai dapat dilihat pada Gambar C.24.
                    </p>

                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-c/gambar-6.jpg') }}" alt="Ilustrasi AI">
                        <span>Gambar C.24 Menekan tombol Latih <i>AI</i> untuk memulai proses pelatihan berdasarkan data
                            pose tubuh yang telah dikumpulkan</span>
                    </div>
                </li>
                <li>Langkah 7: Melihat Hasil Prediksi</i>
                    <p>
                        Tunggu hingga proses pelatihan selesai. Setelah berhasil, sistem akan menampilkan informasi bahwa model telah selesai dilatih dan siap digunakan untuk pengujian. Setelah model selesai dilatih, lakukan salah satu pose di depan kamera. Sistem akan secara otomatis mengenali pose yang ditampilkan dan menampilkan hasil prediksi berupa nama kelas pose yang terdeteksi, tingkat keyakinan model, serta persentase keyakinan untuk setiap kelas yang tersedia. Contoh tampilan hasil prediksi pose tubuh yang dikenali oleh kecerdasan buatan secara langsung (real-time) dapat dilihat pada Gambar C.25.
                    </p>

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
                <li>Ambil beberapa data pose untuk setiap kelas agar model memiliki cukup contoh untuk dipelajari.</li>
                <li>Gunakan variasi posisi tubuh saat pengambilan data agar model lebih mampu mengenali pose dalam berbagai kondisi.</li>
                <li>Hindari pose yang terlalu mirip karena dapat menyulitkan model dalam membedakan setiap kategori.</li>
                <li>Jika hasil prediksi kurang akurat, tambahkan lebih banyak data pose dan lakukan pelatihan ulang agar kemampuan model meningkat.</li>
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

        <p>
            Tujuan Aktivitas <br>Setelah menyelesaikan aktivitas ini, siswa diharapkan mampu menganalisis penyebab kesalahan pada model kecerdasan buatan berbasis pose tubuh serta menentukan solusi yang tepat untuk meningkatkan hasil prediksi.
        </p>
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