<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProgress;
use App\Models\Materi;

class DashboardController extends Controller
{
    public function index()
{
    $userId = auth()->id();

    // progress user
    $progress = UserProgress::where('user_id', $userId)->get();

    // total materi yang disubmit
    $totalMateri = 10; 

    // yang benar-benar selesai
    $completed = UserProgress::where('user_id', $userId)
    ->where('status', 'completed')
    ->count();

    $percent = $totalMateri > 0
        ? round(($completed / $totalMateri) * 100)
        : 0;

    return view('dashboard.index', compact(
        'progress',
        'totalMateri',
        'completed',
        'percent'
    ));
}
}
