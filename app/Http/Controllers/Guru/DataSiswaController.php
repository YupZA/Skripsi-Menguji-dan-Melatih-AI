<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DataSiswaController extends Controller
{
    public function index()
    {
        // Ambil hanya user dengan role siswa
        $siswa = User::where('role', 'siswa')->get();

        $total = $siswa->count();
        $aktif = $siswa->where('status', 'aktif')->count();
        $nonaktif = $siswa->where('status', 'nonaktif')->count();

        return view('guru.data-siswa', compact(
            'siswa',
            'total',
            'aktif',
            'nonaktif'
        ));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nis' => 'required|string|max:255',
            'kelas' => 'nullable|string|max:50',
            'status' => 'required|in:aktif,nonaktif'
        ]);

        $siswa = User::findOrFail($id);

        $siswa->update([
            'name' => $request->name,
            'nis' => $request->nis,
            'kelas' => $request->kelas,
            'status' => $request->status,
        ]);

        return back()->with('success', 'Data siswa berhasil diperbarui');
    }

}
