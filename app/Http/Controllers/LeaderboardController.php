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
        // Get required data
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

        // Set profit array
        $profit[] = array();

        // Set default profit to zero
        foreach ($users as $user) {
            $profit[$user->id] = 0;
        }

        // Calculate profit and put it in the profit variable
        foreach ($bets as $bet) {
            if ($bet->win === false) {
                $profit[$bet->user_id] -= $bet->amount_bet;
            } else {
                $profit[$bet->user_id] += ($bet->amount_bet * $bet->user_crashed_at);
            }
        }

        // Get the user rank
        $rank = '';

        // Put the profit per user as attribute
        foreach ($users as $user) {
            $user->profit = $profit[$user->id];
        }

        // Sort the users by profit
        $users = $users->sortByDesc('profit');

        // Get the user logged in rank
        $i = 0;
        if (!empty(auth()->user())) {
            foreach($users as $user) {
                $i++;
                if(auth()->user()->id === $user->id) {
                    $rank = $i;
                }
            }
        }

        // Take 100 users to the leaderboard
        $users = $users->take(100);

        return view('leaderboard.index', ['users' => $users, 'squads' => $squads, 'rank' => $rank, 'profit' => $profit]);
    }
}
