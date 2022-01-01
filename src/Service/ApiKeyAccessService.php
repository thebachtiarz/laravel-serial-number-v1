<?php

namespace TheBachtiarz\SerialNumber\Service;

class ApiKeyAccessService
{
    /**
     * api key hot access
     *
     * @param string $apiKey
     * @return array
     */
    public static function access(string $apiKey): array
    {
        return CurlService::setUrl('access')->setData(['lisence' => $apiKey])->post();
    }
}
