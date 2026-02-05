<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Staff;

class StaffSeeder extends Seeder
{
    public function run()
    {
        // Kepala Biro
        Staff::create([
            'name' => 'Drs. Budi Santoso, M.Pd.',
            'position' => 'Kepala Biro',
            'category' => 'kepala_biro',
            'is_head' => true,
            'bio' => 'Berpengalaman lebih dari 20 tahun dalam administrasi akademik...',
            'duties' => 'Memimpin dan mengkoordinasikan seluruh kegiatan administrasi akademik dan kemahasiswaan.',
            'image' => null, // Placeholder in view if null
        ]);

        // Kabag Akademik
        Staff::create([
            'name' => 'Siti Aminah, S.Kom.',
            'position' => 'Kabag Akademik',
            'category' => 'akademik',
            'is_head' => true,
            'bio' => 'Ahli dalam sistem informasi manajemen perguruan tinggi...',
            'duties' => 'Mengelola registrasi ulang, KRS, dan data akademik mahasiswa.',
        ]);
        // Staff Akademik
        Staff::create([
            'name' => 'Budi Utomo, S.E.',
            'position' => 'Staf Administrasi Akademik',
            'category' => 'akademik',
            'is_head' => false,
        ]);
        Staff::create([
            'name' => 'Ani Lestari, A.Md.',
            'position' => 'Staf Pelayanan Akademik',
            'category' => 'akademik',
            'is_head' => false,
        ]);

        // Kabag Pembelajaran
        Staff::create([
            'name' => 'Dr. Rina Wati, M.Pd.',
            'position' => 'Kabag Pembelajaran',
            'category' => 'pembelajaran',
            'is_head' => true,
            'bio' => 'Fokus pada pengembangan kurikulum dan metode pembelajaran...',
            'duties' => 'Mengkoordinasikan pelaksanaan perkuliahan dan evaluasi pembelajaran.',
        ]);
        // Staff Pembelajaran
        Staff::create([
            'name' => 'Dewi Sartika, S.Pd.',
            'position' => 'Staf Kurikulum',
            'category' => 'pembelajaran',
            'is_head' => false,
        ]);

        // Kabag Kemahasiswaan
        Staff::create([
            'name' => 'Ahmad Rizki, S.T.',
            'position' => 'Kabag Kemahasiswaan',
            'category' => 'kemahasiswaan',
            'is_head' => true,
            'bio' => 'Aktif dalam pembinaan organisasi mahasiswa sejak 2015...',
            'duties' => 'Mengelola beasiswa, prestasi, dan kegiatan ormawa.',
        ]);
        // Staff Kemahasiswaan
        Staff::create([
            'name' => 'Eko Prasetyo, S.Sos.',
            'position' => 'Staf Beasiswa',
            'category' => 'kemahasiswaan',
            'is_head' => false,
        ]);
        Staff::create([
            'name' => 'Fifi Nuraini, S.Psi.',
            'position' => 'Staf Konseling',
            'category' => 'kemahasiswaan',
            'is_head' => false,
        ]);
    }
}
