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
                    <img src="{{ auth()->user()->profile_photo
        ? asset('storage/' . auth()->user()->profile_photo)
        : 'https://ui-avatars.com/api/?name=' . auth()->user()->name . '&background=0f172a&color=00f5ff' }}"
                        alt="Avatar">

                </div>

                <div class="student-info">
                    <div class="profile-header">
                        <h3>Profil Kamu</h3>
                        <button class="edit-profile-btn" onclick="openEditProfile()">
                            Edit
                        </button>

                    </div>

                    <p><span>Role :</span>{{ ucfirst(auth()->user()->role) }}</p>
                    <p><span>Nama :</span>{{ auth()->user()->name }}</p>
                    <p><span>Email :</span>{{ auth()->user()->email }}</p>
                </div>
            </div>

            <!-- OVERLAY -->
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

                        <!-- FOTO PROFIL -->
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

        <!-- ============================= -->
        <!-- PROGRESS MATERI -->
        <!-- ============================= -->
        <div class="dashboard-cards">

            <div class="card glass dashboard-block">
                <h2 class="block-title">Progress Materi</h2>

                <div class="block-content">
                    <div class="mini-stat">
                        <span>Total Materi</span>
                        <strong>{{ $totalMateri }}</strong>
                    </div>

                    <div class="mini-stat">
                        <span>Materi Selesai</span>
                        <strong>{{ $completed }}</strong>
                    </div>
                </div>

                <div class="progress-bar">
                    <div class="progress-fill" style="width: {{ $percent }}%"></div>
                </div>

                <p class="progress-text">
                    {{ $percent }}% selesai
                </p>
            </div>


            <!-- ============================= -->
            <!-- QUIZ -->
            <!-- ============================= -->
            <div class="card glass dashboard-block quiz-card-clickable" onclick="openQuizModal()">

                <h2 class="block-title">Kuis</h2>

                <div class="block-content">
                    <div class="mini-stat">
                        <span>Diselesaikan</span>
                        <strong>{{ $jumlahQuiz }}</strong>
                    </div>

                    <div class="mini-stat">
                        <span>Status</span>
                        <strong class="{{ $statusQuiz == 'Lulus' ? 'text-success' : 'text-danger' }}">
                            {{ $statusQuiz }}
                        </strong>
                    </div>
                </div>

                <div class="progress-bar">
                    <div class="progress-fill" style="width: {{ $percentQuiz }}%"></div>
                </div>

                <p class="progress-text">
                    Klik untuk melihat detail nilai →
                </p>
            </div>


            <!-- ============================= -->
            <!-- EVALUASI -->
            <!-- ============================= -->
            <div class="card glass dashboard-block">
                <h2 class="block-title">Evaluasi</h2>

                <div class="block-content">
                    <div class="mini-stat">
                        <span>Nilai</span>
                        <strong>{{ $nilaiEvaluasi ?? 0 }}</strong>
                    </div>

                    <div class="mini-stat">
                        <span>Status</span>
                        <strong class="{{ $statusEvaluasi == 'Lulus' ? 'text-success' : 'text-danger' }}">
                            {{ $statusEvaluasi ?? 'Belum Ada' }}
                        </strong>
                    </div>
                </div>

                <div class="progress-bar">
                    <div class="progress-fill" style="width: {{ $percentEvaluasi }}%">
                    </div>
                </div>

                <p class="progress-text">
                    {{ $percentEvaluasi }}%
                </p>
            </div>

        </div>

        <!-- QUIZ DETAIL MODAL -->
        <div class="modal-overlay hidden" id="quizModal">
            <div class="modal-card glass">

                <div class="modal-header">
                    <h3>Detail Nilai Kuis</h3>
                    <span class="modal-close" onclick="closeQuizModal()">×</span>
                </div>

                <div class="quiz-table-wrapper">
                    <table class="quiz-table">
                        <thead>
                            <tr>
                                <th>Kuis</th>
                                <th>Nilai</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Kuis 1</td>
                                <td>{{ $nilaiQuiz1 }}</td>
                                <td class="{{ $nilaiQuiz1 >= 70 ? 'text-success' : 'text-danger' }}">
                                    {{ $nilaiQuiz1 >= 70 ? 'Lulus' : 'Remedial' }}
                                </td>
                            </tr>
                            <tr>
                                <td>Kuis 2</td>
                                <td>{{ $nilaiQuiz2 }}</td>
                                <td class="{{ $nilaiQuiz2 >= 70 ? 'text-success' : 'text-danger' }}">
                                    {{ $nilaiQuiz2 >= 70 ? 'Lulus' : 'Remedial' }}
                                </td>
                            </tr>
                            <tr>
                                <td>Kuis 3</td>
                                <td>{{ $nilaiQuiz3 }}</td>
                                <td class="{{ $nilaiQuiz3 >= 70 ? 'text-success' : 'text-danger' }}">
                                    {{ $nilaiQuiz3 >= 70 ? 'Lulus' : 'Remedial' }}
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td><strong>Rata-rata</strong></td>
                                <td><strong>{{ $rataQuiz }}</strong></td>
                                <td class="{{ $rataQuiz >= 70 ? 'text-success' : 'text-danger' }}">
                                    <strong>{{ $rataQuiz >= 70 ? 'Lulus' : 'Belum Lulus' }}</strong>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

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