@extends('layouts.app')

@section('title', 'Bab 3 - AI')

@section('content')
    <div>
        <h1 class="mt-4">PRAKTIK MEMBUAT MODEL AI SEDERHANA</h1>


        <div class="row">
            <div class="col-xl-10 col-md-5">
                <div class="card bg-light text-black mb-4">
                    <div class="card-body">Tujuan Pembelajaran :</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">

                        <div>Setelah mempelajari materi ini, siswa diharapkan :
                            <ul>
                                <li>Mampu secara mandiri membuat model <i>AI</i> sederhana.</li>
                                <li>Mampu mengumpulkan data, melatih model, dan menguji akurasi hasilnya.</li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div>
            <h2>1. Membuat Model Gambar</h2>
            <p>
                Proyek Gambar digunakan untuk melatih model kecerdasan buatan agar dapat mengenali dan membedakan objek pada
                gambar, seperti bekantan, monyet, bentuk tangan, ekspresi wajah, atau benda-benda di sekitar.

            </p>
            <p>
                Berikut langkah-langkah yang dapat dilakukan:
            </p>

            <ol type="a">
                <li>Langkah 1 : Membuka Halaman <i>AI</i>
                    <p>
                        Buka <i>website</i> pembelajaran <i>AI</i> melalui <i>browser</i>, kemudian masuk ke halaman utama
                        aplikasi.
                    </p>

                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-a/gambar-1.png') }}" alt="Ilustrasi AI">
                        <span>Gambar C.1 Tampilan halaman utama <i>website</i> pembelajaran <i>AI</i></span>
                    </div>
                </li>



                <li>Langkah 2 : Memilih Menu Latih <i>AI</i>
                    <p>Klik menu Latih <i>AI</i> pada navigasi atau tombol Mulai Melatih yang terdapat pada halaman beranda.
                    </p>
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-a/gambar-2.jpg') }}" alt="Ilustrasi AI">
                        <span>Gambar C.2 Pengguna memilih menu Latih <i>AI</i> atau tombol Mulai Melatih untuk masuk ke
                            halaman pelatihan <i>AI</i></span>
                    </div>
                </li>

                <li>Langkah 3: Memilih Mode Gambar
                    <p>Langkah Pada halaman pilihan mode, pilih Latih Gambar. Mode ini digunakan untuk melatih <i>AI</i>
                        menggunakan data berupa gambar.
                    </p>
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-a/gambar-3.jpg') }}" alt="Ilustrasi AI">
                        <span>Gambar C.3 Tampilan halaman pemilihan mode pelatihan AI dengan opsi Latih Gambar yang
                            dipilih</span>
                    </div>
                </li>

                <li>Langkah 4: Membuat Kelas Gambar
                    <p>Masukkan nama kelas pada kolom yang tersedia, misalnya bekantan, monyet, atau ikan gabus. Jika ingin
                        menambahkan kategori lain, klik tombol Tambah Kelas menguji model.
                    </p>
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-a/gambar-4.jpg') }}" alt="Ilustrasi AI">
                        <span>Gambar C.4 Menuliskan nama kelas pada kolom yang tersedia sebagai kategori gambar yang akan
                            digunakan untuk melatih AI</span>
                    </div>
                </li>

                <li>Langkah 5: Mengunggah Gambar
                    <p>Pilih beberapa gambar dari galeri perangkat yang sesuai dengan nama kelas yang telah dibuat.
                        Gambar-gambar ini akan menjadi contoh yang digunakan kecerdasan buatan untuk belajar mengenali
                        objek.
                    </p>
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-a/gambar-5.png') }}" alt="Ilustrasi AI">
                        <span>Gambar C.5 Setiap kelas diisi dengan beberapa gambar contoh</span>
                    </div>
                </li>

                <li>Langkah 6: Melatih AI
                    <p>Setelah semua gambar berhasil dipilih, klik tombol Latih AI. Sistem akan mempelajari gambar-gambar
                        yang telah diunggah untuk membuat model AI.
                    </p>
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-a/gambar-6.jpg') }}" alt="Ilustrasi AI">
                        <span>Gambar C.6 Menekan tombol Latih AI untuk memulai proses pembelajaran AI berdasarkan gambar-gambar yang telah diunggah</span>
                    </div>
                </li>

                <li>Langkah 7: Menunggu Proses Pelatihan
                    <p>Tunggu hingga proses pelatihan selesai. Lama proses bergantung pada jumlah gambar yang digunakan. Setelah selesai, AI siap digunakan untuk melakukan prediksi.                    </p>
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-a/gambar-7.jpg') }}" alt="Ilustrasi AI">
                        <span>Gambar C.7 Tampilan pemberitahuan bahwa proses pelatihan AI telah selesai dan model siap digunakan untuk melakukan pengujian</span>
                    </div>
                </li>

                <li>Langkah 8: Menguji AI
                    <p>Pada bagian Tes Gambar, pilih gambar yang ingin diuji. Sebaiknya gunakan gambar yang berbeda dari gambar yang digunakan saat pelatihan.</p>
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-a/gambar-8.jpg') }}" alt="Ilustrasi AI">
                        <span>Gambar C.8 Memilih gambar uji pada bagian Tes Gambar untuk menguji kemampuan AI dalam mengenali objek yang terdapat pada gambar</span>
                    </div>
                </li>

                <li>Langkah 9: Melihat Hasil Prediksi
                    <p>Klik tombol Prediksi untuk melihat hasil pengenalan gambar oleh AI. Sistem akan menampilkan kelas yang menurut AI paling sesuai dengan gambar yang diuji.</p>
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-a/gambar-9.jpg') }}" alt="Ilustrasi AI">
                        <span>Gambar C.9 Menekan tombol Prediksi untuk melihat hasil pengenalan objek berdasarkan model AI yang telah dilatih sebelumnya</span>
                    </div>

                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-a/gambar-10.jpg') }}" alt="Ilustrasi AI">
                        <span>Gambar C.10 Sistem menampilkan hasil prediksi berupa nama kelas yang dikenali beserta persentase tingkat keyakinan AI terhadap hasil tersebut</span>
                    </div>
                </li>
            </ol>

            <strong>Catatan Penting</strong>
            <ul>
                
                <li>Gunakan gambar yang jelas agar kecerdasan buatan lebih mudah mengenali objek.</li>
                <li>Setiap kelas sebaiknya memiliki beberapa gambar sebagai contoh.</li>
                <li>Semakin banyak dan beragam gambar yang digunakan, semakin baik kemampuan kecerdasan buatan dalam melakukan prediksi.</li>
            </ul>

        </div>
    </div>

    @php
        use App\Models\Materi;
        use App\Models\UserProgress;

        // ambil materi 
        $materi = Materi::where('slug', 'bab-3-materi-a')->first();

        // cek progress
        $isCompleted = UserProgress::where('user_id', auth()->id())
            ->where('materi_id', $materi->id ?? 0)
            ->where('status', 'completed')
            ->exists();
    @endphp

    <div id="progress"></div>

    


    <section class="ai-debug">
        <h2>Aktivitas 3.1</h2>
        <p class="debug-desc">
            Perhatikan kasus berikut, lalu pilih penyebab yang paling masuk akal.
        </p>

        <div class="debug-card" data-answer="b">
            <h4>Kasus 1</h4>
            <p>
                Sebuah model AI sering salah membedakan Tangan Terbuka dan Tangan Tertutup, terutama ketika posisi tangan
                sedikit miring. Apa penyebab paling mungkin?
            </p>
            <div class="debug-options">
                <button onclick="checkDebug(this, 'a')">Browser tidak kompatibel</button>
                <button onclick="checkDebug(this, 'b')">Data gambar kurang bervariasi</button>
                <button onclick="checkDebug(this, 'c')">Model belum diekspor</button>
                <button onclick="checkDebug(this, 'd')">Webcam rusak</button>
            </div>

            <div class="debug-feedback"></div>
        </div>

        <div class="debug-card" data-answer="b">
            <h4>Kasus 2</h4>
            <p>
                Jumlah gambar pada Class 1 = 120 gambar, sedangkan Class 2 = 20 gambar. Hasil prediksi sering condong ke
                Class 1 meskipun objeknya salah. Apa kesalahan utama yang terjadi?
            </p>

            <div class="debug-options">
                <button onclick="checkDebug(this, 'a')">Salah memilih Image Project</button>
                <button onclick="checkDebug(this, 'b')">Data tiap kelas tidak seimbang</button>
                <button onclick="checkDebug(this, 'c')">Kamera terlalu dekat</button>
                <button onclick="checkDebug(this, 'd')">Belum klik “Preview”</button>
            </div>

            <div class="debug-feedback"></div>
        </div>

        <div class="debug-card" data-answer="a">
            <h4>Kasus 3</h4>
            <p>
                Saat tombol Train Model ditekan, proses pelatihan berjalan sangat lama dan browser menjadi lambat. Apa
                penyebab yang PALING masuk akal?
            </p>

            <div class="debug-options">
                <button onclick="checkDebug(this, 'a')">Terlalu banyak tab browser terbuka</button>
                <button onclick="checkDebug(this, 'b')">Jumlah data gambar sangat sedikit</button>
                <button onclick="checkDebug(this, 'c')">Tidak menamai kelas</button>
                <button onclick="checkDebug(this, 'd')">Salah memilih Webcam</button>
            </div>

            <div class="debug-feedback"></div>
        </div>

        <div class="debug-card" data-answer="b">
            <h4>Kasus 4</h4>
            <p>
                Model AI sudah selesai dilatih, tetapi saat diuji hasil prediksi sering berubah-ubah walaupun objeknya sama.
                Kesalahan apa yang kemungkinan terjadi?
            </p>

            <div class="debug-options">
                <button onclick="checkDebug(this, 'a')">Tidak login akun Google</button>
                <button onclick="checkDebug(this, 'b')">Pencahayaan dan latar belakang tidak konsisten</button>
                <button onclick="checkDebug(this, 'c')">Salah memilih Standard Image Model</button>
                <button onclick="checkDebug(this, 'd')">Preview belum dibuka</button>
            </div>

            <div class="debug-feedback"></div>
        </div>

        <div class="debug-card" data-answer="c">
            <h4>Kasus 5</h4>
            <p>
                Saat diuji, AI selalu menampilkan persentase rendah (misalnya 50% – 50%) untuk dua kelas. Apa solusi TERBAIK
                untuk memperbaiki model?
            </p>

            <div class="debug-options">
                <button onclick="checkDebug(this, 'a')">Mengganti browser</button>
                <button onclick="checkDebug(this, 'b')">Mengurangi jumlah kelas</button>
                <button onclick="checkDebug(this, 'c')">Menambah dan memperbaiki data latih</button>
                <button onclick="checkDebug(this, 'd')">Menghapus Preview</button>
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
    <link rel="stylesheet" href="{{ asset('css/interaktif/materi-3/materi-a.css') }}">
    <link rel="stylesheet" href="{{ asset('css/materi/style_materi.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/interaktif/materi-3/materi-a.js') }}"></script>
@endpush