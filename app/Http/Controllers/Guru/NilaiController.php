<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\QuizResult;

class NilaiController extends Controller
{
    public function index(Request $request)
    {
        // 🔥 Ambil semua kelas dulu (tidak terpengaruh filter)
        $kelasList = User::where('role', 'siswa')
            ->select('kelas')
            ->distinct()
            ->pluck('kelas');

        $query = User::where('role', 'siswa')
            ->with('quizResults');

        if ($request->kelas && $request->kelas !== '') {
            $query->where('kelas', $request->kelas);
        }

        $siswa = $query->get();

        $data = $siswa->map(function ($user) {

            $quiz1 = optional($user->quizResults->where('quiz_slug', 'quiz-1')->first())->score ?? 0;
            $quiz2 = optional($user->quizResults->where('quiz_slug', 'quiz-2')->first())->score ?? 0;
            $quiz3 = optional($user->quizResults->where('quiz_slug', 'quiz-3')->first())->score ?? 0;
            $evaluasi = optional($user->quizResults->where('quiz_slug', 'evaluasi')->first())->score ?? 0;

            $rata = collect([$quiz1, $quiz2, $quiz3, $evaluasi])
                ->filter()
                ->avg() ?? 0;

            $status = $rata >= 70 ? 'Lulus' : 'Remedial';

            return [
                'user' => $user,
                'quiz1' => $quiz1,
                'quiz2' => $quiz2,
                'quiz3' => $quiz3,
                'evaluasi' => $evaluasi,
                'rata' => round($rata),
                'status' => $status
            ];
        });

        $rataRata = $data->count() > 0
            ? round($data->avg('rata'))
            : 0;

        $lulus = $data->where('status', 'Lulus')->count();
        $remedial = $data->where('status', 'Remedial')->count();

        return view('guru.nilai-siswa', compact(
            'data',
            'rataRata',
            'lulus',
            'remedial',
            'kelasList'   // 🔥 kirim ke view
        ));
    }
}
