<?php

use Illuminate\Support\Facades\Route;

Route::prefix('companies')->group(function () {
    Route::put('/{company}/is_contract');
});