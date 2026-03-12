<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProgress;
use App\Models\Materi;
use App\Models\User;
use App\Models\QuizResult;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        // Proress Materi 
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


        // Quiz
        $quizResults = QuizResult::where('user_id', $userId)
            ->whereIn('quiz_slug', ['quiz-1', 'quiz-2', 'quiz-3'])
            ->get();

        // Ambil masing-masing nilai quiz
        $nilaiQuiz1 = QuizResult::where('user_id', $userId)
            ->where('quiz_slug', 'quiz-1')
            ->value('score') ?? 0;

        $nilaiQuiz2 = QuizResult::where('user_id', $userId)
            ->where('quiz_slug', 'quiz-2')
            ->value('score') ?? 0;

        $nilaiQuiz3 = QuizResult::where('user_id', $userId)
            ->where('quiz_slug', 'quiz-3')
            ->value('score') ?? 0;

        $jumlahQuiz = $quizResults->count();
        $totalQuiz = 3;

        // HITUNG RATA-RATA DULU
        $rataQuiz = $jumlahQuiz > 0
            ? round($quizResults->avg('score'))
            : 0;

        // BARU HITUNG PERSENTASE
        if ($rataQuiz >= 70) {
            $percentQuiz = $totalQuiz > 0
                ? round(($jumlahQuiz / $totalQuiz) * 100)
                : 0;
        } else {
            $percentQuiz = 0;
        }


        // Evaluasi
        $nilaiEvaluasi = QuizResult::where('user_id', $userId)
            ->where('quiz_slug', 'evaluasi')
            ->value('score') ?? 0;

        $percentEvaluasi = ($nilaiEvaluasi >= 70)
            ? $nilaiEvaluasi
            : 0;

        $statusQuiz = $rataQuiz >= 70 ? 'Lulus' : 'Belum Lulus';
        $statusEvaluasi = $nilaiEvaluasi >= 70 ? 'Lulus' : 'Belum Lulus';
        $guru = User::where('role', 'guru')->first();

        return view('dashboard.index', compact(
            'progress',
            'totalMateri',
            'completed',
            'percent',
            'guru',
            'jumlahQuiz',
            'rataQuiz',
            'statusQuiz',
            'statusEvaluasi',
            'nilaiEvaluasi',
            'totalQuiz',
            'percentQuiz',
            'percentEvaluasi',
            'nilaiQuiz1',
            'nilaiQuiz2',
            'nilaiQuiz3'
        ));
    }
}
