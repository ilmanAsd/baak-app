<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicAtmosphere extends Model
{
    protected $fillable = [
        'description',
        'spreadsheet_url',
        'is_active',
        'order',
    ];
}
