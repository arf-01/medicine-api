<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        if ($user->role !== 'admin') {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized. Admin only.'
            ], 403);
        }

        return $next($request);
    }
}
