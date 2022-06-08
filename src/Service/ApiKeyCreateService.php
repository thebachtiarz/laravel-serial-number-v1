<?php

namespace TheBachtiarz\SerialNumber\Service;

use TheBachtiarz\SerialNumber\Interfaces\UrlDomainInterface;

class ApiKeyCreateService
{
    /**
     * Register new consumer
     *
     * @param string $serialNumber
     * @param string $device
     * @return array
     */
    public static function create(string $serialNumber, string $device): array
    {
        return CurlService::setUrl(UrlDomainInterface::URL_DOMAIN_CREATE_API_KEY_NAME)->setData(['lisence' => $serialNumber, 'device' => $device])->post();
    }
}
