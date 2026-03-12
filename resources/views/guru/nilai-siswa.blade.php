@extends('layouts-dosen.app')

@section('title', 'Nilai Siswa')

@section('content')

    <div class="nilai-page">

        <div class="page-header">
            <h1>Nilai Siswa</h1>
            <p>Rekap nilai kuis dan tugas siswa</p>
        </div>

        <!-- STATS -->
        <div class="stats-grid">
            <div class="stat-card">
                <h4>Rata-rata Nilai</h4>
                <span>{{ $rataRata }}</span>
            </div>

            <div class="stat-card">
                <h4>Lulus</h4>
                <span>{{ $lulus }}</span>
            </div>

            <div class="stat-card">
                <h4>Remedial</h4>
                <span>{{ $remedial }}</span>
            </div>
        </div>

        <!-- SEARCH -->
        <div class="search-box">
            <div class="search-wrapper">
                <input type="text" id="searchInput" placeholder="Cari nama atau kelas...">
                <button type="button" id="clearSearch" class="clear-btn">×</button>
            </div>
        </div>

        <!-- FILTER & SHOW -->
        <div class="table-controls">
            <form method="GET" action="{{ route('guru.nilai') }}">
                <select name="kelas" onchange="this.form.submit()">
                    <option value="">Semua Kelas</option>

                    @foreach($kelasList as $kelas)
                        <option value="{{ $kelas }}" {{ request('kelas') == $kelas ? 'selected' : '' }}>
                            {{ $kelas }}
                        </option>
                    @endforeach

                </select>
            </form>

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
            <table class="nilai-table">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Quiz 1</th>
                        <th>Quiz 2</th>
                        <th>Quiz 3</th>
                        <th>Evaluasi</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach($data as $item)
                        <tr>
                            <td>
                                <img src="https://ui-avatars.com/api/?name={{ $item['user']->name }}&background=0f172a&color=00f5ff"
                                    class="avatar">
                            </td>

                            <td>{{ $item['user']->name }}</td>
                            <td>{{ $item['user']->kelas }}</td>

                            <td>{{ $item['quiz1'] }}</td>
                            <td>{{ $item['quiz2'] }}</td>
                            <td>{{ $item['quiz3'] }}</td>
                            <td>{{ $item['evaluasi'] }}</td>

                            <td>
                                <span class="badge-nilai {{ strtolower($item['status']) == 'lulus' ? 'lulus' : 'remedial' }}">
                                    {{ $item['status'] }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/guru/nilai-siswa.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/guru/nilai-siswa.js') }}"></script>
@endpush