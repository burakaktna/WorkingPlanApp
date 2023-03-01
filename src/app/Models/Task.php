<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    protected $fillable = ['provider_id', 'name', 'level', 'estimated_duration'];

    public function provider(): BelongsTo
    {
        return $this->belongsTo(Provider::class);
    }
}
