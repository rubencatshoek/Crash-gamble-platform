<?php

namespace App\Http\Controllers;

use App\Models\Bet;
use App\Models\Squad;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function welcome()
    {
        $highestBet = $this->highestBet();
        $highestBetToday = $this->highestBetToday();
        $totalPlayers = $this->totalPlayers();
        $totalWagered = $this->totalWagered();

        return view('welcome', compact('highestBet', 'totalPlayers', 'totalWagered', 'highestBetToday'));
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
