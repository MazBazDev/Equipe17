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

    public function end(Request $request)
    {
        $gain = 12;
        $lose = 12;
        $winner = "";
        $loser = "";
        if($request->scoreB>$request->scoreR) {
            $gain += ($request->scoreB - $request->scoreR);
            $winner = "blue";
            $loser = "red";
        } else {
            $gain += ($request->scoreR - $request->scoreB);
            $winner = "red";
            $loser = "blue";
        }
        $match = Matches::findOrFail($request->match);
        $match->state=2;

        $blueTeamUsers = [];
        $redTeamUsers = [];

        foreach(UserMatches::where('matches_id', $match->id)->get() as $um){
            if($um->side == "red"){
                array_push($redTeamUsers,User::find($um->user_id));
            } else if($um->side == "blue"){
                array_push($blueTeamUsers,User::find($um->user_id)); 
            }
        }

        $bTeamElo = 0;
        foreach($blueTeamUsers as $bUser) {
            $bTeamElo+=$bUser->elo;
        }

        $rTeamElo = 0;
        foreach($redTeamUsers as $rUser) {
            $rTeamElo+=$rUser->elo;
        }

        if($rTeamElo>$bTeamElo) {
            while($rTeamElo > $bTeamElo){
                $gain+=5;
                $rTeamElo = $rTeamElo / 10;
            }
        } else {
            while($rTeamElo < $bTeamElo){
                $gain+=5;
                $bTeamElo = $bTeamElo / 10;
            }
        }

        $lose = $gain-$lose;
        if($loser == "red") {
            foreach($blueTeamUsers as $bUser){
                $bUser->elo+=$gain;
                $bUser->save();
            }

            foreach($redTeamUsers as $rUser){
                $rUser->elo-=$lose;
                $rUser->save();
            }
        } else {
            foreach($blueTeamUsers as $bUser){
                $bUser->elo-=$lose;
                $bUser->save();
            }

            foreach($redTeamUsers as $rUser){
                $rUser->elo+=$gain;
                $rUser->save();
            }
        }

        // TO modify
        $match->score=10;
        $match->state=2;
        $match->save();

        return redirect()
                        ->route('dashboard');
    }
}
