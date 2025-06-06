<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        // Filter by role
        if ($request->filled('role')) {
            $role = $request->role;
            // Map the role names to match database values
            $roleMap = [
                'guruBk' => 'guru_bk',
                'waliKelas' => 'wali_kelas',
                'kepsek' => 'kepala_sekolah'
            ];
            $query->where('role', $roleMap[$role] ?? $role);
        }

        // Filter by class
        if ($request->filled('kelas')) {
            $query->where('kelas_id', $request->kelas);
        }

        // Search functionality
        if ($request->has('search') && $request->search !== '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($search) . '%'])
                  ->orWhereRaw('LOWER(email) LIKE ?', ['%' . strtolower($search) . '%'])
                  ->orWhereRaw('LOWER(nomor_induk) LIKE ?', ['%' . strtolower($search) . '%']);
            });
        }

        // Get paginated users with 10 per page
        $users = $query->with('kelas')
                      ->orderBy('created_at', 'desc')
                      ->paginate(10)
                      ->withQueryString();

        // Get all classes for the edit form
        $kelas = \App\Models\Kelas::orderBy('nama')->get();

        return view('admin.kelola-pengguna', compact('users', 'kelas'));
    }

    public function destroy(User $user)
    {
        // Prevent self-deletion
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.kelola-pengguna')
                ->with('error', 'Tidak dapat menghapus akun sendiri.');
        }

        // Prevent deletion of the last admin
        if ($user->role === 'admin' && User::where('role', 'admin')->count() <= 1) {
            return redirect()->route('admin.kelola-pengguna')
                ->with('error', 'Tidak dapat menghapus admin terakhir.');
        }

        $user->delete();

        return redirect()->route('admin.kelola-pengguna')
            ->with('success', 'Pengguna berhasil dihapus.');
    }

    public function edit(User $user)
    {
        // Map database role values to display values
        $roleMap = [
            'guru_bk' => 'guruBk',
            'wali_kelas' => 'waliKelas',
            'kepala_sekolah' => 'kepsek'
        ];
        
        $user->role = $roleMap[$user->role] ?? $user->role;
        
        return response()->json([
            'user' => $user->load('kelas'),
            'roles' => ['admin', 'guruBk', 'waliKelas', 'kepsek', 'siswa']
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'no_hp' => 'required|string|max:15|unique:users,no_hp,' . $user->id,
            'role' => 'required|in:admin,guruBk,waliKelas,kepsek,siswa',
            'kelas_id' => 'nullable|exists:kelas,id',
            'reset_password' => 'nullable|boolean'
        ], [
            'no_hp.required' => 'Nomor HP harus diisi',
            'no_hp.max' => 'Nomor HP maksimal 15 karakter',
            'no_hp.unique' => 'Nomor HP sudah digunakan'
        ]);

        // Map display role values to database values
        $roleMap = [
            'guruBk' => 'guru_bk',
            'waliKelas' => 'wali_kelas',
            'kepsek' => 'kepala_sekolah'
        ];

        // Update user information
        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;
        $user->role = $roleMap[$request->role] ?? $request->role;
        $user->kelas_id = $request->kelas_id;

        // Reset password if requested
        if ($request->reset_password) {
            $user->password = bcrypt('password123'); // Default password
        }

        $user->save();

        return redirect()->route('admin.kelola-pengguna')
            ->with('success', 'Informasi pengguna berhasil diperbarui.');
    }
} 