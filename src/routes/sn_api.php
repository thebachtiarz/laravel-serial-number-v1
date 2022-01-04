<?php

use Illuminate\Support\Facades\Route;
use TheBachtiarz\SerialNumber\Controllers\RegisterDeviceController;

/**
 * route for authentication
 * route :: base_url/thebachtiarz/serial-number/---
 */
Route::prefix('serial-number')->group(function () {
    /**
     * route for authentication
     * route :: base_url/thebachtiarz/serial-number/register
     */
    Route::post('register', [RegisterDeviceController::class, 'register']);
});
