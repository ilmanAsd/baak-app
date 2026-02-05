<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentCategory extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'link_url'];

    public function academicDocuments()
    {
        return $this->hasMany(AcademicDocument::class);
    }
}
