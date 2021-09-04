<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ReserveController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [TopController::class, 'index'])->name('top');

//Auth::routes();

Route::get('/top', [TopController::class, 'index'])->name('top');

Route::get('reserves', [ReserveController::class, 'index'])->name('reserve.index');

Route::prefix('reserves')->group( function () {
    Route::get('/', [ReserveController::class, 'showForm'])->name('reserve.form');
    Route::post('/', [ReserveController::class, 'submit'])->name('reserve.post');
    Route::get('/', [ReserveController::class, 'showThanks'])->name('reserve.thanks');
});
Route::prefix('news')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('news.index');
    Route::get('/{newsId}', [NewsController::class, 'show'])->where('newsId', '[0-9]+')->name('news.show');
});

Route::prefix('reserve')->group(function () {
    Route::get('/', [ReserveController::class, 'showForm'])->name('reserve.form');
    Route::post('/', [ReserveController::class, 'submit'])->name('reserve.post');
    Route::get('/thanks', [ReserveController::class, 'showThanks'])->name('reserve.thanks');
});

