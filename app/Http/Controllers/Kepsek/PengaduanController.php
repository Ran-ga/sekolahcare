<?php

namespace App\Http\Controllers\Kepsek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Kategori;
use App\Models\Tanggapan;

class PengaduanController extends Controller
{
    public function index(Request $request)
    {
        // Hitung total pengaduan
        $totalPengaduan = Pengaduan::count();

        // Hitung pengaduan berdasarkan status
        $pengaduanMenunggu = Pengaduan::where('status', 'Menunggu')->count();
        $pengaduanDiproses = Pengaduan::where('status', 'Diproses')->count();
        $pengaduanSelesai = Pengaduan::where('status', 'Selesai')->count();

        // Query dasar untuk pengaduan
        $query = Pengaduan::with(['siswa', 'kategori']);

        // Filter berdasarkan status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        // Filter berdasarkan kategori
        if ($request->has('kategori') && $request->kategori != '') {
            $query->where('kategori_id', $request->kategori);
        }

        // Filter berdasarkan rentang tanggal
        if ($request->has('tanggal_mulai') && $request->tanggal_mulai != '') {
            $query->whereDate('created_at', '>=', $request->tanggal_mulai);
        }
        if ($request->has('tanggal_selesai') && $request->tanggal_selesai != '') {
            $query->whereDate('created_at', '<=', $request->tanggal_selesai);
        }

        // Filter berdasarkan pencarian
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('isi_pengaduan', 'like', "%{$search}%")
                  ->orWhereHas('siswa', function($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%");
                  });
            });
        }

        // Pengurutan
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'terlama':
                    $query->oldest();
                    break;
                case 'judul_asc':
                    $query->orderBy('judul', 'asc');
                    break;
                case 'judul_desc':
                    $query->orderBy('judul', 'desc');
                    break;
                default: // terbaru
                    $query->latest();
                    break;
            }
        } else {
            $query->latest();
        }

        // Pagination
        $pengaduan = $query->paginate(10);

        // Ambil semua kategori untuk filter
        $kategoris = Kategori::all();

        return view('kepsek.daftar-pengaduan', compact(
            'totalPengaduan',
            'pengaduanMenunggu',
            'pengaduanDiproses',
            'pengaduanSelesai',
            'pengaduan',
            'kategoris'
        ));
    }

    public function show($id)
    {
        $pengaduan = Pengaduan::with(['siswa', 'kategori', 'tanggapan.user'])->findOrFail($id);
        return view('kepsek.detail-pengaduan', compact('pengaduan'));
    }

    public function storeTanggapan(Request $request, $id)
    {
        $request->validate([
            'tanggapan' => 'required|string'
        ]);

        $pengaduan = Pengaduan::findOrFail($id);

        // Buat tanggapan baru
        Tanggapan::create([
            'pengaduan_id' => $id,
            'user_id' => auth()->id(),
            'tanggapan' => $request->tanggapan
        ]);

        // Update status jika masih menunggu
        if ($pengaduan->status == 'Menunggu') {
            $pengaduan->update(['status' => 'Diproses']);
        }

        return redirect()->back()->with('success', 'Tanggapan berhasil ditambahkan');
    }

    public function updateStatus($id, $status)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->update(['status' => $status]);

        return redirect()->back()->with('success', 'Status pengaduan berhasil diperbarui');
    }
} 