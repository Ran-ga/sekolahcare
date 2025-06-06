<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\Kategori;
use App\Models\Tanggapan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index(Request $request)
    {
        // Get statistics
        $totalPengaduan = Pengaduan::count();
        $pengaduanAktif = Pengaduan::whereIn('status', ['Menunggu', 'Diproses'])->count();
        $pengaduanSelesai = Pengaduan::where('status', 'Selesai')->count();

        // Base query
        $query = Pengaduan::with(['siswa', 'kategori']);

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by category
        if ($request->filled('kategori')) {
            $query->where('kategori_id', $request->kategori);
        }

        // Filter by date range
        if ($request->filled('tanggal_mulai')) {
            $query->whereDate('created_at', '>=', $request->tanggal_mulai);
        }
        if ($request->filled('tanggal_selesai')) {
            $query->whereDate('created_at', '<=', $request->tanggal_selesai);
        }

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('isi_pengaduan', 'like', "%{$search}%")
                  ->orWhereHas('siswa', function($q) use ($search) {
                      $q->where('name', 'like', "%{$search}%");
                  });
            });
        }

        // Sorting
        switch ($request->sort) {
            case 'terlama':
                $query->orderBy('created_at', 'asc');
                break;
            case 'judul_asc':
                $query->orderBy('judul', 'asc');
                break;
            case 'judul_desc':
                $query->orderBy('judul', 'desc');
                break;
            default: // terbaru
                $query->orderBy('created_at', 'desc');
                break;
        }

        // Get paginated results
        $pengaduan = $query->paginate(10)->withQueryString();

        // Get all categories for the filter
        $kategoris = Kategori::orderBy('nama_kategori')->get();

        return view('admin.kelola-pengaduan', compact(
            'totalPengaduan',
            'pengaduanAktif',
            'pengaduanSelesai',
            'pengaduan',
            'kategoris'
        ));
    }

    public function show($id)
    {
        $pengaduan = Pengaduan::with(['siswa', 'kategori', 'tanggapan.user'])->findOrFail($id);
        return view('admin.detail-pengaduan', compact('pengaduan'));
    }

    public function destroy($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->delete();

        return redirect()->route('admin.kelola-laporan')
            ->with('success', 'Pengaduan berhasil dihapus.');
    }

    public function destroyTanggapan($pengaduanId, $tanggapanId)
    {
        $tanggapan = Tanggapan::where('pengaduan_id', $pengaduanId)
            ->where('id', $tanggapanId)
            ->firstOrFail();
        
        $tanggapan->delete();

        return redirect()->route('admin.detail-pengaduan', $pengaduanId)
            ->with('success', 'Tanggapan berhasil dihapus.');
    }

    public function updateStatus($id, $status)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        
        if (!in_array($status, ['Menunggu', 'Diproses', 'Selesai'])) {
            return redirect()->route('admin.detail-pengaduan', $id)
                ->with('error', 'Status tidak valid.');
        }

        $pengaduan->status = $status;
        $pengaduan->save();

        return redirect()->route('admin.detail-pengaduan', $id)
            ->with('success', 'Status pengaduan berhasil diperbarui.');
    }
} 