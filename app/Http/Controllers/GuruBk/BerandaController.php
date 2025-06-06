<?php

namespace App\Http\Controllers\GuruBk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Tanggapan;

class BerandaController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        // Mengambil statistik pengaduan
        $totalPengaduan = Pengaduan::count();
        $pengaduanMenunggu = Pengaduan::where('status', 'Menunggu')->count();
        $pengaduanDiproses = Pengaduan::where('status', 'Diproses')->count();
        $pengaduanSelesai = Pengaduan::where('status', 'Selesai')->count();

        // Mengambil 3 pengaduan terbaru
        $pengaduanTerbaru = Pengaduan::with(['siswa.kelas', 'kategori'])
            ->latest()
            ->take(3)
            ->get();

        return view('guruBk.berandaBk', compact(
            'user',
            'totalPengaduan',
            'pengaduanMenunggu',
            'pengaduanDiproses',
            'pengaduanSelesai',
            'pengaduanTerbaru'
        ));
    }
} 