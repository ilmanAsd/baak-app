<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentDocumentCategory extends Model
{
    protected $fillable = ['name', 'slug', 'order', 'is_active'];

    public function studentDocuments()
    {
        return $this->hasMany(LearningResource::class, 'student_category_id');
    }
}
