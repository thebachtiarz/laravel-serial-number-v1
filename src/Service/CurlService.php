<?php

namespace TheBachtiarz\SerialNumber\Service;

use TheBachtiarz\SerialNumber\Interfaces\UrlDomainInterface;
use TheBachtiarz\Toolkit\Helper\Curl\CurlRestService;

class CurlService
{
    use CurlRestService;

    /**
     * Base domain resolver
     *
     * @override
     * @param boolean $productionMode
     * @return string
     */
    private static function baseDomainResolver(bool $productionMode = true): string
    {
        return $productionMode ? tbsnconfig('api_url_production') : tbsnconfig('api_url_sandbox');
    }

    /**
     * Url end point resolver
     *
     * @override
     * @return string
     */
    private static function urlResolver(): string
    {
        $_baseDomain = self::baseDomainResolver(tbsnconfig('is_production_mode'));

        $_prefix = tbsnconfig('api_url_prefix');

        $_endPoint = UrlDomainInterface::URL_DOMAIN_TRANSACTION_AVAILABLE[self::$url];

        return "{$_baseDomain}/{$_prefix}/{$_endPoint}";
    }
}
