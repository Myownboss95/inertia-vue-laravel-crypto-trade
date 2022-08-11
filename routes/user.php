<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\DepositController;
use App\Http\Controllers\User\OnboardController;
use App\Http\Controllers\User\TradeController;
use App\Http\Controllers\User\WithdrawalController;

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

Route::middleware('onboarded')->group(function () {
    Route::get('/', DashboardController::class)->name('index');
    Route::resource('deposits', DepositController::class);
    Route::resource('withdrawals', WithdrawalController::class);

    Route::resource('trades', TradeController::class);
});

Route::prefix('onboard')->name('onboard.')->group(function () {
    Route::get('', [OnboardController::class, 'onboardPage']);
    Route::post('', [OnboardController::class, 'submitAddress'])->name('address');

    Route::get('upload', [OnboardController::class, 'uploadPage']);
    Route::post('upload', [OnboardController::class, 'upload'])->name('upload');
});

