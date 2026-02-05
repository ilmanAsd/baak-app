<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KrsSetting extends Model
{
    protected $fillable = ['title', 'description', 'procedures', 'provisions', 'flow'];

    protected $casts = [
        'procedures' => 'array',
        'provisions' => 'array',
        'flow' => 'array',
    ];
}
