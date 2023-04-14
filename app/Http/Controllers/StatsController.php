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
       
        $totalMatches = 0;
        $totalWins = 0;
        $totalLosses = 0;

        foreach ($data as $d) {
            if ($d->state == 2) {
                $totalMatches += 1;
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
