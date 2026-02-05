<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProfileContent;

class ProfileContentSeeder extends Seeder
{
    public function run()
    {
        ProfileContent::create([
            'about_us' => 'Biro Administrasi Akademik dan Kemahasiswaan merupakan unsur pelaksana di bidang administrasi akademik, kemahasiswaan dan alumni sebagai unit kerja di bawah dan bertanggungjawab langsung kepada Rektor dengan pembinaan sehari-hari berada dibawah Wakil Rektor 1 Bidang Akademik dan Wakil Rektor 3 Bidang Kemahasiswaan.',
            'vision' => '<p>Menjadi Biro yang unggul dalam pelayanan administrasi akademik dan kemahasiswaan berbasis teknologi informasi.</p>',
            'mission' => '<ul><li>Memberikan pelayanan prima kepada mahasiswa dan dosen.</li><li>Mengembangkan sistem informasi akademik yang terintegrasi.</li><li>Meningkatkan kesejahteraan dan prestasi mahasiswa.</li></ul>',
            'structure_image' => null,
        ]);
    }
}
