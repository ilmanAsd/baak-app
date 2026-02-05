<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Services\TemplateRegistry;
use Illuminate\View\View;

class PageController extends Controller
{
    public function show(string $slug): View
    {
        $query = Page::where('slug', $slug);

        if (!auth()->check()) {
            $query->where('is_active', true);
        }

        $page = $query->firstOrFail();
        $template = TemplateRegistry::getTemplate($page->template_key);

        if (!$template) {
            abort(404, 'Template not found for this page.');
        }

        // Map section content to a keyed array for easier access in Blade
        $sections = $page->sections->pluck('content', 'section_key');

        return view($template['view'], [
            'page' => $page,
            'sections' => $sections,
        ]);
    }
}
