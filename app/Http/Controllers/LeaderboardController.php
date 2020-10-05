<?php

namespace App\Http\Controllers;

use App\Models\Squad;
use App\Models\User;
use Illuminate\Http\Request;

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
        return view('leaderboard.index', ['users' => $users, 'squads' => $squads]);
    }
}
