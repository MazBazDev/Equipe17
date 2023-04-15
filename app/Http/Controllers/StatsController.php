<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserMatches;

class StatsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $user_id)
    {
        $data = UserMatches::where('user_id', $user_id)
            ->join('matches', 'user_matches.matches_id', '=', 'matches.id')
            ->get();

        $AllUsersGames = UserMatches::join('matches', 'user_matches.matches_id', '=', 'matches.id')
            ->get();

        $totalMatches = 0;
        $totalWins = 0;
        $totalLosses = 0;
        $userStats = [];

        foreach ($AllUsersGames as $game) {
            if ($game->state != 2) {
                continue; 
            }

            $user_id = $game->user_id;
            $user_name = $game->user->name;

            if (!isset($userStats[$user_id])) {
                $userStats[$user_id] = [
                    'user_id' => $user_id,
                    'name' => $user_name,
                    'total_matches' => 0,
                    'total_wins' => 0,
                    'total_losses' => 0,
                ];
            }

            $userStats[$user_id]['total_matches']++;

            if ($game->side == 'RED') {
                if ($game->scoreR > $game->scoreB) {
                    $userStats[$user_id]['total_wins']++;
                } else {
                    $userStats[$user_id]['total_losses']++;
                }
            } else {
                if ($game->scoreB > $game->scoreR) {
                    $userStats[$user_id]['total_wins']++;
                } else {
                    $userStats[$user_id]['total_losses']++;
                }
            }
        }

        foreach ($userStats as &$user) {
            $user['win_rate'] = $user['total_matches'] > 0 ? round(($user['total_wins'] / $user['total_matches']) * 100, 2) : 0;
        }

        usort($userStats, function ($a, $b) {
            return $b['win_rate'] - $a['win_rate'];
        });

        foreach ($data as $d) {
            if ($d->state == 2) {
                $totalMatches++;
                if ($d->side == 'RED') {
                    if ($d->scoreR > $d->scoreB) {
                        $totalWins++;
                    } else {
                        $totalLosses++;
                    }
                } else {
                    if ($d->scoreB > $d->scoreR) {
                        $totalWins++;
                    } else {
                        $totalLosses++;
                    }
                }
            }
        }


        $winRate = $totalMatches > 0 ? round(($totalWins / $totalMatches) * 100, 2) : 0;
        $lossRate = $totalMatches > 0 ? round(($totalLosses / $totalMatches) * 100, 2) : 0;

        return view('app.stats', [
            'data' => $data,
            'totalMatches' => $totalMatches,
            'totalWins' => $totalWins,
            'totalLosses' => $totalLosses,
            'winRate' => $winRate,
            'lossRate' => $lossRate,
            'userStats' => $userStats,
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
