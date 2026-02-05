<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MahasiswaAsingFacility extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function page(): BelongsTo
    {
        return $this->belongsTo(MahasiswaAsingPage::class, 'mahasiswa_asing_page_id');
    }
}
