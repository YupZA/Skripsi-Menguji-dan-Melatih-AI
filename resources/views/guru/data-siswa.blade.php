@extends('layouts-dosen.app')

@section('title', 'Data Siswa')

@section('content')

    <div class="data-siswa-page">

        <div class="page-header">
            <h1>Data Siswa</h1>
            <p>Daftar siswa yang terdaftar dalam kelas</p>
        </div>

        <!-- STATS -->
        <div class="stats-grid">
            <div class="stat-card">
                <h4>Total Siswa</h4>
                <span>{{ $total }}</span>
            </div>

            <div class="stat-card">
                <h4>Siswa Aktif</h4>
                <span>{{ $aktif }}</span>
            </div>

            <div class="stat-card">
                <h4>Nonaktif</h4>
                <span>{{ $nonaktif }}</span>
            </div>
        </div>


        <!-- SEARCH -->
        <div class="search-box">
            <div class="search-wrapper">
                <input type="text" id="searchInput" placeholder="Cari nama, NIS, atau kelas...">
                <button type="button" id="clearSearch" class="clear-btn">×</button>
            </div>
        </div>

        <!-- FILTER & SHOW -->
        <div class="table-controls">

            <div class="filter-group">
                <select id="statusFilter">
                    <option value="">Semua Status</option>
                    <option value="aktif">Aktif</option>
                    <option value="nonaktif">Nonaktif</option>
                </select>
            </div>

            <div class="filter-group">
                <select id="kelasFilter">
                    <option value="">Semua Kelas</option>
                    @php
                        $kelasList = collect($siswa)->pluck('kelas')->unique();
                    @endphp
                    @foreach($kelasList as $kelas)
                        @if($kelas)
                            <option value="{{ $kelas }}">{{ $kelas }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="show-group">
                <label>Tampilkan</label>
                <select id="showData">
                    <option value="5">5</option>
                    <option value="10" selected>10</option>
                    <option value="20">20</option>
                    <option value="all">Semua</option>
                </select>
            </div>

        </div>

        <!-- TABLE -->
        <div class="table-wrapper">
            <table class="siswa-table">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>NIS</th>
                        <th>Kelas</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach($siswa as $item)
                                <tr>
                                    <td>
                                        <img src="{{ $item->profile_photo
                        ? asset('storage/' . $item->profile_photo)
                        : 'https://ui-avatars.com/api/?name=' . $item->name . '&background=0f172a&color=00f5ff' }}"
                                            class="avatar">
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->nis }}</td>
                                    <td>{{ $item->kelas ?? '-' }}</td>
                                    <td>
                                        <span class="status {{ $item->status }}">
                                            {{ ucfirst($item->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <button class="btn-detail" onclick="openEditModal(
                                                                                                            '{{ $item->id }}',
                                                                                                            '{{ $item->name }}',
                                                                                                            '{{ $item->nis }}',
                                                                                                            '{{ $item->kelas }}',
                                                                                                            '{{ $item->status }}'
                                                                                                            )">Edit
                                        </button>
                                    </td>
                                </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

        <!-- EDIT MODAL -->
        <div class="modal-overlay hidden" id="editModal">
            <div class="modal-card">

                <div class="modal-header">
                    <h3>Edit Siswa</h3>
                    <span onclick="closeEditModal()" style="cursor:pointer;">×</span>
                </div>

                <form method="POST" id="editForm">
                    @csrf
                    @method('PUT')

                    <div class="register-field">
                        <label>Nama</label>
                        <input type="text" name="name" id="editName" required>
                    </div>

                    <div class="register-field">
                        <label>NIS</label>
                        <input type="text" name="nis" id="editNis" required>
                    </div>

                    <div class="register-field">
                        <label>Kelas</label>
                        <input type="text" name="kelas" id="editKelas">
                    </div>

                    <div class="register-field">
                        <label>Status</label>
                        <select name="status" id="editStatus">
                            <option value="aktif">Aktif</option>
                            <option value="nonaktif">Nonaktif</option>
                        </select>
                    </div>

                    <button class="btn-detail" style="margin-top:15px;width:100%;">
                        Simpan Perubahan
                    </button>
                </form>

            </div>
        </div>

    </div>

@endsection

@push('scripts')
    <script>
        function openEditModal(id, name, nis, kelas, status) {
            document.getElementById('editModal').classList.remove('hidden');

            document.getElementById('editName').value = name;
            document.getElementById('editNis').value = nis;
            document.getElementById('editKelas').value = kelas;
            document.getElementById('editStatus').value = status;

            document.getElementById('editForm').action =
                "/guru/siswa/" + id;
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }
    </script>
@endpush

@push('scripts')
    <script src="{{ asset('js/guru/data-siswa.js') }}"></script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/guru/data-siswa.css') }}">
@endpush