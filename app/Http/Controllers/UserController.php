<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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

        if ($user === null) {
            return abort(404);
        }

        return view('profile.index', ['user' => $user]);
    }
}
