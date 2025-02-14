<?php

declare(strict_types=1);

use App\Http\Controllers\RegistrationController;
use App\Http\Middleware\KeycloakMiddleware;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::get('/', function () {
        return 'Base route for tenant: ' . tenant('id');
    });

    Route::post('member_registration', [RegistrationController::class, "registerMember"]);

    Route::get('/users', function () {
        return \App\Models\User::query()
            ->get(['id', 'first_name', 'last_name'])
            ->mapWithKeys(function ($user) {
                return [$user->id => $user->full_name];
            })
            ->toJson();
    });

    Route::fallback(function () {
        return response()->json([
            'message' => 'Route not found',
            'host' => request()->getHost(),
            'path' => request()->getPathInfo(),
        ], 404);
    });
});
