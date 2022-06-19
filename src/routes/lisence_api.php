<?php

use Illuminate\Support\Facades\Route;
use TheBachtiarz\SerialNumber\Http\Controllers\API\LisenceController;

/**
 * Route group serial-number
 * Route :: base_url/thebachtiarz/serial-number/---
 */
Route::prefix('serial-number')->controller(LisenceController::class)->group(function () {

    /**
     * Route for register new device with serial number
     * Method :: POST
     * Route :: base_url/thebachtiarz/serial-number/register
     */
    Route::post('register', 'register');

    /**
     * Route for pair existing api key (licence consumer)
     * Method :: POST
     * Route :: base_url/thebachtiarz/serial-number/pair
     */
    Route::post('pair', 'pair');
});
