<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use App\Models\Play;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class PlayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        if (!empty(Auth::user())) {
            if (Auth::user()->isBanned()) {
                return Redirect::to('/');
            }
        }
        return view('play.index');
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
     * @param \App\Models\Play $play
     * @return \Illuminate\Http\Response
     */
    public function show(Play $play)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Play $play
     * @return \Illuminate\Http\Response
     */
    public function edit(Play $play)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Play $play
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Play $play)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Play $play
     * @return \Illuminate\Http\Response
     */
    public function destroy(Play $play)
    {
        //
    }

    /**
     * Fetch all messages
     *
     * @return \Illuminate\Support\Collection
     */
    public function fetchMessages()
    {
        $messages = DB::table('messages')
            ->leftJoin('user_statuses', 'messages.user_id', '=', 'user_statuses.user_id')
            ->where('user_statuses.status_id', '!=', 1)
            ->orWhere('user_statuses.status_id', '!=', 2)
            ->orWhereNull('user_statuses.status_id')
            ->join('users', 'messages.user_id', '=', 'users.id')
            ->select('messages.*', 'user_statuses.status_id', 'users.name', 'users.role_id')
            ->orderBy('messages.created_at', 'desc')
            ->take(50)
            ->get();

        $reverseObj = json_decode($messages);

        return array_reverse($reverseObj);
    }

    /**
     * Persist message to database
     *
     * @param Request $request
     * @return string[]
     */
    public function sendMessage(Request $request)
    {
        $user = Auth::user();

        $message = $user->messages()->create([
            'message' => $request->input('message'),
        ]);

        broadcast(new MessageSent($user, $message))->toOthers();

        return ['status' => 'Message Sent!'];
    }
}
