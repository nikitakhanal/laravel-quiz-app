<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ResultController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', [AdminController::class, 'index']);
Route::get('/adminDashboard', [AdminController::class, 'show']);
Route::post('/admin', [AdminController::class, 'login'])->name('adminLogin');
Route::get('/logout', [AdminController::class, 'logout'])->name('adminLogout');
Route::post('/questions', [QuestionController::class, 'store'])->name('createQuestion');
Route::get('/questions', [QuestionController::class, 'show']);
Route::get('/show', [OptionController::class, 'show'])->name('game.show');
Route::post('/options', [OptionController::class, 'store']);
Route::post('/player', [PlayerController::class, 'store']);
Route::get('/game', [GameController::class, 'index'])->name('game');
Route::post('/game/store', [GameController::class, 'store'])->name('storeGameData');
Route::get('/result', [ResultController::class, 'show']);
