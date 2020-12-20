<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Auth::routes(['verify' => true]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome');
Route::get('/leaderboards', [App\Http\Controllers\LeaderboardController::class, 'index'])->name('leaderboards.index');
Route::get('/faq', [App\Http\Controllers\FaqController::class, 'index'])->name('user.faq.index');

Route::get('/legal', [App\Http\Controllers\LegalController::class, 'indexLegal'])->name('legal.index');
Route::get('/tos', [App\Http\Controllers\LegalController::class, 'indexTos'])->name('legal.tos');
Route::get('/help', [App\Http\Controllers\LegalController::class, 'indexHelp'])->name('legal.help');

Route::resource('play', App\Http\Controllers\PlayController::class);

Route::get('/profile/{username}', [App\Http\Controllers\UserController::class, 'index'])->name('profile');


Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
    Route::post('/balance/donate', [App\Http\Controllers\BalanceController::class, 'donate'])->name('balance.donate');
    Route::post('/settings/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');

    Route::get('/achievements', [App\Http\Controllers\AchievementController::class, 'frontAchievementPage'])->name('frontAchievementPage');

    Route::resource('bet', App\Http\Controllers\BetController::class);
    Route::resource('settings', App\Http\Controllers\SettingController::class);
    Route::resource('balance', App\Http\Controllers\BalanceController::class);


    Route::resource('squad', App\Http\Controllers\SquadController::class);

    Route::get('/squad/handle/{user}/{handle}', [App\Http\Controllers\SquadController::class, 'handleRequesToJoin'])->name('handleRequesToJoin');
    Route::get('/manage/squad', [App\Http\Controllers\SquadController::class, 'manage'])->name('squad.manage');
    Route::get('/manage/squad/kick/{id}', [App\Http\Controllers\SquadController::class, 'kickSquadMember'])->name('squad.kick');
    Route::post('/manage/squad/updateRole', [App\Http\Controllers\SquadController::class, 'updateSquadMemberRole'])->name('squad.update.role');

    Route::post('/squad/join/{squad}', [App\Http\Controllers\SquadController::class, 'requestToJoin'])->name('squadJoin');
    Route::post('/squad/leave', [App\Http\Controllers\SquadController::class, 'leave'])->name('squad.leave');
});

Route::get('/squad/{squad}', [App\Http\Controllers\SquadController::class, 'profile'])->name('squad');

Route::get('/leaderboards/users', [App\Http\Controllers\LeaderboardController::class, 'leaderboardTopFiveUsers']);
Route::get('/leaderboards/squads', [App\Http\Controllers\LeaderboardController::class, 'leaderboardTopFiveSquads']);

Route::get('/leaderboards/users/hundred', [App\Http\Controllers\LeaderboardController::class, 'leaderboardTopHundredUsers']);
Route::get('/leaderboards/squads/hundred', [App\Http\Controllers\LeaderboardController::class, 'leaderboardTopHundredSquads']);

Route::get('/leaderboards/user/rank', [App\Http\Controllers\LeaderboardController::class, 'personalUserRank']);
Route::get('/leaderboards/squad/rank', [App\Http\Controllers\LeaderboardController::class, 'personalSquadRank']);
Route::get('/leaderboards/user/{username}', [App\Http\Controllers\LeaderboardController::class, 'userProfit']);
Route::get('/leaderboards/squad/{squad}', [App\Http\Controllers\LeaderboardController::class, 'squadProfit']);

Route::get('/leaderboards/profit/squad/{squad}', [App\Http\Controllers\LeaderboardController::class, 'squadProfitPerMember']);

//Dashboard routes
Route::middleware(['auth'])->prefix('dashboard')->group(function () {

    //Frontpage of the dashboard
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/bet/{betId}', [App\Http\Controllers\BetController::class, 'show'])->name('bet.user.id');

//Admin routes within dashboard
    Route::middleware('auth.admin')->prefix('admin')->group(function () {

        //user routes
        Route::prefix('users')->group(function () {
            Route::get('', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.user.index');
            Route::get('/{user}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.user.edit');
            Route::post('/{user}/update', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.user.update');
            Route::post('/{user}/updateStatus', [App\Http\Controllers\Admin\UserController::class, 'updateStatus'])->name('admin.user.updateStatus');
            Route::delete('/{user}/deleteStatus', [App\Http\Controllers\Admin\UserController::class, 'deleteStatus'])->name('admin.user.deleteStatus');
        });

        Route::resource('faq', App\Http\Controllers\Admin\FaqController::class);
        Route::resource('achievement', App\Http\Controllers\AchievementController::class);
    });

});

