<?php

namespace TheBachtiarz\SerialNumber\Service;

use TheBachtiarz\SerialNumber\Interfaces\UrlDomainInterface;

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
        return CurlService::setUrl(UrlDomainInterface::URL_DOMAIN_ACCESS_API_KEY_NAME)->setData(['lisence' => $apiKey])->post();
    }
}
