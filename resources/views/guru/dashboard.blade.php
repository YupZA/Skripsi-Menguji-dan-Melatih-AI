@extends('layouts-dosen.app')

@section('title', 'Dashboard Guru')

@section('content')

    <div class="dashboard">

        <div class="dashboard-header">
            <h1>Dashboard Guru</h1>
            <p>Ringkasan aktivitas dan perkembangan siswa</p>
        </div>

        <div class="dashboard-cards">

            <div class="student-profile-future">
                <div class="avatar-wrap">
                    <img src="{{ auth()->user()->profile_photo
        ? asset('storage/' . auth()->user()->profile_photo)
        : 'https://ui-avatars.com/api/?name=' . auth()->user()->name . '&background=0f172a&color=00f5ff' }}"
                        alt="Avatar Guru">
                </div>

                <div class="student-info">
                    <div class="profile-header">
                        <h3>Profil Guru</h3>
                        <button class="edit-profile-btn" onclick="openEditProfile()">
                            Edit
                        </button>
                    </div>

                    <p><span>Role :</span>{{ ucfirst(auth()->user()->role) }}</p>
                    <p><span>Nama :</span>{{ auth()->user()->name }}</p>
                    <p><span>Email :</span>{{ auth()->user()->email }}</p>
                </div>
            </div>

            <div class="card glass">

                <h3 class="card-title">Buat Kelas Baru</h3>

                <form method="POST" action="{{ route('guru.kelas.store') }}" class="create-class-form">
                    @csrf

                    <div class="form-group">
                        <label>Nama Kelas</label>
                        <input type="text" name="nama_kelas" placeholder="Contoh: XI IPA 1" required>
                    </div>

                    <button type="submit" class="btn-generate">
                        Generate Token
                    </button>
                </form>

            </div>


        </div>

        <!-- OVERLAY EDIT PROFIL GURU -->
        <div class="modal-overlay hidden" id="editProfileModal">
            <div class="modal-card glass">

                <div class="modal-header">
                    <h3>Edit Profil</h3>
                    <span class="modal-close" onclick="closeEditProfile()">×</span>
                </div>

                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="register-field">
                        <label>Nama</label>
                        <input name="name" value="{{ auth()->user()->name }}" required>
                    </div>

                    <div class="register-field">
                        <label>Foto Profil</label>
                        <input type="file" name="profile_photo" accept="image/*">
                    </div>

                    <div class="register-field">
                        <label>Password Baru (opsional)</label>
                        <input type="password" name="password" placeholder="Kosongkan jika tidak diganti">
                    </div>

                    <button class="register-btn">
                        Simpan Perubahan
                    </button>
                </form>

            </div>
        </div>



        <div class="dashboard-cards">

            <div class="card glass">
                <h3>Total Siswa</h3>
                <span class="card-number">{{ $totalSiswa }}</span>
            </div>

            <div class="card glass">
                <h3>Siswa Aktif</h3>
                <span class="card-number">{{ $aktif }}</span>
            </div>

            <div class="card glass">
                <h3>Nonaktif</h3>
                <span class="card-number">{{ $nonaktif }}</span>
            </div>

            <div class="card glass">
                <h3>Rata-rata Progress</h3>
                <span class="card-number">{{ $rataProgress }}</span>
            </div>

        </div>

    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/dashboard/dashboard.js') }}"></script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/guru/dashboard.css') }}">
@endpush