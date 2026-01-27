@extends('layouts.app')

@section('title', 'Bab 1 - AI')

@section('content')
    <div>
        <h1 class="mt-4">Mengenal AI dan Dasar - Dasar Machine Learning</h1>

        <h2>3. Langkah-Langkah Proses Machine Learning</h2>
        <p>
            Kecerdasan Buatan (<i>Artificial Intelligence</i> atau <i>AI</i>) membuat komputer bisa berpikir dan melakukan
            sesuatu seperti
            manusia. Salah satu cara agar komputer menjadi pintar adalah melalui <i><strong>Machine Learning</strong></i> yaitu proses ketika
            komputer belajar dari data dan pengalaman, bukan dari perintah langsung. Supaya komputer bisa belajar dengan
            baik, ada beberapa langkah penting yang perlu dilakukan.
        </p>
        <ol type="a">
            <li>
                Mengumpulkan Data (Data Collection)
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
                <span>Ilustrasi Kecerdasan Buatan</span>
            </div>

            <p>
                Data berfungsi sebagai bahan belajar bagi komputer. Tanpa data, komputer tidak akan tahu apa yang harus
                dipelajari.
            </p>
            <p>Contoh :</p>
            <p>
                Jika kita ingin mengajarkan komputer membedakan kucing dan anjing, kita harus menyediakan banyak gambar
                kucing dan anjing. Gambar-gambar itu bisa dari berbagai warna, bentuk, dan posisi agar komputer lebih mudah
                mengenalinya. Semakin banyak dan bervariasi data yang diberikan, semakin pintar komputer belajar mengenali
                perbedaan di antara objek tersebut.
            </p>
            <li>
                Menyiapkan dan Membersihkan Data (<i>Data Preparation & Cleaning</i>)
            </li>
            <p>
                Setelah data terkumpul, kita perlu menyiapkan dan membersihkannya agar bisa digunakan. Tahap ini seperti
                merapikan buku pelajaran sebelum belajar. Data yang rapi dan jelas akan membantu komputer belajar lebih
                cepat dan akurat.
            </p>
            <p>
                Beberapa hal yang dilakukan pada tahap ini antara lain:
            </p>
            <ul>
                <li>Menghapus data yang rusak, buram, atau duplikat.</li>
                <li>Mengubah ukuran atau <i>format data</i> agar seragam (misalnya, semua gambar berukuran sama).</li>
                <li>Memberi label pada data, supaya komputer tahu mana gambar kucing dan mana gambar anjing.</li>
            </ul>
            <div class="materi-image">
                <img src="{{ asset('images/bab-1/materi-c/gambar-2.png') }}" alt="Ilustrasi AI">
                <span>Ilustrasi Kecerdasan Buatan</span>
            </div>
            <p>Contoh :</p>
            <p>Gambar kucing yang dipakai</p>
            <p>Gambar kucing yang dihapus</p>
            <li>
                Melatih Model (<i>Training Model</i>)
            </li>
            <p>
                Kita memasukkan semua data yang sudah disiapkan ke dalam sistem, lalu komputer mencari pola atau ciri khas
                dari setiap data. Dari proses belajar inilah terbentuk model kecerdasan buatan, yaitu semacam otak kecil
                buatan komputer yang berisi pengetahuan hasil pembelajaran dari data.
            </p>
            <p>Contoh :</p>
            <p>
                Ketika melihat banyak gambar “kucing”, komputer mulai mengenali ciri khas kucing seperti:
            </p>
            <ul>
                <li>Telinganya runcing</li>
                <li>Kumis Panjang</li>
                <li>Bentuk wajah tertentu</li>
            </ul>
            <div class="materi-image">
                <img src="{{ asset('images/bab-1/materi-c/gambar-3.png') }}" alt="Ilustrasi AI">
                <span>Ilustrasi Kecerdasan Buatan</span>
            </div>
            <p>
                Begitu juga saat melihat gambar “anjing”, komputer mengenali cirinya yang berbeda. Akhirnya, komputer mulai
                bisa membedakan mana gambar kucing dan mana gambar anjing. Tahap ini sama seperti manusia yang belajar dari
                contoh semakin banyak berlatih, semakin pintar hasilnya.
            </p>
            <li>
                Menguji Model (<i>Testing Model</i>)
            </li>
            <p>
                Setelah model selesai dilatih, langkah selanjutnya adalah menguji seberapa baik kemampuan model tersebut.
                Kita memberikan data baru yang belum pernah dilihat oleh komputer, lalu melihat apakah komputer bisa menebak
                dengan benar. Tujuannya untuk memastikan bahwa komputer benar-benar mengerti, bukan sekadar menghafal.
            </p>
            <p>Contoh :</p>
            <p>
                Kita tunjukkan gambar seekor hewan yang belum pernah digunakan sebelumnya.
                Model kemudian mencoba menebak:
            </p>
            <p>“Ini kucing atau anjing?”</p>
            <div class="materi-image">
                <img src="{{ asset('images/bab-1/materi-c/gambar-4.png') }}" alt="Ilustrasi AI">
                <span>Ilustrasi Kecerdasan Buatan</span>
            </div>
            <p>
                Kalau model bisa menebak dengan benar, berarti hasil belajarnya bagus. Tapi kalau salah, berarti model masih
                perlu diperbaiki atau diberi data tambahan. Menguji model penting agar kita tahu apakah komputer benar-benar
                mengerti pola dari data yang dipelajarinya.
            </p>
            <li>
                Menggunakan Model untuk Prediksi
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
                <li>Model bisa menebak apakah suatu foto berisi burung elang atau yang lain.</li>
            </ul>
            <div class="materi-image">
                <img src="{{ asset('images/bab-1/materi-c/gambar-5.png') }}" alt="Ilustrasi AI">
                <span>Ilustrasi Kecerdasan Buatan</span>
            </div>
            <p>Analogi untuk Mempermudah Pemahaman :</p>
            <p>Bayangkan kamu belajar mengenali buah-buahan:</p>
            <ol>
                <li>Mengumpulkan data: Kamu mengumpulkan banyak gambar apel, pisang, dan jeruk.</li>
                <li>Menyiapkan data: Kamu menulis label di setiap gambar agar tahu mana apel dan mana pisang.</li>
                <li>Melatih model: Kamu melihat semua gambar dan mencoba mengingat ciri-cirinya.</li>
                <li>Menguji model: Kamu melihat gambar baru dan menebak, “Ini buah apa, ya?”</li>
                <li>Menggunakan model: Setelah bisa menebak dengan benar, kamu bisa membantu teman lain mengenali buah juga!
                </li>
            </ol>
            <p>Begitu pula komputer ia belajar dengan cara yang mirip manusia, hanya saja menggunakan data dan algoritma.
            </p>
        </ol>
    </div>

    <section class="ai-flow">
        <h2>Aktivitas 1.3</h2>
        <p>Seret langkah-langkah berikut agar membentuk alur AI yang benar.</p>

        <div class="flow-items">
            <div class="flow-item" draggable="true" data-step="2">
                🧪 Pelatihan Model
            </div>
            <div class="flow-item" draggable="true" data-step="4">
                🔮 Prediksi
            </div>
            <div class="flow-item" draggable="true" data-step="1">
                📊 Data
            </div>
            <div class="flow-item" draggable="true" data-step="3">
                🧠 Model AI
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
@endpush