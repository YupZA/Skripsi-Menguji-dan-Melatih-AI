<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;

class MateriController extends Controller
{
    public function show($slug)
    {
        // ambil materi dari database
        $materi = Materi::where('slug', $slug)->firstOrFail();

        // pecah slug: bab-1-materi-a → [bab, 1, materi, a]
        $parts = explode('-', $slug);

        // ambil "bab-1"
        $bab = $parts[0] . '-' . $parts[1];

        // susun path view
        $view = $bab . '.' . $slug;

        // cek apakah view ada
        if (!view()->exists($view)) {
            abort(404, 'View tidak ditemukan: ' . $view);
        }

        return view($view, compact('materi'));
    }
}