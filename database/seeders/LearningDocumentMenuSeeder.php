<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class LearningDocumentMenuSeeder extends Seeder
{
    public function run(): void
    {
        $parent = Menu::where('name', 'PEMBELAJARAN')->first();
        if ($parent) {
            Menu::create([
                'name' => 'Dokumen Pembelajaran',
                'url' => '/pembelajaran/dok-pembelajaran',
                'parent_id' => $parent->id,
                'order' => 5,
                'is_active' => true
            ]);
        }
    }
}
