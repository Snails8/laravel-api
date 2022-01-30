<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReserveController;


use App\Http\Controllers\Test\Query\QueryTestController;
use App\Http\Controllers\Test\Query\AllTestController;

use App\Http\Controllers\Test\Relation\HasManyController;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [TopController::class, 'index'])->name('top');

//Auth::routes();

// お知らせイベント
Route::prefix('news')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('news.index');
    Route::get('/{newsId}', [NewsController::class, 'show'])->where('newsId', '[0-9]+')->name('news.show');
});

// もっと知りたい


// お問い合わせ
Route::prefix('contact')->group(function () {
    Route::get('/', [ContactController::class, 'showForm'])->name('contact.index');
    Route::post('/', [ContactController::class, 'submit'])->name('contact.post');
    Route::get('/thanks', [ContactController::class, 'showThanks'])->name('contact.thanks');
});


// 無料お試し
Route::prefix('register')->group(function () {
    Route::get('/', [RegisterController::class, 'showForm'])->name('register.form');
    Route::post('/', [RegisterController::class, 'submit'])->name('register.post');
    Route::get('/thanks', [RegisterController::class, 'showThanks'])->name('register.thanks');
});

// 予約(検証用)
Route::prefix('reserve')->group(function () {
    Route::get('/', [ReserveController::class, 'showForm'])->name('reserve.form');
    Route::post('/', [ReserveController::class, 'submit'])->name('reserve.post');
    Route::post('/thanks', [ReserveController::class, 'showThanks'])->name('reserve.post');
});

// 静的ページ
//Route::get('', [StaticPageController::class, 'showHoge' ])->name('hoge');

// LP
//Route::get('', [LandingPageController::class, ''])->name('');

// ----------------------------  test   ----------------------------------------------------------------------

Route::get('all', [AllTestController::class, 'index'])->name('test.all');
Route::get('query', [QueryTestController::class, 'index'])->name('test.query');

Route::get('hasmany', [HasManyController::class, 'index'])->name('test.relation.hasmany');