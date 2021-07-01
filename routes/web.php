<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\User\UserController;
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


// auth
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
    
    // payment
    Route::group([
        "prefix" => "payment",
        "as" => "payment."
    ], function(){
        Route::get('/create', [PaymentController::class, "CreatePayment"])->name("create");
        Route::post('/save/{user:user_id}', [PaymentController::class, "SavePayment"])->name("save");
        Route::get('/confirmation',[PaymentController::class, "PaymentConfirmation"])->name("confirmation");
        Route::post('/confirmation-save/{user:user_id}/{payment:payment_id}', [PaymentController::class, "SavePaymentConfirmation"])->name("confirmation.save");
        Route::post('/accept/{user:user_id}/{payment:payment_id}', [PaymentController::class, "PaymentAccepted"])->name("accept");
        Route::post('/denied/{user:user_id}/{payment:payment_id}', [PaymentController::class, "PaymentDenied"])->name("denied");
    });

    // admin 
    Route::group([
        "prefix" => "admin",
        "as" => "admin.",
        "middleware" => "admin",
    ], function(){
        Route::get('/', [AdminController::class, "Index"])->name("index");
    });

    // users
    Route::group([
        "prefix" => "dashboard",
        "as" => "dashboard."
    ], function(){
        Route::get('/', [UserController::class, "Index"])->name("index");
    });

});
