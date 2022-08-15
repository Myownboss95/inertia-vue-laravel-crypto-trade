<?php

use App\Http\Controllers\ChangePasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\EmailVerifiedController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\SuccessfulPasswordResetController;
use App\Http\Controllers\TwoFactorAuthenticationController;
use App\Models\Plan;

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

// Route::as('front.')->group(function () {
//     Route::get('/', function () {
//         return inertia('index');
//     })->name('index');
// });

Route::middleware(['auth'])->group(function () {

    Route::middleware(['verified'])->group(function () {
        Route::prefix('user')->as('user.')->group(fn () => require_once('user.php'));
        Route::prefix('admin')->as('admin.')->middleware('can:is_admin')->group(fn () => require_once('admin.php'));

        Route::get('change-password', [ChangePasswordController::class, 'getChangePasswordView'])->name('password.change');
        Route::post('change-password', [ChangePasswordController::class, 'ChangePassword']);

        Route::get('two-factor-auth', TwoFactorAuthenticationController::class)->name('two-factor-auth');


        Route::get('email/verified', [EmailVerifiedController::class, 'verified'])->name('email.verified');
    });

    Route::post('email/correct', [EmailVerifiedController::class, 'correctInfo'])->name('email.correct');

    Route::prefix('location')->as('location.')->controller(LocationController::class)->group(function () {
        Route::get('countries', 'countries')->name('countries');
        Route::get('states/{country}', 'states')->name('states');
    });
});



Route::middleware('guest')->group(function () {
    Route::get('logout', LogoutController::class);
    Route::get('reset-password', SuccessfulPasswordResetController::class)->name('password.reset.successful');
});

$theme = config('app.theme','front2');

Route::view('/', "$theme.home")->name('front.index');
Route::view('/about-us', "$theme.about-us");
Route::view('/contact-us',"$theme.contact");
Route::view('/terms-and-conditions', "$theme.terms-and-conditions");
Route::view('/faqs', "$theme.faqs");
