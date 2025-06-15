<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ReporterMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated and has reporter role
        if (Auth::check() && Auth::user()->role === 'reporter') {
            return $next($request);
        }

        // For API requests
        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Forbidden. Reporter access required'
            ], 403);
        }

        // For web requests
        abort(403, 'Unauthorized. Only reporters can access this page');
    }
}
