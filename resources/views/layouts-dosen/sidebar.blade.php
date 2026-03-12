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
        <div class="sb-sidenav-menu-heading">Menu</div>

        <a class="nav-link {{ request()->is('guru/dashboard') ? 'active' : '' }}"
           href="{{ url('/guru/dashboard') }}">
          <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
          Dashboard Guru
        </a>
        
        <a class="nav-link {{ request()->is('guru/data-kelas') ? 'active' : '' }}"
           href="{{ url('/guru/data-kelas') }}">
          <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
          Data Kelas
        </a>

        <a class="nav-link {{ request()->is('guru/data-siswa') ? 'active' : '' }}"
           href="{{ url('/guru/data-siswa') }}">
          <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
          Data Siswa
        </a>

        <a class="nav-link {{ request()->is('guru/progres-siswa') ? 'active' : '' }}"
           href="{{ url('/guru/progres-siswa') }}">
          <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
          Progress Siswa
        </a>

        <a class="nav-link {{ request()->is('guru/nilai-siswa') ? 'active' : '' }}"
           href="{{ url('/guru/nilai-siswa') }}">
          <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
          Nilai Siswa
        </a>



      </div>
    </div>
  </nav>
</div>
