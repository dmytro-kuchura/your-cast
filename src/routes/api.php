<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ShowController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['logger'])->group(function () {
    Route::prefix('v1')->group(function () {
        Route::post('/register', [AuthController::class, 'register'])->name('api.register');
        Route::post('/login', [AuthController::class, 'login'])->name('api.login');
        Route::post('/reset-password', [AuthController::class, 'reset'])->name('api.reset.password');
        Route::post('/update-password', [AuthController::class, 'update'])->name('api.password.update');

        Route::middleware(['bearer'])->group(function () {
            Route::get('/logout', [AuthController::class, 'logout'])->name('api.logout');
            Route::get('/profile', [AuthController::class, 'profile'])->name('api.profile');
            Route::prefix('show')->group(function () {
                Route::post('/create', [ShowController::class, 'create'])->name('api.show.create');
                Route::put('/update', [ShowController::class, 'update'])->name('api.show.update');
                Route::get('/{id}', [ShowController::class, 'info'])->name('api.show.info');
                Route::delete('/{id}', [ShowController::class, 'delete'])->name('api.show.delete');
            });
        });
    });
});
