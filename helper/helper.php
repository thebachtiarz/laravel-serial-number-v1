<?php

use TheBachtiarz\SerialNumber\Interfaces\ConfigInterface;

/**
 * TheBachtiarz serial number config
 *
 * @param string|null $keyName config key name | null will return all
 * @return mixed|null
 */
function tbsnconfig(?string $keyName = null): mixed
{
    $configName = ConfigInterface::SERIAL_NUMBER_CONFIG_NAME;

    return iconv_strlen($keyName)
        ? config("{$configName}.{$keyName}")
        : config("{$configName}");
}

/**
 * TheBachtiarz serial number route api file location
 *
 * @return string
 */
function tbsnrouteapi(): string
{
    return base_path('vendor/thebachtiarz/laravel-serial-number-v1/src/routes/lisence_api.php');
}
