<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donation extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'registration_id',
        'member_id',
        'amount',
        'transaction_id',
        'transaction_date'
    ];
}
