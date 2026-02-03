<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PollController;
use App\Http\Controllers\VoteController;

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
// Admin
Route::get('/admin/polls/{id}/votes', [PollController::class, 'adminVotes']);
Route::post('/admin/release-ip', [PollController::class, 'releaseIp']);


/*
|--------------------------------------------------------------------------
| Protected Routes (Polls + Voting)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Poll creation (admin)
    Route::get('/polls/create', [PollController::class, 'create']);
    Route::post('/polls', [PollController::class, 'store']);

    // List all active polls
    Route::get('/polls', [PollController::class, 'index']);

    // Load a single poll (AJAX)
    Route::get('/polls/{id}', [PollController::class, 'show']);

    // Module 2: Vote submission
    Route::post('/vote', [VoteController::class, 'store']);

    // Module 3: Live results (AJAX polling)
    Route::get('/polls/{id}/results', [PollController::class, 'results']);
});

/*
|--------------------------------------------------------------------------
| Redirect root
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/login');
});
