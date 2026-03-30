<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kelas;

class DataSiswaController extends Controller
{
    public function index()
    {
        // Ambil hanya user dengan role siswa

        $siswa = User::with('kelas')
            ->where('role', 'siswa')
            ->get();


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
            'token_kelas' => 'nullable|string',
            'status' => 'required|in:aktif,nonaktif'
        ]);

        $siswa = User::findOrFail($id);

        $kelasId = $siswa->kelas_id;

        // kalau ada token baru → update kelas
        if ($request->token_kelas) {
            $kelas = Kelas::where('token', $request->token_kelas)->first();

            if (!$kelas) {
                return back()->withErrors([
                    'token_kelas' => 'Token kelas tidak ditemukan'
                ]);
            }

            $kelasId = $kelas->id;
        }

        $siswa->update([
            'name' => $request->name,
            'nis' => $request->nis,
            'kelas_id' => $kelasId,
            'status' => $request->status,
        ]);

        return back()->with('success', 'Data siswa berhasil diperbarui');
    }

}
