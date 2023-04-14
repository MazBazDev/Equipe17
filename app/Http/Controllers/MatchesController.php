<?php

namespace App\Http\Controllers;

use App\Models\Matches;
use App\Models\User;
use App\Models\UserMatches;
use Illuminate\Console\View\Components\Alert;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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
            $user->id => ['role' => "owner", 'side' => "blue"],
        ]);
        return redirect()->route('matches.show',["id"=>$match->id]);
    }

    public function showMatch($id) {
        $user = Auth::user();
        $match = Matches::findOrFail($id);
        $allMembers = $match->users()->get();

        $blueTeamUsers = [];
        $redTeamUsers = [];
        foreach(UserMatches::where('matches_id', $match->id)->get() as $um){
            if($um->side == "red"){
                array_push($redTeamUsers,User::find($um->user_id));
            } else if($um->side == "blue"){
                array_push($blueTeamUsers,User::find($um->user_id)); 
            }
        }
        $qrcode = QrCode::size(200)->generate("http://localhost/matches/show/" . $id);
        return view('matches.show', compact("match","blueTeamUsers","user", "redTeamUsers", "qrcode"));
    }

    public function join(Request $request)
    {
        $blueTeamUsers = [];
        $redTeamUsers = [];
        $canAdd = true;
        foreach(UserMatches::where('matches_id', $request->match)->get() as $um){
            if($um->side == "red"){
                array_push($redTeamUsers,User::find($um->user_id));
            } else if($um->side == "blue"){
                array_push($blueTeamUsers,User::find($um->user_id)); 
            }
        }

        if($request->team == "blue"){
            if(count($blueTeamUsers)>=4){
                $canAdd = false;
            }
        }

        if($request->team == "red"){
            if(count($redTeamUsers)>=4){
                $canAdd = false;
            }
        }

        if($canAdd){
            $userMatch = UserMatches::create([
                'matches_id' => $request->match,
                'role' => "member",
                'side' => $request->team,
                'user_id' => $request->user
            ]);
            
            return redirect()->route('matches.show',["id"=>$request->match]);
        } else {
            $error = "Can't join this team!";
            return redirect()
                        ->route('matches.show',["id"=>$request->match])
                        ->withErrors($error);
        }
    }

    public function detail(Request $request)
    {
        $user = Auth::user();
        $match = Matches::findOrFail($request->match);
        $blueTeamUsers = [];
        $redTeamUsers = [];
        $match->state=1;
        $match->save();
        foreach(UserMatches::where('matches_id', $match->id)->get() as $um){
            if($um->side == "red"){
                array_push($redTeamUsers,User::find($um->user_id));
            } else if($um->side == "blue"){
                array_push($blueTeamUsers,User::find($um->user_id)); 
            }
        }
        return view('matches.detail', compact("match","blueTeamUsers","user", "redTeamUsers"));
    }
}
