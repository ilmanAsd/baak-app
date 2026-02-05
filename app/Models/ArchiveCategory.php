<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArchiveCategory extends Model
{
    protected $fillable = ['name', 'slug'];

    public function archives()
    {
        return $this->hasMany(Archive::class, 'category_id');
    }
}
