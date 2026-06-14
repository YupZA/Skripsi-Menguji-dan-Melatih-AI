@extends('layouts.app')

@section('title', 'Bab 1 - AI')

@section('content')
    <div>
        <h1 class="mt-4">Mengenal AI dan Dasar - Dasar Machine Learning</h1>

        <h2><strong>2. Apa Itu Machine Learning</strong></h2>
        <p>
            <i><strong>Machine learning</strong></i> merupakan salah satu cabang dari Kecerdasan Buatan (<i>Artificial
                Intelligence</i>) yang memungkinkan
            komputer belajar dari data tanpa harus diprogram secara langsung. Dengan kata lain, komputer “belajar sendiri”
            dari pengalaman yang diperoleh melalui data.
        </p>
        <p>
            Tiga konsep utama dalam proses <i>machine learning</i> :
        </p>
        <ol type="a">
            <li>
                <strong>Data Pelatihan (<i>Training Data</i>)</strong>
            </li>
            <p>
                <strong>Data pelatihan</strong> adalah sekumpulan informasi yang digunakan untuk “mengajarkan”
                komputer agar dapat mengenali pola tertentu. Data ini dapat berupa gambar, suara,
                teks, atau gerakan tubuh, tergantung pada jenis model yang akan dilatih.
            </p>
            <p>
                Semakin banyak, beragam, dan relevan data yang digunakan, semakin baik kemampuan model kecerdasan buatan
                dalam mengenali pola dan melakukan prediksi. Misalnya, pelatihan model untuk mengenali hewan bekantan dan
                monyet memerlukan banyak contoh gambar bekantan dan monyet dari berbagai sudut, warna, dan ukuran.
            </p>

            <div class="materi-image">
                <img src="{{ asset('images/bab-1/materi-b/gambar-1.png') }}" alt="Ilustrasi AI">
                <span>Gambar A.6 Dataset pelatihan gambar bekantan dan monyet</span>
            </div>

            <div class="fun-fact">
                <p>
                    Gambar A.6 menunjukkan kumpulan gambar bekantan dan monyet yang digunakan sebagai data untuk melatih
                    komputer agar dapat membedakan kedua jenis hewan tersebut.
                </p>
            </div>

            <li>
                <strong>Model Kecerdasan Buatan</strong>
            </li>
            <p>
                <strong>Model kecerdasan buatan</strong> adalah hasil akhir dari proses pelatihan (<i>training</i>). Dapat
                dikatakan bahwa <strong>model</strong>
                adalah otak buatan yang terbentuk setelah komputer mempelajari pola dari data pelatihan. Model inilah yang
                nantinya digunakan untuk mengenali atau mengklasifikasikan data baru.
            </p>
            <p>
                Sebagai contoh, setelah model dilatih menggunakan ribuan foto bekantan dan monyet atau ribuan suara bekantan
                dan monyet, model tersebut dapat membedakan apakah data baru yang dimasukkan termasuk kategori “bekantan”
                atau “monyet”.
            </p>

            <div class="materi-image">
                <img src="{{ asset('images/bab-1/materi-b/gambar-2.png') }}" alt="Ilustrasi AI">
                <span>Gambar A.7 Ilustrasi proses kerja model kecerdasan buatan</span>
            </div>

            <div class="fun-fact">
                <p>
                    Gambar A.7 menggambarkan proses kecerdasan buatan dalam mengolah data. Data masukan seperti gambar dan
                    suara diproses oleh model AI, kemudian menghasilkan output berupa pengenalan atau klasifikasi sesuai
                    dengan jenis datanya.
                </p>
            </div>

            <li>
                <strong>Prediksi</strong>
            </li>
            <p>
                <strong>Prediksi</strong> adalah kemampuan model untuk memberikan tebakan cerdas terhadap data baru
                yang belum pernah dilihat sebelumnya. Berdasarkan pengetahuan yang telah diperoleh
                dari data pelatihan, model akan mencoba mengenali atau mengklasifikasikan input baru
                tersebut.
            </p>
            <p>
                Sebagai contoh, ketika gambar seekor hewan yang belum pernah terdapat dalam data pelatihan dimasukkan, model
                akan mencoba melakukan prediksi, misalnya menentukan apakah gambar tersebut termasuk bekantan atau bukan.
            </p>

            <div class="materi-image">
                <img src="{{ asset('images/bab-1/materi-b/gambar-3.png') }}" alt="Ilustrasi AI">
                <span>Gambar A.8 Contoh hasil prediksi model kecerdasan buatan</span>
            </div>

            <div class="fun-fact">
                <p>
                    Gambar A.8 menggambarkan bagaimana kecerdasan buatan memproses data gambar dan menghasilkan prediksi
                    berupa kategori objek. Selain itu, ditampilkan juga tingkat kepercayaan (confidence) yang menunjukkan
                    seberapa yakin sistem terhadap hasil prediksinya.
                </p>
            </div>

        </ol>
        <p>
            Contoh kasus :
        </p>
        <p>
            Kecerdasan buatan memerlukan data pelatihan yang cukup banyak dan bervariasi untuk membedakan bekantan dan
            monyet, misalnya foto bekantan dengan berbagai pose dan latar belakang, serta foto monyet dari berbagai jenis
            ras. Melalui proses pembelajaran tersebut, model dapat mengenali ciri khas bekantan dan monyet sehingga mampu
            melakukan prediksi dengan lebih akurat.

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

    <form method="POST" action="{{ url('/materi/selesai') }}" class="mt-4">
        @csrf
        <input type="hidden" name="materi_id" value="2">

        <button type="submit" class="btn {{ $isCompleted ? 'btn-secondary' : 'btn-success' }}" {{ $isCompleted ? 'disabled' : '' }}>
            {{ $isCompleted ? 'Materi Sudah Selesai' : 'Tandai Materi Selesai' }}
        </button>
    </form>

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
                <h3>Program Biasa</h3>
            </div>

            <div class="drop-zone" data-accept="ai">
                <h3>Kecerdasan Buatan</h3>
            </div>
        </div>

        <div class="drop-feedback" id="dropFeedback"></div>
    </section>

@endsection

@push('scripts')
    <script src="{{ asset('js/interaktif/materi-1/materi-b.js') }}"></script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/interaktif/materi-1/materi-b.css') }}">
    <link rel="stylesheet" href="{{ asset('css/materi/style_materi.css') }}">
@endpush