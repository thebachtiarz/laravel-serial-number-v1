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
        if ($request->header(UrlDomainInterface::URL_DOMAIN_API_KEY_NAME)) {
            // ?: if env status is production
            if (config('app.env') === 'production') {
                // ?: check into api key domain, if key is exist and active, then request can next
                $_response = ApiKeyAccessService::access($request->header(UrlDomainInterface::URL_DOMAIN_API_KEY_NAME));

                return $_response['status']
                    ? $next($request)
                    : response()->json($_response['message'], 403);
            }

            // ?: if env status is not production
            return $next($request);
        }
        abort(403, 'YOU NEED AN API KEY');
    }
}
