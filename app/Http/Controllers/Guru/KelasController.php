<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Kelas;

class KelasController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255'
        ]);

        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'guru_id' => auth()->id(),
            'token' => strtoupper(Str::random(6)),
        ]);

        return back()->with('success', 'Kelas berhasil dibuat!');
    }
}
