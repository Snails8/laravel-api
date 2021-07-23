<?php

use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('logout', [LoginController::class, 'logout']);
});

Route::middleware('auth:api_admin')->group(function () {

});