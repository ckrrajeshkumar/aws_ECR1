<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KeycloakConfig extends Model
{
    protected $table = "keycloak_config";
    protected $fillable = ['tenant_id', 'client_name', 'public_key', 'client_id'];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
