<?php

namespace App\Http\Controllers;

use App\Models\StudyProgramDocumentSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class StudyProgramDocumentController extends Controller
{
    public function index(Request $request): View
    {
        $setting = StudyProgramDocumentSetting::first();

        // Password protection check with 1-hour session timeout
        if ($setting && $setting->password) {
            $authenticatedAt = session('rekap_prodi_authenticated_at');
            $oneHourAgo = now()->subHour();

            if (!$authenticatedAt || $authenticatedAt < $oneHourAgo) {
                session()->forget(['rekap_prodi_authenticated_at']);
                return view('rekap-prodi-auth');
            }
        }

        $data = [];
        $headers = [];
        $prodiList = [];
        $selectedProdi = $request->query('prodi');
        $search = $request->query('search');
        $prodiIndex = -1;

        if ($setting && $setting->spreadsheet_url) {
            $csvData = $this->fetchSpreadsheetData($setting->spreadsheet_url);

            if (!empty($csvData)) {
                $headers = array_shift($csvData);

                // Find the index of "Program Studi" or "Prodi" column
                $prodiIndex = -1;
                foreach ($headers as $index => $header) {
                    $lowHeader = strtolower($header);
                    if (str_contains($lowHeader, 'program studi') || str_contains($lowHeader, 'prodi')) {
                        $prodiIndex = $index;
                        break;
                    }
                }

                // Process data and collect unique prodi
                foreach ($csvData as $row) {
                    if (count($row) < count($headers))
                        continue;

                    if ($prodiIndex !== -1) {
                        $prodiName = trim($row[$prodiIndex]);
                        if ($prodiName && !in_array($prodiName, $prodiList)) {
                            $prodiList[] = $prodiName;
                        }
                    }

                    $data[] = $row;
                }

                sort($prodiList);
            }
        }

        return view('rekap-prodi', compact('headers', 'data', 'prodiList', 'selectedProdi', 'search', 'prodiIndex'));
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $setting = StudyProgramDocumentSetting::first();

        if ($setting && $request->password === $setting->password) {
            session(['rekap_prodi_authenticated_at' => now()]);
            return redirect()->route('rekap-prodi.index');
        }

        return back()->withErrors(['password' => 'Password salah.']);
    }

    private function fetchSpreadsheetData($url)
    {
        if (preg_match('/spreadsheets\/d\/([a-zA-Z0-9-_]+)/', $url, $matches)) {
            $id = $matches[1];
            $csvUrl = "https://docs.google.com/spreadsheets/d/{$id}/export?format=csv";

            try {
                // Use file_get_contents with a simple context to avoid SSL issues
                $context = stream_context_create([
                    "ssl" => [
                        "verify_peer" => false,
                        "verify_peer_name" => false,
                    ],
                ]);

                $csvContent = @file_get_contents($csvUrl, false, $context);
                if ($csvContent !== false) {
                    $lines = explode("\n", $csvContent);
                    return array_map('str_getcsv', $lines);
                }
            } catch (\Exception $e) {
                return [];
            }
        }
        return [];
    }
}