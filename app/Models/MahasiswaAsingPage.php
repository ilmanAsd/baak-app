<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MahasiswaAsingPage extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'study_programs' => 'array',
    ];

    public function facilities(): HasMany
    {
        return $this->hasMany(MahasiswaAsingFacility::class);
    }
}
