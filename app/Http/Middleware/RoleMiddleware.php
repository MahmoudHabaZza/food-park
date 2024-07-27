<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Get the user's role from the authenticated user
        $userRole = $request->user()->role;

        // Check if the user's role matches any of the allowed roles
        if (in_array($userRole, $roles)) {
            return $next($request);
        }

        if(auth()->user()->role == 'admin')
        {
            return redirect()->route('admin.dashboard')->withErrors('You do not have the required permissions.');
        }

        return redirect()->route('dashboard')->withErrors('You do not have the required permissions.');
    }
}
