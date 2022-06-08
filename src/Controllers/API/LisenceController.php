<?php

namespace TheBachtiarz\SerialNumber\Controllers\API;

use Illuminate\Http\{Request, Response};
use TheBachtiarz\SerialNumber\Controllers\Controller;
use TheBachtiarz\SerialNumber\Service\{ApiKeyCreateService, ApiKeyPairService};

class LisenceController extends Controller
{
    /**
     * Register new device
     *
     * @param Request $request
     * @return Response
     */
    public function register(Request $request)
    {
        return ApiKeyCreateService::create($request->lisence, $request->device);
    }

    /**
     * Pair existing api key
     *
     * @param Request $request
     * @return Response
     */
    public function pair(Request $request)
    {
        return ApiKeyPairService::pair($request->lisence, $request->device);
    }
}
