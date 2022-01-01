<?php

namespace TheBachtiarz\SerialNumber\Service;

class ApiKeyCreateService
{
    /**
     * register new consumer
     *
     * @param string $serialNumber
     * @param string $device
     * @return array
     */
    public static function create(string $serialNumber, string $device): array
    {
        return CurlService::setUrl('create')->setData(['lisence' => $serialNumber, 'device' => $device])->post();
    }
}
