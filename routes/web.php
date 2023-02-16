<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerifyEmailController;

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
    return inertia('Home');
})->name('home');

Route::get('/dashboard', function () {
    return inertia('Dashboard')->with(['email' => auth()->user()->email]);
})->name('dashboard')->middleware(['auth', 'verified']);


// Auth
Route::name('login')->middleware('guest')
    ->group(function () {
        Route::get('login', [AuthController::class, 'create']);
        Route::post('login', [AuthController::class, 'store'])->name('.store');
    });

Route::delete('logout', [AuthController::class, 'destroy'])->name('logout')
    ->middleware('auth');


// User
Route::name('signup.')->middleware('guest')
    ->group(function () {
        Route::get('signup', [UserController::class, 'create'])->name('create');
        Route::post('signup', [UserController::class, 'store'])->name('store');
    });


// VerifyEmail
Route::name('verification.')->middleware('auth')
    ->group(function () {
        Route::get('/email/verify', [VerifyEmailController::class, 'notice'])
            ->name('notice');
        Route::post('/email/verification-notification', [VerifyEmailController::class, 'send'])
            ->name('send')->middleware('throttle:2,1');
        Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, 'verify'])
            ->name('verify')->middleware('signed');
    });
