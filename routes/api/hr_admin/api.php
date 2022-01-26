<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HrAdmin\Auth\LoginController;
use App\Http\Controllers\Api\HrAdmin\UserController;
use App\Http\Controllers\Api\HrAdmin\Rest\IndexController;

Route::prefix('auth')->group(function () {
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('logout', [LoginController::class, 'logout']);
});

Route::get('/users', [UserController::class, 'getHrUsers']);


Route::apiResource('user', IndexController::class);

Route::middleware('auth:api_hr_admin')->group(function () {
    // 認証判定
    Route::get('/user', function () {
        return Auth::user();
    });

    Route::post('/users/create', [UserController::class, 'create'])->name('hr_admin.user.store');

    Route::apiResource('user', IndexController::class);

//    | Domain | Method    | URI             | Name         | Action                                          | Middleware |
//    +--------+-----------+-----------------+--------------+-------------------------------------------------+------------+
//    |        | GET|HEAD  | api/user        | user.index   | App\Http\Controllers\Api\UserController@index   | api        |
//    |        | POST      | api/user        | user.store   | App\Http\Controllers\Api\UserController@store   | api        |
//    |        | GET|HEAD  | api/user/{user} | user.show    | App\Http\Controllers\Api\UserController@show    | api        |
//    |        | PUT|PATCH | api/user/{user} | user.update  | App\Http\Controllers\Api\UserController@update  | api        |
//    |        | DELETE    | api/user/{user} | user.destroy | App\Http\Controllers\Api\UserController@destroy | api        |
//    +--------+-----------+-----------------+--------------+-------------------------------------------------+------------+
});