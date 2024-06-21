<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsSuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (filled(user()) && isSuperAdmin()) {
            return $next($request);
        }
        return redirect()->route('portal.auth.login')->with(errorType(), "You're are not authorized to access this page.");
    }
}
