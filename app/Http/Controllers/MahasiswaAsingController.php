<?php

namespace App\Http\Controllers;

use App\Models\MahasiswaAsingPage;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MahasiswaAsingController extends Controller
{
    public function index(): View
    {
        // Fetch the first record, or create a dummy/empty one if none exists to avoid errors
        $pageData = MahasiswaAsingPage::with('facilities')->first() ?? new MahasiswaAsingPage();

        return view('mhsasing', [
            'data' => $pageData,
        ]);
    }
}
