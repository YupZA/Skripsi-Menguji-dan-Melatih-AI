@extends('layouts.app')

@section('title', 'Bab 3 - AI')

@section('content')
    <div>
        <h1 class="mt-4">PRAKTIK MEMBUAT MODEL AI sederhana</h1>


        <div class="row">
            <div class="col-xl-10 col-md-5">
                <div class="card bg-light text-black mb-4">
                    <div class="card-body">Tujuan Pembelajaran :</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">

                        <div>Setelah mempelajari materi ini, siswa diharapkan :
                            <ul>
                                <li>Mampu secara mandiri membuat model AI sederhana menggunakan Teachable Machine.</li>
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
                Proyek gambar digunakan untuk melatih AI agar dapat mengenali dan membedakan berbagai jenis gambar, seperti
                bentuk tangan, ekspresi wajah, atau benda di sekitar. Berikut langkah-langkah yang dapat dilakukan:
            </p>
            <ol type="a">
                <li>Memulai Proyek Baru</li>
                <ul>
                    <li>Buka peramban (browser) seperti Google Chrome atau Mozilla Firefox.</li>
                    <li>Ketik alamat: https://teachablemachine.withgoogle.com.</li>
                    <li>Klik tombol “Get Started” untuk memulai.</li>
                    <li>Pilih jenis proyek “Image Project”.</li>
                    <li>Akan muncul dua pilihan:</li>
                    <ol>
                        <li>Standard Image Model – untuk penggunaan umum (pilihan ini yang digunakan).</li>
                        <li>Embedded Image Model – untuk perangkat kecil seperti Arduino.</li>
                    </ol>
                    <li>Pilih “Standard Image Model”.</li>
                </ul>
                <li>Menambahkan dan Mengatur Kelas (Class)
                    <br>Setiap model AI harus mengenali beberapa kategori yang disebut kelas (class).
                    <ul>
                        <li>Secara default, terdapat dua kelas bernama Class 1 dan Class 2.</li>
                        <li>Klik ikon pensil untuk mengganti nama kelas sesuai objek yang akan dilatih,
                            <br>Misalnya:
                            <ul>
                                <li>Class 1 → Tangan Terbuka</li>
                                <li>Class 2 → Tangan Tertutup</li>
                            </ul>
                        </li>

                        <li>Jika diperlukan, tambahkan kelas baru, seperti tangan membentuk huruf L.</li>
                    </ul>
                </li>


                <li>Mengumpulkan Data Latih (Training Data)</li>
                <p>
                    Langkah ini bertujuan memberikan contoh kepada AI agar dapat belajar. Ada dua cara untuk menambahkan
                    gambar ke setiap kelas:
                <ol>
                    <li>Menggunakan Webcam</li>
                    <ul>
                        <li>Klik tombol “Webcam” pada kelas yang dipilih.</li>
                        <li>Izinkan browser mengakses kamera.</li>
                        <li>Arahkan objek (misalnya tanganmu) ke kamera.</li>
                        <li>Tekan dan tahan tombol “Hold to Record” untuk merekam gambar dari berbagai posisi dan kondisi
                            pencahayaan.</li>
                    </ul>
                    <li>Mengunggah Gambar dari Komputer</li>
                    <br>Klik tombol “Upload”, lalu pilih gambar yang tersimpan di perangkatmu.
                    <br>Catatan Penting:
                    <ul>
                        <li>Pastikan jumlah gambar di setiap kelas seimbang.</li>
                        <li>Gunakan variasi posisi, latar belakang, dan pencahayaan agar model lebih akurat.</li>
                        <li>Semakin banyak contoh yang diberikan, semakin baik kemampuan AI dalam mengenali objek.</li>
                    </ul>

                </ol>
                </p>
                <li>
                    Melatih Model (Training)
                </li>
                <ol>
                    <li>Setelah seluruh kelas memiliki data gambar, klik tombol “Train Model”.</li>
                    <li>Tunggu proses pelatihan selesai (beberapa detik atau menit).</li>
                    <li>Status akan muncul seperti:</li>
                    <ul>
                        <li>“Preparing training data…”</li>
                        <li>“Training model…”</li>
                        <li>“Model trained!” berarti model telah siap digunakan.</li>
                    </ul>
                    <li>Jangan menutup tab saat proses ini berlangsung.</li>
                </ol>
                <br>Pada tahap ini, sistem mulai “belajar” dari data yang telah diberikan untuk mengenali pola pada gambar.
                <li>Menguji Model (Testing / Preview)</li>
                <ol>
                    <li>Lihat panel di sisi kanan berjudul “Preview”.</li>
                    <li>Pilih sumber input: Webcam atau Upload File.</li>
                    <li>Arahkan objek ke kamera, misalnya tangan terbuka.</li>
                    <li>Hasil akan muncul dalam bentuk persentase keyakinan AI terhadap setiap kelas,
                        <br>Misalnya:
                        <ul>
                            <li>“Tangan Terbuka: 95%”</li>
                            <li>“Tangan Tertutup: 5%”</li>
                        </ul>
                    </li>
                    <li>Jika hasilnya belum akurat, tambahkan lebih banyak gambar dan lakukan pelatihan ulang.</li>

                </ol>
            </ol>

        </div>
    </div>

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
    </section>

@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/interaktif/materi-3/materi-a.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/interaktif/materi-3/materi-a.js') }}"></script>
@endpush