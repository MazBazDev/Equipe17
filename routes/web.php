<?php

use App\Http\Controllers\MatchsController;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\UserMatchsController;
use App\Models\Matchs;
use Illuminate\Support\Facades\Route;
use NunoMaduro\Collision\Adapters\Phpunit\State;

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
});

Route::resource("stats", StatsController::class);

Route::resource("matchs", MatchsController::class);
Route::resource("usermatchs", UserMatchsController::class);