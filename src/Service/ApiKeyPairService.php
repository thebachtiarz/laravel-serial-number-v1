<?php

namespace TheBachtiarz\SerialNumber\Service;

use TheBachtiarz\SerialNumber\Interfaces\UrlDomainInterface;

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
        return CurlService::setUrl(UrlDomainInterface::URL_DOMAIN_PAIR_API_KEY_NAME)->setData(['lisence' => $apiKey, 'device' => $device])->post();
    }
}
