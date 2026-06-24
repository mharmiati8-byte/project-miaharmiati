<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (! $user || ! Hash::check($credentials['password'], $user->password)) {
            return back()
                ->withInput($request->only('email'))
                ->withErrors(['login' => 'Email atau password salah.']);
        }

        if ($user->role !== 'admin') {
            return back()
                ->withInput($request->only('email'))
                ->withErrors(['login' => 'Akun ini tidak memiliki akses admin.']);
        }

        $request->session()->regenerate();
        $request->session()->put([
            'admin_user_id' => $user->id,
            'admin_user_name' => $user->name,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Login berhasil.');
    }

    public function logout(Request $request)
    {
        $request->session()->forget(['admin_user_id', 'admin_user_name']);
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', 'Logout berhasil.');
    }
}
