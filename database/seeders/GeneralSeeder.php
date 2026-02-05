<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\SiteSetting;

class GeneralSeeder extends Seeder
{
    public function run()
    {
        // Site Settings
        SiteSetting::firstOrCreate([
            'id' => 1
        ], [
            'site_name' => 'BAAK - Biro Administrasi Akademik dan Kemahasiswaan Universitas Kadiri',
            'header_logo' => null, // Uses default if null in blade
            'favicon' => null,
        ]);

        // Menus
        $menus = [
            [
                'name' => 'Beranda',
                'url' => '/',
                'order' => 1,
                'children' => []
            ],
            [
                'name' => 'Profil',
                'url' => '#',
                'order' => 2,
                'children' => [
                    ['name' => 'Profil BAAK', 'url' => '/profil', 'order' => 1],
                    ['name' => 'Visi & Misi', 'url' => '/visimisi', 'order' => 2],
                    ['name' => 'Struktur Organisasi', 'url' => '/profil#struktur', 'order' => 3],
                    ['name' => 'Tugas & Fungsi', 'url' => '/profil#tupoksi', 'order' => 4],
                ]
            ],
            [
                'name' => 'Akademik',
                'url' => '#',
                'order' => 3,
                'children' => [
                    ['name' => 'Portal Akademik', 'url' => '/portal-akademik', 'order' => 1],
                    ['name' => 'Kalender Akademik', 'url' => '/portal-akademik/kalender', 'order' => 2],
                    ['name' => 'Suasana Akademik', 'url' => '/suasana-akademik', 'order' => 3],
                    ['name' => 'Rekap Dokumen Prodi', 'url' => '/rekap-dok-prodi', 'order' => 4],
                ]
            ],
            [
                'name' => 'Pembelajaran',
                'url' => '#',
                'order' => 4,
                'children' => [] // Populated by other seeders if needed, or add basics
            ],
            [
                'name' => 'Kemahasiswaan',
                'url' => '#',
                'order' => 5,
                'children' => [] // Populated by KemahasiswaanMenuSeeder
            ],
            [
                'name' => 'Layanan',
                'url' => '#',
                'order' => 6,
                'type' => 'mega',
                'children' => [
                    [
                        'name' => 'Layanan Akademik',
                        'url' => '#',
                        'order' => 1,
                        'children' => [
                            ['name' => 'Legalisir & Terbit Ijazah', 'url' => '/terbit-ijazah', 'order' => 1],
                            ['name' => 'Layanan KRS', 'url' => '/krs', 'order' => 2],
                            ['name' => 'Layanan WSD', 'url' => '/wsd', 'order' => 3],
                            ['name' => 'SKPI', 'url' => '/skpi', 'order' => 4],
                        ]
                    ],
                    [
                        'name' => 'Layanan Kemahasiswaan',
                        'url' => '#',
                        'order' => 2,
                        'children' => [
                            ['name' => 'Beasiswa', 'url' => '/beasiswa', 'order' => 1],
                            ['name' => 'Layanan Konseling', 'url' => '/konseling', 'order' => 2],
                            ['name' => 'Mahasiswa Asing', 'url' => '/mhsasing', 'order' => 3],
                        ]
                    ],
                    [
                        'name' => 'Fasilitas & Umum',
                        'url' => '#',
                        'order' => 3,
                        'children' => [
                            ['name' => 'Peminjaman Ruang', 'url' => '/pinjam-ruang', 'order' => 1],
                        ]
                    ],
                ]
            ],
            [
                'name' => 'Informasi',
                'url' => '#',
                'order' => 7,
                'children' => [
                    ['name' => 'Berita Terkini', 'url' => '/information', 'order' => 1],
                    ['name' => 'Kegiatan BAAK', 'url' => '/kegiatan', 'order' => 2],
                    ['name' => 'Agenda Rapat', 'url' => '/rapat', 'order' => 3],
                    ['name' => 'Arsip Digital', 'url' => '/arsip-baak', 'order' => 4],
                    ['name' => 'Pusat Tanya Jawab', 'url' => '/tanya-jawab', 'order' => 5],
                ]
            ],
        ];

        foreach ($menus as $menuData) {
            $children = $menuData['children'] ?? [];
            unset($menuData['children']);

            $parent = Menu::firstOrCreate(['name' => $menuData['name']], $menuData);

            foreach ($children as $childData) {
                // Check if this child has its own children (grandchildren)
                $grandChildren = $childData['children'] ?? [];
                unset($childData['children']);

                $child = Menu::firstOrCreate(
                    ['name' => $childData['name'], 'parent_id' => $parent->id],
                    $childData + ['parent_id' => $parent->id]
                );

                if (!empty($grandChildren)) {
                    foreach ($grandChildren as $grandChildData) {
                        Menu::firstOrCreate(
                            ['name' => $grandChildData['name'], 'parent_id' => $child->id],
                            $grandChildData + ['parent_id' => $child->id]
                        );
                    }
                }
            }
        }
    }
}
