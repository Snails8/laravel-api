<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\CompanyController;

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth:admin')->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('admin.home');

    Route::resource('company', CompanyController::class)->except([
        'show',
    ])->names('admin.companies');
//    Route::prefix('company')->group(function () {
//        Route::get()
//    });
});
