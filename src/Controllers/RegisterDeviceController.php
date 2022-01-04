<?php

namespace TheBachtiarz\SerialNumber\Controllers;

use Illuminate\Http\{Request, Response};
use TheBachtiarz\SerialNumber\Service\ApiKeyCreateService;

class RegisterDeviceController
{
    /**
     * register new device
     *
     * @param Request $request
     * @return Response
     */
    public function register(Request $request)
    {
        return ApiKeyCreateService::create($request->lisence, $request->device);
    }
}
