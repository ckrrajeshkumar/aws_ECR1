<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

/**
 * Class KeycloakService.
 */
class KeycloakService
{
    public static function getRealm()
    {
        return !is_null(env('KEYCLOAK_REALM')) ? env('KEYCLOAK_REALM') : explode('.', \request()->getHost())[0];
    }
}

