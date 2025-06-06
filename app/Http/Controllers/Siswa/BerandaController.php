<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    public function index()
    {
        $siswa_id = Auth::id();

        // Mengambil statistik pengaduan
        $total_pengaduan = Pengaduan::where('siswa_id', $siswa_id)->count();
        $pengaduan_menunggu = Pengaduan::where('siswa_id', $siswa_id)->where('status', 'Menunggu')->count();
        $pengaduan_diproses = Pengaduan::where('siswa_id', $siswa_id)->where('status', 'Diproses')->count();
        $pengaduan_selesai = Pengaduan::where('siswa_id', $siswa_id)->where('status', 'Selesai')->count();

        // Mengambil 3 pengaduan terbaru
        $pengaduan_terbaru = Pengaduan::with(['kategori'])
            ->where('siswa_id', $siswa_id)
            ->latest()
            ->take(3)
            ->get();

        return view('siswa.beranda', compact(
            'total_pengaduan',
            'pengaduan_menunggu',
            'pengaduan_diproses',
            'pengaduan_selesai',
            'pengaduan_terbaru'
        ));
    }
} 