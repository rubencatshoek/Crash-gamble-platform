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

Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome');
Route::get('/profile/{username}', [App\Http\Controllers\UserController::class, 'index'])->name('profile');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
Route::get('/leaderboards', [App\Http\Controllers\LeaderboardController::class, 'index'])->name('leaderboards.index');

Route::post('/balance/donate', [App\Http\Controllers\BalanceController::class, 'donate'])->name('balance.donate');
Route::post('/settings/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');

Route::resource('faq', App\Http\Controllers\FaqController::class);
Route::resource('play', App\Http\Controllers\PlayController::class);
Route::resource('settings', App\Http\Controllers\SettingController::class);
Route::resource('balance', App\Http\Controllers\BalanceController::class);
Route::resource('squad', App\Http\Controllers\SquadController::class);

Route::get('/squad/{squad}', [App\Http\Controllers\SquadController::class, 'profile'])->name('squad');
Route::post('/squad/join/{squad}', [App\Http\Controllers\SquadController::class, 'requestToJoin'])->name('squadJoin');
Route::get('/squad/handle/{user}/{handle}', [App\Http\Controllers\SquadController::class, 'handleRequesToJoin'])->name('handleRequesToJoin');

//Dashboard routes
Route::middleware(['auth'])->prefix('dashboard')->group(function () {

    //Frontpage of the dashboard
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Admin routes within dashboard
    Route::middleware('auth.admin')->prefix('admin')->group(function () {

        //user routes
        Route::prefix('users')->group(function () {
            Route::get('', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.user.index');
            Route::get('/{user}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.user.edit');
            Route::post('/{user}/update', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.user.update');
            Route::post('/{user}/updateStatus', [App\Http\Controllers\Admin\UserController::class, 'updateStatus'])->name('admin.user.updateStatus');
        });

    });

});

