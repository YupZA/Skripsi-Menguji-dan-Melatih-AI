@extends('layouts.app')

@section('title', 'Dashboard - AI')

@section('content')
    <div class="dashboard">

        <!-- header -->
        <div class="dashboard-header">
            <h1>Dashboard</h1>
        </div>

        <!-- profil siswa -->
        <div class="dashboard-cards">
            <div class="student-profile-future">
                <div class="avatar-wrap">
                    <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&background=0f172a&color=00f5ff"
                        alt="Avatar">
                </div>

                <div class="student-info">
                    <h3>Profil Kamu</h3>
                    <p><span>Role :</span>{{ ucfirst(auth()->user()->role) }}</p>
                    <p><span>Nama :</span>{{ auth()->user()->name }}</p>
                    <p><span>Email :</span>{{ auth()->user()->email }}</p>
                </div>
            </div>

            <div class="student-profile-future">
                <div class="avatar-wrap">
                    <img src="https://ui-avatars.com/api/?name={{ $guru->name ?? 'Guru' }}&background=0f172a&color=00f5ff"
                        alt="Avatar Guru">
                </div>

                <div class="student-info">
                    <h3>Profil Guru</h3>

                    @if($guru)
                        <p><span>Role :</span>{{ ucfirst($guru->role) }}</p>
                        <p><span>Nama :</span>{{ $guru->name }}</p>
                        <p><span>Email :</span>{{ $guru->email }}</p>
                    @else
                        <p><em>Data guru belum tersedia</em></p>
                    @endif
                </div>

            </div>

        </div>

        <!-- card -->
        <div class="dashboard-cards">

            <div class="card glass">
                <h3>Total Materi</h3>
                <span class="card-number">10</span>
            </div>

            <div class="card glass">
                <h3>Materi Selesai</h3>
                <span class="card-number">{{ $completed }}</span>
            </div>

            <div class="card glass">
                <h3>Kuis</h3>
                <span class="card-number">3</span>
            </div>

        </div>

        <div class="dashboard-cards">
            <div class="card glass">
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

        </div>



    </div>


@endsection



@push('scripts')
    <script src="{{ asset('js/dashboard/dashboard.js') }}"></script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard/dashboard.css') }}">
@endpush