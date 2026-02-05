<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeetingAgenda extends Model
{
    protected $fillable = [
        'date',
        'title',
        'slug',
        'description',
        'file_path',
        'is_published',
    ];

    protected $casts = [
        'date' => 'date',
        'is_published' => 'boolean',
    ];
}
