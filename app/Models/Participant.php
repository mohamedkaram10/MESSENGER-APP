<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Participant extends Pivot
{
    use HasFactory;

    public $timestamps = false;

    protected $casts = [
        'joined_at' => 'datetime'
    ];
}
