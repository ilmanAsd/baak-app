<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InformationCategory;
use App\Models\InformationPost;
use Illuminate\Support\Str;

class InformationSeeder extends Seeder
{
    public function run()
    {
        // Creates Categories
        $catUmum = InformationCategory::firstOrCreate(['name' => 'Umum', 'slug' => 'umum']);
        $catAkademik = InformationCategory::firstOrCreate(['name' => 'Akademik', 'slug' => 'akademik']);
        $catKemahasiswaan = InformationCategory::firstOrCreate(['name' => 'Kemahasiswaan', 'slug' => 'kemahasiswaan']);

        // Create Posts
        InformationPost::create([
            'information_category_id' => $catAkademik->id,
            'title' => 'Jadwal KRS Semester Genap 2025/2026',
            'slug' => Str::slug('Jadwal KRS Semester Genap 2025/2026'),
            'content' => 'Berikut adalah jadwal pengisian Kartu Rencana Studi (KRS) untuk semester genap tahun ajaran 2025/2026. Mahasiswa diharapkan mengisi tepat waktu.',
            'image' => null,
            'is_published' => true,
            'published_at' => now(),
        ]);

        InformationPost::create([
            'information_category_id' => $catKemahasiswaan->id,
            'title' => 'Pendaftaran Beasiswa Prestasi Dibuka',
            'slug' => Str::slug('Pendaftaran Beasiswa Prestasi Dibuka'),
            'content' => 'Pendaftaran beasiswa prestasi untuk mahasiswa aktif kini telah dibuka. Silakan cek persyaratan di menu Kemahasiswaan.',
            'image' => null,
            'is_published' => true,
            'published_at' => now()->subDays(2),
        ]);

        InformationPost::create([
            'information_category_id' => $catUmum->id,
            'title' => 'Pengumuman Wisuda Periode I Tahun 2026',
            'slug' => Str::slug('Pengumuman Wisuda Periode I Tahun 2026'),
            'content' => 'Wisuda Periode I Tahun 2026 akan dilaksanakan pada bulan Mei. Informasi lebih lanjut akan disampaikan segera.',
            'image' => null,
            'is_published' => true,
            'published_at' => now()->subDays(5),
        ]);
    }
}
