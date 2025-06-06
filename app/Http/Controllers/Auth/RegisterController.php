<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        $kelas = Kelas::all();
        return view('auth.register', compact('kelas'));
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:siswa,wali_kelas',
            'no_hp' => 'required|string|max:15|unique:users',
            'jenis_kelamin' => 'required|in:L,P',
            'nomor_induk' => 'required|string|max:20|unique:users',
            'kelas_id' => 'required_if:role,siswa|exists:kelas,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role === 'siswa' ? 'siswa' : 'wali_kelas',
            'no_hp' => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nomor_induk' => $request->nomor_induk,
            'kelas_id' => $request->role === 'siswa' ? $request->kelas_id : null,
        ]);

        return redirect()->route('login')
            ->with('success', 'Registrasi berhasil! Silakan login.');
    }
} 