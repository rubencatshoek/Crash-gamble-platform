<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = auth()->user();
        return view('balance.index', ['user' => $user]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function show(Balance $balance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function edit(Balance $balance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Balance $balance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Balance $balance)
    {
        //
    }

    public function donate(Request $request) {
        $request->validate([
            'name' => 'required',
            'amount' => 'required'
        ]);

        $currentUser = auth()->user();

        $targetUser = User::where('name', $request->name)->first();
        $amount = $request->amount;

        if ($targetUser === null) {
            return back()->with(session()->flash('alert-danger', 'User does not exist'));
        }

        if ($amount > $currentUser->paid_balance) {
            return back()->with(session()->flash('alert-danger', 'You do not have enough balance'));
        }

        $currentUser->update([
            'paid_balance' => $currentUser->paid_balance - $amount
        ]);

        $targetUser->update([
            'paid_balance' => $targetUser->paid_balance + $amount
        ]);

        return back()->with(session()->flash('alert-success', 'Successfully donated ' . $amount .  ' balance to ' . $targetUser->name));
    }
}
