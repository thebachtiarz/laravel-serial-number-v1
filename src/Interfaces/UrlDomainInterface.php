<?php

namespace TheBachtiarz\SerialNumber\Interfaces;

class UrlDomainInterface
{
    public const URL_DOMAIN_BASE_AVAILABLE = [
        true => self::URL_DOMAIN_BASE_SECURE,
        false => self::URL_DOMAIN_BASE_UNSECURE
    ];

    public const URL_DOMAIN_TRANSACTION_AVAILABLE = [
        self::URL_DOMAIN_CREATE_API_KEY_NAME => self::URL_DOMAIN_CREATE_API_KEY_PATH,
        self::URL_DOMAIN_ACCESS_API_KEY_NAME => self::URL_DOMAIN_ACCESS_API_KEY_PATH,
        self::URL_DOMAIN_PAIR_API_KEY_NAME => self::URL_DOMAIN_PAIR_API_KEY_PATH
    ];

    public const URL_DOMAIN_BASE_SECURE = "https://serialnumber.thebachtiarz.com";
    public const URL_DOMAIN_BASE_UNSECURE = "http://serialnumber.thebachtiarz.com";

    public const URL_PREFIX_VERSION_INFO = "api/v1";

    public const URL_DOMAIN_CREATE_API_KEY_NAME = "create";
    public const URL_DOMAIN_ACCESS_API_KEY_NAME = "access";
    public const URL_DOMAIN_PAIR_API_KEY_NAME = "pair";

    public const URL_DOMAIN_CREATE_API_KEY_PATH = "consumer/create";
    public const URL_DOMAIN_ACCESS_API_KEY_PATH = "consumer/access";
    public const URL_DOMAIN_PAIR_API_KEY_PATH = "consumer/pair";

    public const URL_DOMAIN_API_KEY_NAME = "x-app-api-key";
}
