<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class KemahasiswaanMenuSeeder extends Seeder
{
    public function run(): void
    {
        $parent = Menu::where('name', 'Kemahasiswaan')->first();
        if ($parent) {
            Menu::updateOrCreate(
                ['name' => 'Laman Kemahasiswaan', 'parent_id' => $parent->id],
                ['url' => '/kemahasiswaan', 'is_active' => true, 'order' => 1]
            );
        }
    }
}
