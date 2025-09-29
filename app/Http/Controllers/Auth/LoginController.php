<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Show the login form
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle login request
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            // Regenerate session to prevent session fixation attacks
            $request->session()->regenerate();

            // Check if user is admin
            if (Auth::user()->email === 'admin@se.npru.ac.th') {
                return redirect()->intended(route('admin.index'));
            } else {
                // If not admin, redirect to home
                Auth::logout();
                return back()->withErrors([
                    'email' => 'You do not have permission to access the admin panel.',
                ])->onlyInput('email');
            }
        }

        // Authentication failed
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Log the user out of the application
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'You have been logged out successfully.');
    }
}
