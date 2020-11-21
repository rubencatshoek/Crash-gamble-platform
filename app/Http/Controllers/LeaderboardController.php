<?php

namespace App\Http\Controllers;

use App\Models\Bet;
use App\Models\Squad;
use App\Models\User;

class LeaderboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::all();
        $squads = Squad::all();
        $bets = Bet::all();

        // Calculate if bet has been won or lost
        foreach ($bets as $bet) {
            if ($bet->user_crashed_at === null || $bet->user_crashed_at > $bet->crashes->crashed_at) {
                $bet->win = false;
            } else {
                $bet->win = true;
            }
        }

        // Calculate profit
        foreach ($users as $user) {
            foreach ($bets as $bet) {
                if ($user->id === $bet->user_id) {
                    if ($bet->win === false) {
                        $user->profit -= $bet->amount_bet;
                    } else {
                        $user->profit += ($bet->amount_bet * $bet->user_crashed_at);
                    }
                }
            }
            if ($user->profit === null) {
                $user->profit = 0;
            }
        }

        // Sort by user profit
        $users = $users->sortByDesc('profit');

        // Set empty rank
        $rank = '';

        if (!empty(auth()->user())) {
            $i = 0;
            foreach ($users as $user) {
                $i++;

                if ($user->id === auth()->user()->id) {
                    $rank = $i;
                }
            }
        }

        // Take top 100
        $users = $users->take(100);

        return view('leaderboard.index', ['users' => $users, 'squads' => $squads, 'rank' => $rank]);
    }
}
