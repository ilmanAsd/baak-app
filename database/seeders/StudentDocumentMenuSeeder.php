<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class StudentDocumentMenuSeeder extends Seeder
{
    public function run(): void
    {
        $parent = Menu::where('name', 'Kemahasiswaan')->first();
        if ($parent) {
            Menu::updateOrCreate(
                ['name' => 'Dokumen Kemahasiswaan', 'parent_id' => $parent->id],
                ['url' => '/kemahasiswaan/dokumen', 'is_active' => true, 'order' => 3]
            );
        }
    }
}
