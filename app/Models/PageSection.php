<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageSection extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'content' => 'json',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
