<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Ajax\CompanyController;


Route::prefix('news')->group(function () {
    Route::put('/{news}/is_public', [::class, 'updateContractStatus']);
});

Route::prefix('companies')->group(function () {
    Route::put('/{company}/is_contract', [CompanyController::class, 'updateContractStatus']);
});