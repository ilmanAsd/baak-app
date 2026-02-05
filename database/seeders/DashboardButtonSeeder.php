<?php

namespace Database\Seeders;

use App\Models\DashboardButton;
use Illuminate\Database\Seeder;

class DashboardButtonSeeder extends Seeder
{
    public function run(): void
    {
        $buttons = [
            [
                'label' => 'Kelola Staff/Dosen',
                'url' => '/admin/staff',
                'icon' => 'heroicon-o-users',
                'color' => 'primary',
                'sort_order' => 1,
            ],
            [
                'label' => 'Posting Berita',
                'url' => '/admin/posts',
                'icon' => 'heroicon-o-newspaper',
                'color' => 'success',
                'sort_order' => 2,
            ],
            [
                'label' => 'Dokumen Akademik',
                'url' => '/admin/academic-documents',
                'icon' => 'heroicon-o-document-text',
                'color' => 'warning',
                'sort_order' => 3,
            ],
            [
                'label' => 'Website Utama',
                'url' => '/',
                'icon' => 'heroicon-o-globe-alt',
                'color' => 'info',
                'open_in_new_tab' => true,
                'sort_order' => 4,
            ],
        ];

        foreach ($buttons as $button) {
            DashboardButton::firstOrCreate(
                ['label' => $button['label']],
                $button
            );
        }
    }
}
