<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\HeroSection;
use App\Models\BaakProgram; // Added import
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $hero = HeroSection::where('is_active', true)->first();
        $kepala = Staff::where('category', 'kepala_biro')->where('is_head', true)->first();
        $kabagAkademik = Staff::where('category', 'akademik')->where('is_head', true)->first();
        $kabagPembelajaran = Staff::where('category', 'pembelajaran')->where('is_head', true)->first();
        $kabagKemahasiswaan = Staff::where('category', 'kemahasiswaan')->where('is_head', true)->first();

        // Create a list respecting the requested order
        $leaders = collect([$kepala, $kabagAkademik, $kabagPembelajaran, $kabagKemahasiswaan]);

        $latestNews = \App\Models\InformationPost::published()
            ->with('category')
            ->latest('published_at')
            ->take(4)
            ->get();

        // Fetch dynamic Baak Programs
        $baakPrograms = BaakProgram::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('home', compact('leaders', 'latestNews', 'hero', 'baakPrograms'));
    }
}
