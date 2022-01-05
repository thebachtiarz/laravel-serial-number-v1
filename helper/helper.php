<?php

use TheBachtiarz\SerialNumber\Interfaces\ConfigInterface;

/**
 * thebachtiarz serial number config
 *
 * @param string|null $keyName config key name | null will return all
 * @return mixed|null
 */
function tbsnconfig(?string $keyName = null)
{
    $configName = ConfigInterface::SERIAL_NUMBER_CONFIG_NAME;

    return iconv_strlen($keyName)
        ? config("{$configName}.{$keyName}")
        : config("{$configName}");
}

/**
 * thebachtiarz serial number route api file location
 *
 * @return string
 */
function tbsnrouteapi(): string
{
    return base_path('vendor/thebachtiarz/laravel-serial-number-v1/src/routes/sn_api.php');
}
