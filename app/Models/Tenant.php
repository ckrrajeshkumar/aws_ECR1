<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;

class Tenant extends BaseTenant implements TenantWithDatabase
{
    use HasDatabase, HasDomains, SoftDeletes;

    public function keycloakConfigs()
    {
        return $this->hasMany(KeycloakConfig::class);
    }

    public function getKeycloakConfig($clientName)
    {
        return $this->keycloakConfigs()->where('client_name', $clientName)->first();
    }
}
