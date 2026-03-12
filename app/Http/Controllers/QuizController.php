<?php

namespace App\Http\Controllers;

use App\Models\QuizResult;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function saveResult(Request $request)
    {
        $request->validate([
            'quiz_slug' => 'required|string',
            'score' => 'required|integer',
        ]);

        $passed = $request->score >= 70;

        QuizResult::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'quiz_slug' => $request->quiz_slug
            ],
            [
                'score' => $request->score,
                'passed' => $passed
            ]
        );

        return response()->json([
            'success' => true
        ]);
    }
}
