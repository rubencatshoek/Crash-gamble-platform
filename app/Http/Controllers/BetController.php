<?php

namespace App\Http\Controllers;

use App\Models\Bet;
use App\Models\User;
use Illuminate\Http\Request;

class BetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('bet.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $bet = Bet::where('id', $id)->first();
        $otherBets = Bet::where('crash_id', $bet->crash_id)->get();

        if ($bet->user_crashed_at === null || $bet->user_crashed_at > $bet->crashes->crashed_at) {
            $bet->win = true;
        } else {
            $bet->win = false;
        }

        // Set profit array
        $profit = 0;

        // Calculate profit and put it in the profit variable
        if ($bet->win === true) {
            $profit += $bet->amount_bet;
        } else {
            $profit -= $bet->amount_bet * $bet->user_crashed_at;
        }

        return view('admin.dashboard.bet', compact('profit', 'otherBets', 'bet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Bet $bet
     * @return \Illuminate\Http\Response
     */
    public function edit(Bet $bet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Bet $bet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bet $bet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Bet $bet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bet $bet)
    {
        //
    }
}
