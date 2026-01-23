@extends('layouts.navbar_dashboard')

@section('title', 'Dashboard Media Pembelajaran AI')

@section('content')
    <div class="container-fluid px-4 ai-info-page">

    <h1 class="ai-title">📘 Informasi Aplikasi</h1>
    <p class="ai-subtitle">
        Media pembelajaran berbasis web untuk mengenalkan konsep Kecerdasan Buatan (Artificial Intelligence).
    </p>

    <!-- ================= INFO PEMBUAT ================= -->
    <div class="ai-card">
        <h2 class="ai-card-title">👤 Informasi Pembuat</h2>

        <table class="ai-table">
            <tr>
                <th>Nama</th>
                <td>[Nama Anda]</td>
            </tr>
            <tr>
                <th>NIM</th>
                <td>[NIM]</td>
            </tr>
            <tr>
                <th>Program Studi</th>
                <td>[Program Studi]</td>
            </tr>
            <tr>
                <th>Fakultas</th>
                <td>[Fakultas]</td>
            </tr>
            <tr>
                <th>Institusi</th>
                <td>[Nama Universitas]</td>
            </tr>
            <tr>
                <th>Judul Media</th>
                <td>Media Pembelajaran Berbasis Web Materi Kecerdasan Buatan</td>
            </tr>
            <tr>
                <th>Tahun</th>
                <td>2026</td>
            </tr>
        </table>
    </div>

    <!-- ================= DAFTAR PUSTAKA ================= -->
    <div class="ai-card">
        <h2 class="ai-card-title">📚 Daftar Pustaka</h2>

        <ol class="ai-list">
            <li>Google. (2023). <em>Teachable Machine</em>. https://teachablemachine.withgoogle.com</li>
            <li>Russell, S., & Norvig, P. (2021). <em>Artificial Intelligence: A Modern Approach</em>. Pearson.</li>
            <li>Alpaydin, E. (2020). <em>Introduction to Machine Learning</em>. MIT Press.</li>
            <li>Kemdikbud RI. (2021). <em>Panduan Pembelajaran Informatika</em>.</li>
            <li>Goodfellow, I., Bengio, Y., & Courville, A. (2016). <em>Deep Learning</em>. MIT Press.</li>
        </ol>
    </div>

</div>
@endsection