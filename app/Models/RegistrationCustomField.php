<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegistrationCustomField extends Model
{
    use SoftDeletes;
    protected $fillable = ['registration_step_id', 'field_name', 'field_slug', 'field_type', 'required', 'options'];

    public function step(): BelongsTo
    {
        return $this->belongsTo(RegistrationStep::class);
    }
}
