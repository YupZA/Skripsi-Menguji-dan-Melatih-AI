@extends('layouts.app')

@section('title', 'Bab 2 - AI')

@section('content')
    <div>
        <h1 class="mt-4">PENGENALAN GOOGLE TEACHABLE LEARNING MACHINE</h1>
        <div>
            <h2>3. Jenis Proyek di Google Teachable Machine</h2>
            <p>
                Google Teachable Machine menyediakan tiga jenis proyek utama yang dapat digunakan untuk melatih kecerdasan
                buatan (AI) dengan cara yang sederhana dan interaktif. Melalui ketiga jenis proyek ini, peserta didik dapat
                memahami bagaimana komputer belajar mengenali pola dari data yang diberikan, baik berupa gambar, suara,
                maupun gerakan tubuh.
            </p>
            <ol type="a">
                <li>
                    <i>Image Project</i> (Proyek Gambar)
                </li>
                <p>
                    Proyek ini berfokus pada pelatihan AI untuk mengenali dan membedakan berbagai jenis gambar. Misalnya,
                    peserta didik dapat membuat model yang mampu membedakan antara gambar kucing dan anjing, atau mengenali
                    ekspresi wajah seperti senang, sedih, dan marah. Melalui kegiatan ini, peserta didik belajar bagaimana
                    sistem AI memproses data visual untuk mengenali pola tertentu.
                </p>
                <div class="materi-image">
                    <img src="{{ asset('images/bab-2/materi-c/gambar-1.png') }}" alt="Ilustrasi AI">
                    <span>Ilustrasi Kecerdasan Buatan</span>
                </div>
                <li>
                    <i>Audio Project</i> (Proyek Suara)
                </li>
                <p>
                    Dalam proyek ini, peserta didik dapat melatih AI untuk mengenali berbagai jenis suara. Contohnya, model
                    AI dapat diajarkan untuk membedakan antara tepuk tangan dan siulan, mengenali kata-kata sederhana
                    seperti “ya” dan “tidak”, atau bahkan suara hewan seperti anjing dan kucing. Melalui proyek ini, peserta
                    didik memahami bagaimana komputer dapat menganalisis gelombang suara dan mengenali perbedaan
                    karakteristik bunyi.
                </p>
                <div class="materi-image">
                    <img src="{{ asset('images/bab-2/materi-c/gambar-2.png') }}" alt="Ilustrasi AI">
                    <span>Ilustrasi Kecerdasan Buatan</span>
                </div>
                <li>
                    <i>Pose Project</i> (Proyek Pose Tubuh)
                </li>
                <p>
                    Proyek ini digunakan untuk melatih AI dalam mengenali gerakan atau posisi tubuh manusia. Contohnya,
                    peserta didik dapat membuat model yang mampu membedakan antara berdiri dan jongkok, melambaikan tangan
                    dan diam, atau gerakan olahraga dan tarian. Melalui proyek ini, peserta didik dapat memahami bagaimana
                    AI memproses data visual dari kamera untuk mengidentifikasi pola gerakan.
                </p>
                <div class="materi-image">
                    <img src="{{ asset('images/bab-2/materi-c/gambar-3.png') }}" alt="Ilustrasi AI">
                    <span>Ilustrasi Kecerdasan Buatan</span>
                </div>
                <p>
                    Dengan memanfaatkan ketiga jenis proyek tersebut, Google Teachable Machine memungkinkan peserta didik
                    untuk:
                </p>
                <ul>
                    <li>Memahami konsep dasar <i>Machine Learning</i> dengan cara yang mudah dan menyenangkan.</li>
                    <li>Membangun dan melatih model AI sederhana secara mandiri tanpa perlu menulis kode.</li>
                    <li>Melihat secara langsung bagaimana komputer dapat “belajar” dan melakukan prediksi terhadap data
                        baru.</li>
                </ul>
                <p>
                    Melalui kegiatan eksploratif ini, peserta didik tidak hanya memperoleh pemahaman teoritis mengenai
                    kecerdasan buatan, tetapi juga pengalaman praktis dalam menciptakan model AI yang relevan dengan
                    kehidupan sehari-hari.
                </p>
            </ol>
        </div>
    </div>

    @php use App\Models\UserProgress;
    $isCompleted = UserProgress::where('user_id', auth()->id())->where('materi_id', 6)->where('status', 'completed')->exists(); @endphp

    <div id="progress"></div>

    <form method="POST" action="{{ url('/materi/selesai') }}" class="mt-4">
        @csrf
        <input type="hidden" name="materi_id" value="6">

        <button type="submit" class="btn {{ $isCompleted ? 'btn-secondary' : 'btn-success' }}" {{ $isCompleted ? 'disabled' : '' }}>
            {{ $isCompleted ? 'Materi Sudah Selesai' : 'Tandai Materi Selesai' }}
        </button>
    </form>

    <section class="ai-dragdrop">
        <h2>Aktivitas 2.3</h2>
        <p>Seret setiap contoh ke jenis proyek yang sesuai.</p>

        <!-- DRAG ITEMS -->
        <div class="drag-items">
            <div class="drag-item" draggable="true" data-type="image">Mengenali ekspresi wajah</div>
            <div class="drag-item" draggable="true" data-type="audio">Membedakan suara tepuk tangan</div>
            <div class="drag-item" draggable="true" data-type="pose">Mendeteksi gerakan jongkok</div>
            <div class="drag-item" draggable="true" data-type="image">Membedakan kucing dan anjing</div>
            <div class="drag-item" draggable="true" data-type="audio">Mengenali kata "ya" dan "tidak"</div>
            <div class="drag-item" draggable="true" data-type="pose">Mengenali lambaian tangan</div>
        </div>

        <!-- DROP ZONES -->
        <div class="drop-zones">
            <div class="drop-zone" data-accept="image">
                <h3>Proyek Gambar</h3>
            </div>

            <div class="drop-zone" data-accept="audio">
                <h3>Proyek Suara</h3>
            </div>

            <div class="drop-zone" data-accept="pose">
                <h3>Proyek Pose Tubuh</h3>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script src="{{ asset('js/interaktif/materi-2/materi-c.js') }}"></script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/interaktif/materi-2/materi-c.css') }}">
@endpush