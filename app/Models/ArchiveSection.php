<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArchiveSection extends Model
{
    protected $fillable = ['name', 'slug'];

    public function archives()
    {
        return $this->hasMany(Archive::class, 'section_id');
    }
}
