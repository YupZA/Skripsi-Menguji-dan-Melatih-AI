@extends('layouts.navbar_dashboard')

@section('title', 'Latih AI Suara')

@section('content')

<div class="audio-ai-container">

    {{-- HEADER --}}
    <div class="page-header">
        <h1>Latih Suara</h1>
        <p>Latih AI mengenali berbagai jenis suara menggunakan mikrofon</p>
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

            <button
                class="btn-primary"
                onclick="addClass()">
                + Tambah Kelas
            </button>

        </div>

        <div
            id="classContainer"
            class="class-grid">

            {{-- KELAS 1 --}}
            <div class="audio-class-card">

                <div class="card-top">
                    <h4>Kelas 1</h4>
                    <span class="data-count">0 data</span>
                </div>

                <input
                    type="text"
                    class="class-name"
                    placeholder="Contoh: Tepuk Tangan">

                <button
                    class="record-btn"
                    onclick="recordSample(0)">
                    Rekam 3 Detik
                </button>

            </div>

            {{-- KELAS 2 --}}
            <div class="audio-class-card">

                <div class="card-top">
                    <h4>Kelas 2</h4>
                    <span class="data-count">0 data</span>
                </div>

                <input
                    type="text"
                    class="class-name"
                    placeholder="Contoh: Siulan">

                <button
                    class="record-btn"
                    onclick="recordSample(1)">
                    Rekam 3 Detik
                </button>

            </div>

        </div>

    </div>

    {{-- TRAIN --}}
    <div class="train-section">

        <button
            class="train-btn"
            onclick="trainModel()">
            Latih AI
        </button>

    </div>

    {{-- TEST --}}
    <div class="test-section">

        <h3>Tes Suara</h3>

        <p class="test-desc">
            Klik tombol di bawah untuk mencoba mengenali suara.
        </p>

        <button
            class="test-btn"
            onclick="startListening()">
            Mulai Mendengar
        </button>

        <div class="result-box">
            <p id="result">
                Belum ada prediksi
            </p>
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