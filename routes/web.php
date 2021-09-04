<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RegisterController;
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

Route::prefix('news')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('news.index');
    Route::get('/{newsId}', [NewsController::class, 'show'])->where('newsId', '[0-9]+')->name('news.show');
});

Route::prefix('register')->group(function () {
    Route::get('/', [RegisterController::class, 'showForm'])->name('register.form');
    Route::post('/', [RegisterController::class, 'submit'])->name('register.post');
    Route::get('/thanks', [RegisterController::class, 'showThanks'])->name('register.thanks');
});

