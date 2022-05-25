<?php

namespace TheBachtiarz\SerialNumber\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use TheBachtiarz\SerialNumber\Cache\CacheService;
use TheBachtiarz\SerialNumber\Interfaces\ConfigInterface;
use TheBachtiarz\SerialNumber\Interfaces\UrlDomainInterface;

class ApiKeyAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // ?: if env status is production
        if ((config('app.env') === 'production') && tbsnconfig(ConfigInterface::SERIAL_NUMBER_CONFIG_SERVICE_STATUS_NAME)) {
            $_apiKeyHeader = $request->header(UrlDomainInterface::URL_DOMAIN_API_KEY_NAME);

            if ($_apiKeyHeader) {
                // ?: check into api key domain
                $_response = CacheService::setApiKey($_apiKeyHeader)->access();

                // ?: if key is exist and active, then request can next
                return $_response['status']
                    ? $next($request)
                    : response()->json($_response['message'], 403);
            }

            abort(403, 'API KEY IS MISSING');
        }

        // ?: if env status is not production or service is disabled.
        return $next($request);
    }
}
