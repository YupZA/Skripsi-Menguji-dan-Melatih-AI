@extends('layouts.navbar_dashboard')

@section('title', 'Latih AI')

@section('content')

    <div class="ai-container">

        <h1>Latih Gambar</h1>
        <p>Melatih AI untuk membedakan berbagai gambar</p>

        <div id="classContainer" class="dataset-box">

            <!-- Class 1 -->
            <div class="upload-box">

                <label>Class 1</label>

                <input type="text" class="class-name" placeholder="Nama class">

                <input type="file" class="class-images" multiple accept="image/*">

                <p class="image-count">0 gambar</p>

            </div>

            <!-- Class 2 -->
            <div class="upload-box">

                <label>Class 2</label>

                <input type="text" class="class-name" placeholder="Nama class">

                <input type="file" class="class-images" multiple accept="image/*">

                <p class="image-count">0 gambar</p>

            </div>

        </div>

        <div class="ai-controls">

            <div class="control-buttons">
                <button class="add-class-btn" onclick="addClass()">+ Tambah Class</button>
                <button class="train-btn" onclick="trainModel()">Latih AI</button>
            </div>

            <div class="progress-box">
                <p id="trainingStatus">Belum dilatih</p>
            </div>

        </div>

        <div class="test-section">

            <h3>Test Gambar</h3>

            <div class="test-box">
                <input type="file" id="testImage" accept="image/*">
                <button class="predict-btn" onclick="predict()">Prediksi</button>
            </div>

            <p id="result"></p>

        </div>

@endsection

    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/latih/latih-ai.css') }}">
    @endpush

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@latest/dist/tf.min.js"></script>
        <script
            src="https://cdn.jsdelivr.net/npm/@teachablemachine/image@latest/dist/teachablemachine-image.min.js"></script>
        <script src="{{ asset('js/latih/latih-ai.js') }}"></script>
    @endpush