<?php

use App\Http\Controllers\Portal\AuthController;
use App\Http\Controllers\Portal\IndexController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Portal Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('auth')->name('auth.')->controller(AuthController::class)->middleware('isGuest')->group(function () {
    Route::get('login', 'login')->name('login');

    Route::post('login', 'loginAttempt')->name('loginAttempt');
});

Route::middleware('isSuperAdmin')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/', [IndexController::class, 'index'])->name('index');
});
