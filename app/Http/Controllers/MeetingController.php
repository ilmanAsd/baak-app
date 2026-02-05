<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MeetingAgenda;
use App\Models\MeetingSetting;
use Illuminate\View\View;

class MeetingController extends Controller
{
    public function index(): View
    {
        $setting = MeetingSetting::first();

        // Password protection check with 1-hour session timeout
        if ($setting && $setting->password) {
            $authenticatedAt = session('meeting_authenticated_at');
            $oneHourAgo = now()->subHour();

            if (!$authenticatedAt || $authenticatedAt < $oneHourAgo) {
                session()->forget(['meeting_authenticated_at']);
                return view('rapat-auth');
            }
        }

        $agendas = MeetingAgenda::where('is_published', true)
            ->latest('date')
            ->paginate(9);

        return view('rapat', compact('agendas'));
    }

    public function show(MeetingAgenda $agenda): View
    {
        $setting = MeetingSetting::first();

        // Ensure user is still authenticated if password is set
        if ($setting && $setting->password) {
            $authenticatedAt = session('meeting_authenticated_at');
            $oneHourAgo = now()->subHour();

            if (!$authenticatedAt || $authenticatedAt < $oneHourAgo) {
                session()->forget(['meeting_authenticated_at']);
                return view('rapat-auth');
            }
        }

        return view('rapat_detail', compact('agenda'));
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $setting = MeetingSetting::first();

        if ($setting && $request->password === $setting->password) {
            session(['meeting_authenticated_at' => now()]);
            return redirect()->route('rapat.index');
        }

        return back()->with('error', 'Password yang Anda masukkan salah.');
    }
}
