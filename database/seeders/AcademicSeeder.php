<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;
use App\Models\DocumentCategory;
use App\Models\EducationLevel;
use App\Models\PortalSetting;

class AcademicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default Portal Settings
        PortalSetting::firstOrCreate([], [
            'title' => 'Selamat Datang di Portal Akademik',
            'description' => 'Universitas Kadiri menyediakan layanan akademik terpadu untuk mendukung proses pembelajaran dan administratif bagi mahasiswa, dosen, dan staf.',
            'button_1_text' => 'Login Mahasiswa',
            'button_1_url' => 'https://siam.unik-kediri.ac.id/Login',
            'button_2_text' => 'Login Dosen',
            'button_2_url' => 'https://simpeg.unik-kediri.ac.id/welcome',
        ]);

        $categories = [
            [
                'name' => 'Dokumen Administrasi Perkuliahan',
                'description' => 'Kumpulan dokumen administrasi perkuliahan seperti Form Jadwal Kuliah, Form Daftar Hadir, Silabus, Jurnal Mengajar RPS, RTS.',
                'link_url' => 'https://baak.unik-kediri.ac.id/dok-adm-perkuliahan/'
            ],
            [
                'name' => 'Dokumen Eksternal Akademik',
                'description' => 'Kumpulan dokumen Kebijakan Menteri, Peraturan KEMENDIKBUD, Standar PerguruanTinggi, dll.',
                'link_url' => 'https://baak.unik-kediri.ac.id/dok-eks-akademik/'
            ],
            [
                'name' => 'Dokumen Internal Akademik',
                'description' => 'Kumpulan dokumen yang telah diterbitkan oleh akadmik seperti Panduan, Pedoman dan lain-lain.',
                'link_url' => 'https://baak.unik-kediri.ac.id/dok-int-akademik/'
            ],
            [
                'name' => 'Dokumen SOP Akademik',
                'description' => 'Kumpulan Standar Operasional Prosedur yang telah disahkan.',
                'link_url' => 'https://baak.unik-kediri.ac.id/sop-akad/'
            ],
        ];

        foreach ($categories as $cat) {
            DocumentCategory::updateOrCreate(['name' => $cat['name']], [
                'slug' => Str::slug($cat['name']),
                'description' => $cat['description'],
                'link_url' => $cat['link_url'],
            ]);
        }

        $levels = ['Program Diploma 3', 'Program Diploma IV & Sarjana (S1)', 'Program Profesi', 'Program Magister'];
        foreach ($levels as $idx => $lvl) {
            EducationLevel::firstOrCreate(['name' => $lvl], [
                'slug' => Str::slug($lvl),
                'sort_order' => $idx + 1,
                'description' => '<p>Deskripsi untuk ' . $lvl . '</p>'
            ]);
        }
    }
}
