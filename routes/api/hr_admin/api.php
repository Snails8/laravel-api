<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HrAdmin\Auth\LoginController;

Route::prefix('auth')->group(function () {
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('logout', [LoginController::class, 'logout']);
});

Route::middleware('auth:api_hr_admin')->group(function () {
    // 認証判定
    Route::get('/user', function () {
        return Auth::user();
    });
});