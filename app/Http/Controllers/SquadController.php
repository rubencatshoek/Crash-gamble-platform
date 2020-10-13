<?php

namespace App\Http\Controllers;

use App\Models\Squad;
use App\Models\SquadMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SquadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $user = auth()->user();

        return view('squad.index', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SquadMember $squadMember
     * @param Squad $squad
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SquadMember $squadMember, Squad $squad, Request $request)
    {
        $currentUser = auth()->user();
        $amount = 100;

        if ($amount > $currentUser->paid_balance) {
            return back()->with(session()->flash('alert-danger', 'You do not have enough balance'));
        }

        $currentUser->update([
            'paid_balance' => $currentUser->paid_balance - $amount
        ]);

        $squadCreate = $squad->create(request()->validate([
            'name' => 'required|unique:squads'
        ]));

        $squadMember->create([
            'squad_id' => $squadCreate->id,
            'user_id' => $currentUser->id,
            'role_id' => 1,
        ]);

        $currentUser->update([
            'squad_id' => $squadCreate->id
        ]);

        return back()->with(session()->flash('alert-success', 'Squad successfully created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Squad  $squad
     * @return \Illuminate\Http\Response
     */
    public function show(Squad $squad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Squad  $squad
     * @return \Illuminate\Http\Response
     */
    public function edit(Squad $squad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Squad  $squad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Squad $squad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Squad  $squad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Squad $squad)
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function profile($squad)
    {
        $squad = Squad::where('name', $squad)->first();

        if ($squad === null) {
            return abort(404);
        }

        return view('squad.profile', ['squad' => $squad]);
    }
}
