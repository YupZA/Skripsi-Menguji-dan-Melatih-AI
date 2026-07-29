@extends('layouts.navbar_dashboard')

@section('title', 'Latih AI Pose')

@section('content')
    <div class="ai-container">

        <div class="page-header-wrapper">

            <div>

                <h1>
                    Latih Model Pengenalan Pose
                </h1>

                <p>
                    Buat dan latih model kecerdasan buatan
                    untuk membedakan beberapa pose tubuh.
                </p>

            </div>

            <button type="button" class="guide-button" onclick="openPoseGuideModal()" title="Petunjuk penggunaan"
                aria-label="Buka petunjuk penggunaan">
                !
            </button>

        </div>

        
        <div class="ai-main">

            {{-- KAMERA --}}
            <div class="camera-section">
                <div class="camera-wrapper">
                    <video id="webcam" autoplay playsinline></video>
                    <canvas id="canvas"></canvas>
                </div>

                <div class="progress-box">
                    <p id="trainingStatus">Belum dilatih</p>
                </div>

                <div class="test-section">

                    <h3>Hasil Prediksi Pose</h3>

                    <p class="test-description">
                        Setelah model dilatih, lakukan pose di depan kamera.
                        Hasil prediksi akan ditampilkan secara otomatis.
                    </p>

                    <div id="result" class="prediction-result">
                        Belum ada prediksi
                    </div>

                </div>
            </div>

            {{-- DATASET --}}
            <div class="dataset-section">

                <div class="dataset-header">
                    <h3>Dataset</h3>
                    <button onclick="addClass()">+ Tambah kelas</button>
                </div>

                <div class="dataset-info-box">
                    <span>Total Dataset</span>
                    <strong id="datasetInfo">0 data</strong>
                </div>

                <div id="classContainer" class="dataset-box">

                    <div class="upload-box" data-class-id="0">

                        <div class="class-header">

                            <div>
                                <span class="class-label">Kelas 1</span>

                                <h4 class="class-display-name">
                                    Belum diberi nama
                                </h4>
                            </div>

                            <span class="data-count">
                                0 data
                            </span>

                        </div>

                        <label class="input-label">
                            Nama kelas pose
                        </label>

                        <input type="text" class="class-name" placeholder="Contoh: Berdiri"
                            oninput="updatePoseClassName(this)">

                        <label class="input-label">
                            Nama data pose
                        </label>

                        <input type="text" class="sample-name" placeholder="Contoh: Berdiri pertama">

                        <button type="button" class="capture-btn" onclick="capturePose(this)">
                            Ambil Data Pose
                        </button>

                        <div class="sample-section">

                            <p class="sample-title">
                                Data yang diambil
                            </p>

                            <div class="sample-list">

                                <p class="empty-sample">
                                    Belum ada data pose.
                                </p>

                            </div>

                        </div>

                    </div>

                    <div class="upload-box" data-class-id="1">

                        <div class="class-header">

                            <div>
                                <span class="class-label">Kelas 2</span>

                                <h4 class="class-display-name">
                                    Belum diberi nama
                                </h4>
                            </div>

                            <span class="data-count">
                                0 data
                            </span>

                        </div>

                        <label class="input-label">
                            Nama kelas pose
                        </label>

                        <input type="text" class="class-name" placeholder="Contoh: Jongkok"
                            oninput="updatePoseClassName(this)">

                        <label class="input-label">
                            Nama data pose
                        </label>

                        <input type="text" class="sample-name" placeholder="Contoh: Jongkok pertama">

                        <button type="button" class="capture-btn" onclick="capturePose(this)">
                            Ambil Data Pose
                        </button>

                        <div class="sample-section">

                            <p class="sample-title">
                                Data yang diambil
                            </p>

                            <div class="sample-list">

                                <p class="empty-sample">
                                    Belum ada data pose.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="train-area">
                    <button class="train-btn" onclick="trainModel()">Latih AI</button>
                </div>

            </div>

        </div>

    </div>

    <div id="poseGuideModal" class="guide-modal" aria-hidden="true">

        <div class="guide-modal-overlay" onclick="closePoseGuideModal()"></div>

        <div class="guide-modal-content" role="dialog" aria-modal="true" aria-labelledby="poseGuideModalTitle">

            <div class="guide-modal-header">

                <div>

                    <span class="guide-modal-label">
                        Petunjuk
                    </span>

                    <h2 id="poseGuideModalTitle">
                        Cara Menggunakan Latih Pose
                    </h2>

                </div>

                <button type="button" class="guide-modal-close" onclick="closePoseGuideModal()" aria-label="Tutup petunjuk">
                    ×
                </button>

            </div>

            <div class="guide-modal-body">

                <div class="guide-step">

                    <span class="guide-step-number">
                        1
                    </span>

                    <div>

                        <h4>
                            Pastikan Tubuh Terlihat
                        </h4>

                        <p>
                            Berdirilah di depan kamera dan pastikan
                            bagian tubuh yang diperlukan terlihat jelas.
                        </p>

                    </div>

                </div>

                <div class="guide-step">

                    <span class="guide-step-number">
                        2
                    </span>

                    <div>

                        <h4>
                            Beri Nama Kelas Pose
                        </h4>

                        <p>
                            Masukkan nama pose yang ingin dibedakan,
                            misalnya Berdiri dan Jongkok.
                        </p>

                    </div>

                </div>

                <div class="guide-step">

                    <span class="guide-step-number">
                        3
                    </span>

                    <div>

                        <h4>
                            Beri Nama Data Pose
                        </h4>

                        <p>
                            Masukkan nama data pose agar setiap data
                            dapat dikenali, misalnya Berdiri Pertama.
                        </p>

                    </div>

                </div>

                <div class="guide-step">

                    <span class="guide-step-number">
                        4
                    </span>

                    <div>

                        <h4>
                            Ambil Data Pose
                        </h4>

                        <p>
                            Lakukan pose, kemudian klik
                            <strong>Ambil Data Pose</strong>
                            dan pertahankan posisi tubuh.
                        </p>

                    </div>

                </div>

                <div class="guide-step">

                    <span class="guide-step-number">
                        5
                    </span>

                    <div>

                        <h4>
                            Lengkapi Dataset
                        </h4>

                        <p>
                            Ambil minimal tiga data pada setiap kelas
                            dan gunakan jumlah data yang seimbang.
                        </p>

                    </div>

                </div>

                <div class="guide-step">

                    <span class="guide-step-number">
                        6
                    </span>

                    <div>

                        <h4>
                            Latih dan Uji Model
                        </h4>

                        <p>
                            Klik <strong>Latih AI</strong>.
                            Setelah selesai, lakukan pose di depan
                            kamera untuk melihat hasil prediksi.
                        </p>

                    </div>

                </div>

                <div class="guide-warning">

                    <span class="guide-warning-icon">
                        !
                    </span>

                    <p>
                        Gunakan jarak kamera, posisi tubuh, dan
                        pencahayaan yang cukup. Ambil data dengan
                        sedikit variasi agar model dapat mengenali
                        pose dengan lebih baik.
                    </p>

                </div>

            </div>

            <div class="guide-modal-footer">

                <button type="button" class="guide-understand-button" onclick="closePoseGuideModal()">
                    Saya Mengerti
                </button>

            </div>

        </div>

    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/latih-ai/latih-pose.css') }}">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/pose-detection"></script>
    <script src="{{ asset('js/latih-ai/latih-pose.js') }}"></script>
@endpush