<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LearningSetting extends Model
{
    protected $fillable = ['banner_image', 'title', 'description', 'video_url', 'spada_url', 'curriculum_password'];
}
