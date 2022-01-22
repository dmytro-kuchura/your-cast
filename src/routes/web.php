<?php

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
Route::get('/.well-known/pki-validation/4C6536265FE8056FD07E97F5BEEFE2A5.txt', [SiteController::class, 'test'])->name('ssl.test');
Route::get('feed/{token}', [FeedController::class, 'feed'])->name('web.feed');

//Route::prefix('account')->group(function () {
//    Route::get('/{uri}', function () {
//        return view('react');
//    })->where('uri', '^((?!api).)*$'); // except 'api' word
//});
