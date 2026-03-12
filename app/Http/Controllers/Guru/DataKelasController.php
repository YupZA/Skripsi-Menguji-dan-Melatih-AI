<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserProgress;

class DataKelasController extends Controller
{
    public function index()
    {
        $kelas = auth()->user()->kelasYangDiajar;

        $totalKelas = $kelas->count();
        $totalSiswa = 0;
        $totalProgress = 0;
        $jumlahDataProgress = 0;

        foreach ($kelas as $item) {

            $jumlahSiswa = $item->siswa->count();
            $item->jumlah_siswa = $jumlahSiswa;

            $totalSiswa += $jumlahSiswa;

            foreach ($item->siswa as $siswa) {
                $completed = UserProgress::where('user_id', $siswa->id)
                    ->where('status', 'completed')
                    ->count();

                $totalProgress += $completed;
                $jumlahDataProgress++;
            }

            $item->rata_progress = $jumlahSiswa > 0
                ? round($totalProgress / max($jumlahDataProgress, 1))
                : 0;
        }

        $rataSemua = $jumlahDataProgress > 0
            ? round($totalProgress / $jumlahDataProgress)
            : 0;

        return view('guru.data-kelas', compact(
            'kelas',
            'totalKelas',
            'totalSiswa',
            'rataSemua'
        ));
    }

    public function update(Request $request, $id)
    {
        $kelas = Kelas::findOrFail($id);

        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'status' => 'required|in:aktif,nonaktif'
        ]);

        $kelas->update([
            'nama_kelas' => $request->nama_kelas,
            'status' => $request->status
        ]);

        return back()->with('success', 'Kelas berhasil diperbarui');
    }

}
