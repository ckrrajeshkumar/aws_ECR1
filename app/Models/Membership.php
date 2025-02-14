<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class Membership extends Model
{
    use SoftDeletes, BelongsToTenant;
    protected $fillable = ['name', 'member_type_id', 'price', 'status', 'tenant_id'];
}
