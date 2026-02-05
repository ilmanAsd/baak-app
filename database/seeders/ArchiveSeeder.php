<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ArchiveSection;
use App\Models\ArchiveCategory;
use Illuminate\Support\Str;

class ArchiveSeeder extends Seeder
{
    public function run(): void
    {
        $sections = ['Akademik', 'Pembelajaran', 'Kemahasiswaan'];
        foreach ($sections as $name) {
            ArchiveSection::firstOrCreate(['slug' => Str::slug($name)], ['name' => $name]);
        }

        $categories = ['Surat Masuk Internal', 'Surat Masuk Eksternal', 'Surat Keluar'];
        foreach ($categories as $name) {
            ArchiveCategory::firstOrCreate(['slug' => Str::slug($name)], ['name' => $name]);
        }
    }
}
