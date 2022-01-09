<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TvController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/',[MovieController::class,'index'])->name('movies');

Route::get('/tv',[TvController::class,'index'])->name('tvs');
Route::get('/showtv/{tv}',[TvController::class,'showTv'])->name('show.tv');

Route::get('/show/{movie}',[MovieController::class,'ShowMovie'])->name('show.movie');
Route::get('/actors',[ActorController::class,'index'])->name('actors');
Route::get('/showactor/{actor}',[ActorController::class,'showActor'])->name('show.actor');


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
