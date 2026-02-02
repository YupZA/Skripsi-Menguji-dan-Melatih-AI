@extends('layouts.navbar_dashboard')

@section('title', 'Latih AI')

@section('content')
    <div class="train-ai-page">


        <section class="train-ai-card">
            <h1 class="train-ai-title">Latih AI</h1>


            <p class="train-ai-desc">
                Tempel link model dari <strong>Google Teachable Machine</strong>,
                lalu coba dengan kamera atau upload gambar.
            </p>


            <input type="text" id="trainAiModelInput" class="train-ai-input"
                placeholder="Masukkan link">


            <div class="train-ai-actions">
                <button id="trainAiLoadModelBtn" class="train-ai-btn train-ai-btn-primary">
                    Load Model
                </button>


                <button id="trainAiCameraBtn" class="train-ai-btn train-ai-btn-secondary">
                    Kamera
                </button>


                <button id="trainAiUploadBtn" class="train-ai-btn train-ai-btn-secondary">
                    Upload Gambar
                </button>

                <button id="trainAiAudioBtn" class="train-ai-btn train-ai-btn-secondary">
                    Upload Suara
                </button>
            </div>


            <input type="file" id="trainAiImageFile" accept="image/*" hidden>
            <input type="file" id="trainAiAudioFile" accept="audio/*" hidden>


            <div class="train-ai-preview" id="trainAiPreviewArea"></div>
            <div class="train-ai-result" id="trainAiResultArea"></div>


            <p class="train-ai-note">
                AI belajar dari contoh data yang kamu berikan
            </p>
        </section>


    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/latih/latih-ai.css') }}">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@latest/dist/tf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@teachablemachine/image@latest/dist/teachablemachine-image.min.js"></script>
    <script src="{{ asset('js/latih/latih-ai.js') }}"></script>
@endpush