<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = \App\Models\Activity::orderBy('date', 'desc')->get();
        return view('kegiatan', compact('activities'));
    }

    public function show($slug)
    {
        $activity = \App\Models\Activity::where('slug', $slug)->firstOrFail();
        return view('kegiatan_detail', compact('activity'));
    }
}
