<?php

namespace Database\Seeders;

use App\Models\Counselor;
use Illuminate\Database\Seeder;

class CounselorSeeder extends Seeder
{
    public function run(): void
    {
        $counselors = [
            [
                'name' => 'Siti Aminah, SST., Bd., S.Pd., M.Kes',
                'title' => 'Konselor Senior',
                'specialty' => 'Spesialis dalam bidang konseling kesehatan dan penyesuaian diri mahasiswa. Berpengalaman lebih dari 10 tahun dalam pendampingan mahasiswa.',
                'image' => null,
            ],
            [
                'name' => 'Siswi Wulandari, SST., Bd., S.Pd., M.Kes',
                'title' => 'Konselor Akademik',
                'specialty' => 'Ahli dalam bidang konseling akademik, stres ujian, dan perencanaan karir. Membantu mahasiswa mengembangkan strategi belajar yang efektif.',
                'image' => null,
            ],
            [
                'name' => 'Weni Tri P, SST., Bd., S.Pd., M.Kes',
                'title' => 'Konselor Karir & Perencanaan Masa Depan',
                'specialty' => 'Spesialis dalam perencanaan karir, pengembangan profesional, dan transisi dari kampus ke dunia kerja. Pendekatan yang hangat dan supportif.',
                'image' => null,
            ],
            [
                'name' => 'Dhita Kris P, SST., Bd., S.Pd., M.Kes',
                'title' => 'Konselor Psikologis & Kemahasiswaan',
                'specialty' => 'Ahli dalam bidang bimbingan psikologis, manajemen stres, dan kesehatan mental. Membantu mahasiswa mengatasi masalah emosional.',
                'image' => null,
            ],
            [
                'name' => 'Bdn. Galuh Pradia Y, SST., S.Pd., M.Kes',
                'title' => 'Konselor Adaptasi & Kesehatan',
                'specialty' => 'Spesialis dalam bidang adaptasi mahasiswa baru, kesehatan reproduksi, dan kesejahteraan fisik. Pendekatan yang empatik dan personal.',
                'image' => null,
            ],
            [
                'name' => 'Drs. Talkah, M.Pd',
                'title' => 'Konselor Pendidikan & Pengembangan Diri',
                'specialty' => 'Ahli dalam pengembangan diri, motivasi belajar, dan bimbingan pendidikan. Pendekatan yang mendalam dan berorientasi pada solusi.',
                'image' => null,
            ],
        ];

        foreach ($counselors as $counselor) {
            Counselor::create($counselor);
        }
    }
}
