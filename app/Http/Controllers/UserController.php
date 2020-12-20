<?php

namespace App\Http\Controllers;

use App\Models\Bet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($username)
    {
        $user = User::where('name', $username)->first();

        if ($user === null || $user->name === 'admin') {
            return abort(404);
        }

        $user->bets = Bet::where('user_id', $user->id)->count();

        return view('profile.index', ['user' => $user, 'squad' => $user->getUserSquad($user->id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required',
            'new_password' => 'required|same:new_password',
            'confirm_new_password' => 'required|same:new_password'
        ]);

        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return back()->with(session()->flash('alert-danger', 'Current password is incorrect'));
        } else {
            $user = auth()->user();
            $user->update([
                'password' => bcrypt($request->new_password)
            ]);

            return back()->with(session()->flash('alert-success', 'Successfully changed password'));
        }
    }
}
