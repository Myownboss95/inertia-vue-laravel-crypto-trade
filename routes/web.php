<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\EmailVerifiedController;
use App\Http\Controllers\SuccessfulPasswordResetController;

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

Route::as('front.')->group(function () {
    Route::get('/', function () {
        return inertia('index');
    })->name('index');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('user')->as('user.')->group(fn () => require_once('user.php'));
    Route::prefix('admin')->as('admin.')->group(fn () => require_once('admin.php'));
});

Route::get('logout', LogoutController::class)->middleware('guest');
Route::get('reset-password', SuccessfulPasswordResetController::class)->name('password.reset.successful')->middleware('guest');
Route::get('email/verified', EmailVerifiedController::class)->name('email.verified')->middleware(['auth', 'verified']);
