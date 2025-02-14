<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class Member extends Model
{
    use SoftDeletes, BelongsToTenant;
    protected $fillable = [
        'confirmation_code',
        'member_type_id',
        'membership_id',
        'start_date',
        'valid_thru',
        'status',
        'roster_status',
        'card_refresh_status'
    ];

    public function memberType(): BelongsTo
    {
        return $this->belongsTo(MemberType::class);
    }

    public function membership(): BelongsTo
    {
        return $this->belongsTo(Membership::class);
    }

    public function registrations(): HasMany
    {
        return $this->hasMany(Registration::class);
    }

    public function personalDetail(): HasOne
    {
        return $this->hasOne(PersonalDetail::class);
    }

    public function contactDetail(): HasOne
    {
        return $this->hasOne(ContactDetail::class);
    }
}
