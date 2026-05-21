@extends('layouts.navbar_dashboard')

@section('title', 'Dashboard Media Pembelajaran AI')

@section('content')
    <div class="container-fluid px-4 ai-info-page">

        <h1 class="ai-title">Informasi Aplikasi</h1>


        <!-- ================= INFO PEMBUAT ================= -->
        <div class="ai-card">
            <h2 class="ai-card-title">Informasi Pembuat</h2>

            <table class="ai-table">
                <tr>
                    <th>Nama</th>
                    <td>Muhammad Azimi</td>
                </tr>
                <tr>
                    <th>NIM</th>
                    <td>2210131210021</td>
                </tr>
                <tr>
                    <th>Dosen Pembimbing 1</th>
                    <td>Drs. Harja Santana Purba, M.Kom., Ph.D.</td>
                </tr>
                <tr>
                    <th>Dosen Pembimbing 2</th>
                    <td>Novan Alkaf Bahrain Saputra, S.Kom., M.T.</td>
                </tr>
                <tr>
                    <th>Jurusan</th>
                    <td>Pendidikan Komputer</td>
                </tr>
                <tr>
                    <th>Fakultas</th>
                    <td>Keguruan dan Ilmu Pengetahuan</td>
                </tr>
                <tr>
                    <th>Institusi</th>
                    <td>Universitas Lambung Mangkurat</td>
                </tr>
                <tr>
                    <th>Judul Media</th>
                    <td>Pengembangan Media Pembelajaran Interaktif Berbasis Web Materi Melatih dan Menguji AI dengan Model
                        Tutorial</td>
                </tr>
                <tr>
                    <th>Tahun</th>
                    <td>2026</td>
                </tr>
            </table>
        </div>

        <!-- ================= DAFTAR PUSTAKA ================= -->
        <div class="ai-card">
            <h2 class="ai-card-title">Daftar Pustaka</h2>

            <ol class="ai-list">
                <li>
                    Google. (2023).
                    <em>Teachable Machine</em>.
                    <a href="https://teachablemachine.withgoogle.com" target="_blank">
                        https://teachablemachine.withgoogle.com
                    </a>
                </li>
            </ol>
        </div>

        <!-- ================= Atribusi ================= -->
        <div class="ai-card">
            <h2 class="ai-card-title">Atribusi</h2>

            <ol class="ai-list">
                <li>
                    pinterest
                </li>
            </ol>
        </div>

    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/landing-page/informasi.css') }}">
@endpush