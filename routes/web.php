<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\Surat\ChooseSuratController;
use App\Http\Controllers\Surat\SKController;
use App\Http\Controllers\Surat\SPDController;
use App\Http\Controllers\User\FeedbackController;
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
        Route::get('/all-document', [AdminController::class, "AllDocument"])->name("all_document");
        Route::get('/users', [AdminController::class, "Users"])->name("users");
    });

    // users
    Route::group([
        "prefix" => "dashboard",
        "as" => "dashboard."
    ], function(){
        Route::get('/', [UserController::class, "Index"])->name("index");

    });

    // route pilih surat
    Route::get('/choose', function(){
        return view('choose.index');
    })->name('choose.index');

    // route grup surat pengunduran diri
    Route::group([
        "prefix" => "spd",
        "as" => "spd."
    ], function(){
        Route::get('/', [SPDController::class, "Create"])->name('create');
        Route::get('/{order:order_id}/edit', [SPDController::class, "Edit"])->name('edit');
        Route::post('/{user:user_id}', [SPDController::class, "Store"])->name('store');
        Route::patch('/{order:order_id}', [SPDController::class, "Update"])->name('update');
        Route::delete('/{order:order_id}', [SPDController::class, "Delete"])->name('delete');
    });

    // route grup surat pengunduran diri
    Route::group([
        "prefix" => "sk",
        "as" => "sk."
    ], function(){
        Route::get('/', [SKController::class, "Create"])->name('create');
        // Route::get('/edit', [SPDController::class, "Edit"])->name('edit');
        Route::post('/{user:user_id}', [SKController::class, "Store"])->name('store');
    });

    // route halaman feedback
    Route::group([
        "prefix" => "feedback",
        "as" => "feedback."
    ], function(){
        Route::get('/', [FeedbackController::class, "Create"])->name('create');
    });

    // route halaman print
    Route::group([
        "prefix" => "print",
        "as" => "print."
    ], function(){
        Route::get('/{slug}/{order:order_id}', [PrintController::class, "Download"])->name('download');
    });

});
