<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class Registration extends Model
{
    use SoftDeletes, BelongsToTenant;
    protected $fillable = [
        'member_type_id',
        'membership_id',
        'cost',
        'coupon_id',
        'discount_amount',
        'status',
        'transaction_id',
        'transaction_date',
        'customer_profile_id',
        'payment_profile_id',
        'start_date',
        'valid_thru',
        'member_id',
        'remarks',
        'tenant_id'
    ];

    public function memberType(): BelongsTo
    {
        return $this->belongsTo(MemberType::class);
    }

    public function membership(): BelongsTo
    {
        return $this->belongsTo(Membership::class);
    }

    public function coupon(): BelongsTo
    {
        return $this->belongsTo(Coupon::class);
    }

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }
}
