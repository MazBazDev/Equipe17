<?php

use App\Http\Controllers\MatchesController;
use App\Http\Controllers\InviteTeam;
use App\Http\Controllers\StatsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    # MATCHES
    Route::get('/matches', [MatchesController::class, 'index'])
                    ->name('matches');

    Route::post('/matches/create', [MatchesController::class, 'create'])
                    ->name('matches.create');

    Route::post('/matches/join', [MatchesController::class, 'join'])
                    ->name('matches.join');

    Route::post('/matches/detail', [MatchesController::class, 'detail'])
                    ->name('matches.detail');

    Route::post('/matches/end', [MatchesController::class, 'end'])
                    ->name('matches.end');

    Route::get('/matches/show/{id}', [MatchesController::class, 'showMatch'])
                    ->name('matches.show');


    Route::get('/invite/accept/{invite}/{token}', [InviteTeam::class, "accept"])->name('invite.accept');
    Route::post('/invite/create/{team}', [InviteTeam::class, "create"])->name('invite.create');
    
    Route::get('/invites', [InviteTeam::class, "index"])->name('invite.index');
    Route::delete('/invite/destroy/{invite}', [InviteTeam::class, "destroy"])->name('invite.destroy');
    Route::get('/invite/show/{invite}', [InviteTeam::class, "show"])->name('invite.show');

    Route::resource("stats", StatsController::class);
});


