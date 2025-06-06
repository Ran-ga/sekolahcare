<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Redirect berdasarkan role
            $user = Auth::user();
            switch($user->role) {
                case 'admin':
                    return redirect()->route('admin.dashboard');
                case 'guru_bk':
                    return redirect()->route('guruBk.beranda');
                case 'siswa':
                    return redirect()->route('siswa.beranda');
                case 'wali_kelas':
                    return redirect()->route('waliKelas.beranda');
                case 'kepala_sekolah':
                    return redirect()->route('kepsek.beranda');
                default:
                    return redirect()->route('siswa.beranda');
            }
        }

        return back()
            ->withErrors([
                'email' => 'Email atau password salah.',
            ])
            ->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()
            ->route('login')
            ->with('success', 'Anda telah berhasil logout.');
    }
} 