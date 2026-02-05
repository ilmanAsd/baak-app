<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    protected $fillable = [
        'date',
        'section_id',
        'category_id',
        'title',
        'attachment',
        'link',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function section()
    {
        return $this->belongsTo(ArchiveSection::class, 'section_id');
    }

    public function category()
    {
        return $this->belongsTo(ArchiveCategory::class, 'category_id');
    }
}
