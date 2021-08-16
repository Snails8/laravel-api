<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\NewsCategoryController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\OfficeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\HrCompanyController;

Route::get('login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('admin.logout');

Route::middleware('auth:admin')->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('admin.home');

    // お知らせ管理
    Route::resource('news', NewsController::class)->except([
        'show',
    ])->names('admin.news');

    // お知らせカテゴリ管理
    Route::resource('news_categories', NewsCategoryController::class)->except([
        'show',
    ])->names('admin.news_category');

    // 自社情報管理
    Route::resource('companies', CompanyController::class)->except([
        'show',
    ])->names('admin.company');

    // 支社管理
    Route::resource('offices', OfficeController::class)->except([
        'show'
    ])->names('admin.office');

    // Standard 認証
    Route::middleware('admin.standard')->group(function() {

    });

    // Master 認証
    Route::middleware('admin.master')->group(function() {
        // ユーザー管理(スタッフ)
        Route::resource('users', UserController::class)->except([
            'show'
        ])->names('admin.user');

        // サービス利用会社管理
        Route::resource('hr_companies', HrCompanyController::class)->except([
            'show'
        ])->names('admin.hr_company');
    });
});

