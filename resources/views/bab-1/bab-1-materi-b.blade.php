@extends('layouts.app')

@section('title', 'Bab 1 - AI')

@section('content')
    <div>
        <h1 class="mt-4">Mengenal AI dan Dasar - Dasar Machine Learning</h1>

        <h2><strong>2. Apa Itu Machine Learning</strong></h2>
        <p>
            <i><strong>Machine learning</strong></i> merupakan salah satu cabang dari kecerdasan buatan yang memungkinkan komputer belajar dari data tanpa harus diprogram secara langsung. Dengan kata lain, komputer dapat mengenali pola dari data yang diberikan, kemudian menggunakan pola tersebut untuk membantu melakukan prediksi.
        </p>
        <p>
            Tiga konsep utama dalam proses <i>machine learning</i> adalah sebagai berikut.
        </p>
        <ol type="a">
            <li>
                <strong>Data Pelatihan (<i>Training Data</i>)</strong>
            </li>
            <p>
                Data pelatihan adalah sekumpulan informasi yang digunakan untuk melatih model kecerdasan buatan agar dapat mengenali pola tertentu. Data ini dapat berupa gambar, suara,
                teks, atau gerakan tubuh, tergantung pada jenis model yang akan dilatih.
            </p>
            <p>
                Semakin banyak, beragam, dan relevan data yang digunakan, semakin baik kemampuan model kecerdasan buatan dalam mengenali pola dan melakukan prediksi. Misalnya, pelatihan model kecerdasan buatan untuk mengenali hewan bekantan dan monyet memerlukan banyak contoh gambar bekantan dan monyet dari berbagai sudut, warna, dan ukuran.
            </p>

            <div class="materi-image">
                <img src="{{ asset('images/bab-1/materi-b/gambar-1.png') }}" alt="Ilustrasi AI">
                <span>Gambar A.6 Dataset pelatihan gambar bekantan dan monyet</span>
            </div>

            <div class="fun-fact">
                <p>
                    <strong>Gambar A.6</strong> menunjukkan kumpulan gambar bekantan dan monyet yang digunakan sebagai data pelatihan untuk membantu model kecerdasan buatan membedakan kedua jenis hewan tersebut.
                </p>
            </div>

            <li>
                <strong>Model Kecerdasan Buatan</strong>
            </li>
            <p>
                <strong>Model kecerdasan buatan</strong> adalah hasil dari proses pelatihan. Model dapat diibaratkan sebagai “otak buatan” yang terbentuk setelah komputer mempelajari pola dari data pelatihan. Model inilah yang nantinya digunakan untuk mengenali atau mengklasifikasikan data baru.
            </p>
            <p>
                Sebagai contoh, setelah model kecerdasan buatan dilatih menggunakan banyak gambar bekantan dan monyet, model tersebut dapat membedakan apakah data baru yang dimasukkan termasuk kategori “bekantan” atau “monyet”.
            </p>

            <div class="materi-image">
                <img src="{{ asset('images/bab-1/materi-b/gambar-2.png') }}" alt="Ilustrasi AI">
                <span>Gambar A.7 Ilustrasi proses kerja model kecerdasan buatan</span>
            </div>

            <div class="fun-fact">
                <p>
                    <strong>Gambar A.7</strong> menggambarkan proses kecerdasan buatan dalam mengolah data. Data masukan seperti gambar dan
                    suara diproses oleh model AI, kemudian menghasilkan <i>output</i> berupa pengenalan atau klasifikasi sesuai
                    dengan jenis datanya.
                </p>
            </div>

            <li>
                <strong>Prediksi</strong>
            </li>
            <p>
                <strong>Prediksi</strong> adalah kemampuan model kecerdasan buatan untuk memberikan tebakan terhadap data baru yang belum pernah dilihat sebelumnya. Berdasarkan pola yang telah dipelajari dari data pelatihan, model kecerdasan buatan akan mencoba mengenali atau mengklasifikasikan <i>input</i> baru tersebut.
            </p>
            <p>
                Sebagai contoh, ketika gambar seekor hewan yang belum pernah terdapat dalam data pelatihan dimasukkan, model kecerdasan buatan
                akan mencoba melakukan prediksi, misalnya menentukan apakah gambar tersebut termasuk bekantan atau bukan.
            </p>

            <div class="materi-image">
                <img src="{{ asset('images/bab-1/materi-b/gambar-3.png') }}" alt="Ilustrasi AI">
                <span>Gambar A.8 Contoh hasil prediksi model kecerdasan buatan</span>
            </div>

            <div class="fun-fact">
                <p>
                    <strong>Gambar A.8</strong> menggambarkan bagaimana model kecerdasan buatan memproses data gambar dan menghasilkan prediksi berupa kategori objek. Selain itu, ditampilkan juga tingkat kepercayaan (<i>confidence</i>) yang menunjukkan seberapa yakin model kecerdasan buatan terhadap hasil prediksinya.
                </p>
            </div>

        </ol>
        <p>
            Contoh kasus :
        </p>
        <p>
            Kecerdasan buatan memerlukan data pelatihan yang cukup banyak dan bervariasi untuk membedakan bekantan dan monyet, misalnya foto bekantan dan monyet dengan berbagai pose, sudut, ukuran, serta latar belakang. Melalui proses pelatihan tersebut, model kecerdasan buatan dapat mengenali ciri khas bekantan dan monyet sehingga mampu melakukan prediksi dengan lebih akurat.

        </p>
    </div>

    @php
        use App\Models\Materi;
        use App\Models\UserProgress;

        // ambil materi 
        $materi = Materi::where('slug', 'bab-1-materi-b')->first();

        // cek progress
        $isCompleted = UserProgress::where('user_id', auth()->id())
            ->where('materi_id', $materi->id ?? 0)
            ->where('status', 'completed')
            ->exists();
    @endphp

    <div id="progress"></div>

    

    <section class="ai-dragdrop">
        <h2>Aktivitas 2 : Mengelompokkan Program Berdasarkan Jenisnya</h2>
        <p>Petunjuk pengerjaan aktivitas 2 :</p>
        <ul>
            <li>Perhatikan setiap contoh program yang tersedia.</li>
            <li>Seret setiap contoh program ke kategori yang sesuai, yaitu <strong>Program Biasa</strong> atau <strong>Kecerdasan Buatan</strong>.</li>
            <li>Pastikan seluruh contoh program telah ditempatkan pada kategori yang benar.</li>
            <li>Setelah semua contoh selesai dikelompokkan, klik tombol <strong>Submit Aktivitas</strong>.</li>
        </ul>

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
                <h3>Program Biasa</h3>
            </div>

            <div class="drop-zone" data-accept="ai">
                <h3>Kecerdasan Buatan</h3>
            </div>
        </div>

        <div class="drop-feedback" id="dropFeedback"></div>

        <form method="POST" action="{{ url('/materi/selesai') }}" class="mt-4" id="formSelesai">
            @csrf
            <input type="hidden" name="materi_id" value="{{ $materi->id }}">

            <button
                type="submit"
                id="btnSelesai"
                class="btn {{ $isCompleted ? 'btn-secondary' : 'btn-success' }}"
                {{ $isCompleted ? 'disabled' : '' }}>

                {{ $isCompleted ? 'Aktivitas Selesai' : 'Kumpul Aktivitas' }}

            </button>

            <div id="scoreInfo" class="mt-2"></div>
        </form>
    </section>

@endsection

@push('scripts')
    <script src="{{ asset('js/interaktif/materi-1/materi-b.js') }}"></script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/interaktif/materi-1/materi-b.css') }}">
    <link rel="stylesheet" href="{{ asset('css/materi/style_materi.css') }}">
@endpush