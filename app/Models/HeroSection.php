<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    protected $guarded = [];

    protected $casts = [
        'slider_images' => 'array',
        'is_active' => 'boolean',
    ];
}
