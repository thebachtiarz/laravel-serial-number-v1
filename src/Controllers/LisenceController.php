<?php

namespace TheBachtiarz\SerialNumber\Controllers;

use Illuminate\Http\{Request, Response};
use TheBachtiarz\SerialNumber\Service\{ApiKeyCreateService, ApiKeyPairService};

class LisenceController
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

    /**
     * pair existing api key
     *
     * @param Request $request
     * @return Response
     */
    public function pair(Request $request)
    {
        return ApiKeyPairService::pair($request->lisence, $request->device);
    }
}
