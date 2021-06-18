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

Route::group([ 
    "middleware" => "already.login",
    "prefix" => "auth",
    "as" => "auth."
    ],function () {
    Route::get("/login", [AuthController::class, "Login"])->name("login");
    Route::get("/register", [AuthController::class, "Register"])->name("register");
    Route::post("/login-user", [AuthController::class, "LoginUser"])->name("login-user");
    Route::post("/register-user", [AuthController::class, "RegisterUser"])->name("register-user");
});

Route::get('/email-confirmation/{user}',[AuthController::class, "MailConfirmation"]);

Route::middleware(['auth'])->group(function () {
    // logout 
    Route::post("/auth/logout", [AuthController::class, "Logout"])->name("auth.logout");
    
    // dashboard
    Route::get('/dashboard', function () {
        return view('dashboard.dashboard');
    })->name("user.dashboard");
    
    Route::group([
        "prefix" => "payment",
        "as" => "payment."
    ], function(){
        // payment confirmation
        Route::get('/create', [PaymentController::class, "CreatePayment"])->name("create");
        Route::post('/save/{user:user_id}', [PaymentController::class, "SavePayment"])->name("save");
        Route::get('/confirmation',[PaymentController::class, "PaymentConfirmation"])->name("confirmation");
        Route::post('/confirmation-save/{user:user_id}/{payment:payment_id}', [PaymentController::class, "SavePaymentConfirmation"])->name("confirmation.save");
    });
});
