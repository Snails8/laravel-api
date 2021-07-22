<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Ajax\CompanyController;

Route::prefix('companies')->group(function () {
    Route::put('/{company}/is_contract', [CompanyController::class, 'updateContractStatus']);
});