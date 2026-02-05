<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KemahasiswaanSetting;
use App\Models\StudentAchievement;
use App\Models\PrestasiSetting;
use App\Models\AchievementItem;

use App\Models\Faculty;
use App\Models\DocumentCategory;
use App\Models\EducationLevel;
use App\Models\AcademicCalendarEvent;

class AcademicController extends Controller
{
    public function index()
    {
        $faculties = Faculty::with('studyPrograms')->get();
        $documentCategories = DocumentCategory::with('academicDocuments')->get();
        $educationLevels = EducationLevel::orderBy('sort_order')->get();
        $calendarEvents = AcademicCalendarEvent::where('is_active', true)
            ->orderBy('start_date')
            ->get();

        $portalSetting = \App\Models\PortalSetting::first();

        return view('akademik', compact('faculties', 'documentCategories', 'educationLevels', 'calendarEvents', 'portalSetting'));
    }

    public function showCategoryDocuments(DocumentCategory $category)
    {
        $category->load('academicDocuments');
        $years = $category->academicDocuments()->whereNotNull('year')->distinct()->pluck('year')->sortDesc();
        return view('academic-documents', compact('category', 'years'));
    }

    public function calendar(Request $request)
    {
        $query = AcademicCalendarEvent::where('is_active', true);

        if ($request->filled('year')) {
            $query->where('academic_year', $request->year);
        }

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $events = $query->orderBy('start_date')->get();

        $years = AcademicCalendarEvent::distinct()->pluck('academic_year')->filter()->values();

        $portalSetting = \App\Models\PortalSetting::first();

        return view('academic-calendar', compact('events', 'years', 'portalSetting'));
    }

    public function atmosphere(Request $request)
    {
        $sources = \App\Models\AcademicAtmosphere::where('is_active', true)
            ->orderBy('order')
            ->get();

        $allData = [];
        foreach ($sources as $source) {
            $data = $this->fetchSpreadsheetData($source->spreadsheet_url);
            if (!empty($data)) {
                // Remove header from each source and merge
                array_shift($data);
                $allData = array_merge($allData, $data);
            }
        }

        // Extract unique years from the "Tahun" column (Index 2 based on the requested layout)
        $years = collect($allData)->map(fn($row) => $row[2] ?? null)->filter()->unique()->sort()->values();

        return view('academic-atmosphere', compact('allData', 'years'));
    }

    public function learning()
    {
        $kurikulum = \App\Models\LearningResource::where('category', 'Kurikulum')
            ->where('is_active', true)
            ->orderBy('order')
            ->get();
        $mbkm = \App\Models\LearningResource::where('category', 'MBKM')
            ->where('is_active', true)
            ->orderBy('order')
            ->get();
        $mkwu = \App\Models\LearningResource::where('category', 'MKWU')
            ->where('is_active', true)
            ->orderBy('order')
            ->get();
        $documents = \App\Models\LearningResource::where('category', 'Dokumen Pembelajaran')
            ->where('is_active', true)
            ->orderBy('order')
            ->get();

        $portalSetting = \App\Models\LearningSetting::first() ?? new \App\Models\LearningSetting([
            'title' => 'Portal Pembelajaran',
            'description' => 'Universitas Kadiri menyediakan layanan pembelajaran terpadu untuk mendukung proses belajar mengajar bagi mahasiswa, dosen, dan staf.',
            'spada_url' => 'https://spada1.unik-kediri.ac.id'
        ]);

        return view('pembelajaran', compact('kurikulum', 'mbkm', 'mkwu', 'documents', 'portalSetting'));
    }

    public function curriculum()
    {
        $setting = \App\Models\LearningSetting::first();

        // Password protection check with 1-hour session timeout
        if ($setting && $setting->curriculum_password) {
            $authenticatedAt = session('curriculum_authenticated_at');
            $oneHourAgo = now()->subHour();

            if (!$authenticatedAt || $authenticatedAt < $oneHourAgo) {
                // Clear session if expired
                session()->forget(['curriculum_authenticated_at']);
                return view('curriculum-auth');
            }
        }

        $kurikulum = \App\Models\LearningResource::with(['faculty', 'studyProgram'])
            ->where('category', 'Kurikulum')
            ->where('is_active', true)
            ->orderBy('order')
            ->get();

        $faculties = Faculty::orderBy('name')->get();
        $studyPrograms = \App\Models\StudyProgram::orderBy('name')->get();

        return view('curriculum', compact('kurikulum', 'faculties', 'studyPrograms'));
    }

    public function authenticateCurriculum(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $setting = \App\Models\LearningSetting::first();

        if ($setting && $request->password === $setting->curriculum_password) {
            session(['curriculum_authenticated_at' => now()]);
            return redirect()->route('pembelajaran.curriculum');
        }

        return back()->with('error', 'Password yang Anda masukkan salah.');
    }

    public function mbkm()
    {
        $allMbkm = \App\Models\LearningResource::where('category', 'MBKM')
            ->where('is_active', true)
            ->orderBy('order')
            ->get();

        $programs = $allMbkm->where('type', 'Program');
        $partnerships = $allMbkm->where('type', 'Partnership');
        $videos = $allMbkm->where('type', 'Video');

        $setting = \App\Models\MbkmSetting::first() ?? new \App\Models\MbkmSetting([
            'hero_title' => 'KAMPUS MERDEKA',
            'hero_description' => 'Program persiapan karier yang komprehensif untuk mempersiapkan generasi terbaik Indonesia melalui pengalaman belajar di luar kampus.',
            'impact_image' => null
        ]);

        return view('mbkm', compact('programs', 'partnerships', 'videos', 'setting'));
    }

    public function mkwu()
    {
        $mkwu = \App\Models\LearningResource::where('category', 'MKWU')
            ->where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('mkwu', compact('mkwu'));
    }

    public function studentAffairs()
    {
        $setting = \App\Models\KemahasiswaanSetting::first() ?? new \App\Models\KemahasiswaanSetting([
            'title' => 'Bidang Kemahasiswaan',
            'description' => 'Website Bidang Kemahasiswaan Universitas Kadiri.',
            'rector_name' => 'Kustanto, SH., MS.',
            'rector_greeting_title' => 'Sambutan Wakil Rektor III',
            'rector_greeting_content' => 'Selamat datang di website Bidang Kemahasiswaan.'
        ]);

        $achievements = \App\Models\StudentAchievement::orderBy('tahun', 'desc')
            ->orderBy('id', 'desc')
            ->get();

        $years = \App\Models\StudentAchievement::distinct()
            ->orderBy('tahun', 'desc')
            ->pluck('tahun');

        $achievementCount = \App\Models\StudentAchievement::count();

        return view('kemahasiswaan', compact('setting', 'achievements', 'years', 'achievementCount'));
    }

    public function achievements()
    {
        $setting = PrestasiSetting::first() ?? new PrestasiSetting([
            'hero_title' => 'Reward dan Prestasi Mahasiswa',
            'hero_description' => 'Kami memberikan apresiasi atas setiap kerja keras dan capaian luar biasa mahasiswa Universitas Kadiri.',
        ]);

        $layanan = AchievementItem::where('type', 'layanan')->orderBy('order')->get();
        $penghargaan = AchievementItem::where('type', 'penghargaan')->orderBy('order')->get();
        $pencapaianItems = AchievementItem::where('type', 'pencapaian')->orderBy('order')->get();

        $tabs = $pencapaianItems->pluck('tab')->unique()->filter()->values();
        $pencapaianGrouped = $pencapaianItems->groupBy('tab');

        return view('prestasi-mahasiswa', compact('setting', 'layanan', 'penghargaan', 'tabs', 'pencapaianGrouped'));
    }

    public function studentDocuments()
    {
        $categories = \App\Models\StudentDocumentCategory::where('is_active', true)
            ->with([
                'studentDocuments' => function ($query) {
                    $query->where('is_active', true)
                        ->orderBy('year', 'desc')
                        ->orderBy('order');
                }
            ])
            ->orderBy('order')
            ->get();

        $years = \App\Models\LearningResource::where('category', 'Dokumen Kemahasiswaan')
            ->where('is_active', true)
            ->distinct()
            ->pluck('year')
            ->sortDesc();

        return view('dokumen-kemahasiswaan', compact('categories', 'years'));
    }

    public function externalDocuments()
    {
        $documents = \App\Models\ExternalDocument::where('is_active', true)
            ->orderBy('year', 'desc')
            ->get()
            ->groupBy('category');

        return view('external-documents', compact('documents'));
    }

    public function learningDocuments()
    {
        $categories = \App\Models\LearningDocumentCategory::where('is_active', true)
            ->with([
                'learningDocuments' => function ($query) {
                    $query->where('is_active', true)
                        ->orderBy('year', 'desc')
                        ->orderBy('order');
                }
            ])
            ->orderBy('order')
            ->get();

        $years = \App\Models\LearningResource::where('category', 'Dokumen Pembelajaran')
            ->where('is_active', true)
            ->distinct()
            ->pluck('year')
            ->sortDesc();

        return view('learning-documents', compact('categories', 'years'));
    }

    public function minatbakat()
    {
        $ukms = \App\Models\Ukm::all();
        return view('minatbakat', compact('ukms'));
    }

    private function fetchSpreadsheetData($url)
    {
        // Simple regex to extract ID from URL
        if (preg_match('/spreadsheets\/d\/([a-zA-Z0-9-_]+)/', $url, $matches)) {
            $id = $matches[1];
            $csvUrl = "https://docs.google.com/spreadsheets/d/{$id}/export?format=csv";

            try {
                $content = file_get_contents($csvUrl);
                if ($content === false)
                    return [];

                $lines = explode("\n", $content);
                return array_map('str_getcsv', $lines);
            } catch (\Exception $e) {
                return [];
            }
        }
        return [];
    }
}
