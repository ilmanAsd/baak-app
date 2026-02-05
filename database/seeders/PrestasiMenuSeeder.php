<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class PrestasiMenuSeeder extends Seeder
{
    public function run(): void
    {
        $parent = Menu::where('name', 'Kemahasiswaan')->first();
        if ($parent) {
            Menu::updateOrCreate(
                ['name' => 'Prestasi Mahasiswa', 'parent_id' => $parent->id],
                ['url' => '/kemahasiswaan/prestasi', 'is_active' => true, 'order' => 2]
            );
        }
    }
}
