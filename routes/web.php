<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserProgressController;

Route::get('/', function () {
    return view('landing-page/beranda');
});

Route::get('/materi', function () {
    return view('materi');
});

Route::get('/tes', function () {
    return view('tes');
});

Route::get('/landing-page/beranda', function () {
    return view('landing-page/beranda');
});

Route::get('/bab-1/bab-1-materi-a', function () {
    return view('bab-1/bab-1-materi-a');
})->middleware('auth');

Route::get('/bab-1/bab-1-materi-b', function () {
    return view('bab-1/bab-1-materi-b');
});

Route::get('/bab-1/bab-1-materi-c', function () {
    return view('bab-1/bab-1-materi-c');
});

Route::get('/bab-1/kuis-1', function () {
    return view('bab-1/kuis-1');
});

Route::get('/bab-2/bab-2-materi-a', function () {
    return view('bab-2/bab-2-materi-a');
});

Route::get('/bab-2/bab-2-materi-b', function () {
    return view('bab-2/bab-2-materi-b');
});

Route::get('/bab-2/bab-2-materi-c', function () {
    return view('bab-2/bab-2-materi-c');
});

Route::get('/bab-2/kuis-2', function () {
    return view('bab-2/kuis-2');
});

Route::get('/bab-3/bab-3-materi-a', function () {
    return view('bab-3/bab-3-materi-a');
});

Route::get('/bab-3/bab-3-materi-b', function () {
    return view('bab-3/bab-3-materi-b');
});

Route::get('/bab-3/bab-3-materi-c', function () {
    return view('bab-3/bab-3-materi-c');
});

Route::get('/bab-3/bab-3-materi-d', function () {
    return view('bab-3/bab-3-materi-d');
});

Route::get('/bab-3/kuis-3', function () {
    return view('bab-3/kuis-3');
});

Route::get('/evaluasi/evaluasi', function () {
    return view('evaluasi/evaluasi');
});

// Route::get('/dashboard/dashboard', function () {
//     return view('dashboard/dashboard');
// });

Route::get('/landing-page/informasi', function () {
    return view('landing-page/informasi');
});

Route::get('/landing-page/materi', function () {
    return view('landing-page/materi');
});

Route::get('/landing-page/latih-ai', function () {
    return view('landing-page/latih-ai');
});

Route::get('/dosen/data-mahasiswa', function () {
    return view('dosen/data-mahasiswa');
});

Route::get('/auth/login', function () {
    return view('auth/login');
});

Route::get('/auth/register', function () {
    return view('auth/register');
});


Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'registerForm']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/dashboard/index', [DashboardController::class, 'index'])
    ->middleware('auth');

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::post('/materi/selesai', [UserProgressController::class, 'selesai'])
    ->middleware('auth');
