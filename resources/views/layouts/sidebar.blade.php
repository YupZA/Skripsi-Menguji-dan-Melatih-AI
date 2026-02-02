@php
  $isBab1 = request()->is('bab-1/*');
  $isBab2 = request()->is('bab-2/*');
  $isBab3 = request()->is('bab-3/*');
@endphp

<div id="layoutSidenav_nav">
  <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
      <div class="nav">

        <!-- ================= UTAMA ================= -->
        <div class="sb-sidenav-menu-heading">Utama</div>

        <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}"
           href="{{ url('/dashboard/index') }}">
          <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
          Dashboard
        </a>

        <!-- ================= DAFTAR MATERI ================= -->
        <div class="sb-sidenav-menu-heading">Daftar Materi</div>

        <!-- ================= BAB 1 ================= -->
        <a class="nav-link {{ $isBab1 ? '' : 'collapsed' }}"
           href="#"
           data-bs-toggle="collapse"
           data-bs-target="#collapseBab1"
           aria-expanded="{{ $isBab1 ? 'true' : 'false' }}">
          <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
          Bab 1
          <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>

        <div class="collapse {{ $isBab1 ? 'show' : '' }}"
             id="collapseBab1"
             data-bs-parent="#sidenavAccordion">
          <nav class="sb-sidenav-menu-nested nav">

            <a class="nav-link {{ request()->is('bab-1/bab-1-materi-a') ? 'active' : '' }}"
               href="{{ url('/bab-1/bab-1-materi-a') }}">
              Apa Itu Kecerdasan Buatan
            </a>

            <a class="nav-link {{ request()->is('bab-1/bab-1-materi-b') ? 'active' : '' }}"
               href="{{ url('/bab-1/bab-1-materi-b') }}">
              Apa Itu Machine Learning
            </a>

            <a class="nav-link {{ request()->is('bab-1/bab-1-materi-c') ? 'active' : '' }}"
               href="{{ url('/bab-1/bab-1-materi-c') }}">
              Langkah - Langkah Proses Machine Learning
            </a>

            <a class="nav-link {{ request()->is('bab-1/bab-1-kuis') ? 'active' : '' }}"
               href="{{ url('/bab-1/kuis-1') }}">
              Kuis
            </a>

          </nav>
        </div>

        <!-- ================= BAB 2 ================= -->
        <a class="nav-link {{ $isBab2 ? '' : 'collapsed' }}"
           href="#"
           data-bs-toggle="collapse"
           data-bs-target="#collapseBab2"
           aria-expanded="{{ $isBab2 ? 'true' : 'false' }}">
          <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
          Bab 2
          <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>

        <div class="collapse {{ $isBab2 ? 'show' : '' }}"
             id="collapseBab2"
             data-bs-parent="#sidenavAccordion">
          <nav class="sb-sidenav-menu-nested nav">

            <a class="nav-link {{ request()->is('bab-2/bab-2-materi-a') ? 'active' : '' }}"
               href="{{ url('/bab-2/bab-2-materi-a') }}">
               Apa Itu Google Teachable Machine
            </a>

            <a class="nav-link {{ request()->is('bab-2/bab-2-materi-b') ? 'active' : '' }}"
               href="{{ url('/bab-2/bab-2-materi-b') }}">
               Google Teachable Machine : Membuat AI Jadi Mudah
            </a>

            <a class="nav-link {{ request()->is('bab-2/bab-2-materi-c') ? 'active' : '' }}"
               href="{{ url('/bab-2/bab-2-materi-c') }}">
               Jenis Proyek di Google Teachable Machine
            </a>

            <a class="nav-link {{ request()->is('bab-2/bab-2-kuis') ? 'active' : '' }}"
               href="{{ url('/bab-2/kuis-2') }}">
              Kuis
            </a>

          </nav>
        </div>

        <!-- ================= BAB 3 ================= -->
        <a class="nav-link {{ $isBab3 ? '' : 'collapsed' }}"
           href="#"
           data-bs-toggle="collapse"
           data-bs-target="#collapseBab3"
           aria-expanded="{{ $isBab3 ? 'true' : 'false' }}">
          <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
          Bab 3
          <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>

        <div class="collapse {{ $isBab3 ? 'show' : '' }}"
             id="collapseBab3"
             data-bs-parent="#sidenavAccordion">
          <nav class="sb-sidenav-menu-nested nav">

            <a class="nav-link {{ request()->is('bab-3/bab-3-materi-a') ? 'active' : '' }}"
               href="{{ url('/bab-3/bab-3-materi-a') }}">
               Membuat Model Gambar
            </a>

            <a class="nav-link {{ request()->is('bab-3/bab-3-materi-b') ? 'active' : '' }}"
               href="{{ url('/bab-3/bab-3-materi-b') }}">
               Membuat Model Deteksi Suara
            </a>

            <a class="nav-link {{ request()->is('bab-3/bab-3-materi-c') ? 'active' : '' }}"
               href="{{ url('/bab-3/bab-3-materi-c') }}">
               Membuat Model Deteksi Pose Tubuh
            </a>

            <a class="nav-link {{ request()->is('bab-3/bab-3-materi-d') ? 'active' : '' }}"
               href="{{ url('/bab-3/bab-3-materi-d') }}">
               Perbandingan Model Suara, Gambar, dan Pose
            </a>

            <a class="nav-link {{ request()->is('bab-3/bab-3-kuis') ? 'active' : '' }}"
               href="{{ url('/bab-3/kuis-3') }}">
              Kuis
            </a>

          </nav>
        </div>

        <!-- ================= EVALUASI ================= -->
        <div class="sb-sidenav-menu-heading">Evaluasi</div>

        <a class="nav-link {{ request()->is('evaluasi') ? 'active' : '' }}"
           href="{{ url('/evaluasi/evaluasi') }}">
          <div class="sb-nav-link-icon"><i class="fas fa-clipboard-check"></i></div>
          Evaluasi
        </a>

      </div>
    </div>
  </nav>
</div>
