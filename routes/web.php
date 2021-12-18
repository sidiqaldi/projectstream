<?php

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Team\Select as TeamSelect;
use App\Models\Team;
use Illuminate\Support\Facades\Route;

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

Route::view('/', 'welcome')->name('home');

Route::middleware('guest')->group(function () {
    Route::get('register', Register::class)->name('register');
    Route::get('login', Login::class)->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('home', TeamSelect::class)->name('home');
    Route::get('teams/{team:uuid}', function(Team $team) {
        return response()->json([
            'data' => $team
        ]);
    })->name('team.dashboard');
});

