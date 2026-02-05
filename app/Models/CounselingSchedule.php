<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CounselingSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'counselor_id',
        'day',
        'time_start',
        'time_end',
        'is_active',
    ];

    public function counselor()
    {
        return $this->belongsTo(Counselor::class);
    }
}
