<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PersonalDetail extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'member_id',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'dob',
        'check_duplicate_string'
    ];
}
