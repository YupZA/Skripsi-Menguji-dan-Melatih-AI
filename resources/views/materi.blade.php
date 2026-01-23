@extends('layouts.navbar_dashboard')

@section('title', 'Dashboard Media Pembelajaran AI')

@section('content')
    <!-- CONTENT -->
    <div class="container">

        <header class="page-header">
            <h1>Daftar Isi Materi</h1>
        </header>

        <section class="materi-grid">

            <article class="materi-card">
                <div class="card-header">
                    <span class="card-status active"></span>
                    <span class="card-tag">Bab 1</span>
                </div>

                <h3>MENGENAL AI DAN DASAR - DASAR MACHINE LEARNING</h3>

                <ul>
                    <li>Apa Itu Kecerdasan Buatan</li>
                    <li>Apa Itu Machine Learning</li>
                    <li>Langkah-Langkah Proses Machine Learning</li>
                </ul>

                
            </article>

            <article class="materi-card">
                <div class="card-header">
                    <span class="card-status active"></span>
                    <span class="card-tag">Bab 2</span>
                </div>

                <h3>PENGENALAN GOOGLE TEACHABLE LEARNING MACHINE</h3>

                <ul>
                    <li>Apa Itu Google Teachable Machine</li>
                    <li>Google Teachable Machine : Membuat AI Jadi Mudah</li>
                    <li>Jenis Proyek di Google Teachable Machine</li>
                </ul>
            </article>

            <article class="materi-card">
                <div class="card-header">
                    <span class="card-status active"></span>
                    <span class="card-tag">Bab 3</span>
                </div>

                <h3>PRAKTIK MEMBUAT MODEL AI SEDERHANA</h3>

                <ul>
                    <li>Membuat Model Gambar</li>
                    <li>Membuat Model Deteksi Suara</li>
                    <li>Membuat Model Deteksi Pose Tubuh</li>
                    <li>Perbandingan Model Suara, Gambar, dan Pose</li>
                </ul>
            </article>

        </section>

    </div>

@endsection