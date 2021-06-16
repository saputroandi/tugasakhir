<?php

use App\Http\Controllers\MailController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Web\AuthController;
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
    return view('landing.landing');
})->name("landing");

Route::middleware(['already.login'])->group(function () {
    Route::get("/auth/login", [AuthController::class, "Login"])->name("auth.login");
    Route::get("/auth/register", [AuthController::class, "Register"])->name("auth.register");
});

Route::post("/auth/register-user", [AuthController::class, "RegisterUser"])->name("auth.register-user");
Route::get('/email-confirmation/{user}',[AuthController::class, "MailConfirmation"]);
Route::post("/auth/login-user", [AuthController::class, "LoginUser"])->name("auth.login-user");

Route::middleware(['auth'])->group(function () {
    // logout 
    Route::post("/auth/logout", [AuthController::class, "Logout"])->name("auth.logout");
    
    // dashboard
    Route::get('/dashboard', function () {
        return view('dashboard.dashboard');
    })->name("user.dashboard");
    
    // payment confirmation
    Route::get('/payment-create', [PaymentController::class, "CreatePayment"])->name("payment.create");
    Route::post('/payment-save/{user:user_id}', [PaymentController::class, "SavePayment"])->name("payment.save");
    Route::get('/payment-confirmation',[PaymentController::class, "PaymentConfirmation"])->name("payment.confirmation");
    Route::post('/payment-confirmation-save/{user:user_id}/{payment:payment_id}', [PaymentController::class, "SavePaymentConfirmation"])->name("payment.confirmation.save");
});
