<?php

namespace App\Http\Controllers;

use App\Models\Bet;
use App\Models\Squad;
use App\Models\SquadMember;
use App\Models\SquadRole;
use App\Models\User;
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
        $squad = $user->getUserSquad($user->id);
        $usersRequestJoin = null;

        if (!empty($squad->id)) {
            $usersRequestJoin = DB::table('users')->where('join_squad_id', $squad->id)->get();
        }

        return view('squad.index', ['user' => $user, 'squad' => $squad, 'usersRequestJoin' => $usersRequestJoin]);
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
            'paid_balance' => $currentUser->paid_balance - $amount,
            'join_squad_id' => null
        ]);

        $squadCreate = $squad->create(request()->validate([
            'name' => 'required|unique:squads'
        ]));

        $squadMember->create([
            'squad_id' => $squadCreate->id,
            'user_id' => $currentUser->id,
            'role_id' => 1
        ]);

        return back()->with(session()->flash('alert-success', 'Squad successfully created'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Squad $squad
     * @return \Illuminate\Http\Response
     */
    public function show(Squad $squad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Squad $squad
     * @return \Illuminate\Http\Response
     */
    public function edit(Squad $squad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Squad $squad
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Squad $squad)
    {
        // Update the description
        $squad->update(request()->validate([
            'description' => 'required'
        ]));

        // Return back
        return back()->with(session()->flash('alert-success', 'Description successfully updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Squad $squad
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Squad $squad)
    {
        // Validate if checkbox is checked
        request()->validate([
            'deleteSquad' => 'accepted'
        ]);

        // Get logged in user
        $user = auth()->user();

        // Check if logged in user actually has permissions
        if (!$user->isLeader()) {
            return abort(404);
        }

        // Delete squad
        $squad->delete();

        // Return back
        return back()->with(session()->flash('alert-success', 'Your squad has been successfully disbanded'));
    }

    public function leave()
    {
        // Get logged in user
        $user = auth()->user();

        // Leave the squad by removing the field from the squad member table
        DB::table('squad_members')->where('user_id', $user->id)->delete();

        // Return back
        return back()->with(session()->flash('alert-success', 'You have successfully left your squad'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function profile($squad)
    {
        // Get logged in user
        $user = auth()->user();

        // Get the user's squad
        $squad = Squad::where('name', $squad)->first();

        // Send to 404 page if squad does not exist
        if ($squad === null) {
            return abort(404);
        }

        // Get all user id's in squad
        $usersInSquad = DB::table('squad_members')->where('squad_id', $squad->id)->get();

        // Set empty variable to foreach into
        $squadMembers = [];

        // Foreach into the array
        foreach ($usersInSquad as $userInSquad) {
            // Put into the squadUsers array
            $squadMembers[] = $userInSquad;

            // Add the user in array
            $userInSquad->user = User::findOrFail($userInSquad->user_id);
        }

        // Get all user id's in squad
        $usersInSquad = DB::table('squad_members')->where('squad_id', $squad->id)->get();

        // Empty total bets
        $squad->bets = 0;

        // Foreach into the array
        foreach ($usersInSquad as $userInSquad) {
            $user = User::findOrFail($userInSquad->user_id);

            $squad->bets += Bet::where('user_id', $user->id)->count();
        }

        // User can apply to squad if logged in
        if (!empty($user)) {
            return view('squad.profile', ['squadMembers' => $squadMembers, 'squad' => $squad, 'userSquad' => $user->getUserSquad($user->id)]);
        } else {
            return view('squad.profile', ['squadMembers' => $squadMembers, 'squad' => $squad]);
        }
    }

    public function requestToJoin($squad)
    {
        // Update the join request id
        auth()->user()->update([
            'join_squad_id' => $squad
        ]);

        // Return back
        return back()->with(session()->flash('alert-success', 'Successfully requested to join'));
    }

    public function handleRequesToJoin($userId, $handle)
    {
        // Get logged in user
        $user = auth()->user();

        // Get the user's squad
        $squad = $user->getUserSquad($user->id);

        // Check if logged in user actually has permissions
        if (!$user->isLeader()) {
            return abort(404);
        }

        // Empty so user can rejoin (later) if needed
        $handledUser = User::findOrFail($userId);

        // Update the user
        $handledUser->update([
            'join_squad_id' => null
        ]);

        // Handle if user has been accepted or not
        if ($handle === "accept") {
            SquadMember::create([
                'squad_id' => $squad->id,
                'user_id' => $userId,
                'role_id' => 4
            ]);
            // Return to view
            return back()->with(session()->flash('alert-success', 'Accepted ' . $handledUser->name . ' into your squad'));
        } else if ($handle === "decline") {
            // Return to view
            return back()->with(session()->flash('alert-success', 'Declined ' . $handledUser->name));
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function manage()
    {
        // Get logged in user
        $user = auth()->user();

        // Get the user's squad
        $squad = $user->getUserSquad($user->id);

        // Check if logged in user actually has permissions
        if (!$user->isLeader()) {
            return abort(404);
        }

        // Get all user id's in squad
        $usersInSquad = DB::table('squad_members')->where('squad_id', $squad->id)->get();

        // Foreach into the array
        foreach ($usersInSquad as $userInSquad) {
            // Put into the squadUsers array
            $squadMembers[] = $userInSquad;

            // Add the user in array
            $userInSquad->user = User::findOrFail($userInSquad->user_id);

            // Add the squad role in array
            $userInSquad->squadRole = DB::table('squad_roles')->where('id', $userInSquad->role_id)->first();
        }

        // Return to view
        return view('squad.manage', ['user' => $user, 'squad' => $squad, 'squadMembers' => $squadMembers, 'squadRoles' => SquadRole::all()]);
    }

    public function kickSquadMember($userId)
    {
        // Get logged in user
        $user = auth()->user();

        // Check if logged in user actually has permissions
        if (!$user->isLeader()) {
            return abort(404);
        }

        // Check if Id is not empty
        if (!empty($userId))
            SquadMember::where('user_id', $userId)->delete();

        return back()->with(session()->flash('alert-success', 'Successfully kicked user'));
    }

    public function updateSquadMemberRole(Request $request)
    {
        // Get logged in user
        $user = auth()->user();

        // Check if logged in user actually has permissions
        if (!$user->isLeader()) {
            return abort(404);
        }

        // Get the user's squad
        $squad = $user->getUserSquad($user->id);

        // Get the squad member and make sure he is in the same squad as the logged in user
        $result = SquadMember::where('squad_id', $squad->id)->where('user_id', $request->squadMemberId)->first();

        // Abort if is nothing is found
        if (empty($result)) {
            return abort(404);
        }

        // Get the squad from logged in user
        $squadMemberAuth = DB::table('squad_members')->where('user_id', $user->id)->first();

        // Set the role id
        if ($result->role_id <= $squadMemberAuth->role_id) {
            return back()->with(session()->flash('alert-danger', 'You cannot edit a member with the same or a higher role'));
        } else {
            $result->update([
                'role_id' => $request->squadRole
            ]);
        }

        // Return back
        return back()->with(session()->flash('alert-success', 'Successfully updated role'));
    }
}
