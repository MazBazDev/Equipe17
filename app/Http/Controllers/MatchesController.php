<?php

namespace App\Http\Controllers;

use App\Models\Matches;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MatchesController extends Controller
{
    public function index()
    {
        $gamemodes = ["Classique"];
        return view('matches.index', compact("gamemodes"));
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        $match = Matches::create([
            'score' => 0,
            'gamemode' => $request->gamemode,
            'state' => 0
        ]);

        $match->users()->attach([
            $user->id => ['role' => "owner"]
        ]);
        return redirect()->route('matches.show',["id"=>$match->id]);
    }

    public function showMatch($id) {
        $user = Auth::user();
        
        $match = Matches::findOrFail($id);
        $blueTeamUsers = $match->users()->get();
        $redTeamUsers = [];
        if($blueTeamUsers->count() >= 2 && $blueTeamUsers->count() < 4){
            for($i=$blueTeamUsers->count()-1;$i>=2;$i--){
                array_push($redTeamUsers,$blueTeamUsers->values()[$i]);
                $blueTeamUsers->forget($i);
            };
        } else if($blueTeamUsers->count()>=4){
            return redirect('dashboard');
        };
        return view('matches.show', compact("match","blueTeamUsers", "redTeamUsers"));
    }
}
