@php
  use App\Models\Materi;
  use App\Models\UserProgress;
  use App\Models\QuizResult;

  $isBab1 = request()->is('bab-1/*');
  $isBab2 = request()->is('bab-2/*');
  $isBab3 = request()->is('bab-3/*');

  $completedSlugs = UserProgress::where('user_id', auth()->id())
    ->where('status', 'completed')
    ->pluck('materi_id')
    ->toArray();

  $materis = Materi::pluck('id', 'slug');

  function selesai($slug, $materis, $completedSlugs)
  {
    return isset($materis[$slug]) && in_array($materis[$slug], $completedSlugs);
  }

  function kuisLulus($quizSlug)
  {
    return QuizResult::where('user_id', auth()->id())
      ->where('quiz_slug', $quizSlug)
      ->where('score', '>=', 70)
      ->where('passed', 1)
      ->exists();
  }


  $unlockBab1A = true;
  $unlockBab1B = selesai('bab-1-materi-a', $materis, $completedSlugs);
  $unlockBab1C = selesai('bab-1-materi-b', $materis, $completedSlugs);
  $unlockKuis1 = selesai('bab-1-materi-c', $materis, $completedSlugs);

  $unlockBab2A = kuisLulus('quiz-1');
  $unlockBab2B = selesai('bab-2-materi-a', $materis, $completedSlugs);
  $unlockBab2C = selesai('bab-2-materi-b', $materis, $completedSlugs);
  $unlockKuis2 = selesai('bab-2-materi-c', $materis, $completedSlugs);

  $unlockBab3A = kuisLulus('quiz-2');
  $unlockBab3B = selesai('bab-3-materi-a', $materis, $completedSlugs);
  $unlockBab3C = selesai('bab-3-materi-b', $materis, $completedSlugs);
  $unlockBab3D = selesai('bab-3-materi-c', $materis, $completedSlugs);
  $unlockKuis3 = selesai('bab-3-materi-d', $materis, $completedSlugs);

  $unlockEvaluasi = kuisLulus('quiz-3');

@endphp

<div id="layoutSidenav_nav">
  <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
      <div class="nav">

        <!-- ================= UTAMA ================= -->
        <div class="sb-sidenav-menu-heading">Utama</div>

        <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ url('/dashboard/index') }}">
          <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
          Dashboard
        </a>

        <!-- ================= DAFTAR MATERI ================= -->
        <div class="sb-sidenav-menu-heading">Daftar Materi</div>

        <!-- ================= BAB 1 ================= -->
        <a class="nav-link {{ $isBab1 ? '' : 'collapsed' }}" href="#" data-bs-toggle="collapse"
          data-bs-target="#collapseBab1" aria-expanded="{{ $isBab1 ? 'true' : 'false' }}">
          <div class="sb-nav-link-icon"><i class="fas fa-brain"></i></div>
          Bab 1
          <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>

        <div class="collapse {{ $isBab1 ? 'show' : '' }}" id="collapseBab1" data-bs-parent="#sidenavAccordion">
          <nav class="sb-sidenav-menu-nested nav">

            <a class="nav-link {{ request()->is('bab-1/bab-1-materi-a') ? 'active' : '' }}"
              href="{{ url('/bab-1/bab-1-materi-a') }}">
              Apa Itu Kecerdasan Buatan
            </a>

            <a class="nav-link {{ request()->is('bab-1/bab-1-materi-b') ? 'active' : '' }} {{ !$unlockBab1B ? 'locked disabled' : '' }}"
              href="{{ $unlockBab1B ? url('/bab-1/bab-1-materi-b') : '#' }}">
              Apa Itu Machine Learning
              @if(!$unlockBab1B) 🔒 @endif
            </a>

            <a class="nav-link {{ request()->is('bab-1/bab-1-materi-c') ? 'active' : '' }} {{ !$unlockBab1C ? 'locked disabled' : '' }}"
              href="{{ $unlockBab1C ? url('/bab-1/bab-1-materi-c') : '#' }}">
              Langkah - Langkah Proses Machine Learning
              @if(!$unlockBab1C) 🔒 @endif
            </a>

            <a class="nav-link {{ request()->is('bab-1/kuis-1') ? 'active' : '' }} {{ !$unlockKuis1 ? 'locked disabled' : '' }}"
              href="{{ $unlockKuis1 ? url('/bab-1/kuis-1') : '#' }}">
              Kuis
              @if(!$unlockKuis1) 🔒 @endif
            </a>

          </nav>
        </div>

        <!-- ================= BAB 2 ================= -->
        <a class="nav-link {{ $isBab2 ? '' : 'collapsed' }}" href="#" data-bs-toggle="collapse"
          data-bs-target="#collapseBab2" aria-expanded="{{ $isBab2 ? 'true' : 'false' }}">
          <div class="sb-nav-link-icon"><i class="fas fa-robot"></i></div>
          Bab 2
          <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>

        <div class="collapse {{ $isBab2 ? 'show' : '' }}" id="collapseBab2" data-bs-parent="#sidenavAccordion">
          <nav class="sb-sidenav-menu-nested nav">

            <a class="nav-link {{ request()->is('bab-2/bab-2-materi-a') ? 'active' : '' }} {{ !$unlockBab2A ? 'locked disabled' : '' }}"
              href="{{ $unlockBab2A ? url('/bab-2/bab-2-materi-a') : '#' }}">
              Apa Itu Google Teachable Machine
              @if(!$unlockBab2A) 🔒 @endif
            </a>

            <a class="nav-link {{ request()->is('bab-2/bab-2-materi-b') ? 'active' : '' }} {{ !$unlockBab2B ? 'locked disabled' : '' }}"
              href="{{ $unlockBab2B ? url('/bab-2/bab-2-materi-b') : '#' }}">
              Google Teachable Machine : Membuat AI Jadi Mudah
              @if(!$unlockBab2B) 🔒 @endif
            </a>

            <a class="nav-link {{ request()->is('bab-2/bab-2-materi-c') ? 'active' : '' }} {{ !$unlockBab2C ? 'locked disabled' : '' }}"
              href="{{ $unlockBab2C ? url('/bab-2/bab-2-materi-c') : '#' }}">
              Jenis Proyek di Google Teachable Machine
              @if(!$unlockBab2C) 🔒 @endif
            </a>

            <a class="nav-link {{ request()->is('bab-2/kuis-2') ? 'active' : '' }} {{ !$unlockKuis2 ? 'locked disabled' : '' }}"
              href="{{ $unlockKuis2 ? url('/bab-2/kuis-2') : '#' }}">
              Kuis
              @if(!$unlockKuis2) 🔒 @endif
            </a>

          </nav>
        </div>

        <!-- ================= BAB 3 ================= -->
        <a class="nav-link {{ $isBab3 ? '' : 'collapsed' }}" href="#" data-bs-toggle="collapse"
          data-bs-target="#collapseBab3" aria-expanded="{{ $isBab3 ? 'true' : 'false' }}">
          <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
          Bab 3
          <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>

        <div class="collapse {{ $isBab3 ? 'show' : '' }}" id="collapseBab3" data-bs-parent="#sidenavAccordion">
          <nav class="sb-sidenav-menu-nested nav">

            <a class="nav-link {{ request()->is('bab-3/bab-3-materi-a') ? 'active' : '' }} {{ !$unlockBab3A ? 'locked disabled' : '' }}"
              href="{{ $unlockBab3A ? url('/bab-3/bab-3-materi-a') : '#' }}">
              Membuat Model Gambar
              @if(!$unlockBab3A) 🔒 @endif
            </a>

            <a class="nav-link {{ request()->is('bab-3/bab-3-materi-b') ? 'active' : '' }} {{ !$unlockBab3B ? 'locked disabled' : '' }}"
              href="{{ $unlockBab3B ? url('/bab-3/bab-3-materi-b') : '#' }}">
              Membuat Model Deteksi Suara
              @if(!$unlockBab3B) 🔒 @endif
            </a>

            <a class="nav-link {{ request()->is('bab-3/bab-3-materi-c') ? 'active' : '' }} {{ !$unlockBab3C ? 'locked disabled' : '' }}"
              href="{{ $unlockBab3C ? url('/bab-3/bab-3-materi-c') : '#' }}">
              Membuat Model Deteksi Pose Tubuh
              @if(!$unlockBab3C) 🔒 @endif
            </a>

            <a class="nav-link {{ request()->is('bab-3/bab-3-materi-d') ? 'active' : '' }} {{ !$unlockBab3D ? 'locked disabled' : '' }}"
              href="{{ $unlockBab3D ? url('/bab-3/bab-3-materi-d') : '#' }}">
              Perbandingan Model Suara, Gambar, dan Pose
              @if(!$unlockBab3D) 🔒 @endif
            </a>

            <a class="nav-link {{ request()->is('bab-3/kuis-3') ? 'active' : '' }} {{ !$unlockKuis3 ? 'locked disabled' : '' }}"
              href="{{ $unlockKuis3 ? url('/bab-3/kuis-3') : '#' }}">
              Kuis
              @if(!$unlockKuis3) 🔒 @endif
            </a>

          </nav>
        </div>

        <!-- ================= EVALUASI ================= -->
        <div class="sb-sidenav-menu-heading">Evaluasi</div>

        <a class="nav-link {{ request()->is('evaluasi/evaluasi') ? 'active' : '' }} {{ !$unlockEvaluasi ? 'locked disabled' : '' }}"
          href="{{ $unlockEvaluasi ? url('/evaluasi/evaluasi') : '#' }}">
          <div class="sb-nav-link-icon"><i class="fas fa-clipboard-check"></i></div>
          Evaluasi
          @if(!$unlockEvaluasi) 🔒 @endif
        </a>

      </div>
    </div>
  </nav>
</div>