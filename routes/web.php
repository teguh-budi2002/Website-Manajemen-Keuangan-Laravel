<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CashController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('register', [RegisterController::class, 'index']);
Route::post('register/send', [RegisterController::class, 'regProcess'])->name("regSend");

Route::get('login', [LoginController::class, 'index']);
Route::post('login/send', [LoginController::class, 'loginSend'])->name('logSend');
Route::post('logout', [LogoutController::class, 'logout']);

Route::middleware('admin')->group(function() {
  Route::get('dashboard', [DashboardController::class, 'index']);
  Route::resource('category', CategoryController::class);
  Route::resource('cash', CashController::class);
  Route::get('/cash-out', [CashController::class, 'indexCashOut']);
  Route::put('/cash-out/send/{id}', [CashController::class, 'cashOut']);
  Route::get('get-balance', [CashController::class, 'getCurrentBalance']);

  Route::get("report/cash-in", [ReportController::class, 'cashIn']);
  Route::get("report/cash-out", [ReportController::class, 'cashOut']);
});