<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProgress;

class UserProgressController extends Controller
{
    public function selesai(Request $request)
    {
        UserProgress::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'materi_id' => $request->materi_id
            ],
            [
                'status' => 'completed',
                'completed_at' => now()
            ]
        );

        return redirect()->back()->withFragment('progress');

    }
}
