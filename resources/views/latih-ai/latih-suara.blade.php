@extends('layouts.navbar_dashboard')

@section('title', 'Latih AI Suara')

@section('content')

    <div class="audio-ai-container">

        {{-- HEADER --}}
        <div class="page-header-wrapper">

            <div class="page-header">
                <h1>Latih Model Pengenalan Suara</h1>

                <p>
                    Latih AI untuk membedakan beberapa jenis suara
                    menggunakan mikrofon.
                </p>
            </div>

            <button type="button" class="guide-button" onclick="openAudioGuideModal()" title="Petunjuk penggunaan"
                aria-label="Buka petunjuk penggunaan">
                !
            </button>

        </div>

        {{-- STATUS PANEL --}}
        <div class="status-panel">

            <div class="status-card">
                <span>Status Rekaman</span>
                <p id="recordStatus">Belum merekam</p>
            </div>

            <div class="status-card">
                <span>Total Dataset</span>
                <p id="datasetInfo">0 sampel</p>
            </div>

            <div class="status-card">
                <span>Status AI</span>
                <p id="trainingStatus">Belum dilatih</p>
            </div>

        </div>

        {{-- DATASET --}}
        <div class="dataset-section">

            <div class="dataset-header">

                <h3>Dataset Suara</h3>

                <button class="btn-primary" onclick="addClass()">
                    + Tambah Kelas
                </button>

            </div>

            <div class="audio-class-card" data-class-id="0">

                <div class="card-top">
                    <div>
                        <span class="class-label">Kelas 1</span>
                        <h4 class="class-display-name">Belum diberi nama</h4>
                    </div>

                    <span class="data-count">0 data</span>
                </div>

                <label class="input-label">Nama kelas suara</label>

                <input type="text" class="class-name" placeholder="Contoh: Tepuk Tangan"
                    oninput="updateAudioClassName(this)">

                <label class="input-label">Nama data suara</label>

                <input type="text" class="sample-name" placeholder="Contoh: Tepuk tangan pertama">

                <button type="button" class="record-btn" onclick="recordSample(this)">
                    Rekam 3 Detik
                </button>

                <div class="sample-section">
                    <p class="sample-title">Data yang direkam</p>

                    <div class="sample-list">
                        <p class="empty-sample">Belum ada data suara.</p>
                    </div>
                </div>

            </div>

            {{-- KELAS 2 --}}
            <div class="audio-class-card" data-class-id="1">

                <div class="card-top">
                    <div>
                        <span class="class-label">Kelas 2</span>
                        <h4 class="class-display-name">Belum diberi nama</h4>
                    </div>

                    <span class="data-count">0 data</span>
                </div>

                <label class="input-label">Nama kelas suara</label>

                <input type="text" class="class-name" placeholder="Contoh: Siulan" oninput="updateAudioClassName(this)">

                <label class="input-label">Nama data suara</label>

                <input type="text" class="sample-name" placeholder="Contoh: Siulan pertama">

                <button type="button" class="record-btn" onclick="recordSample(this)">
                    Rekam 3 Detik
                </button>

                <div class="sample-section">
                    <p class="sample-title">Data yang direkam</p>

                    <div class="sample-list">
                        <p class="empty-sample">Belum ada data suara.</p>
                    </div>
                </div>

            </div>

        </div>

        {{-- TRAIN --}}
        <div class="train-section">

            <button class="train-btn" onclick="trainModel()">
                Latih AI
            </button>

        </div>

        {{-- TEST --}}
        <div class="test-section">

            <h3>Uji Model Suara</h3>

            <p class="test-desc">
                Klik Mulai Mendengar, kemudian buat suara yang ingin dikenali.
                Klik Berhenti untuk mengakhiri pengujian.
            </p>

            <div class="test-controls">

                <button type="button" class="test-btn" id="startListeningButton" onclick="startListening()">
                    Mulai Mendengar
                </button>

                <button type="button" class="stop-btn" id="stopListeningButton" onclick="stopListening()" disabled>
                    Berhenti
                </button>

            </div>

            <p id="listeningStatus" class="listening-status">
                Mikrofon belum aktif.
            </p>

            <div id="result" class="prediction-result">
                Belum ada prediksi
            </div>

        </div>

    </div>


    <div id="audioGuideModal" class="guide-modal" aria-hidden="true">

        <div class="guide-modal-overlay" onclick="closeAudioGuideModal()"></div>

        <div class="guide-modal-content" role="dialog" aria-modal="true" aria-labelledby="audioGuideModalTitle">

            <div class="guide-modal-header">

                <div>
                    <span class="guide-modal-label">
                        Petunjuk
                    </span>

                    <h2 id="audioGuideModalTitle">
                        Cara Menggunakan Latih Suara
                    </h2>
                </div>

                <button type="button" class="guide-modal-close" onclick="closeAudioGuideModal()"
                    aria-label="Tutup petunjuk">
                    ×
                </button>

            </div>

            <div class="guide-modal-body">

                <div class="guide-step">

                    <span class="guide-step-number">
                        1
                    </span>

                    <div>
                        <h4>Beri Nama Kelas Suara</h4>

                        <p>
                            Masukkan nama pada setiap kelas sesuai dengan
                            jenis suara yang ingin dibedakan, misalnya
                            Tepuk Tangan dan Siulan.
                        </p>
                    </div>

                </div>

                <div class="guide-step">

                    <span class="guide-step-number">
                        2
                    </span>

                    <div>
                        <h4>Beri Nama Data Suara</h4>

                        <p>
                            Masukkan nama data sebelum melakukan rekaman,
                            misalnya Tepuk Tangan Pertama atau Siulan Pertama.
                        </p>
                    </div>

                </div>

                <div class="guide-step">

                    <span class="guide-step-number">
                        3
                    </span>

                    <div>
                        <h4>Rekam Data Suara</h4>

                        <p>
                            Klik tombol <strong>Rekam 3 Detik</strong>,
                            kemudian buat suara sesuai dengan kelas yang dipilih.
                        </p>
                    </div>

                </div>

                <div class="guide-step">

                    <span class="guide-step-number">
                        4
                    </span>

                    <div>
                        <h4>Lengkapi Dataset</h4>

                        <p>
                            Rekam minimal dua data untuk setiap kelas.
                            Sebaiknya gunakan jumlah data yang seimbang
                            pada semua kelas.
                        </p>
                    </div>

                </div>

                <div class="guide-step">

                    <span class="guide-step-number">
                        5
                    </span>

                    <div>
                        <h4>Latih Model AI</h4>

                        <p>
                            Setelah data suara tersedia, klik tombol
                            <strong>Latih AI</strong> dan tunggu sampai
                            proses pelatihan selesai.
                        </p>
                    </div>

                </div>

                <div class="guide-step">

                    <span class="guide-step-number">
                        6
                    </span>

                    <div>
                        <h4>Uji Model Suara</h4>

                        <p>
                            Klik tombol <strong>Mulai Mendengar</strong>,
                            kemudian buat suara yang ingin dikenali.
                            Klik <strong>Berhenti</strong> untuk mengakhiri pengujian.
                        </p>
                    </div>

                </div>

                <div class="guide-warning">

                    <span class="guide-warning-icon">
                        !
                    </span>

                    <p>
                        Lakukan perekaman di tempat yang tidak terlalu bising.
                        Gunakan jarak mikrofon yang hampir sama dan buat suara
                        dengan jelas agar model lebih mudah membedakan setiap kelas.
                    </p>

                </div>

            </div>

            <div class="guide-modal-footer">

                <button type="button" class="guide-understand-button" onclick="closeAudioGuideModal()">
                    Saya Mengerti
                </button>

            </div>

        </div>

    </div>

@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/latih-ai/latih-suara.css') }}">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs"></script>
    <script src="{{ asset('js/latih-ai/latih-suara.js') }}"></script>
@endpush