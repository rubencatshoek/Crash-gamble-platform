<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\UserAchievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function frontAchievementPage()
    {
        // Get required info
        $user = auth()->user();
        $achievements = Achievement::all();

        // Set empty array
        $allAchievements = array();

        // Set empty object element and input all achievements in array
        foreach ($achievements as $achievement) {
            $achievement->achieved = 0;
            $allAchievements[] = $achievement;
        }

        // 10 bets achievement
        $this->achievementTenBets($user);

        // Check if achievement has been achieved/completed and then change the object element value
        foreach ($user->achievements as $userAchievement) {
            foreach ($allAchievements as $achievement) {
                if ($userAchievement->achievement_id === $achievement->id) {
                    $achievement->achieved = $userAchievement->achieved;
                }
            }
        }

        // Return to achievement overview
        return view('achievement.index', compact('user', 'allAchievements'));
    }

    public function achievementTenBets($user) {
        // Count bets
        $totalBets = DB::table('bets')->where('user_id', $user->id)->count();

        // If total bets is higher than 10, return true
        if($totalBets >= 1) {
            UserAchievement::firstOrCreate([
                'user_id' => $user->id,
                'achievement_id' => 1,
                'achieved' => true,
            ]);
        }

        // Return false on default
        return false;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        // Get required info
        $achievements = Achievement::all();

        // Return to achievement overview
        return view('admin.achievement.index', compact('achievements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.achievement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Achievement $achievement)
    {
        $achievement->create(request()->validate([
            'name' => 'required',
            'description' => 'required',
            'logic_added' => 'required',
        ]));
        return redirect(route('achievement.index'))->with('success', 'Achievement succesfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Achievement $achievement
     * @return \Illuminate\Http\Response
     */
    public function show(Achievement $achievement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Achievement $achievement
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Achievement $achievement)
    {
        return view('admin.achievement.edit', compact('achievement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Achievement $achievement
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Achievement $achievement)
    {
        $achievement->update(request()->validate([
            'name' => 'required',
            'description' => 'required',
            'logic_added' => 'required',
        ]));
        return redirect(route('achievement.index'))->with('success', 'Achievement succesfully edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Achievement $achievement
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Achievement $achievement)
    {
        $achievement->delete();
        return redirect(route('achievement.index'))->with('success', 'Achievement succesfully deleted');
    }
}
