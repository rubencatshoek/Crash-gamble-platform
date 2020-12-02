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
        // Get all squads
        $squads = $this->leaderboardBySquadProfit();

        // Get all users by profit
        $users = $this->leaderboardByProfit('');

        // Set empty rank variable
        $rank = '';

        // Get the user logged in rank
        $i = 0;
        if (!empty(auth()->user())) {
            foreach ($users as $user) {
                $i++;
                if (auth()->user()->id === $user->id) {
                    $rank = $i;
                }
            }
        }

        // Get the user's squad
        $userSquad = auth()->user()->getUserSquad(auth()->user()->id);

        // Set empty rank variable
        $squadRank = '';

        // Get the user logged in rank
        $j = 0;
        if (!empty(auth()->user())) {
            foreach ($squads as $squad) {
                $j++;
                if ($userSquad->id === $squad->id) {
                    $squadRank = $j;
                }
            }
        }

        // Return to view
        return view('leaderboard.index', ['users' => $users, 'squads' => $squads, 'rank' => $rank, 'squadRank' => $squadRank]);
    }

    public function leaderboardByProfit($takeAmountOfUsers)
    {
        // Get required data
        $users = User::all();
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

        // Put the profit per user as attribute
        foreach ($users as $user) {
            $user->profit = $profit[$user->id];
        }

        // Sort the users by profit
        $users = $users->sortByDesc('profit');

        // If empty, count all users
        if (!empty($takeAmountOfUsers)) {
            $users = $users->take($takeAmountOfUsers);
        }

        // Return all users by profit
        return $users;
    }

    public function leaderboardByProfitAJAX($takeAmountOfUsers)
    {
        // Take users to the leaderboard
        $users = $this->leaderboardByProfit($takeAmountOfUsers);

        // Set the array
        $allUsers = array();

        // Set the iterator
        $i = 1;
        foreach ($users as $loop => $user) {
            $allUsers[$i]['rank'] = $i;
            $allUsers[$i]['name'] = $user->name;
            $allUsers[$i]['profit'] = round($user->profit);
            $i++;
        }

        // Return the user data which everyone can see
        return $allUsers;
    }

    public function leaderboardBySquadProfit()
    {
        $squads = Squad::all();
        $users = User::all();
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


        // Put the profit and squad per user as attribute
        foreach ($users as $user) {
            $user->profit = $profit[$user->id];

            $user->squad = $user->getUserSquad($user->id);
        }

        foreach ($squads as $squad) {
            $squad->profit = 0;
            foreach ($users as $user) {
                if (!empty($user->squad)) {
                    if($squad->id === $user->squad->id) {
                        $squad->profit += $user->profit;
                    }
                }
            }
        }

        // Sort the users by profit
        $squads = $squads->sortByDesc('profit');
        
        // Return all squads by profit
        return $squads;
    }

    public function leaderboardTopFiveUsers()
    {
        // Take top 5 from the leaderboard
        return $this->leaderboardByProfitAJAX(5);
    }
}
