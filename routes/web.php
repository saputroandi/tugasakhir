<?php

use App\Http\Controllers\MailController;
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
Route::post("/auth/create-user", [AuthController::class, "RegisterUser"])->name("auth.register-user");
Route::post("/auth/check-user", [AuthController::class, "LoginUser"])->name("auth.login-user");
Route::post("/auth/logout", [AuthController::class, "Logout"])->name("auth.logout");

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->middleware('auth')->name("user.dashboard");

Route::get('/kirim-email',[MailController::class, "TestMail"]);