<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CounselingRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nim',
        'prodi',
        'phone',
        'topic',
        'counselor_id',
        'status',
    ];

    public function counselor()
    {
        return $this->belongsTo(Counselor::class);
    }
}
