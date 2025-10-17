<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // 🔹 Halaman login
    public function showLogin()
    {
        return view('welcome'); // resources/views/welcome.blade.php
    }

    // 🔹 Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'role'     => 'required|string'
        ]);

        // Coba login hanya dengan username + password
        if (Auth::attempt([
            'username' => $credentials['username'],
            'password' => $credentials['password'],
        ])) {
            $request->session()->regenerate();
            $user = Auth::user();

            // Cek role user di database
            if ($user->role !== $credentials['role']) {
                // Kalau role yang dipilih tidak sesuai → logout lagi
                Auth::logout();
                return back()->withErrors([
                    'login' => 'Role tidak sesuai untuk akun ini!',
                ])->withInput();
            }

            // Redirect sesuai role
            return match ($user->role) {
                'admin'          => redirect()->route('dashboardadmin'),
                'guru_piket'     => redirect()->route('dashboard'),
                'guru_pengajar'  => redirect()->route('dashboard.guru'),
                default          => redirect()->route('dashboard'),
            };
        }

        // Kalau username / password salah
        return back()->withErrors([
            'login' => 'Username atau password salah!',
        ])->withInput();
    }

    // 🔹 Redirect untuk admin (tidak render view langsung)
    public function dashboardAdmin()
    {
        return redirect()->route('dashboardadmin');
    }

    // 🔹 Dashboard guru piket
    public function dashboardPiket()
    {
        return view('dashboardpiket');
    }

    // 🔹 Dashboard guru pengajar
    public function dashboardGuru()
    {
        return view('dashboardguru');
    }

    // 🔹 Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}