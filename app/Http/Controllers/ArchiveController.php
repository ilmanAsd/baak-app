<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Archive;
use App\Models\ArchiveSection;
use App\Models\ArchiveSetting;
use Illuminate\View\View;

class ArchiveController extends Controller
{
    public function index(Request $request): View
    {
        $setting = ArchiveSetting::first();

        // Password protection check with 1-hour session timeout
        if ($setting && $setting->password) {
            $authenticatedAt = session('archive_authenticated_at');
            $oneHourAgo = now()->subHour();

            if (!$authenticatedAt || $authenticatedAt < $oneHourAgo) {
                session()->forget(['archive_authenticated_at']);
                return view('arsip-auth');
            }
        }

        $search = $request->query('search');
        $categoryId = $request->query('category_id');
        $year = $request->query('year');

        $sections = ArchiveSection::with([
            'archives' => function ($query) {
                $query->with('category')->latest('date');
            }
        ])->get();

        $categories = \App\Models\ArchiveCategory::orderBy('name')->get();
        $years = Archive::selectRaw('YEAR(date) as year')->distinct()->orderBy('year', 'desc')->pluck('year');

        return view('arsip', compact('sections', 'categories', 'years'));
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $setting = ArchiveSetting::first();

        if ($setting && $request->password === $setting->password) {
            session(['archive_authenticated_at' => now()]);
            return redirect()->route('arsip.index');
        }

        return back()->with('error', 'Password yang Anda masukkan salah.');
    }
}
