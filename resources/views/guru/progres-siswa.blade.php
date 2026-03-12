@extends('layouts-dosen.app')

@section('title', 'Progres Siswa')

@section('content')

    <div class="progres-page">

        <div class="page-header">
            <h1>Progres Siswa</h1>
            <p>Monitoring perkembangan belajar setiap siswa</p>
        </div>

        <!-- STATS -->
        <div class="stats-grid">
            <div class="stat-card">
                <h4>Rata-rata Progress</h4>
                <span>{{ $rataRata }}%</span>
            </div>

            <div class="stat-card">
                <h4>Di atas 80%</h4>
                <span>{{ $diAtas80 }}</span>
            </div>

            <div class="stat-card">
                <h4>Di bawah 50%</h4>
                <span>{{ $diBawah50 }}</span>
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
            <div class="filter-group">
                <select id="kelasFilter">
                    <option value="">Semua Kelas</option>
                    @php
                        $kelasList = collect($siswa)->pluck('kelas')->unique();
                    @endphp
                    @foreach($kelasList as $kelas)
                        <option value="{{ $kelas }}">{{ $kelas }}</option>
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
            <table class="progres-table">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Progress</th>
                        <th>Persentase</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($siswa as $item)
                                <tr>
                                    <td>
                                        <img src="{{ $item->profile_photo
                        ? asset('storage/' . $item->profile_photo)
                        : 'https://ui-avatars.com/api/?name=' . $item->name }}" class="avatar">
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->kelas ?? '-' }}</td>
                                    <td>
                                        <div class="mini-progress">
                                            <div class="mini-fill" style="width: {{ $item->progress }}%"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge-progress">
                                            {{ $item->progress }}%
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
    <link rel="stylesheet" href="{{ asset('css/guru/progres-siswa.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/guru/progres-siswa.js') }}"></script>
@endpush