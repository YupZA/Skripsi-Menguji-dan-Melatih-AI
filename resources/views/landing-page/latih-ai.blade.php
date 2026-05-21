@extends('layouts.navbar_dashboard')

@section('title', 'Pilih Latih AI')

@section('content')
    <div class="ai-container">

        <h1>Pilih Mode Latih AI</h1>
        <p>Pilih jenis AI yang ingin kamu latih</p>

        <div class="card-wrapper">

            <!-- Card Latih Gambar -->
            <a href="{{ route('latih.gambar') }}" class="ai-card">
                <div class="card-icon">🖼️</div>
                <h3>Latih Gambar</h3>
                <p>Latih AI mengenali objek dari gambar</p>
            </a>

            <!-- Card Latih Suara -->
            <a href="{{ route('latih.suara') }}" class="ai-card">
                <div class="card-icon">🎤</div>
                <h3>Latih Suara</h3>
                <p>Latih AI mengenali berbagai jenis suara dari mikrofon</p>
            </a>

            <!-- Card Latih Pose -->
            <a href="{{ route('latih.pose') }}" class="ai-card">
                <div class="card-icon">🧍</div>
                <h3>Latih Pose Tubuh</h3>
                <p>Latih AI mengenali pose tubuh dari webcam</p>
            </a>

        </div>

    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/landing-page/latih-ai.css') }}">
@endpush