<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProgress;
use App\Models\Materi;

class ProgresSiswaController extends Controller
{
    public function index()
    {
        $siswa = User::where('role', 'siswa')->get();

        $totalProgress = 0;
        $jumlahSiswa = $siswa->count();
        $diAtas80 = 0;
        $diBawah50 = 0;

        foreach ($siswa as $item) {

            $totalMateri = UserProgress::where('user_id', $item->id)
                ->distinct('materi_id')
                ->count('materi_id');

            $completed = UserProgress::where('user_id', $item->id)
                ->where('status', 'completed')
                ->count();

            $item->progress = $totalMateri > 0
                ? round(($completed / $totalMateri) * 100)
                : 0;

            // hitung statistik
            $totalProgress += $item->progress;

            if ($item->progress >= 80) {
                $diAtas80++;
            }

            if ($item->progress < 50) {
                $diBawah50++;
            }
        }

        $rataRata = $jumlahSiswa > 0
            ? round($totalProgress / $jumlahSiswa)
            : 0;

        return view('guru.progres-siswa', compact(
            'siswa',
            'rataRata',
            'diAtas80',
            'diBawah50'
        ));
    }

}
