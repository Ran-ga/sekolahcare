<?php

namespace App\Http\Controllers\Kepsek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\DB;

class BerandaController extends Controller
{
    public function index()
    {
        // Get total complaints
        $totalPengaduan = Pengaduan::count();
        
        // Get complaints by status
        $menunggu = Pengaduan::where('status', 'menunggu')->count();
        $diproses = Pengaduan::where('status', 'diproses')->count();
        $selesai = Pengaduan::where('status', 'selesai')->count();
        
        // Get latest 3 complaints
        $pengaduanTerbaru = Pengaduan::with(['siswa.kelas'])
            ->latest()
            ->take(3)
            ->get();

        return view('kepsek.beranda', compact(
            'totalPengaduan',
            'menunggu',
            'diproses',
            'selesai',
            'pengaduanTerbaru'
        ));
    }
} 