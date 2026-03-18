<?php

namespace App\Http\Controllers;
use App\Models\Challenge;
use Illuminate\Http\Request;

class UserProgressController extends Controller
{
    public function complete(Challenge $challenge)
    {
        $user = auth()->user();

        $user->completedChallenges()->syncWithoutDetaching([
            $challenge->id => [
                'completed_at' => now(),
            ],
        ]);

       return redirect()->route('dashboard');
    }
}
