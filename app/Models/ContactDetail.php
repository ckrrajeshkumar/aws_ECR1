<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactDetail extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'member_id',
        'email',
        'phone_1',
        'phone_2',
        'address1',
        'address2',
        'city',
        'state_code',
        'state',
        'zip',
        'country'
    ];
}
