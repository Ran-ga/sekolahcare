<?php

namespace App\Http\Controllers\WaliKelas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengaduan;
use App\Models\User;

class BerandaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $kelasId = $user->kelas_id;

        // Hitung jumlah siswa di kelas
        $jumlahSiswa = User::where('kelas_id', $kelasId)
            ->where('role', 'siswa')
            ->count();

        // Hitung total pengaduan dari siswa di kelas
        $totalPengaduan = Pengaduan::whereHas('siswa', function($q) use ($kelasId) {
            $q->where('kelas_id', $kelasId);
        })->count();

        // Hitung pengaduan berdasarkan status
        $pengaduanMenunggu = Pengaduan::whereHas('siswa', function($q) use ($kelasId) {
            $q->where('kelas_id', $kelasId);
        })->where('status', 'Menunggu')->count();

        $pengaduanDiproses = Pengaduan::whereHas('siswa', function($q) use ($kelasId) {
            $q->where('kelas_id', $kelasId);
        })->where('status', 'Diproses')->count();

        $pengaduanSelesai = Pengaduan::whereHas('siswa', function($q) use ($kelasId) {
            $q->where('kelas_id', $kelasId);
        })->where('status', 'Selesai')->count();

        // Ambil 3 pengaduan terbaru
        $pengaduanTerbaru = Pengaduan::with(['siswa', 'kategori'])
            ->whereHas('siswa', function($q) use ($kelasId) {
                $q->where('kelas_id', $kelasId);
            })
            ->latest()
            ->take(3)
            ->get();

        return view('waliKelas.beranda', compact(
            'user',
            'jumlahSiswa',
            'totalPengaduan',
            'pengaduanMenunggu',
            'pengaduanDiproses',
            'pengaduanSelesai',
            'pengaduanTerbaru'
        ));
    }
} 