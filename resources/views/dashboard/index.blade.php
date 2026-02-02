@extends('layouts.app')

@section('title', 'Dashboard - AI')

@section('content')
    <div class="dashboard">

        <!-- header -->
        <div class="dashboard-header">
            <h1>Dashboard</h1>
            <p>Ringkasan progres belajar kamu</p>
        </div>

        <!-- card -->
        <div class="dashboard-cards">

            <div class="card glass">
                <h3>Total Materi</h3>
                <span class="card-number">12</span>
            </div>

            <div class="card glass">
                <h3>Materi Selesai</h3>
                <span class="card-number">{{ $completed }}</span>
            </div>

            <div class="card glass">
                <h3>Latihan AI</h3>
                <span class="card-number">3</span>
            </div>

        </div>

        <!-- progress -->
        <h2>Total Progress</h2>

        <div class="progress-bar">
            <div class="progress-fill" style="width: {{ $percent }}%"></div>
        </div>

        <p>
            {{ $completed }} / {{ $totalMateri }} materi selesai
            ({{ $percent }}%)
        </p>

    </div>


@endsection



@push('scripts')
    <script src="{{ asset('js/dashboard/dashboard.js') }}"></script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard/dashboard.css') }}">
@endpush