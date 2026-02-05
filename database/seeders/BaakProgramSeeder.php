<?php

namespace Database\Seeders;

use App\Models\BaakProgram;
use Illuminate\Database\Seeder;

class BaakProgramSeeder extends Seeder
{
    public function run(): void
    {
        $programs = [
            [
                'title' => 'Kampus Berdampak',
                'description' => 'Memfasilitasi mahasiswa belajar dan pengalaman baru di luar kampus.',
                'image' => null, // Placeholder or add real path later
                'sort_order' => 1,
            ],
            [
                'title' => 'Prestasi Mahasiswa',
                'description' => 'Kegiatan pembinaan prestasi bagi mahasiswa Universitas Kadiri.',
                'image' => null,
                'sort_order' => 2,
            ],
            [
                'title' => 'SPADA UNIK',
                'description' => 'Mendukung pembelajaran daring dengan konten dan evaluasi lengkap.',
                'image' => null,
                'sort_order' => 3,
            ],
            [
                'title' => 'RPL',
                'description' => 'Pengakuan capaian belajar dari pendidikan formal, nonformal, pengalaman kerja.',
                'image' => null,
                'sort_order' => 4,
            ],
        ];

        foreach ($programs as $program) {
            BaakProgram::firstOrCreate(
                ['title' => $program['title']],
                $program
            );
        }
    }
}
