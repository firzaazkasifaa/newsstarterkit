<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EditorMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated and has editor role
        if (Auth::check() && Auth::user()->role === 'editor') {
            return $next($request);
        }

        // For API requests
        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Forbidden. Editor access required'
            ], 403);
        }

        // For web requests
        abort(403, 'Unauthorized. Only editors can access this page');
    }
}
