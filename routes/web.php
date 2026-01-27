<?php

use Illuminate\Support\Facades\Route;

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
});

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

Route::get('/dashboard_tes', function () {
    return view('dashboard_tes');
});

Route::get('/landing-page/informasi', function () {
    return view('landing-page/informasi');
});

Route::get('/landing-page/materi', function () {
    return view('landing-page/materi');
});

Route::get('/landing-page/latih-ai', function () {
    return view('landing-page/latih-ai');
});

