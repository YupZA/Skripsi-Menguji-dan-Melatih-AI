@extends('layouts.navbar_dashboard')

@section('title', 'AI')

@section('content')
  <div class="beranda">
    <main class="dashboard container">
      <!-- DECORATIVE ICONS -->
      <div class="hero-decor">
        <i class="fas fa-brain decor decor-1"></i>
        <i class="fas fa-microchip decor decor-2"></i>
        <i class="fas fa-robot decor decor-3"></i>
      </div>

      <!-- ===== HERO ===== -->
      <section class="hero">

        <div class="hero-content">
          <h1>Melatih dan Menguji AI</h1>
          <p>
            Platform pembelajaran cerdas untuk memahami, melatih, dan menguji
            kecerdasan buatan secara interaktif.
          </p>
        </div>

        <div class="hero-visual">
          <img src="{{ asset('images/landing-page/gambar-2.png') }}" alt="AI Illustration">
        </div>
      </section>

      <!-- ===== FEATURES ===== -->
      <section class="features">
        <div class="ai-modules">

          <article class="ai-module">
            <header class="module-header">
              <span class="module-status active"></span>
              <h3>Belajar Materi</h3>
            </header>

            <p class="module-desc">
              Pengantar dan konsep dasar kecerdasan buatan
            </p>

            <div class="module-actions">
              <a href="{{ url('/dashboard/index') }}" class="btn-primary">
                Akses Modul
              </a>
            </div>
          </article>

          <article class="ai-module">
            <header class="module-header">
              <span class="module-status standby"></span>
              <h3>Melatih AI</h3>
            </header>

            <p class="module-desc">
              Simulasi dan pelatihan model AI secara langsung
            </p>

            <div class="module-actions">
              <a href="{{ url('/landing-page/latih-ai') }}" class="btn-primary">
                Mulai Melatih
              </a>
            </div>
          </article>

        </div>
      </section>

    </main>

  </div>

@endsection