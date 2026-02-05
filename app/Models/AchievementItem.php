<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AchievementItem extends Model
{
    protected $guarded = [];

    protected $casts = [
        'benefits' => 'array',
    ];
}
