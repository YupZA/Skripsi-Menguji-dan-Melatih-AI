@extends('layouts.app')

@section('title', 'Bab 2 - AI')

@section('content')
    <div>
        <h1 class="mt-4">PENGENALAN GOOGLE TEACHABLE MACHINE</h1>
        <div>
            <h2>3. Jenis Proyek di Google Teachable Machine</h2>
            <p>
                Google Teachable Machine menyediakan tiga jenis proyek utama yang dapat digunakan untuk melatih kecerdasan
                buatan (<i>AI</i>) dengan cara yang sederhana dan interaktif. Melalui ketiga jenis proyek ini, peserta didik
                dapat
                memahami bagaimana komputer belajar mengenali pola dari data yang diberikan, baik berupa gambar, suara,
                maupun gerakan tubuh.
            </p>
            <ol type="a">
                <li>
                    Proyek Gambar (<i>Image Project</i>)
                </li>
                <p>
                    Proyek ini berfokus pada pelatihan kecerdasan buatan untuk mengenali dan membedakan berbagai jenis
                    gambar. Misalnya,
                    peserta didik dapat membuat model yang mampu membedakan antara gambar ikan gabus dan ikan papuyu, atau
                    mengenali ekspresi wajah seperti senang, sedih, dan marah. Melalui kegiatan ini, peserta didik belajar
                    bagaimana sistem kecerdasan buatan memproses data <i>visual</i> untuk mengenali pola tertentu.
                </p>
                <div class="materi-image">
                    <img src="{{ asset('images/bab-2/materi-c/gambar-1.png') }}" alt="Ilustrasi AI">
                    <span>Gambar B.6 Pelatihan model gambar menggunakan Teachable Machine</span>
                </div>

                <div class="fun-fact">
                    <p>
                        <strong>Gambar B.6</strong> menunjukkan bagaimana model kecerdasan buatan dilatih menggunakan data ikan gabus
                        dan
                        ikan papuyu, kemudian digunakan untuk memprediksi bahwa gambar yang diberikan adalah ikan papuyu
                        dengan tingkat akurasi tertentu.
                    </p>
                </div>

                <li>
                    Proyek Suara (<i>Audio Project</i>)
                </li>
                <p>
                    Dalam proyek ini, peserta didik dapat melatih AI untuk mengenali berbagai jenis suara. Contohnya, model
                    kecerdasan buatan dapat diajarkan untuk membedakan antara tepuk tangan dan siulan, mengenali kata-kata
                    sederhana
                    seperti “ya” dan “tidak”, atau bahkan suara hewan seperti anjing dan kucing. Melalui proyek ini, peserta
                    didik memahami bagaimana komputer dapat menganalisis gelombang suara dan mengenali perbedaan
                    karakteristik bunyi.
                </p>
                <div class="materi-image">
                    <img src="{{ asset('images/bab-2/materi-c/gambar-2.png') }}" alt="Ilustrasi AI">
                    <span>Gambar B.7 Pelatihan model suara menggunakan Teachable Machine</span>
                </div>

                <div class="fun-fact">
                    <p>
                        <strong>Gambar B.7</strong> menunjukkan proses pelatihan kecerdasan buatan menggunakan data suara, seperti
                        <i>background
                            noise</i>, tepuk tangan, atau siulan, hingga menghasilkan prediksi berdasarkan suara yang
                        dikenali.
                    </p>
                </div>

                <li>
                    Proyek Pose Tubuh (<i>Pose Project</i>)
                </li>
                <p>
                    Proyek ini digunakan untuk melatih kecerdasan buatan dalam mengenali gerakan atau posisi tubuh manusia.
                    Contohnya,
                    peserta didik dapat membuat model yang mampu membedakan antara berdiri dan jongkok, melambaikan tangan
                    dan diam, atau gerakan olahraga dan tarian. Melalui proyek ini, peserta didik dapat memahami bagaimana
                    kecerdasan memproses data <i>visual</i> dari kamera untuk mengidentifikasi pola gerakan.
                </p>
                <div class="materi-image">
                    <img src="{{ asset('images/bab-2/materi-c/gambar-3.png') }}" alt="Ilustrasi AI">
                    <span>Gambar B.8 Pelatihan model pose tubuh menggunakan Teachable Machine</span>
                </div>

                <div class="fun-fact">
                    <p>
                        <strong>Gambar B.8</strong> menunjukkan bagaimana kecerdasan buatan dilatih untuk mengenali gerakan tubuh, seperti
                        <i>tree pose</i> atau <i>warrior pose</i>, kemudian menghasilkan prediksi berdasarkan gerakan yang terdeteksi.
                    </p>
                </div>

                <p>
                    Dengan memanfaatkan ketiga jenis proyek tersebut, Google Teachable Machine memungkinkan peserta didik
                    untuk:
                </p>
                <ul>
                    <li>Memahami konsep dasar <i>Machine Learning</i> dengan cara yang mudah dan menyenangkan.</li>
                    <li>Membangun dan melatih model kecerdasan buatan sederhana secara mandiri tanpa perlu menulis kode.</li>
                    <li>Melihat secara langsung bagaimana komputer dapat “belajar” dan melakukan prediksi terhadap data
                        baru.</li>
                </ul>
                <p>
                    Melalui kegiatan eksploratif ini, peserta didik tidak hanya memperoleh pemahaman teoritis mengenai
                    kecerdasan buatan, tetapi juga pengalaman praktis dalam menciptakan model kecerdasan buatan yang relevan dengan
                    kehidupan sehari-hari.
                </p>
            </ol>
        </div>
    </div>

    @php
        use App\Models\Materi;
        use App\Models\UserProgress;

        // ambil materi (karena kamu tidak pakai controller)
        $materi = Materi::where('slug', 'bab-2-materi-c')->first();

        // cek progress
        $isCompleted = UserProgress::where('user_id', auth()->id())
            ->where('materi_id', $materi->id ?? 0)
            ->where('status', 'completed')
            ->exists();
    @endphp

    <div id="progress"></div>

    

    <section class="ai-dragdrop">
        <h2>Aktivitas 3 : Mengelompokkan Program Berdasarkan Jenisnya</h2>
        <p>Petunjuk Pengerjaan :</p>
        <ul>
            <li>Bacalah setiap contoh pada daftar pilihan dengan teliti.</li>
            <li>Perhatikan setiap contoh kegiatan yang tersedia.</li>
            <li>Seret setiap contoh ke jenis proyek yang sesuai, yaitu <strong>Proyek Gambar</strong>, <strong>Proyek Suara</strong>, atau <strong>Proyek Pose Tubuh</strong>.</li>
            <li>Pastikan seluruh contoh telah ditempatkan pada kategori yang benar.</li>
            <li>Periksa kembali hasil pengelompokan yang telah dilakukan.</li>
            <li>Setelah semua contoh selesai dikelompokkan, klik tombol <strong>Kumpul Aktivitas</strong>.</li>
        </ul>

        <!-- DRAG ITEMS -->
        <div class="drag-items">
            <div class="drag-item" draggable="true" data-type="image">Mengenali ekspresi wajah</div>
            <div class="drag-item" draggable="true" data-type="audio">Membedakan suara tepuk tangan</div>
            <div class="drag-item" draggable="true" data-type="pose">Mendeteksi gerakan jongkok</div>
            <div class="drag-item" draggable="true" data-type="image">Membedakan bekantan dan monyet</div>
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
    <script src="{{ asset('js/interaktif/materi-2/materi-c.js') }}"></script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/interaktif/materi-2/materi-c.css') }}">
    <link rel="stylesheet" href="{{ asset('css/materi/style_materi.css') }}">
@endpush