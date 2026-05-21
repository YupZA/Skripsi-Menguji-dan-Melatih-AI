@extends('layouts-dosen.app')

@section('title', 'Data Kelas')

@section('content')

    <div class="data-kelas-page">

        <div class="page-header">
            <div class="header-flex">
                <div>
                    <h1>Data Kelas</h1>
                </div>

                <button class="info-btn" onclick="openInfoModal()">
                    <i class="fas fa-circle-info"></i>
                </button>
            </div>
        </div>

        <!-- STATS -->
        <div class="stats-grid">
            <div class="stat-card">
                <h4>Total Kelas</h4>
                <span>{{ $totalKelas }}</span>
            </div>

            <div class="stat-card">
                <h4>Total Siswa</h4>
                <span>{{ $totalSiswa }}</span>
            </div>

            <div class="stat-card">
                <h4>Rata-rata Progress</h4>
                <span>{{ $rataSemua }}%</span>
            </div>
        </div>


        <!-- SEARCH -->
        <div class="search-box">
            <input type="text" placeholder="Cari kelas...">
        </div>

        <div class="table-toolbar">

            <div class="show-entry">
                Tampilkan

                <form method="GET">

                    <select name="per_page" onchange="this.form.submit()">

                        <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>
                            5
                        </option>

                        <option value="10" {{ request('per_page', 10) == 10 ? 'selected' : '' }}>
                            10
                        </option>

                        <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>
                            25
                        </option>

                        <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>
                            50
                        </option>

                    </select>

                </form>

                data
            </div>

        </div>
        <!-- TABLE -->
        <div class="table-wrapper">
            <table class="kelas-table">
                <thead>
                    <tr>
                        <th>Nama Kelas</th>
                        <th>Jumlah Siswa</th>
                        <th>Progress Rata-rata</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($kelas as $item)
                        <tr>
                            <td>
                                {{ $item->nama_kelas }}

                                <br>
                                <small style="color:#9aa4bf;">
                                    Token: {{ $item->token }}
                                </small>
                            </td>

                            <td>{{ $item->jumlah_siswa }}</td>

                            <td>
                                <div class="mini-progress">
                                    <div class="mini-fill" style="width: {{ $item->rata_progress }}%"></div>
                                </div>
                                <small>{{ $item->rata_progress }}%</small>
                            </td>



                            <td>
                                <button class="btn-detail"
                                    onclick="openEditKelasModal(
                                                                                                                                            '{{ $item->id }}',
                                                                                                                                            '{{ $item->nama_kelas }}',
                                                                                                                                        )">
                                    Kelola
                                </button>

                            </td>
                        </tr>
                    @endforeach

                </tbody>

            </table>

        </div>

        <div class="table-info">
            Menampilkan
            {{ $kelas->firstItem() ?? 0 }}
            -
            {{ $kelas->lastItem() ?? 0 }}
            dari
            {{ $kelas->total() }}
            kelas
        </div>

        <div class="pagination-custom">

            @if($kelas->onFirstPage())
                <button disabled>Previous</button>
            @else
                <a href="{{ $kelas->previousPageUrl() }}">
                    Previous
                </a>
            @endif

            @if($kelas->hasMorePages())
                <a href="{{ $kelas->nextPageUrl() }}">
                    Next
                </a>
            @else
                <button disabled>Next</button>
            @endif

        </div>


    </div>

    <div class="modal-overlay" id="editKelasModal">
        <div class="modal-card glass">

            <div class="modal-header">
                <h3>Edit Kelas</h3>
                <span class="modal-close" onclick="closeEditKelas()">×</span>
            </div>

            <form method="POST" id="editKelasForm">
                @csrf
                @method('PUT')

                <div class="register-field">
                    <label>Nama Kelas</label>
                    <input type="text" name="nama_kelas" id="editNamaKelas" required>
                </div>

                <button class="register-btn">
                    Simpan Perubahan
                </button>

            </form>

        </div>
    </div>

    <div class="modal-overlay" id="infoModal">

        <div class="modal-card glass">

            <div class="modal-header">
                <h3>Informasi Halaman</h3>

                <span class="modal-close" onclick="closeInfoModal()">
                    ×
                </span>
            </div>

            <div class="modal-body">

                <p>
                    Halaman ini digunakan untuk melihat dan
                    mengelola seluruh kelas yang Anda ampu.
                </p>

                <ul>
                    <li>Melihat daftar kelas.</li>
                    <li>Melihat jumlah siswa.</li>
                    <li>Melihat rata-rata progress belajar.</li>
                    <li>Mengubah nama kelas.</li>
                    <li>Mengakses informasi token kelas.</li>
                </ul>

            </div>

        </div>

    </div>

@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/guru/data-kelas.css') }}">
@endpush

@push('scripts')
    <script>
        function openEditKelasModal(id, nama, status) {

            const modal = document.getElementById('editKelasModal');
            modal.classList.add('active');   // ⬅️ pakai active

            document.getElementById('editNamaKelas').value = nama;

            document.getElementById('editKelasForm').action =
                "/guru/kelas/" + id;
        }

        function closeEditKelas() {
            document.getElementById('editKelasModal')
                .classList.remove('active');   // ⬅️ pakai active
        }

        function openInfoModal() {
            document
                .getElementById('infoModal')
                .classList.add('active');
        }

        function closeInfoModal() {
            document
                .getElementById('infoModal')
                .classList.remove('active');
        }


    </script>
@endpush