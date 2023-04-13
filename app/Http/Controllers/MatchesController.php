<?php

namespace App\Http\Controllers;

use App\Models\Matches;
use Illuminate\Http\Request;

class MatchesController extends Controller
{
    public function index()
    {
        $gamemodes = ["Classique"];
        return view('matches.index', compact("gamemodes"));
    }

    public function create(Request $request)
    {

        $match = Matches::create([
            'score' => 0,
            'gamemode' => $request->gamemode,
            'state' => 0
        ]);


        return redirect()->route('dashboard');
    }
}
