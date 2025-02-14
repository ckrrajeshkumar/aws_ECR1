<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class RegistrationStep extends Model
{
    use SoftDeletes, BelongsToTenant;
    protected $fillable = ['name', 'status', 'tenant_id'];

    public function fields(): HasMany
    {
        return $this->hasMany(RegistrationCustomField::class);
    }
}
