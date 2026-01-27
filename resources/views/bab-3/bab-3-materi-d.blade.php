@extends('layouts.app')

@section('title', 'Bab 1 - AI')

@section('content')
    <div>
        <h1 class="mt-4">PENGENALAN GOOGLE TEACHABLE LEARNING MACHINE</h1>
        <div>
            <h2>4. Perbandingan Model Suara, Gambar, dan Pose</h2>
            <p>
                Google Teachable Machine menyediakan tiga jenis model utama model gambar (<i>Image Model</i>), model suara (<i>Audio
                Model</i>), dan model pose tubuh (<i>Pose Model</i>). Meskipun ketiganya memiliki tujuan yang sama, yaitu melatih
                kecerdasan buatan (AI) agar dapat mengenali pola dari data, setiap model memiliki perbedaan dalam jenis
                data, cara pelatihan, serta penerapannya.
            </p>
            <ol type="a">
                <li>
                    Model Gambar (<i>Image Model</i>)
                    <br>Model gambar digunakan untuk melatih AI agar mampu mengenali pola visual dari berbagai gambar atau
                    objek. Data yang digunakan berupa citra (<I>image</I>) yang bisa diambil melalui kamera (webcam) atau diunggah
                    dari komputer.
                    <ul>
                        <li>Jenis Data: Gambar atau foto.</li>
                        <li>Contoh Proyek: Membedakan antara kucing dan anjing, mengenali ekspresi wajah (senang, sedih,
                            marah), atau mengenali bentuk tangan tertentu.</li>
                        <li>Cara Kerja: AI menganalisis pola warna, bentuk, dan tekstur pada gambar.</li>
                        <li>Kelebihan: Mudah digunakan dan hasilnya terlihat langsung.</li>
                        <li>Keterbatasan: Dipengaruhi oleh pencahayaan, posisi, dan latar belakang gambar.</li>
                    </ul>
                </li>
                <li>
                    Model Suara (<i>Audio Model</i>)
                    <br>Model suara digunakan untuk melatih AI agar dapat mengenali pola bunyi atau suara tertentu. Data
                    yang digunakan berupa rekaman suara yang direkam langsung melalui mikrofon atau diunggah dari perangkat.
                    <ul>
                        <li>Jenis Data: Gelombang suara (<i>audio</i>).</li>
                        <li>Contoh Proyek: Membedakan suara tepuk tangan dan siulan, mengenali kata “ya” dan “tidak”, atau
                            mengidentifikasi suara hewan.</li>
                        <li>Cara Kerja: AI mempelajari perbedaan frekuensi, volume, dan ritme dari suara yang diberikan.
                        </li>
                        <li>Kelebihan: Dapat digunakan untuk interaksi suara seperti asisten virtual.</li>
                        <li>Keterbatasan: Kualitas hasil dipengaruhi oleh kebisingan lingkungan dan kejelasan suara.</li>
                    </ul>
                </li>
                <li>
                    Model Pose Tubuh (<i>Pose Model</i>)
                    <br>Model pose digunakan untuk melatih AI agar dapat mengenali gerakan atau posisi tubuh manusia. Data
                    diperoleh melalui kamera (webcam) yang menangkap bentuk tubuh dan pergerakan pengguna.
                    <ul>
                        <li>Jenis Data: Citra gerakan (<i>pose tubuh</i>).</li>
                        <li>Contoh Proyek: Membedakan posisi berdiri dan jongkok, mengenali lambaian tangan, atau mendeteksi
                            gerakan olahraga.</li>
                        <li>Cara Kerja: AI menganalisis posisi titik-titik tubuh (seperti kepala, tangan, kaki) yang
                            ditangkap kamera.</li>
                        <li>Kelebihan: Dapat digunakan untuk aplikasi berbasis gerakan, seperti permainan interaktif atau
                            pelatihan olahraga.</li>
                        <li>Keterbatasan: Membutuhkan pencahayaan dan ruang gerak yang cukup agar kamera dapat menangkap
                            pose dengan jelas.</li>
                    </ul>
                </li>

            </ol>
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>Aspek</th>
                        <th>Model Gambar</th>
                        <th>Model Suara</th>
                        <th>Model Pose Tubuh</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Jenis Data</td>
                        <td>Gambar / Foto</td>
                        <td>Suara / Audio</td>
                        <td>Pose / Gerakan Tubuh</td>
                    </tr>
                    <tr>
                        <td><i>Input Data</i></td>
                        <td>Kamera atau File Gambar</td>
                        <td>Mikrofon atau File <i>Audio</i></td>
                        <td>Kamera (Webcam)</td>
                    </tr>
                    <tr>
                        <td>Contoh Proyek</td>
                        <td>Ekspresi wajah, benda, tangan</td>
                        <td>Tepuk tangan, siulan, suara hewan</td>
                        <td>Berdiri, jongkok, lambaian tangan</td>
                    </tr>
                    <tr>
                        <td>Cara Kerja</td>
                        <td>Analisis bentuk dan warna</td>
                        <td>Analisis frekuensi dan pola suara</td>
                        <td>Analisis posisi titik tubuh</td>
                    </tr>
                    <tr>
                        <td>Kelebihan </td>
                        <td>Hasil visual langsung terlihat</td>
                        <td>Interaktif dan dinamis</td>
                        <td>Responsif terhadap gerakan tubuh</td>
                    </tr>
                    <tr>
                        <td>Keterbatasan</td>
                        <td>Terpengaruh Cahaya dan latar</td>
                        <td>Sensitif terhadap kebisingan</td>
                        <td>Membutuhkan ruang Gerak dan pencahayaan</td>
                    </tr>
                </tbody>
            </table>
            <p>
                Ketiga jenis model di Google Teachable Machine memiliki fungsi yang saling melengkapi.
            <ul>
                <li>Model Gambar cocok untuk pengenalan visual.</li>
                <li>Model Suara cocok untuk pengenalan <i>audio</i> atau komunikasi berbasis suara.</li>
                <li>Model Pose Tubuh cocok untuk pengenalan gerakan manusia.</li>
            </ul>
            Melalui pemanfaatan berbagai jenis model ini, peserta didik dapat belajar secara langsung bagaimana AI
            bekerja dalam berbagai konteks kehidupan nyata, serta mengembangkan kreativitas dalam menciptakan proyek
            berbasis teknologi cerdas.
            </p>
        </div>
    </div>

    <section class="ai-dragdrop">
        <h2>Aktivitas 3.4</h2>
        <p>Seret setiap contoh ke jenis proyek yang sesuai.</p>

        <!-- DRAG ITEMS -->
        <div class="drag-items">
            <div class="drag-item" draggable="true" data-type="image">AI mengenali jenis buah (apel, pisang, jeruk) dari kamera</div>
            <div class="drag-item" draggable="true" data-type="audio">AI membedakan suara pintu diketuk dan pintu dibanting</div>
            <div class="drag-item" draggable="true" data-type="pose">AI mengenali gerakan mengangkat tangan kanan</div>
            <div class="drag-item" draggable="true" data-type="image">AI mengidentifikasi jenis kendaraan dari foto</div>
            <div class="drag-item" draggable="true" data-type="audio">AI mengenali suara kucing dan anjing</div>
            <div class="drag-item" draggable="true" data-type="pose">AI mendeteksi gerakan melompat saat olahraga</div>
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
    <script src="{{ asset('js/interaktif/materi-3/materi-d.js') }}"></script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/interaktif/materi-3/materi-d.css') }}">
@endpush