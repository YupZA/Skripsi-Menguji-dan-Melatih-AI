@extends('layouts.app')

@section('title', 'Bab 1 - AI')

@section('content')
    <div>
        <h1 class="mt-4">PENGENALAN GOOGLE TEACHABLE LEARNING MACHINE</h1>
        <div>
            <h2>2. Membuat Model Deteksi Suara</h2>
            <p>
                Proyek suara digunakan untuk melatih AI agar dapat mengenali berbagai jenis suara, seperti tepuk tangan,
                siulan, atau suara hewan. Langkah-langkahnya hampir sama dengan proyek gambar, dengan beberapa penyesuaian
                berikut:
            </p>
            <ol type="a">
                <p>
                    Proyek suara digunakan untuk melatih kecerdasan buatan agar dapat mengenali berbagai jenis suara, seperti tepuk tangan, siulan, atau suara hewan. Langkah-langkahnya hampir sama dengan proyek gambar, dengan beberapa penyesuaian berikut:
                </p>

                <li>Langkah 1: Membuka Halaman AI
                    <p>Buka website pembelajaran AI melalui browser, kemudian masuk ke halaman utama aplikasi.</p>
                    
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-a/gambar-1.jpg') }}" alt="Ilustrasi AI">
                        <span>Gambar C.11 Tampilan halaman utama website pembelajaran AI</span>
                    </div>
                </li>

                <li>Langkah 2: Memilih Menu Latih AI
                    <p>Klik menu Latih AI pada navigasi atau tombol Mulai Melatih yang tersedia pada halaman beranda.</p>
                    
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-a/gambar-2.jpg') }}" alt="Ilustrasi AI">
                        <span>Gambar C.12 Pengguna memilih menu Latih AI atau tombol Mulai Melatih untuk masuk ke halaman pelatihan AI</span>
                    </div>
                </li>

                <li>Langkah 3: Memilih Mode Latih Suara
                    <p>Pada halaman pilihan mode, pilih Latih Suara untuk melatih AI menggunakan data berupa rekaman suara.</p>
                    
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-a/gambar-3.jpg') }}" alt="Ilustrasi AI">
                        <span>Gambar C.13 Memilih menu Latih Suara agar AI dapat belajar mengenali suara yang direkam melalui mikrofon</span>
                    </div>
                </li>

                <li>Langkah 4: Membuat Kelas Suara
                    <p>Masukkan nama kelas pada kolom yang tersedia sesuai dengan jenis suara yang akan direkam. Jika ingin menambahkan kategori suara lainnya, klik tombol Tambah Kelas.</p>
                    
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-a/gambar-4.jpg') }}" alt="Ilustrasi AI">
                        <span>Gambar C.14 Menuliskan nama kelas sebagai kategori suara yang akan dipelajari oleh AI. Jika diperlukan kategori tambahan, pengguna dapat menekan tombol Tambah Kelas</span>
                    </div>
                </li>

                <li>Langkah 5: Merekam Suara
                    <p>Tekan tombol rekam, kemudian ucapkan atau bunyikan suara yang sesuai dengan nama kelas selama kurang lebih 3 detik. Lakukan perekaman untuk setiap kelas yang telah dibuat agar AI memiliki data untuk dipelajari.</p>
                    
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-a/gambar-5.jpg') }}" alt="Ilustrasi AI">
                        <span>Gambar C.15 Pengguna merekam suara selama 3 detik pada setiap kelas agar AI memperoleh contoh suara yang dapat dipelajari dan dibedakan</span>
                    </div>
                </li>

                <li>Langkah 6: Melatih AI
                    <p>Setelah seluruh rekaman suara selesai dibuat, klik tombol Latih AI untuk memulai proses pelatihan.</p>
                    
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-a/gambar-6.jpg') }}" alt="Ilustrasi AI">
                        <span>Gambar C.16 Menekan tombol Latih AI untuk memulai proses pembelajaran AI berdasarkan rekaman suara yang telah dikumpulkan.</span>
                    </div>
                </li>

                <li>Langkah 7: Menunggu Proses Pelatihan
                    <p>Tunggu hingga proses pelatihan selesai. Pada tahap ini, AI akan mempelajari pola dari setiap rekaman suara yang telah diberikan.</p>
                    
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-a/gambar-7.jpg') }}" alt="Ilustrasi AI">
                        <span>Gambar C.17 Tampilan pemberitahuan bahwa proses pelatihan AI telah selesai dan model siap digunakan untuk mengenali suara.</span>
                    </div>
                </li>

                <li>Langkah 8: Menguji AI
                    <p>Setelah pelatihan selesai, klik tombol Mulai Mendengar. Ucapkan suara yang ingin diuji, kemudian AI akan mencoba mengenali dan menampilkan kategori suara yang paling sesuai berdasarkan hasil pelatihan sebelumnya.</p>
                    
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-a/gambar-8.jpg') }}" alt="Ilustrasi AI">
                        <span>Gambar C.18 Menekan tombol Mulai Mendengar untuk menguji kemampuan AI dalam mengenali suara dan menampilkan hasil prediksinya.</span>
                    </div>
                </li>

                
            </ol>
            <p>
                <strong>Catatan Penting</strong>
                <ul>
                    <li>Rekam suara di tempat yang cukup tenang agar hasil pelatihan lebih baik.</li>
                    <li>Gunakan suara yang jelas dan sesuai dengan nama kelas yang dibuat.</li>
                    <li>Semakin banyak contoh rekaman yang diberikan, semakin baik kemampuan AI dalam mengenali suara.</li>
                    <li>•	Hindari suara yang terlalu pelan atau terlalu banyak gangguan (<i>noise</i>) agar hasil prediksi lebih akurat.</li>
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

    <form method="POST" action="{{ url('/materi/selesai') }}" class="mt-4">
        @csrf
        <input type="hidden" name="materi_id" value="8">

        <button type="submit" class="btn {{ $isCompleted ? 'btn-secondary' : 'btn-success' }}" {{ $isCompleted ? 'disabled' : '' }}>
            {{ $isCompleted ? 'Materi Sudah Selesai' : 'Tandai Materi Selesai' }}
        </button>
    </form>

    <section class="ai-interactive">
    <h2>Aktivitas 3.2</h2>
    <p>Klik jawaban yang tepat.</p>

    @php
    $questions = [
        ['text' => 'Audio Project digunakan untuk melatih AI mengenali suara.', 'answer' => 'benar'],
        ['text' => 'Untuk melatih AI mengenali suara, proyek yang dipilih adalah Audio Project.', 'answer' => 'salah'],
        ['text' => 'Kelas dapat dinamai Tepuk Tangan dan Siulan.', 'answer' => 'benar'],
        ['text' => 'Lingkungan bising membuat hasil AI lebih akurat.', 'answer' => 'salah'],
        ['text' => 'Variasi suara membantu AI mengenali pola.', 'answer' => 'benar'],
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
</section>

@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/interaktif/materi-3/materi-b.css') }}">
<link rel="stylesheet" href="{{ asset('css/materi/style_materi.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('js/interaktif/materi-3/materi-b.js') }}"></script>
@endpush