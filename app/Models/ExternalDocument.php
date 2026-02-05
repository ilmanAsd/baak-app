<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExternalDocument extends Model
{
    protected $fillable = [
        'year',
        'document_number',
        'title',
        'status',
        'category',
        'file_path',
        'url',
        'is_active',
    ];
}
