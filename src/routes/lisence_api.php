<?php

use Illuminate\Support\Facades\Route;
use TheBachtiarz\SerialNumber\Controllers\API\LisenceController;

/**
 * route group serial-number
 * route :: base_url/thebachtiarz/serial-number/---
 */
Route::prefix('serial-number')->group(function () {
    /**
     * route for register new device with serial number
     * route :: base_url/thebachtiarz/serial-number/register
     */
    Route::post('register', [LisenceController::class, 'register']);

    /**
     * route for pair existing api key (licence consumer)
     * route :: base_url/thebachtiarz/serial-number/pair
     */
    Route::post('pair', [LisenceController::class, 'pair']);
});
