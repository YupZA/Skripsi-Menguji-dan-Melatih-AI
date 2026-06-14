@extends('layouts.app')

@section('title', 'Bab 1 - AI')

@section('content')
    <div>
        <h1 class="mt-4">Mengenal AI dan Dasar - Dasar Machine Learning</h1>

        <h2><strong>3. Langkah-Langkah Proses Machine Learning</strong></h2>
        <p>
            Kecerdasan buatan (<i>Artificial Intelligence</i>) membuat komputer bisa berpikir dan melakukan sesuatu seperti
            manusia. Salah satu cara agar komputer menjadi pintar adalah melalui <i>machine learning</i> yaitu proses ketika
            komputer belajar dari data dan pengalaman, bukan dari perintah langsung. Supaya komputer bisa belajar dengan
            baik, ada beberapa langkah penting yang perlu dilakukan.
        </p>
        <ol type="a">
            <li>
                <strong>Mengumpulkan Data (Data Collection)</strong>
            </li>
            <p>
                Langkah pertama adalah mengumpulkan data yang akan digunakan untuk melatih komputer.
            </p>
            <p>
                Data ini bisa berupa:
            </p>
            <ul>
                <li>Gambar, misalnya foto hewan, benda, atau wajah.</li>
                <li>Suara, seperti suara manusia, musik, atau hewan.</li>
                <li>Teks, seperti kalimat, kata, atau tulisan tangan.</li>
                <li>Gerakan, seperti pose tubuh atau ekspresi wajah.</li>
            </ul>

            <div class="materi-image">
                <img src="{{ asset('images/bab-1/materi-c/gambar-1.png') }}" alt="Ilustrasi AI">
                <span>Gambar A.9 Jenis data dalam kecerdasan buatan</span>
            </div>

            <div class="fun-fact">
                <p>
                    Gambar A.9 menunjukkan beberapa jenis data yang dapat digunakan dalam kecerdasan buatan, yaitu data
                    gambar, data suara, data teks, dan data gerakan tubuh.
                </p>
            </div>

            <p>
                Data berfungsi sebagai bahan belajar bagi komputer. Tanpa data, komputer tidak akan tahu apa yang harus
                dipelajari.
            </p>
            <p>Contoh :</p>
            <p>
                Pengajaran komputer dalam membedakan bekantan dan monyet memerlukan banyak gambar bekantan dan monyet
                sebagai data pelatihan. Gambar-gambar itu bisa dari berbagai warna, bentuk, dan posisi agar komputer lebih
                mudah mengenalinya. Semakin banyak dan bervariasi data yang diberikan, semakin pintar komputer belajar
                mengenali perbedaan di antara objek tersebut.
            </p>
            <li>
                <strong>Menyiapkan dan Membersihkan Data (<i>Data Preparation & Cleaning</i>)</strong>
            </li>
            <p>
                Setelah data terkumpul, data perlu disiapkan dan dibersihkan agar dapat digunakan. Tahap ini dapat
                diibaratkan seperti merapikan buku pelajaran sebelum belajar. Data yang rapi dan jelas akan membantu
                komputer belajar dengan lebih cepat dan akurat.
            </p>
            <p>
                Beberapa hal yang dilakukan pada tahap ini antara lain:
            </p>
            <ul>
                <li>Menghapus data yang rusak, buram, atau duplikat.</li>
                <li>Mengubah ukuran atau <i>format data</i> agar seragam (misalnya, semua gambar berukuran sama).</li>
                <li>Memberi label pada data, supaya komputer tahu mana gambar bekantan dan mana gambar monyet.</li>
            </ul>

            <div class="materi-image">
                <img src="{{ asset('images/bab-1/materi-c/gambar-2.png') }}" alt="Ilustrasi AI">
                <span>Gambar A.10 Contoh kualitas data bersih dan kotor untuk <i>machine learning</i></span>
            </div>

            <div class="fun-fact">
                <p>
                    Gambar A.10 menunjukkan perbedaan antara data bersih dan data kotor. Data bersih memiliki kualitas yang
                    baik sehingga membantu komputer belajar dengan lebih akurat, sedangkan data kotor dapat menyebabkan
                    kesalahan dalam hasil.
                </p>
            </div>

            <li>
                <strong>Melatih Model (<i>Training Model</i>)</strong>
            </li>
            <p>
                Semua data yang telah disiapkan dimasukkan ke dalam sistem, kemudian komputer mencari pola atau ciri khas
                dari setiap data. Melalui proses pembelajaran tersebut, terbentuk model kecerdasan buatan, yaitu sistem yang
                berisi pengetahuan hasil pembelajaran dari data.
            </p>
            <p>Contoh :</p>
            <p>
                Ketika melihat banyak gambar “bekantan”, komputer mulai mengenali ciri khas bekantan seperti:
            </p>
            <ul>
                <li>Hidung yang panjang dan besar</li>
                <li>Warna bulu cokelat kemerahan</li>
                <li>Bentuk wajah yang khas</li>
                <li>Ukuran tubuh yang relatif besar</li>
            </ul>
            <div class="materi-image">
                <img src="{{ asset('images/bab-1/materi-c/gambar-3.png') }}" alt="Ilustrasi AI">
                <span>Gambar A.11 Model AI mempelajari ciri-ciri bekantan dan monyet dari data yang telah dikumpulkan
                    sehingga dapat membedakan kedua jenis hewan tersebut</span>
            </div>

            <div class="fun-fact">
                <p>
                    Gambar A.11 menggambarkan proses pembelajaran model kecerdasan buatan dengan memanfaatkan data gambar.
                    Model mengidentifikasi pola dan ciri khas dari setiap objek agar mampu melakukan klasifikasi dengan
                    tepat.
                </p>
            </div>

            <p>
                Begitu juga saat melihat gambar “bekantan”, komputer mengenali cirinya yang berbeda. Akhirnya, komputer
                mulai bisa membedakan mana gambar bekantan dan mana gambar monyet. Tahap ini sama seperti manusia yang
                belajar dari contoh semakin banyak berlatih, semakin pintar hasilnya.
            </p>
            <li>
                <strong>Menguji Model (<i>Testing Model</i>)</strong>
            </li>
            <p>
                Langkah selanjutnya setelah model selesai dilatih adalah menguji kemampuan model tersebut. Pengujian
                dilakukan dengan memasukkan data baru yang belum pernah dipelajari oleh komputer, kemudian hasil prediksi
                diamati untuk melihat ketepatannya. Tujuan pengujian ini adalah memastikan bahwa komputer benar-benar
                memahami pola, bukan sekadar menghafal data pelatihan.
            </p>
            <p>Contoh :</p>
            <p>
                Sebuah gambar hewan yang belum pernah digunakan sebelumnya dimasukkan ke dalam model.
                Model kemudian mencoba melakukan prediksi:
            </p>
            <p>“Gambar ini termasuk bekantan atau monyet?”</p>

            <div class="materi-image">
                <img src="{{ asset('images/bab-1/materi-c/gambar-4.png') }}" alt="Ilustrasi AI">
                <span>Gambar A.12 Model dapat menganalisis ciri-ciri hewan pada gambar dan menentukan apakah hewan tersebut
                    termasuk bekantan atau monyet</span>
            </div>

            <div class="fun-fact">
                <p>
                    Gambar A.12 menunjukkan bagaimana kecerdasan buatan menentukan apakah suatu gambar termasuk bekantan
                    atau monyet berdasarkan hasil analisisnya.
                </p>
            </div>

            <p>
                Apabila model dapat melakukan prediksi dengan benar, hasil pembelajaran model tersebut dapat dikatakan baik.
                Namun, apabila prediksi yang dihasilkan masih salah, model perlu diperbaiki atau diberikan data tambahan.
                Pengujian model penting dilakukan untuk mengetahui apakah komputer benar-benar mampu mengenali pola dari
                data yang telah dipelajari.
            </p>

            <li>
                <strong>Menggunakan Model untuk Prediksi</strong>
            </li>

            <p>
                Setelah model bekerja dengan baik, maka model siap digunakan untuk membantu manusia. Tahap ini disebut
                prediksi, karena model akan menebak atau mengenali hal baru berdasarkan apa yang sudah dipelajarinya.
            </p>
            <p>Contoh :</p>
            <ul>
                <li>Model bisa mengenali wajah di kamera ponsel (<i>Face Recognition</i>).</li>
                <li>Model bisa mendeteksi apakah seseorang sedang tersenyum atau tidak.</li>
                <li>Model bisa mengenali suara dan menjawab perintah seperti pada Google Assistant atau Siri.</li>
                <li>Model bisa menebak apakah suatu foto berisi burung bekantan atau yang lain.</li>
            </ul>

            <div class="materi-image">
                <img src="{{ asset('images/bab-1/materi-c/gambar-5.png') }}" alt="Ilustrasi AI">
                <span>Gambar A.13 Contoh penerapan kecerdasan buatan dalam kehidupan sehari-hari</span>
            </div>

            <div class="fun-fact">
                <p>
                    Gambar A.13 memperlihatkan berbagai implementasi teknologi kecerdasan buatan, meliputi pengenalan wajah,
                    asisten berbasis suara, deteksi ekspresi, serta klasifikasi objek.
                </p>
            </div>

            <p>Analogi untuk mempermudah pemahaman dapat dilihat pada proses mengenali bekantan dan monyet.</p>

            <ol>
                <li>Mengumpulkan data : Banyak gambar bekantan dan monyet dikumpulkan sebagai bahan pelatihan.
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-1/materi-c/gambar-6.png') }}" alt="Ilustrasi AI">
                        <span>Gambar A.14 Ilustrasi tahap mengumpulkan data pada proses pembelajaran kecerdasan buatan untuk
                            mengenali bekantan dan monyet</span>
                    </div>

                    <div class="fun-fact">
                        <p>
                            Gambar A.14 memperlihatkan langkah pertama dalam proses pembelajaran kecerdasan buatan, yaitu mengumpulkan data. Pada tahap ini, berbagai gambar bekantan dan monyet dikumpulkan sebagai bahan pelatihan agar model kecerdasan buatan memiliki cukup contoh untuk mempelajari perbedaan ciri dari kedua hewan tersebut.
                        </p>
                    </div>
                </li>
                <li>Menyiapkan data : Setiap gambar diberi label, misalnya “Bekantan” atau “Monyet”.
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-1/materi-c/gambar-7.png') }}" alt="Ilustrasi AI">
                        <span>Gambar A.15 Ilustrasi tahap menyiapkan data dengan memberi label pada gambar bekantan dan monyet.</span>
                    </div>

                    <div class="fun-fact">
                        <p>
                            Gambar A.15 memperlihatkan langkah kedua dalam proses pembelajaran kecerdasan buatan, yaitu menyiapkan data. Pada tahap ini, gambar bekantan dan monyet yang telah dikumpulkan diberi label sesuai kategorinya. Pemberian label yang jelas membantu komputer membedakan setiap jenis data dengan lebih tepat sebelum model dilatih.
                        </p>
                    </div>
                </li>
                <li>Melatih model : Komputer mempelajari ciri-ciri yang membedakan bekantan dan monyet.
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-1/materi-c/gambar-8.png') }}" alt="Ilustrasi AI">
                        <span>Gambar A.16 Ilustrasi tahap melatih model kecerdasan buatan untuk mengenali pola gambar bekantan dan monyet.</span>
                    </div>

                    <div class="fun-fact">
                        <p>
                            Gambar A.16 memperlihatkan langkah ketiga dalam proses pembelajaran kecerdasan buatan, yaitu melatih model. Pada tahap ini, data gambar bekantan dan monyet yang telah diberi label dimasukkan ke dalam sistem. Komputer kemudian mempelajari ciri-ciri pembeda dari kedua kategori tersebut, seperti hidung panjang, wajah kemerahan, warna bulu, dan bentuk wajah, sehingga model dapat mengenali pola data dengan lebih baik.
                        </p>
                    </div>
                </li>
                <li>Menguji model : Gambar baru dimasukkan, kemudian komputer mencoba memprediksi apakah gambar tersebut
                    termasuk bekantan atau monyet.
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-1/materi-c/gambar-9.png') }}" alt="Ilustrasi AI">
                        <span>Gambar A.17 Ilustrasi tahap menguji model kecerdasan buatan untuk memprediksi gambar baru.</span>
                    </div>

                    <div class="fun-fact">
                        <p>
                            Gambar A.17 memperlihatkan langkah keempat dalam proses pembelajaran kecerdasan buatan, yaitu menguji model. Pada tahap ini, gambar baru yang belum digunakan dalam pelatihan dimasukkan ke dalam sistem. Komputer kemudian mencoba memprediksi apakah gambar tersebut termasuk bekantan atau monyet. Pengujian dilakukan untuk mengetahui kemampuan model dalam mengenali data baru dengan tepat.
                        </p>
                    </div>
                </li>
                <li>Menggunakan model : apabila hasil prediksi sudah sering benar, model dapat digunakan untuk membantu
                    mengenali gambar hewan serupa secara otomatis.
                    <div class="materi-image">
                        <img src="{{ asset('images/bab-1/materi-c/gambar-10.png') }}" alt="Ilustrasi AI">
                        <span>Gambar A.18 Ilustrasi tahap menggunakan model kecerdasan buatan untuk mengenali gambar baru secara otomatis.</span>
                    </div>

                    <div class="fun-fact">
                        <p>
                            Gambar A.18 memperlihatkan langkah kelima dalam proses pembelajaran kecerdasan buatan, yaitu menggunakan model. Pada tahap ini, model yang telah dilatih dan diuji dapat digunakan untuk mengenali data baru secara otomatis. Gambar baru yang dimasukkan akan diproses oleh sistem, kemudian model memberikan hasil prediksi berupa kategori bekantan atau monyet.
                        </p>
                    </div>
                </li>
            </ol>
            <p>Begitu pula komputer belajar dengan cara yang mirip manusia, hanya saja menggunakan data dan algoritma.
            </p>
        </ol>
    </div>

    @php
        use App\Models\Materi;
        use App\Models\UserProgress;

        // ambil materi (karena kamu tidak pakai controller)
        $materi = Materi::where('slug', 'bab-1-materi-c')->first();

        // cek progress
        $isCompleted = UserProgress::where('user_id', auth()->id())
            ->where('materi_id', $materi->id ?? 0)
            ->where('status', 'completed')
            ->exists();
    @endphp

    <div id="progress"></div>

    <form method="POST" action="{{ url('/materi/selesai') }}" class="mt-4">
        @csrf
        <input type="hidden" name="materi_id" value="3">

        <button type="submit" class="btn {{ $isCompleted ? 'btn-secondary' : 'btn-success' }}" {{ $isCompleted ? 'disabled' : '' }}>
            {{ $isCompleted ? 'Materi Sudah Selesai' : 'Tandai Materi Selesai' }}
        </button>
    </form>

    <section class="ai-flow">
        <h2>Aktivitas 1.3</h2>
        <p>Seret langkah-langkah berikut agar membentuk alur AI yang benar.</p>

        <div class="flow-items">
            <div class="flow-item" draggable="true" data-step="2">
                Pelatihan Model
            </div>
            <div class="flow-item" draggable="true" data-step="4">
                Prediksi
            </div>
            <div class="flow-item" draggable="true" data-step="1">
                Data
            </div>
            <div class="flow-item" draggable="true" data-step="3">
                Model AI
            </div>
        </div>

        <button class="btn-flow-check" onclick="checkFlow()">
            Cek Urutan
        </button>

        <div id="flowResult" class="flow-result"></div>
    </section>


@endsection

@push('scripts')
    <script src="{{ asset('js/interaktif/materi-1/materi-c.js') }}"></script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/interaktif/materi-1/materi-c.css') }}">
    <link rel="stylesheet" href="{{ asset('css/materi/style_materi.css') }}">
@endpush