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
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::resource('faq', \App\Http\Controllers\FaqController::class);
Route::resource('play', \App\Http\Controllers\PlayController::class);

//Dashboard routes
Route::middleware(['auth'])->prefix('dashboard')->group(function () {

    //Frontpage of the dashboard
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Admin routes within dashboard
    Route::middleware('auth.admin')->prefix('admin')->group(function () {

        //user routes
        Route::prefix('users')->group(function () {
            Route::get('', [App\Http\Controllers\Admin\UserController::class, 'index']);
            Route::get('/{user}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit']);
            Route::post('/{user}/update', [App\Http\Controllers\Admin\UserController::class, 'update']);
        });

    });

});

