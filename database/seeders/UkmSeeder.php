<?php

namespace Database\Seeders;

use App\Models\Ukm;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UkmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ukms = [
            [
                'name' => 'UKM Seni',
                'category' => 'Seni',
                'description' => 'Tempat di mana imajinasi menjadi nyata. Di UKM Seni, mahasiswa bebas mengekspresikan kreativitas lewat karya, pentas, dan kolaborasi seni yang penuh warna.',
                'instagram_link' => 'https://www.instagram.com/ukmseni_asmarakala/?utm_source=ig_web_button_share_sheet',
            ],
            [
                'name' => 'UKM Olahraga',
                'category' => 'Olahraga',
                'description' => 'Bagi jiwa-jiwa penuh energi! UKM Olahraga adalah ruang untuk mengasah bakat, meningkatkan performa, dan menaklukkan tantangan di setiap arena.',
                'instagram_link' => 'https://www.instagram.com/ukmolahraga.unik?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==',
            ],
            [
                'name' => 'UKM PIK R-KSR',
                'category' => 'Kesehatan', // Assumed Category from content "Peduli sesama"
                'description' => 'Lebih dari sekadar berbagi informasi, UKM PIK-R KSR hadir untuk menginspirasi hidup sehat, peduli sesama, dan mencetak relawan tangguh untuk masa depan.',
                'instagram_link' => 'https://www.instagram.com/ukm_pikksrunik?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==',
            ],
            [
                'name' => 'UKM Mapala Mauna Kea',
                'category' => 'Alam',
                'description' => 'Panggilan untuk para petualang sejati! UKM MAPALA adalah tempat berkumpulnya para pecinta alam yang siap menaklukkan gunung, hutan, dan segala tantangan alam raya.',
                'instagram_link' => 'https://www.instagram.com/mpa_maunakea?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==',
            ],
            [
                'name' => 'UKM Resimen Mahasiswa',
                'category' => 'Kepemimpinan',
                'description' => 'Wadah bagi mahasiswa yang tertarik pada bela negara dan kedisiplinan. UKM ini aktif dalam pelatihan ketahanan fisik, kepemimpinan, dan kegiatan pengamanan.',
                'instagram_link' => '#',
            ],
            [
                'name' => 'UKM PSHT',
                'category' => 'Olahraga',
                'description' => 'Wadah bagi mahasiswa yang ingin mengembangkan diri melalui seni bela diri Persaudaraan Setia Hati Terate.',
                'instagram_link' => 'https://www.instagram.com/ukmpshtuniv.kadiri?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==',
            ],
            [
                'name' => 'UKM Kerohanian Islam AN-Nur',
                'category' => 'Keagamaan',
                'description' => 'Wadah bagi mahasiswa muslim untuk memperdalam nilai keislaman. UKM ini aktif dalam kajian rutin, pelatihan dakwah, dan kegiatan sosial keagamaan.',
                'instagram_link' => 'https://www.instagram.com/ukki_an_nur?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==',
            ],
            [
                'name' => 'UKM Kristen Katolik',
                'category' => 'Keagamaan',
                'description' => 'Bersama membangun iman yang kuat dan kasih yang luas. UKM Kerohanian Kristen Katolik menghadirkan ruang bertumbuh, beribadah, dan berbagi berkat kepada sesama.',
                'instagram_link' => 'https://www.instagram.com/ukmkk.unik?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==',
            ],
            [
                'name' => 'UKM Komunikasi Lentera',
                'category' => 'Akademik', // Assumed
                'description' => 'Wadah bagi mahasiswa yang berminat di bidang jurnalistik, media, dan komunikasi. UKM ini aktif menerbitkan buletin, membuat konten kreatif, dan mengadakan pelatihan komunikasi.',
                'instagram_link' => 'https://www.instagram.com/komunikasi.lenteraunik?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==',
            ],
        ];

        foreach ($ukms as $ukm) {
            Ukm::create($ukm);
        }
    }
}
