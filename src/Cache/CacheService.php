<?php

namespace TheBachtiarz\SerialNumber\Cache;

use TheBachtiarz\SerialNumber\Interfaces\ConfigInterface;
use TheBachtiarz\SerialNumber\Service\ApiKeyAccessService;
use TheBachtiarz\Toolkit\Cache\Service\Cache;
use TheBachtiarz\Toolkit\Helper\App\Converter\ArrayHelper;

class CacheService
{
    use ArrayHelper;

    /**
     * api key
     *
     * @var string
     */
    protected static string $apiKey;

    // ? Public Methods
    /**
     * get api key access data information
     *
     * @return array
     */
    public static function access(): array
    {
        $result = ['status' => false, 'message' => ''];

        try {
            $_getCache = self::checkCacheData();

            if ($_getCache['found']) {
                $result['status'] = $_getCache['status'];
                $result['message'] = $_getCache['message'];
            } else {
                $_apiKeyInfo = self::checkToServer();

                $result['status'] = $_apiKeyInfo['status'];
                $result['message'] = $_apiKeyInfo['message'];
            }
        } catch (\Throwable $th) {
            $result['message'] = $th->getMessage();
        } finally {
            return $result;
        }
    }

    // ? Private Methods
    /**
     * check api key status in cache data
     *
     * @return array
     */
    private static function checkCacheData(): array
    {
        $result = ['found' => false, 'status' => false, 'message' => 'Api key not found'];

        try {
            throw_if(!Cache::has(ConfigInterface::SERIAL_NUMBER_CACHE_PREFIX_NAME), 'Exception', "Cache not found");

            $_cacheData = Cache::get(ConfigInterface::SERIAL_NUMBER_CACHE_PREFIX_NAME);

            foreach ($_cacheData as $apiKey => $status) {
                if ($apiKey === self::$apiKey) {
                    $result['found'] = true;
                    $result['status'] = $status;
                    $result['message'] = sprintf("Api key is %s", ($status ? "OK" : "Expired"));

                    break;
                }
            }
        } catch (\Throwable $th) {
            self::initCacheData();
        } finally {
            return $result;
        }
    }

    /**
     * check api key to server
     *
     * @return array
     */
    private static function checkToServer(): array
    {
        $result = ['status' => false, 'message' => ''];

        try {
            $_getApiKeyInfo = ApiKeyAccessService::access(self::$apiKey);

            self::updateCacheData([
                self::$apiKey => $_getApiKeyInfo['data'] ?? false
            ]);

            throw_if(!$_getApiKeyInfo['status'], 'Exception', $_getApiKeyInfo['message']);

            $result['status'] = true;
            $result['message'] = "Api key is OK";
        } catch (\Throwable $th) {
            $result['message'] = $th->getMessage();
        } finally {
            return $result;
        }
    }

    /**
     * init cache data
     *
     * @return void
     */
    private static function initCacheData(): void
    {
        $_cacheInit = [];

        Cache::set(ConfigInterface::SERIAL_NUMBER_CACHE_PREFIX_NAME, $_cacheInit);
    }

    /**
     * update cace data
     *
     * @param array $apiKeyinfo
     * @return void
     */
    private static function updateCacheData(array $apiKeyinfo): void
    {
        $_currentCacheData = Cache::get(ConfigInterface::SERIAL_NUMBER_CACHE_PREFIX_NAME);

        $_currentCacheData[key($apiKeyinfo)] = $apiKeyinfo[key($apiKeyinfo)];

        Cache::set(ConfigInterface::SERIAL_NUMBER_CACHE_PREFIX_NAME, $_currentCacheData);
    }

    // ? Setter Modules
    /**
     * Set api key
     *
     * @param string $apiKey api key
     * @return self
     */
    public static function setApiKey(string $apiKey): self
    {
        self::$apiKey = $apiKey;

        return new self;
    }
}
