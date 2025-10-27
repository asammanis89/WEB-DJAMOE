<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek apakah akun aktif
        $user = \App\Models\User::where('email', $request->email)->first();
        if ($user && !$user->is_active) {
            return back()->withErrors(['email' => 'Akun ini telah dinonaktifkan.']);
        }

        if (Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }
}