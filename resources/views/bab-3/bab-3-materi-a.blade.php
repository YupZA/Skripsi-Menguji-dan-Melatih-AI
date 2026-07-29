@extends('layouts.app')

@section('title', 'Bab 3 - AI')

@section('content')
    <div>
        <h1 class="mt-4">PRAKTIK MEMBUAT MODEL <i>AI</i> SEDERHANA</h1>


        <div class="row">
            <div class="col-xl-10 col-md-5">
                <div class="card bg-light text-black mb-4">
                    <div class="card-body">Tujuan Pembelajaran :</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">

                        <div>Setelah mempelajari materi ini, siswa diharapkan :
                            <ul>
                                <li>Mampu membuat model kecerdasan buatan sederhana secara mandiri.</li>
                                <li>Mampu mengumpulkan data, melatih model, dan menguji akurasi hasil prediksi.</li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div>
            <h2>1. Membuat Model Gambar</h2>
            <p>
                Proyek gambar digunakan untuk melatih kecerdasan buatan agar dapat mengenali dan membedakan objek pada
                gambar, seperti bekantan, monyet, bentuk tangan, ekspresi wajah, atau benda di sekitar.
            </p>
            <p>
                Berikut langkah-langkah yang dapat dilakukan:
            </p>

            <ol type="a">
                <li>Langkah 1 : Membuka Website Pembelajaran Kecerdasan Buatan
                    <p>
                        Buka website pembelajaran kecerdasan buatan melalui browser, kemudian masuk ke halaman utama
                        aplikasi. Pada halaman ini tersedia menu navigasi serta fitur untuk mengakses materi dan pelatihan
                        kecerdasan buatan. Tampilan halaman utama website pembelajaran kecerdasan buatan dapat dilihat pada
                        Gambar C.1.
                    </p>

                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-a/gambar-1.png') }}" alt="Ilustrasi AI">
                        <span>Gambar C.1 Tampilan halaman utama <i>website</i> pembelajaran <i>AI</i></span>
                    </div>
                </li>


                <li>Langkah 2 : Memilih Menu Latih <i>AI</i>
                    <p>
                        Klik menu Latih AI pada navigasi atau tombol Mulai Melatih yang terdapat pada halaman beranda untuk
                        masuk ke halaman pelatihan kecerdasan buatan. Letak menu dan tombol tersebut dapat dilihat pada
                        Gambar C.2.
                    </p>
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-a/gambar-2.jpg') }}" alt="Ilustrasi AI">
                        <span>Gambar C.2 Pengguna memilih menu Latih <i>AI</i> atau tombol Mulai Melatih untuk masuk ke
                            halaman pelatihan <i>AI</i></span>
                    </div>
                </li>

                <li>Langkah 3: Memilih Mode Gambar
                    <p>
                        Pada halaman pemilihan mode pelatihan, pilih Latih Gambar. Mode ini digunakan untuk melatih
                        kecerdasan buatan menggunakan data berupa gambar. Tampilan halaman pemilihan mode dapat dilihat pada
                        Gambar C.3.
                    </p>
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-a/gambar-3.jpg') }}" alt="Ilustrasi AI">
                        <span>Gambar C.3 Tampilan halaman pemilihan mode pelatihan AI dengan opsi Latih Gambar yang
                            dipilih</span>
                    </div>
                </li>

                <li>Langkah 4: Membuat Kelas Gambar
                    <p>
                        Masukkan nama kelas pada kolom yang tersedia. Nama kelas merupakan kategori objek yang akan dikenali
                        oleh kecerdasan buatan, misalnya Papuyu, Gabus, Bekantan, atau Monyet. Jika ingin menambahkan
                        kategori lain, klik tombol Tambah Kelas. Contoh pengisian nama kelas dapat dilihat pada Gambar C.4.
                    </p>
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-a/gambar-4.jpg') }}" alt="Ilustrasi AI">
                        <span>Gambar C.4 Menuliskan nama kelas pada kolom yang tersedia sebagai kategori gambar yang akan
                            digunakan untuk melatih AI</span>
                    </div>
                </li>

                <li>Langkah 5: Mengunggah Gambar
                    <p>
                        Klik tombol Choose Files pada setiap kelas, kemudian pilih beberapa gambar yang sesuai dengan
                        kategori yang telah dibuat. Setelah gambar berhasil dipilih, sistem akan menampilkan jumlah gambar
                        dan pratinjau gambar yang telah diunggah. Contohnya dapat dilihat pada Gambar C.5.
                    </p>
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-a/gambar-5.jpg') }}" alt="Ilustrasi AI">
                        <span>Gambar C.5 Setiap kelas diisi dengan beberapa gambar contoh</span>
                    </div>
                </li>

                <li>Langkah 6: Melatih Kecerdasan Buatan
                    <p>
                        Setelah seluruh kelas memiliki data gambar, klik tombol Latih AI untuk memulai proses pelatihan.
                        Sistem akan mempelajari pola dari gambar-gambar yang telah diunggah untuk membentuk model kecerdasan
                        buatan. Tombol pelatihan dapat dilihat pada Gambar C.6.
                    </p>
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-a/gambar-6.jpg') }}" alt="Ilustrasi AI">
                        <span>Gambar C.6 Menekan tombol Latih AI untuk memulai proses pembelajaran AI berdasarkan
                            gambar-gambar yang telah diunggah</span>
                    </div>
                </li>

                <li>Langkah 7: Menunggu Proses Pelatihan
                    <p>
                        Tunggu hingga proses pelatihan selesai. Lama proses pelatihan bergantung pada jumlah data gambar
                        yang digunakan. Setelah selesai, sistem akan menampilkan pemberitahuan bahwa model telah siap
                        digunakan untuk melakukan prediksi. Tampilan tersebut dapat dilihat pada Gambar C.7.
                    </p>
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-a/gambar-7.jpg') }}" alt="Ilustrasi AI">
                        <span>Gambar C.7 Tampilan pemberitahuan bahwa proses pelatihan AI telah selesai dan model siap
                            digunakan untuk melakukan pengujian</span>
                    </div>
                </li>

                <li>Langkah 8: Menguji Kecerdasan Buatan
                    <p>
                        Pada bagian Uji Model AI, klik tombol Choose File untuk memilih gambar baru yang akan diuji.
                        Sebaiknya gunakan gambar yang berbeda dari gambar yang digunakan saat proses pelatihan agar
                        kemampuan model dapat diuji dengan lebih baik. Bagian pemilihan gambar uji dapat dilihat pada Gambar
                        C.8.
                    </p>
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-a/gambar-8.jpg') }}" alt="Ilustrasi AI">
                        <span>Gambar C.8 Memilih gambar uji pada bagian Tes Gambar untuk menguji kemampuan AI dalam
                            mengenali objek yang terdapat pada gambar</span>
                    </div>
                </li>

                <li>Langkah 9: Melihat Hasil Prediksi
                    <p>
                        Setelah gambar uji berhasil dipilih, klik tombol Prediksi Gambar. Sistem akan menganalisis gambar
                        tersebut dan menampilkan hasil prediksi berdasarkan model yang telah dilatih sebelumnya. Tombol
                        prediksi dapat dilihat pada Gambar C.9.
                    </p>
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-a/gambar-9.jpg') }}" alt="Ilustrasi AI">
                        <span>Gambar C.9 Menekan tombol Prediksi untuk melihat hasil pengenalan objek berdasarkan model AI
                            yang telah dilatih sebelumnya</span>
                    </div>

                </li>

                <li>Langkah 10: Melihat Hasil Prediksi
                    <p>
                        Setelah proses prediksi selesai, sistem akan menampilkan nama kelas yang dikenali, tingkat keyakinan
                        model terhadap hasil prediksi, serta persentase keyakinan untuk setiap kelas. Tampilan hasil
                        prediksi dapat dilihat pada Gambar C.10.
                    </p>
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-3/materi-a/gambar-10.png') }}" alt="Ilustrasi AI">
                        <span>Gambar C.10 Sistem menampilkan hasil prediksi berupa nama kelas yang dikenali beserta
                            persentase tingkat keyakinan AI terhadap hasil tersebut</span>
                    </div>
                </li>
            </ol>

            <strong>Catatan Penting</strong>
            <ul>

                <li>Gunakan gambar yang jelas dan memiliki pencahayaan yang baik agar model lebih mudah mengenali objek.
                </li>
                <li>Setiap kelas sebaiknya memiliki beberapa gambar sebagai contoh pelatihan.</li>
                <li>Gunakan variasi gambar dari sudut, ukuran, dan kondisi yang berbeda agar model dapat mengenali objek
                    dengan lebih baik.</li>
                <li>Semakin banyak dan beragam data gambar yang digunakan, semakin baik kemampuan model dalam melakukan
                    prediksi.</li>
                <li>Untuk menguji kemampuan model secara objektif, gunakan gambar yang berbeda dari gambar yang digunakan
                    saat pelatihan.</li>
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
        <h2>Aktivitas 1 : Menganalisis Penyebab Kesalahan pada Sistem <i>AI</i></h2>
        <p>
            Tujuan Aktivitas <br>Setelah menyelesaikan aktivitas ini, siswa diharapkan mampu menganalisis penyebab kesalahan
            pada proses pelatihan dan pengujian model kecerdasan buatan serta menentukan solusi yang tepat.
        </p>
        <p class="debug-desc">
            Petunjuk Pengerjaan :
        </p>
        <ul>
            <li>Bacalah setiap kasus dengan saksama.</li>
            <li>Analisis penyebab kesalahan yang terjadi pada sistem kecerdasan buatan.</li>
            <li>Pilih satu jawaban yang paling tepat berdasarkan konsep pelatihan model <i>AI</i> yang telah dipelajari.
            </li>
            <li>Kerjakan seluruh kasus hingga selesai.</li>
            <li>Setelah semua jawaban dipilih, <i>klik</i> tombol <strong>Kumpul Aktivitas</strong>.</li>
        </ul>

        <div class="debug-card" data-answer="b">
            <h4>Kasus 1</h4>
            <p>
                Sebuah model <i>AI</i> sering salah membedakan Tangan Terbuka dan Tangan Tertutup, terutama ketika posisi
                tangan sedikit miring. Penyebab paling mungkin dari masalah tersebut adalah ....
            </p>
            <div class="debug-options">
                <button onclick="checkDebug(this, 'a')">Browser tidak kompatibel</button>
                <button onclick="checkDebug(this, 'b')">Data gambar kurang bervariasi</button>
                <button onclick="checkDebug(this, 'c')">Model belum diekspor</button>
                <button onclick="checkDebug(this, 'd')"><i>Webcam</i> rusak</button>
            </div>

            <div class="debug-feedback"></div>
        </div>

        <div class="debug-card" data-answer="b">
            <h4>Kasus 2</h4>
            <p>
                Jumlah gambar pada <i>Class</i> 1 sebanyak 120 gambar, sedangkan <i>Class</i> 2 sebanyak 20 gambar. Hasil
                prediksi sering condong ke <i>Class</i> 1 meskipun objeknya salah. Kesalahan utama yang terjadi adalah ....
            </p>

            <div class="debug-options">
                <button onclick="checkDebug(this, 'a')">Salah memilih <i>Image Project</i></button>
                <button onclick="checkDebug(this, 'b')">Data tiap kelas tidak seimbang</button>
                <button onclick="checkDebug(this, 'c')">Kamera terlalu dekat</button>
                <button onclick="checkDebug(this, 'd')">Belum klik “<i>Preview</i>”</button>
            </div>

            <div class="debug-feedback"></div>
        </div>

        <div class="debug-card" data-answer="a">
            <h4>Kasus 3</h4>
            <p>
                Saat proses <i>Train Model</i> dijalankan, pelatihan berlangsung sangat lama dan <i>browser</i> menjadi
                lambat. Penyebab yang paling mungkin adalah ....
            </p>

            <div class="debug-options">
                <button onclick="checkDebug(this, 'a')">Terlalu banyak <i>tab browser</i> terbuka</button>
                <button onclick="checkDebug(this, 'b')">Jumlah data gambar sangat sedikit</button>
                <button onclick="checkDebug(this, 'c')">Tidak menamai kelas</button>
                <button onclick="checkDebug(this, 'd')">Salah memilih <i>Webcam</i></button>
            </div>

            <div class="debug-feedback"></div>
        </div>

        <div class="debug-card" data-answer="b">
            <h4>Kasus 4</h4>
            <p>
                Model <i>AI</i> sudah selesai dilatih, tetapi saat diuji hasil prediksi sering berubah-ubah walaupun
                objeknya sama. Kesalahan yang kemungkinan terjadi adalah ....
            </p>

            <div class="debug-options">
                <button onclick="checkDebug(this, 'a')">Tidak <i>login</i> akun Google</button>
                <button onclick="checkDebug(this, 'b')">Pencahayaan dan latar belakang tidak konsisten</button>
                <button onclick="checkDebug(this, 'c')">Salah memilih <i>Standard Image Model</i></button>
                <button onclick="checkDebug(this, 'd')"><i>Preview</i> belum dibuka</button>
            </div>

            <div class="debug-feedback"></div>
        </div>

        <div class="debug-card" data-answer="c">
            <h4>Kasus 5</h4>
            <p>
                Saat diuji, <i>AI</i> selalu menampilkan persentase rendah, misalnya 50%–50%, untuk dua kelas. Solusi
                terbaik untuk memperbaiki model adalah ....
            </p>

            <div class="debug-options">
                <button onclick="checkDebug(this, 'a')">Mengganti <i>browser</i></button>
                <button onclick="checkDebug(this, 'b')">Mengurangi jumlah kelas</button>
                <button onclick="checkDebug(this, 'c')">Menambah dan memperbaiki data latih</button>
                <button onclick="checkDebug(this, 'd')">Menghapus <i>Preview</i></button>
            </div>

            <div class="debug-feedback"></div>
        </div>

        <form method="POST" action="{{ url('/materi/selesai') }}" class="mt-4" id="formSelesai">

            @csrf

            <input type="hidden" name="materi_id" value="{{ $materi->id }}">

            @if ($isCompleted)
                <div class="activity-info">
                    <i class="fas fa-circle-info"></i>

                    <div>
                        <strong>Mode Latihan</strong>

                        <p>
                            Aktivitas ini telah diselesaikan. Kamu dapat mengulanginya
                            sebagai latihan tanpa mengubah penyelesaian materi sebelumnya.
                        </p>
                    </div>
                </div>
            @endif

            <div class="activity-buttons">
                <button type="submit" id="btnSelesai" class="btn-check-activity"
                    data-completed="{{ $isCompleted ? 'true' : 'false' }}">

                    <i class="fas fa-check"></i>

                    {{ $isCompleted ? 'Periksa Hasil Latihan' : 'Kumpul Aktivitas' }}
                </button>

                <button type="button" id="btnUlangi" class="btn-repeat-activity" onclick="resetDebugActivity()">

                    <i class="fas fa-rotate-right"></i>
                    Ulangi Latihan
                </button>
            </div>

            <div id="scoreInfo" class="score-info"></div>
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