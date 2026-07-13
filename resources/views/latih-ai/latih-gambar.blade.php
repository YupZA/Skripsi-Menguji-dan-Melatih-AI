@extends('layouts.navbar_dashboard')

@section('title', 'Latih AI')

@section('content')

    <div class="ai-container">

        <div class="page-title-wrapper">

            <div>
                <h1>Latih Model Pengenalan Gambar</h1>

                <p>
                    Buat dan latih model kecerdasan buatan untuk membedakan
                    beberapa kelompok gambar.
                </p>
            </div>

            <button type="button" class="guide-button" onclick="openGuideModal()" aria-label="Buka petunjuk penggunaan"
                title="Petunjuk penggunaan">
                !
            </button>

        </div>

        <div id="classContainer" class="dataset-box">

            <!-- Class 1 -->
            <div class="upload-box">

                <div class="class-header">
                    <label>Kelas 1</label>
                    <span class="class-badge">Dataset 1</span>
                </div>

                <input type="text" class="class-name" placeholder="Contoh: Bekantan">

                <label class="input-label">Masukkan data gambar</label>

                <input type="file" class="class-images" multiple accept="image/*">

                <p class="image-count">Belum ada gambar</p>

                <div class="image-preview"></div>

            </div>

            <!-- Class 2 -->
            <div class="upload-box">

                <div class="class-header">
                    <label>Kelas 2</label>
                    <span class="class-badge">Dataset 2</span>
                </div>

                <input type="text" class="class-name" placeholder="Contoh: Monyet">

                <label class="input-label">
                    Masukkan data gambar
                </label>

                <input type="file" class="class-images" multiple accept="image/*">

                <p class="image-count">Belum ada gambar</p>

                <div class="image-preview"></div>

            </div>

        </div>

        <div class="ai-controls">

            <div class="control-buttons">
                <button class="add-class-btn" onclick="addClass()">+ Tambah kelas</button>
                <button class="train-btn" onclick="trainModel()">Latih AI</button>
            </div>

            <div class="progress-box">
                <p id="trainingStatus">Belum dilatih</p>
            </div>

        </div>

        <div class="test-section">

            <h3>Uji Model AI</h3>

            <p class="section-description">
                Masukkan gambar baru yang tidak digunakan saat pelatihan.
                Model akan memprediksi kelas gambar tersebut.
            </p>

            <div class="test-box">

                <input type="file" id="testImage" accept="image/*">

                <button type="button" class="predict-btn" onclick="predict()">
                    Prediksi Gambar
                </button>

            </div>

            <div id="testPreview" class="test-preview"></div>

            <div id="result" class="prediction-result"></div>

        </div>

        <div id="guideModal" class="guide-modal" aria-hidden="true">

            <div class="guide-modal-overlay" onclick="closeGuideModal()"></div>

            <div class="guide-modal-content" role="dialog" aria-modal="true" aria-labelledby="guideModalTitle">

                <div class="guide-modal-header">

                    <div>
                        <span class="guide-modal-label">Petunjuk</span>
                        <h2 id="guideModalTitle">Cara Menggunakan Latih Gambar</h2>
                    </div>

                    <button type="button" class="guide-modal-close" onclick="closeGuideModal()" aria-label="Tutup petunjuk">
                        ×
                    </button>

                </div>

                <div class="guide-modal-body">

                    <div class="guide-step">

                        <span class="guide-step-number">1</span>

                        <div>
                            <h4>Beri Nama Kelas</h4>
                            <p>
                                Masukkan nama pada setiap kelas sesuai dengan kelompok
                                gambar yang ingin dibedakan, misalnya Bekantan dan Monyet.
                            </p>
                        </div>

                    </div>

                    <div class="guide-step">

                        <span class="guide-step-number">2</span>

                        <div>
                            <h4>Masukkan Data Gambar</h4>
                            <p>
                                Pilih beberapa gambar untuk setiap kelas sebagai data
                                yang digunakan dalam proses pelatihan model.
                            </p>
                        </div>

                    </div>

                    <div class="guide-step">

                        <span class="guide-step-number">3</span>

                        <div>
                            <h4>Latih Model AI</h4>
                            <p>
                                Klik tombol <strong>Latih AI</strong>, kemudian tunggu
                                hingga proses pelatihan selesai.
                            </p>
                        </div>

                    </div>

                    <div class="guide-step">

                        <span class="guide-step-number">4</span>

                        <div>
                            <h4>Uji Model</h4>
                            <p>
                                Masukkan gambar baru yang tidak digunakan saat pelatihan,
                                kemudian klik tombol <strong>Prediksi Gambar</strong>.
                            </p>
                        </div>

                    </div>

                    <div class="guide-warning">

                        <span class="guide-warning-icon">!</span>

                        <p>
                            Gunakan jumlah gambar yang seimbang pada setiap kelas.
                            Gunakan juga gambar dengan variasi posisi, sudut,
                            latar belakang, dan pencahayaan.
                        </p>

                    </div>

                </div>

                <div class="guide-modal-footer">

                    <button type="button" class="guide-understand-button" onclick="closeGuideModal()">
                        Saya Mengerti
                    </button>

                </div>

            </div>

        </div>

@endsection

    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/latih-ai/latih-gambar.css') }}">
    @endpush

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@latest/dist/tf.min.js"></script>
        <script
            src="https://cdn.jsdelivr.net/npm/@teachablemachine/image@latest/dist/teachablemachine-image.min.js"></script>
        <script src="{{ asset('js/latih-ai/latih-gambar.js') }}"></script>
    @endpush