<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProgress;

class DashboardController extends Controller
{
    public function index()
    {
        $siswa = User::where('role', 'siswa')->get();

        $totalSiswa = $siswa->count();
        $aktif = $siswa->where('status', 'aktif')->count();
        $nonaktif = $siswa->where('status', 'nonaktif')->count();

        $totalProgress = 0;

        foreach ($siswa as $item) {

            $completed = UserProgress::where('user_id', $item->id)
                ->where('status', 'completed')
                ->count();

            $item->progress = $completed;
            $totalProgress += $completed;
        }

        $rataProgress = $totalSiswa > 0
            ? round($totalProgress / $totalSiswa)
            : 0;


        return view('guru.dashboard', compact(
            'totalSiswa',
            'aktif',
            'nonaktif',
            'rataProgress'
        ));
    }
}
