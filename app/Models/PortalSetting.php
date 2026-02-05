<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortalSetting extends Model
{
    protected $fillable = [
        'banner_image',
        'title',
        'description',
        'button_1_text',
        'button_1_url',
        'button_2_text',
        'button_2_url',
        'calendar_pdf',
    ];
}
