<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Register user
    public function register(Request $request){
        // Validate users
        $fields = $request->validate([
            'username' => ['required', 'max:255'],
            'email' => ['required', 'email:255', 'email', 'unique:users'],
            'password' => ['required', 'min:3', 'confirmed'],
        ]);

        // Register
        $user = User::create($fields);

        // Login
        Auth::login($user);

        // Redirect
        return redirect()->route('home');
    }

    // Login User
    public function login(Request $request){
        // Validate input
        $fields = $request->validate([
            'email' => ['required', 'email:255', 'email'],
            'password' => ['required'],
        ]);

        // Try to log in the user
        if (Auth::attempt(['email' => $fields['email'], 'password' => $fields['password']], $request->remember)) {
            // Check if user is an admin
            if (Auth::user()->usertype === 'admin') {
                // Redirect to admin dashboard if the user is an admin
                return redirect()->route('admin.dashboard');
            } else {
                // Otherwise, redirect to user dashboard/home
                return redirect()->route('home');
            }
        } else {
            // Login failed, return back with an error message
            return back()->withErrors(['failed' => 'Invalid credentials!']);
        }
    }

    // Logout User
    public function logout(Request $request){
        // Logout the user
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate CSRF token
        $request->session()->regenerateToken();

        // Redirect to home page
        return redirect('/');
    }
}
