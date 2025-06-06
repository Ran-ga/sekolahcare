<?php

namespace App\Http\Controllers\GuruBk;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Kategori;
use App\Models\Tanggapan;

class PengaduanController extends Controller
{
    public function index(Request $request)
    {
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

        // Ambil semua kategori untuk filter
        $kategoris = Kategori::all();

        // Ambil data pengaduan dengan pagination (5 item per halaman)
        $pengaduan = $query->paginate(5);

        return view('guruBk.daftar-pengaduanBk', compact('pengaduan', 'kategoris'));
    }

    public function show($id)
    {
        $pengaduan = Pengaduan::with(['siswa', 'kategori', 'tanggapan'])->findOrFail($id);
        return view('guruBk.detail-pengaduanBk', compact('pengaduan'));
    }

    public function storeTanggapan(Request $request, $id)
    {
        $request->validate([
            'tanggapan' => 'required|string',
            'status' => 'required|in:Menunggu,Diproses,Selesai'
        ]);

        $pengaduan = Pengaduan::findOrFail($id);

        // Update status pengaduan
        $pengaduan->update([
            'status' => $request->status
        ]);

        // Simpan tanggapan
        Tanggapan::create([
            'pengaduan_id' => $id,
            'user_id' => auth()->id(),
            'tanggapan' => $request->tanggapan
        ]);

        return redirect()->back()->with('success', 'Tanggapan berhasil ditambahkan');
    }

    public function updateStatus($id, $status)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        
        // Validasi status
        if (!in_array($status, ['Diproses', 'Selesai'])) {
            return redirect()->back()->with('error', 'Status tidak valid');
        }

        // Validasi perubahan status
        if ($pengaduan->status == 'Diproses' && $status != 'Selesai') {
            return redirect()->back()->with('error', 'Status tidak dapat diubah');
        }
        if ($pengaduan->status == 'Selesai' && $status != 'Diproses') {
            return redirect()->back()->with('error', 'Status tidak dapat diubah');
        }

        // Update status
        $pengaduan->update([
            'status' => $status
        ]);

        return redirect()->back()->with('success', 'Status pengaduan berhasil diperbarui');
    }
} 