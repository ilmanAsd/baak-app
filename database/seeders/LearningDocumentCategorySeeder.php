<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LearningDocumentCategory;
use Illuminate\Support\Str;

class LearningDocumentCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['Pedoman', 'Panduan', 'SOP'];

        foreach ($categories as $index => $name) {
            LearningDocumentCategory::updateOrCreate(
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
