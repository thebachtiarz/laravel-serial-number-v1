<?php

namespace TheBachtiarz\SerialNumber\Middleware;

use Closure;
use Illuminate\Http\Request;
use TheBachtiarz\SerialNumber\Interfaces\UrlDomainInterface;
use TheBachtiarz\SerialNumber\Service\ApiKeyAccessService;

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
        if (config('app.env') === 'production') {
            $_apiKeyHeader = $request->header(UrlDomainInterface::URL_DOMAIN_API_KEY_NAME);

            if ($_apiKeyHeader) {
                // ?: check into api key domain
                $_response = ApiKeyAccessService::access($_apiKeyHeader);

                // ?: if key is exist and active, then request can next
                return $_response['status']
                    ? $next($request)
                    : response()->json($_response['message'], 403);
            }

            abort(403, 'YOU NEED AN API KEY');
        }

        // ?: if env status is not production
        return $next($request);
    }
}
