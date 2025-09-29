<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to access the admin panel.');
        }

        // Check if user is admin (you might want to check a specific role or permission)
        // For now, we'll check if the user's email is the admin email
        if (Auth::user()->email !== 'admin@se.npru.ac.th') {
            return redirect()->route('home')->with('error', 'You do not have permission to access the admin panel.');
        }

        return $next($request);
    }
}
