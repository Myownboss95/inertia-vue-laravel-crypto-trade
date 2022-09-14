<?php

use App\Http\Controllers\User\BotController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\DepositController;
use App\Http\Controllers\User\OnboardController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\SubscriptionController;
use App\Http\Controllers\User\TradeController;
use App\Http\Controllers\User\WithdrawalController;
use App\Models\User;

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
    Route::post('deposits/validate', [DepositController::class, 'validateDeposit'])->name('deposits.validate');
    Route::resource('deposits', DepositController::class)->except('show');
    Route::get('/profile/view',[ProfileController::class, 'index'])->name('profile.view');
    Route::resource('profile', ProfileController::class);
    Route::resource('withdrawals', WithdrawalController::class)->middleware('active');
    Route::post('withdrawals/bank/validate', [WithdrawalController::class, 'validateBankWithdrawal'])->name('withdrawals.bank.validate')->middleware('active');
    Route::post('withdrawals/bank/request-token', [WithdrawalController::class, 'requestToken'])->name('withdrawals.bank.request-token')->middleware('active');
    Route::post('withdrawals/bank', [WithdrawalController::class, 'bankWithdrawal'])->name('withdrawals.bank')->middleware('active');

    Route::get('/trades/assets/{type}',[TradeController::class, 'getTradeables'])->name('trades.getTradeables');
    Route::get('/trades/view',[TradeController::class, 'trades'])->name('trades.view');
    Route::post('trades/close/{trade}', [TradeController::class, 'close'])->name('trades.close')->middleware('active');
    Route::resource('trades', TradeController::class)->only('index', 'store');
    Route::post('bots/activation-request', [BotController::class, 'requestActivation'])->name('bots.activation.request');
    Route::post('bots/activate', [BotController::class, 'activate'])->name('bots.activate');
    Route::post('bots/deactivate/{id}', [BotController::class, 'deactivate'])->name('bots.deactivate');
    Route::post('bots/reactivate/{id}', [BotController::class, 'reactivate'])->name('bots.reactivate');
    Route::resource('bots', BotController::class)->except('show', 'update');
});

Route::get('subscriptions', [SubscriptionController::class, 'plans'])->name('subscriptions.plans');
Route::post('subscribe/{plan}', [SubscriptionController::class, 'subscribe'])->name('subscriptions.subscribe');


Route::prefix('onboard')->name('onboard.')->group(function () {
    Route::get('', [OnboardController::class, 'onboardPage']);
    Route::post('', [OnboardController::class, 'submitAddress'])->name('address');

    Route::get('upload', [OnboardController::class, 'uploadPage']);
    Route::post('upload', [OnboardController::class, 'upload'])->name('upload');
});
