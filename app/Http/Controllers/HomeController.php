<?php

namespace App\Http\Controllers;

use App\Models\Crash;
use App\Models\Squad;
use App\Models\User;
use App\Models\Bet;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userCount = $this->totalPlayers();
        $highestBet = $this->highestBet();
        $highestBetToday = $this->highestBetToday();
        $totalProfit = $this->totalProfit();
        $latestGames = $this->retrieveAmountOfGames(5);
        $highestBetWithBetId = $this->highestBetWithBetId();
        return view('admin.dashboard.home', compact('userCount', 'highestBet', 'highestBetToday', 'totalProfit', 'latestGames', 'highestBetWithBetId'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function welcome()
    {
        $users = User::all()->take(5);
        $squads = Squad::all()->take(5);
        return view('welcome', ['users' => $users, 'squads' => $squads]);
    }

    public function totalProfit()
    {
        // Get required data
        $bets = Bet::all();

        // Calculate if bet has been won or lost
        foreach ($bets as $bet) {
            if ($bet->user_crashed_at === null || $bet->user_crashed_at > $bet->crashes->crashed_at) {
                $bet->win = true;
            } else {
                $bet->win = false;
            }
        }

        // Set profit array
        $profit = 0;

        // Calculate profit and put it in the profit variable
        foreach ($bets as $bet) {
            if ($bet->win === false) {
                $profit -= ($bet->amount_bet * $bet->user_crashed_at);
            } else {
                $profit += $bet->amount_bet;
            }
        }

        return $profit;
    }

    public function highestBetWithBetId(){
        return Bet::orderBy('amount_bet', 'desc')->first();
    }

    public function retrieveAmountOfGames($amount)
    {
        return Crash::orderBy('id')->take($amount)->get();
    }

    /**
     * @return mixed
     */
    public function totalWagered()
    {
        return Bet::sum('amount_bet');
    }

    /**
     * @return mixed
     */
    public function highestBet()
    {
        return Bet::max('amount_bet');
    }

    /**
     * @return mixed
     */
    public function totalPlayers()
    {
        return User::all()->count();
    }

    /**
     * @return mixed
     */
    public function highestBetToday()
    {
        return Bet::whereDate('created_at', Carbon::today())->get()->max('amount_bet');
    }
}
