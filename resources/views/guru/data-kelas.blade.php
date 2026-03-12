@extends('layouts-dosen.app')

@section('title', 'Data Kelas')

@section('content')

    <div class="data-kelas-page">

        <div class="page-header">
            <h1>Data Kelas</h1>
            <p>Daftar kelas yang kamu ampu</p>
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

        <!-- TABLE -->
        <div class="table-wrapper">
            <table class="kelas-table">
                <thead>
                    <tr>
                        <th>Nama Kelas</th>
                        <th>Jumlah Siswa</th>
                        <th>Progress Rata-rata</th>
                        <th>Status</th>
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
                                <span class="badge-status {{ $item->status }}">
                                    {{ ucfirst($item->status) }}
                                </span>


                                </span>
                            </td>

                            <td>
                                <button class="btn-detail" onclick="openEditKelasModal(
                                                                    '{{ $item->id }}',
                                                                    '{{ $item->nama_kelas }}',
                                                                    '{{ $item->status }}'
                                                                )">
                                    Kelola
                                </button>

                            </td>
                        </tr>
                    @endforeach

                </tbody>

            </table>

            <!-- EDIT KELAS MODAL -->


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

                <div class="register-field">
                    <label>Status</label>
                    <select name="status" id="editStatusKelas">
                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Nonaktif</option>
                    </select>
                </div>

                <button class="register-btn">
                    Simpan Perubahan
                </button>

            </form>

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
            document.getElementById('editStatusKelas').value = status;

            document.getElementById('editKelasForm').action =
                "/guru/kelas/" + id;
        }

        function closeEditKelas() {
            document.getElementById('editKelasModal')
                .classList.remove('active');   // ⬅️ pakai active
        }


    </script>
@endpush