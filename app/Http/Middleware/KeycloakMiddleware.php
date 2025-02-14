<?php

namespace App\Http\Middleware;

use App\Models\KeycloakConfig;
use App\Services\KeycloakService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Symfony\Component\HttpFoundation\Response;

class KeycloakMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param mixed ...$guards
     * @return Response
     */
    public function handle(Request $request, Closure $next, ...$guards): Response
    {
        if (!is_null(tenant('id'))) {
            $keycloakConfig = tenant()->getKeycloakConfig("mms");
            if ($keycloakConfig) {
                config(['keycloak.realm_public_key' => Arr::get($keycloakConfig, 'public_key')]);
            } else {
                return response()->json([
                    'error' => 'Keycloak configuration not found for this tenant.'
                ], 404);
            }
        }
        return $next($request);
    }
}
