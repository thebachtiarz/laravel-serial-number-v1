<?php

namespace TheBachtiarz\SerialNumber\Service;

class ApiKeyPairService
{
    /**
     * pair existing api key
     *
     * @param string $apiKey
     * @param string $device
     * @return array
     */
    public static function pair(string $apiKey, string $device): array
    {
        return CurlService::setUrl('pair')->setData(['lisence' => $apiKey, 'device' => $device])->post();
    }
}
