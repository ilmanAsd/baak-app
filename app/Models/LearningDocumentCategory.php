<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LearningDocumentCategory extends Model
{
    protected $fillable = ['name', 'slug', 'order', 'is_active'];

    public function learningDocuments()
    {
        return $this->hasMany(LearningResource::class, 'learning_category_id');
    }
}
