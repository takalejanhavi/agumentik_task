<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;

class VoteController extends Controller
{
    /**
     * Store a vote (Module 2 – Core Logic)
     */
    public function store(Request $request)
    {
        // ---- CORE PHP DATA (mandatory logic) ----
        $pollId   = $request->input('poll_id');
        $optionId = $request->input('option_id');
        $ip       = $_SERVER['REMOTE_ADDR']; // core PHP IP fetch

        // ---- BACKEND ENFORCEMENT (NO FRONTEND TRUST) ----
        $alreadyVoted = Vote::where('poll_id', $pollId)
                            ->where('ip_address', $ip)
                            ->first();

        // ---- BLOCK DUPLICATE VOTE ----
        if ($alreadyVoted) {
            return response()->json([
                'status'  => 'error',
                'message' => 'You have already voted on this poll from this IP.'
            ]);
        }

        // ---- STORE VOTE ----
        Vote::create([
            'poll_id'   => $pollId,
            'option_id' => $optionId,
            'ip_address'=> $ip,
            'voted_at'  => now()
        ]);

        return response()->json([
            'status'  => 'success',
            'message' => 'Vote submitted successfully.'
        ]);
    }
}
