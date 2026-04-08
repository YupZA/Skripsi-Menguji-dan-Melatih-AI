@extends('layouts.navbar_dashboard')

@section('title', 'Latih AI Pose')

@section('content')
    <div class="ai-container">

        <h1>Latih Pose Tubuh</h1>

        {{-- 🔥 WRAPPER UTAMA --}}
        <div class="ai-main">

            {{-- 🔥 KAMERA --}}
            <div class="camera-section">
                <div class="camera-wrapper">
                    <video id="webcam" autoplay playsinline></video>
                    <canvas id="canvas"></canvas>
                </div>

                <div class="progress-box">
                    <p id="trainingStatus">Belum dilatih</p>
                </div>

                <div class="test-section">
                    <h3>Prediksi</h3>
                    <p id="result">-</p>
                </div>
            </div>

            {{-- 🔥 DATASET --}}
            <div class="dataset-section">

                <div class="dataset-header">
                    <h3>Dataset</h3>
                    <button onclick="addClass()">+ Tambah kelas</button>
                </div>

                <div id="classContainer" class="dataset-box">

                    {{-- 🔥 DEFAULT CLASS (biar langsung bisa pakai) --}}
                    <div class="upload-box">
                        <label>Kelas 1</label>
                        <input type="text" class="class-name" placeholder="Nama kelas">
                        <p class="data-count">0 data</p>
                        <button onclick="capturePose(0)">Ambil Data</button>
                    </div>

                    <div class="upload-box">
                        <label>Kelas 2</label>
                        <input type="text" class="class-name" placeholder="Nama kelas">
                        <p class="data-count">0 data</p>
                        <button onclick="capturePose(1)">Ambil Data</button>
                    </div>

                </div>

                <div class="train-area">
                    <button class="train-btn" onclick="trainModel()">Latih AI</button>
                </div>

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