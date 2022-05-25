<?php

use Illuminate\Support\Facades\Route;
use TheBachtiarz\SerialNumber\Controllers\API\LisenceController;

/**
 * route group serial-number
 * route :: base_url/thebachtiarz/serial-number/---
 */
Route::prefix('serial-number')->controller(LisenceController::class)->group(function () {

    /**
     * route for register new device with serial number
     * method :: POST
     * route :: base_url/thebachtiarz/serial-number/register
     */
    Route::post('register', 'register');

    /**
     * route for pair existing api key (licence consumer)
     * method :: POST
     * route :: base_url/thebachtiarz/serial-number/pair
     */
    Route::post('pair', 'pair');
});
