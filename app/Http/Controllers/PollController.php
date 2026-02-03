<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\PollOption;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PollController extends Controller
{
    // ============================
    // MODULE 1: POLL LIST
    // ============================
    public function index()
    {
        $polls = Poll::where('is_active', true)->get();
        return view('polls.index', compact('polls'));
    }

    // ============================
    // MODULE 1: POLL VIEW
    // ============================
    public function show($id)
    {
        $poll = Poll::with('options')->findOrFail($id);
        return view('polls.show', compact('poll'));
    }

    // ============================
    // MODULE 1: CREATE POLL (ADMIN)
    // ============================
    public function create()
    {
        return view('polls.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string',
            'options' => 'required|array|min:2',
            'options.*' => 'required|string',
            'is_active' => 'required|boolean',
        ]);

        $poll = Poll::create([
            'question' => $request->question,
            'is_active' => $request->is_active,
        ]);

        foreach ($request->options as $optionText) {
            PollOption::create([
                'poll_id' => $poll->id,
                'option_text' => $optionText,
            ]);
        }

        return redirect('/polls')->with('success', 'Poll created successfully');
    }

    // ============================
    // MODULE 3: LIVE RESULTS
    // ============================
    public function results($pollId)
    {
        $results = Vote::select(
                'option_id',
                DB::raw('COUNT(*) as total')
            )
            ->where('poll_id', $pollId)
            ->where('is_released', false) // IMPORTANT for Module 4
            ->groupBy('option_id')
            ->get();

        return response()->json($results);
    }

    // ============================
    // MODULE 4: ADMIN VIEW VOTES
    // ============================
    public function adminVotes($pollId)
    {
        $votes = Vote::where('poll_id', $pollId)
            ->orderBy('created_at', 'asc')
            ->get();

        return view('admin.votes', compact('votes', 'pollId'));
    }

    // ============================
    // MODULE 4: RELEASE IP
    // ============================
    public function releaseIp(Request $request)
    {
        $vote = Vote::findOrFail($request->vote_id);

        $vote->is_released = true;
        $vote->released_at = now();
        $vote->save();

        return response()->json([
            'status' => 'success',
            'message' => 'IP released successfully'
        ]);
    }
}
