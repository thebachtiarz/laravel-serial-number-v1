<?php

namespace TheBachtiarz\SerialNumber\Controllers;

use TheBachtiarz\SerialNumber\Service\ApiKeyCreateService;

class RegisterDeviceController
{
    public function register(string $serialNumber, string $device): array
    {
        return ApiKeyCreateService::create($serialNumber, $device);
    }
}
