@extends('layouts.app')

@section('title', 'Bab 1 - AI')

@section('content')
    <div>
        <h1 class="mt-4">PRAKTIK MEMBUAT MODEL <i>AI</i> SEDERHANA</h1>
        <div>
            <h2>2. Membuat Model Deteksi Suara</h2>
            <p>
                Proyek suara digunakan untuk melatih kecerdasan buatan agar dapat mengenali berbagai jenis suara, seperti tepuk tangan, siulan, kata tertentu, atau suara lainnya. Model akan mempelajari pola dari rekaman suara yang diberikan sehingga dapat mengenali suara yang serupa saat dilakukan pengujian. Berikut langkah-langkah yang dapat dilakukan:
            </p>
            <ol type="a">
                

                <li>Langkah 1: Membuka Website Pembelajaran Kecerdasan Buatan
                    <p>Buka website pembelajaran kecerdasan buatan melalui browser, kemudian masuk ke halaman utama aplikasi. Pada halaman ini tersedia menu pembelajaran dan fitur pelatihan kecerdasan buatan yang dapat digunakan oleh pengguna. Tampilan halaman utama website pembelajaran kecerdasan buatan dapat dilihat pada Gambar C.11.</p>
                    
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-b/gambar-1.png') }}" alt="Ilustrasi AI">
                        <span>Gambar C.11 Tampilan halaman utama website pembelajaran AI</span>
                    </div>
                </li>

                <li>Langkah 2: Memilih Menu Latih AI
                    <p>Klik menu Latih AI pada navigasi atau tombol Mulai Melatih yang terdapat pada halaman beranda untuk masuk ke halaman pelatihan kecerdasan buatan. Contoh tampilan menu Latih AI dan tombol Mulai Melatih yang digunakan untuk masuk ke halaman pelatihan dapat dilihat pada Gambar C.12.</p>
                    
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-b/gambar-2.jpg') }}" alt="Ilustrasi AI">
                        <span>Gambar C.12 Pengguna memilih menu Latih AI atau tombol Mulai Melatih untuk masuk ke halaman pelatihan AI</span>
                    </div>
                </li>

                <li>Langkah 3: Memilih Mode Latih Suara
                    <p>Pada halaman pemilihan mode pelatihan, pilih Latih Suara. Mode ini digunakan untuk melatih kecerdasan buatan menggunakan data berupa rekaman suara dari mikrofon perangkat. Tampilan halaman pemilihan mode pelatihan dengan opsi Latih Suara dapat dilihat pada Gambar C.13.</p>
                    
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-b/gambar-3.jpg') }}" alt="Ilustrasi AI">
                        <span>Gambar C.13 Memilih menu Latih Suara agar AI dapat belajar mengenali suara yang direkam melalui mikrofon</span>
                    </div>
                </li>

                <li>Langkah 4: Membuat Kelas Suara
                    <p>
                        Masukkan nama kelas suara pada kolom Nama Kelas Suara, misalnya Tepuk Tangan atau Siulan. Selanjutnya, isikan nama data suara pada kolom Nama Data Suara untuk memberi identitas pada rekaman yang akan dibuat. Jika ingin menambahkan kategori suara lainnya, klik tombol Tambah Kelas. Contoh pengisian nama kelas suara dan penambahan kelas baru dapat dilihat pada Gambar C.14.
                    </p>
                    
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-b/gambar-4.jpg') }}" alt="Ilustrasi AI">
                        <span>Gambar C.14 Menuliskan nama kelas sebagai kategori suara yang akan dipelajari oleh AI. Jika diperlukan kategori tambahan, pengguna dapat menekan tombol Tambah Kelas</span>
                    </div>
                </li>

                <li>Langkah 5: Merekam Suara
                    <p>Klik tombol Rekam 3 Detik, kemudian bunyikan suara sesuai dengan kategori yang telah dibuat. Sistem akan merekam suara selama tiga detik dan menyimpannya sebagai data pelatihan. Lakukan beberapa kali perekaman pada setiap kelas agar kecerdasan buatan  memiliki lebih banyak contoh suara untuk dipelajari. Proses perekaman suara sebagai data pelatihan kecerdasan buatan dapat dilihat pada Gambar C.15.</p>
                    
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-b/gambar-5.jpg') }}" alt="Ilustrasi AI">
                        <span>Gambar C.15 Pengguna merekam suara selama 3 detik pada setiap kelas agar AI memperoleh contoh suara yang dapat dipelajari dan dibedakan</span>
                    </div>
                </li>

                <li>Langkah 6: Melatih Kecerdasan Buatan
                    <p>Setelah setiap kelas memiliki sejumlah data rekaman, klik tombol Latih AI untuk memulai proses pelatihan model kecerdasan buatan. Tampilan saat pengguna memulai proses pelatihan model dapat dilihat pada Gambar C.16.</p>
                    
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-b/gambar-6.jpg') }}" alt="Ilustrasi AI">
                        <span>Gambar C.16 Menekan tombol Latih AI untuk memulai proses pembelajaran AI berdasarkan rekaman suara yang telah dikumpulkan.</span>
                    </div>
                </li>

                <li>Langkah 7: Menunggu Proses Pelatihan
                    <p>Tunggu hingga proses pelatihan selesai. Setelah berhasil, sistem akan menampilkan status bahwa pelatihan telah selesai dan model siap digunakan untuk pengujian. Contoh tampilan pemberitahuan bahwa proses pelatihan telah selesai dapat dilihat pada Gambar C.17.</p>
                    
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-b/gambar-7.jpg') }}" alt="Ilustrasi AI">
                        <span>Gambar C.17 Tampilan pemberitahuan bahwa proses pelatihan AI telah selesai dan model siap digunakan untuk mengenali suara.</span>
                    </div>
                </li>

                <li>Langkah 8: Menguji dan Melihat Hasil Prediksi Kecerdasan Buatan
                    <p>
                        Setelah pelatihan selesai, masuk ke bagian Uji Model Suara, kemudian klik tombol Mulai Mendengar. Selanjutnya, buat suara yang ingin dikenali oleh kecerdasan buatan melalui mikrofon perangkat. Setelah suara terdeteksi, sistem akan menampilkan hasil prediksi berupa nama kelas suara yang dikenali, tingkat keyakinan model, serta persentase keyakinan untuk setiap kelas yang tersedia. Tampilan proses pengujian model suara dan hasil prediksi yang diberikan oleh kecerdasan buatan dapat dilihat pada Gambar C.18.
                    </p>
                    
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-b/gambar-8.png') }}" alt="Ilustrasi AI">
                        <span>Gambar C.18 Menekan tombol Mulai Mendengar untuk menguji kemampuan AI dalam mengenali suara dan menampilkan hasil prediksinya.</span>
                    </div>
                </li>

            </ol>
            <p>
                <strong>Catatan Penting</strong>
                <ul>
                    <li>Rekam suara di tempat yang cukup tenang agar kualitas data lebih baik.</li>
                    <li>Gunakan suara yang jelas dan konsisten sesuai dengan nama kelas yang dibuat.</li>
                    <li>Lakukan perekaman beberapa kali pada setiap kelas agar model memiliki lebih banyak data untuk dipelajari.</li>
                    <li>Hindari suara bising (noise) yang dapat mengganggu proses pelatihan.</li>
                    <li>Semakin banyak dan beragam contoh suara yang diberikan, semakin baik kemampuan kecerdasan buatan dalam mengenali suara saat pengujian. </li>
                </ul>
            </p>
        </div>
    </div>

    @php
            use App\Models\Materi;
            use App\Models\UserProgress;

            // ambil materi (karena kamu tidak pakai controller)
            $materi = Materi::where('slug', 'bab-3-materi-b')->first();

            // cek progress
            $isCompleted = UserProgress::where('user_id', auth()->id())
                ->where('materi_id', $materi->id ?? 0)
                ->where('status', 'completed')
                ->exists();
        @endphp

    <div id="progress"></div>

    

    <section class="ai-interactive">
    <h2>Aktivitas 2 : Menentukan Kebenaran Pernyataan Tentang Kecerdasan Buatan</h2>
    <p>
        Tujuan Aktivitas <br>Setelah menyelesaikan aktivitas ini, siswa diharapkan mampu menentukan kebenaran pernyataan tentang proyek suara serta faktor-faktor yang memengaruhi proses pelatihan model kecerdasan buatan.
    </p>
    <p>Petunjuk Pengerjaan : </p>
    <ul>
        <li>Bacalah setiap pernyataan dengan saksama.</li>
        <li>Tentukan apakah pernyataan tersebut <strong>Benar</strong> atau <strong>Salah</strong> berdasarkan materi tentang pembuatan model deteksi suara.</li>
        <li>Pilih satu jawaban pada setiap pernyataan.</li>
        <li>Kerjakan seluruh soal hingga selesai.</li>
        <li>Setelah semua jawaban dipilih, <i>klik</i> tombol <strong>Kumpul Aktivitas</strong>.</li>
    </ul>

    @php
    $questions = [
        ['text' => '<i>Audio Project</i> digunakan untuk melatih <i>AI</i> mengenali suara.', 'answer' => 'benar'],
        ['text' => 'Untuk melatih kecerdasan buatan mengenali suara, proyek yang dipilih adalah <i>Audio Project</i>.', 'answer' => 'benar'],
        ['text' => 'Kelas dapat dinamai Tepuk Tangan dan Siulan.', 'answer' => 'benar'],
        ['text' => 'Lingkungan bising membuat hasil kecerdasan buatan lebih akurat.', 'answer' => 'salah'],
        ['text' => 'Variasi suara membantu kecerdasan buatan mengenali pola.', 'answer' => 'benar'],
    ];
    @endphp

    @foreach ($questions as $i => $q)
        <div class="ai-question" data-answer="{{ $q['answer'] }}">
            <p><strong>{{ $i + 1 }}.</strong> {{ $q['text'] }}</p>

            <div class="ai-options">
                <button onclick="checkBS(this, 'benar')">Benar</button>
                <button onclick="checkBS(this, 'salah')">Salah</button>
            </div>

            <div class="ai-feedback"></div>
        </div>
    @endforeach

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
<link rel="stylesheet" href="{{ asset('css/interaktif/materi-3/materi-b.css') }}">
<link rel="stylesheet" href="{{ asset('css/materi/style_materi.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('js/interaktif/materi-3/materi-b.js') }}"></script>
@endpush