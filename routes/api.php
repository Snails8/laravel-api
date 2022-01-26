<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HrAdmin\Rest\IndexController;
use App\Http\Controllers\Api\HrAdmin\Rest\CreateController;
use App\Http\Controllers\Api\HrAdmin\Rest\UpdateController;
use App\Http\Controllers\Api\HrAdmin\Rest\PatchController;
use App\Http\Controllers\Api\HrAdmin\Rest\ShowController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

// TODO::404

Route::get('users', [IndexController::class, 'index']);
Route::get('users/{id}', [ShowController::class, 'show'])->name('api.blog.show');
Route::post('users', [CreateController::class, 'store'])->name('api.blog.post');
Route::put('users/{id}', [UpdateController::class, 'update'])->name('api.blog.update');
Route::patch('users/{id}', [PatchController::class, 'patch'])->name('api.blog.patch');

//    | Domain | Method    | URI             | Name         | Action                                          | Middleware |
//    +--------+-----------+-----------------+--------------+-------------------------------------------------+------------+
//    |        | GET|HEAD  | api/user        | user.index   | App\Http\Controllers\Api\UserController@index   | api        |
//    |        | POST      | api/user        | user.store   | App\Http\Controllers\Api\UserController@store   | api        |
//    |        | GET|HEAD  | api/user/{user} | user.show    | App\Http\Controllers\Api\UserController@show    | api        |
//    |        | PUT|PATCH | api/user/{user} | user.update  | App\Http\Controllers\Api\UserController@update  | api        |
//    |        | DELETE    | api/user/{user} | user.destroy | App\Http\Controllers\Api\UserController@destroy | api        |
//    +--------+-----------+-----------------+--------------+-------------------------------------------------+------------+