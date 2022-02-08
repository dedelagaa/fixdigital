<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Google\MainController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Auth Google Account
Route::prefix('auth')->group(function() {
    Route::get('google', [MainController::class, 'redirectGoogle']);
    Route::get('google/callback', [MainController::class, 'handlegoogleCallback']);
});