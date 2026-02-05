<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin BAAK',
            'email' => 'admin@baak.unik-kediri.ac.id',
            'password' => bcrypt('password'), // Set a known password
        ]);

        User::factory()->create([
            'name' => 'Admin Developer',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);

        $this->call([
            GeneralSeeder::class,
            StaffSeeder::class,
            ProfileContentSeeder::class,
            AcademicSeeder::class,
            BaakProgramSeeder::class,
            DashboardButtonSeeder::class,
            UkmSeeder::class,
            CounselorSeeder::class,
            ArchiveSeeder::class,
                // Menu Seeders might be redundant if GeneralSeeder covers them or separate
            KemahasiswaanMenuSeeder::class,
            LearningDocumentCategorySeeder::class,
            LearningDocumentMenuSeeder::class,
            MkwuMenuSeeder::class,
            PrestasiMenuSeeder::class,
            StudentDocumentCategorySeeder::class,
            StudentDocumentMenuSeeder::class,
            HeroSectionSeeder::class,
            InformationSeeder::class,
        ]);
    }
}
