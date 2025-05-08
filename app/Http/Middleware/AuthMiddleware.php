<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()){
            session()->put('url.intended', url()->full());

            return redirect()
                ->route('dashboard.login')
                ->withErrors(['auth_error' => 'Please login for this action!']);
        }

        return $next($request);
    }
}
