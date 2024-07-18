<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SuperAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->user()->id == 1 && auth()->user()->email == 'superadmin@foodpark.com')
        {
            return $next($request);
        }

        return redirect()->route('admin.dashboard')->withErrors('You Do not have permission');
    }
}
