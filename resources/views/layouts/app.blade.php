<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'AI')</title>

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&family=Space+Grotesk:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/sb_admin.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('css/materi/style_materi.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/tes.css') }}">
    <link rel="stylesheet" href="{{ asset('css/quiz/quiz.css') }}">
    <link rel="stylesheet" href="{{ asset('css/materi/materi-gambar.css') }}">
    
    
    @stack('styles')

    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">

    {{-- NAVBAR --}}
    @include('layouts.navbar')

    <div id="layoutSidenav">
        {{-- SIDEBAR --}}
        @include('layouts.sidebar')

        {{-- KONTEN --}}
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4 materi-content slide-wrapper">
                    @yield('content')
                </div>
            </main>

            {{-- FOOTER --}}
            @include('layouts.footer')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
    <script src="{{ asset('js/tes.js') }}"></script>

    @stack('scripts')
</body>

</html>