<?php

use Illuminate\Support\Facades\Route;
use TheBachtiarz\SerialNumber\Controllers\LisenceController;

/**
 * route for authentication
 * route :: base_url/thebachtiarz/serial-number/---
 */
Route::prefix('serial-number')->group(function () {
    /**
     * route for authentication
     * route :: base_url/thebachtiarz/serial-number/register
     */
    Route::post('register', [LisenceController::class, 'register']);

    /**
     * route for authentication
     * route :: base_url/thebachtiarz/serial-number/pair
     */
    Route::post('pair', [LisenceController::class, 'pair']);
});
