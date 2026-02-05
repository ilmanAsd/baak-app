<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MkwuMenuSeeder extends Seeder
{
    public function run(): void
    {
        $parent = Menu::where('name', 'PEMBELAJARAN')->first();
        if ($parent) {
            Menu::create([
                'name' => 'MKWU',
                'url' => '/pembelajaran/mkwu',
                'parent_id' => $parent->id,
                'order' => 4,
                'is_active' => true
            ]);
        }
    }
}
