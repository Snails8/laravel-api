<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\Auth\LoginController;

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('admin.login');

Route::middleware('auth:admin')->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('admin.home');
});
