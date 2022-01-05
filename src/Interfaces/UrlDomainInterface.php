<?php

namespace TheBachtiarz\SerialNumber\Interfaces;

class UrlDomainInterface
{
    public const URL_DOMAIN_BASE_AVAILABLE = [
        true => self::URL_DOMAIN_BASE_SECURE,
        false => self::URL_DOMAIN_BASE_UNSECURE
    ];

    public const URL_DOMAIN_TRANSACTION_AVAILABLE = [
        'create' => self::URL_DOMAIN_CREATE_API_KEY,
        'access' => self::URL_DOMAIN_ACCESS_API_KEY,
        'pair' => self::URL_DOMAIN_PAIR_API_KEY
    ];

    public const URL_DOMAIN_BASE_SECURE = "https://serialnumber.thebachtiarz.com/";
    public const URL_DOMAIN_BASE_UNSECURE = "http://serialnumber.thebachtiarz.com/";

    public const URL_PREFIX_VERSION_INFO = "api/v1/";

    public const URL_DOMAIN_CREATE_API_KEY = "consumer/create";
    public const URL_DOMAIN_ACCESS_API_KEY = "consumer/access";
    public const URL_DOMAIN_PAIR_API_KEY = "consumer/pair";

    public const URL_DOMAIN_API_KEY_NAME = "x-app-api-key";
}
