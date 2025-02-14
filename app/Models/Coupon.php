<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class Coupon extends Model
{
    use SoftDeletes, BelongsToTenant;
    protected $fillable = [
        'name',
        'code',
        'amount',
        'start_date',
        'end_date',
        'discount_type',
        'status',
        'tenant_id'
    ];
}
