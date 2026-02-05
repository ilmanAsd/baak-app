<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\PagePassword;
use App\Models\Page;
use App\Models\Menu;
use Symfony\Component\HttpFoundation\Response;

class CheckPagePassword
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Don't protect the auth route itself
        if ($request->routeIs('page.password.*')) {
            return $next($request);
        }

        $activeProtections = PagePassword::where('is_active', true)->with('target')->get();

        foreach ($activeProtections as $protection) {
            $isMatch = false;

            if ($protection->target_type === Page::class && $protection->target) {
                // Check if current URL is the page show route for this slug
                if ($request->url() === route('page.show', $protection->target->slug)) {
                    $isMatch = true;
                }
            } elseif ($protection->target_type === Menu::class && $protection->target) {
                $targetUrl = $protection->target->url;
                if (filled($targetUrl)) {
                    // Normalize and check
                    $path = trim(parse_url($targetUrl, PHP_URL_PATH), '/');
                    if ($request->is($path) || $request->fullUrl() === $targetUrl) {
                        $isMatch = true;
                    }
                }
            }

            if ($isMatch) {
                $sessionKey = 'page_password_' . $protection->id;

                // Check session with 1-hour timeout (similar to Arsip/Rekap)
                $authenticatedAt = session($sessionKey . '_at');
                $oneHourAgo = now()->subHour();

                if (!$authenticatedAt || $authenticatedAt < $oneHourAgo) {
                    session()->forget([$sessionKey . '_at']);

                    // Redirect to password entry page with the target URL as redirect back
                    return response()->view('page-auth', [
                        'protection_id' => $protection->id,
                        'redirect_url' => $request->fullUrl(),
                        'title' => $protection->target_type === Page::class ? $protection->target->title : $protection->target->name
                    ]);
                }
            }
        }

        return $next($request);
    }
}
