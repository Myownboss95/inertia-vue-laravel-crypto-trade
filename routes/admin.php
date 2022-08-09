<?php

use App\Http\Controllers\Admin\PaymentMethodController;
use App\Http\Controllers\Admin\DepositController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TradeableController;
use App\Http\Controllers\Admin\TradeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WithdrawalController;
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

Route::get('/', function () {
    return inertia('index');
})->name('index');

Route::as('users.')->prefix('users')
->controller(UserController::class)->group(function () {
        Route::get('', 'index')->name('index');
    });

Route::resource('tradeables', TradeableController::class);

Route::resource('plans', PlanController::class)->except('show');
Route::resource('trades', TradeController::class);
Route::resource('tradeables', TradeableController::class);
Route::resource('settings', SettingController::class);
Route::resource('payment-method', PaymentMethodController::class);

Route::resource('deposits', DepositController::class);
Route::resource('withdrawals', WithdrawalController::class);
