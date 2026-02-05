<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HeroSection;

class HeroSectionSeeder extends Seeder
{
    public function run()
    {
        HeroSection::create([
            'title' => 'BAAK Universitas Kadiri',
            'description' => 'Melayani Administrasi Akademik dan Kemahasiswaan dengan Prima, Responsif, dan Akuntabel.',
            'background_image' => null, // Or default image path if known
            'slider_images' => [],
            'is_active' => true,
        ]);
    }
}
