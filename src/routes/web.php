<?php

use App\Http\Controllers\AudioController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\SiteController;
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

Route::get('/', [SiteController::class, 'home'])->name('home');
Route::get('feed/{token}', [FeedController::class, 'feed'])->name('web.feed');
Route::get('audio/{audio_link_token}', [AudioController::class, 'audio'])->name('web.audio');
