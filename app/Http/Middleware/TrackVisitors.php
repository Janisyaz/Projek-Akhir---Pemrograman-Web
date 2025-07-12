<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use Closure;
use Illuminate\Http\Request;

class TrackVisitors
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Track only GET requests and not admin routes
        if ($request->isMethod('get') && !$request->is('admin*') && !$request->is('dashboard*')) {
            Visitor::create([
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'article_id' => $request->route('article') ? $request->route('article')->id : null,
            ]);
        }

        return $response;
    }
}