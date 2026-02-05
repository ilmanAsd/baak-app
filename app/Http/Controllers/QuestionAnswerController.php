<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\QuestionAnswer;

class QuestionAnswerController extends Controller
{
    public function index()
    {
        $qas = QuestionAnswer::where('is_published', true)
            ->latest('published_at')
            ->get();

        return view('tanya-jawab', compact('qas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:191',
            'question' => 'required|string',
        ]);

        QuestionAnswer::create([
            'name' => $request->name,
            'question' => $request->question,
            'is_published' => false,
        ]);

        return back()->with('success', 'Pertanyaan Anda telah dikirim dan akan segera dijawab oleh admin.');
    }
}
