<?php

namespace App\Http\Controllers;

use App\Models\InformationPost;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InformationController extends Controller
{
    public function index(Request $request): View
    {
        $posts = InformationPost::published()
            ->with('category')
            ->latest('published_at')
            ->paginate(9);

        return view('information', compact('posts'));
    }

    public function show(InformationPost $post): View
    {
        return view('information_detail', compact('post'));
    }
}
