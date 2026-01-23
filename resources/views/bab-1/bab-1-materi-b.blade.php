@extends('layouts.app')

@section('title', 'Bab 1 - AI')

@section('content')
    <div>
        <h1 class="mt-4">Mengenal AI dan Dasar - Dasar Machine Learning</h1>

        <h2>2. Apa Itu Machine Learning</h2>
        <p>
            Machine Learning merupakan salah satu cabang dari Kecerdasan Buatan (Artificial
            Intelligence/AI) yang memungkinkan komputer belajar dari data tanpa harus diprogram
            secara langsung. Dengan kata lain, komputer “belajar sendiri” dari pengalaman yang
            diperoleh melalui data.
        </p>
        <p>
            Tiga konsep utama dalam proses machine learning :
        </p>
        <ol type="a">
            <li>
                Data Pelatihan ( Training Data)
            </li>
            <p>
                Data pelatihan adalah sekumpulan informasi yang digunakan untuk “mengajarkan”
                komputer agar dapat mengenali pola tertentu. Data ini dapat berupa gambar, suara,
                teks, atau gerakan tubuh, tergantung pada jenis model yang akan dilatih.
            </p>
            <p>
                Semakin banyak, beragam, dan relevan data yang digunakan, maka semakin baik
                kemampuan model kecerdasan buatann dalam mengenali pola dan melakukan prediksi.
                Misalnya, jika kita ingin melatih model untuk mengenali hewan, kita perlu memberikan
                banyak contoh gambar anjing dan kucing dari berbagai sudut, warna, dan ukuran.
            </p>

            <div class="materi-image">
                <img src="{{ asset('images/bab-1/materi-b/gambar-1.png') }}" alt="Ilustrasi AI">
                <span>Ilustrasi Kecerdasan Buatan</span>
            </div>

            <li>
                Model Kecerdasan Buatan
            </li>
            <p>
                Model kecerdasan buatan adalah hasil akhir dari proses pelatihan (training). Dapat
                dikatakan bahwa model adalah otak buatan yang terbentuk setelah komputer mempelajari
                pola dari data pelatihan. Model inilah yang nantinya digunakan untuk mengenali atau
                mengklasifikasikan data baru.
            </p>
            <p>
                Sebagai contoh, setelah kita melatih model dengan ribuan foto kucing dan anjing,
                model tersebut akan mampu membedakan apakah gambar baru yang dimasukkan termasuk
                kategori “kucing” atau “anjing”.
            </p>

            <div class="materi-image">
                <img src="{{ asset('images/bab-1/materi-b/gambar-2.png') }}" alt="Ilustrasi AI">
                <span>Ilustrasi Kecerdasan Buatan</span>
            </div>

            <li>
                Prediksi
            </li>
            <p>
                Prediksi adalah kemampuan model untuk memberikan tebakan cerdas terhadap data baru
                yang belum pernah dilihat sebelumnya. Berdasarkan pengetahuan yang telah diperoleh
                dari data pelatihan, model akan mencoba mengenali atau mengklasifikasikan input baru
                tersebut.
            </p>
            <p>
                Sebagai contoh, jika kita menunjukkan gambar seekor hewan yang belum pernah ada
                dalam data pelatihan, model akan mencoba menebak, misalnya: “Apakah ini anjing atau
                bukan?”
            </p>

            <div class="materi-image">
                <img src="{{ asset('images/bab-1/materi-b/gambar-3.png') }}" alt="Ilustrasi AI">
                <span>Ilustrasi Kecerdasan Buatan</span>
            </div>

        </ol>
        <p>
            Contoh kasus :
        </p>
        <p>
            Agar kecerdasan buatan dapat membedakan antara kucing dan anjing, kita harus menyediakan
            data pelatihan yang cukup banyak dan bervariasi, misalnya foto kucing dengan berbagai
            pose dan latar belakang, serta foto anjing dari berbagai jenis ras. Dari proses
            pembelajaran inilah model akan mengerti ciri khas kucing dan anjing, sehingga mampu
            melakukan prediksi dengan lebih akurat.
        </p>
    </div>

    <section class="ai-dragdrop">
        <h2>Aktivitas 1.2</h2>
        <p>Seret setiap contoh ke kategori yang sesuai.</p>

        <!-- ITEMS -->
        <div class="drag-items">
            <div class="drag-item" draggable="true" data-type="ai">
                Google Assistant
            </div>
            <div class="drag-item" draggable="true" data-type="program">
                Kalkulator
            </div>
            <div class="drag-item" draggable="true" data-type="ai">
                Face Unlock HP
            </div>
            <div class="drag-item" draggable="true" data-type="program">
                Jam Digital
            </div>
            <div class="drag-item" draggable="true" data-type="ai">
                Filter Spam Email
            </div>
        </div>

        <!-- Tempat Drop -->
        <div class="drop-zones">
            <div class="drop-zone" data-accept="program">
                <h3>📌 Program Biasa</h3>
            </div>

            <div class="drop-zone" data-accept="ai">
                <h3>🤖 Kecerdasan Buatan</h3>
            </div>
        </div>

        <div class="drop-feedback" id="dropFeedback"></div>
    </section>

@endsection

@push('scripts')
    <script src="{{ asset('js/interaktif/materi-1/materi-a.js') }}"></script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/interaktif/materi-1/materi-b.css') }}">
@endpush