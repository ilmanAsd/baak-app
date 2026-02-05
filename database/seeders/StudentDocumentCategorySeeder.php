<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StudentDocumentCategory;
use Illuminate\Support\Str;

class StudentDocumentCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['Pedoman', 'Panduan', 'SOP'];

        foreach ($categories as $index => $name) {
            StudentDocumentCategory::updateOrCreate(
                ['slug' => Str::slug($name)],
                [
                    'name' => $name,
                    'order' => $index,
                    'is_active' => true,
                ]
            );
        }
    }
}
