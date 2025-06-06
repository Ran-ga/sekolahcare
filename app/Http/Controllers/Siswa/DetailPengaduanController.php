<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Tanggapan;

class DetailPengaduanController extends Controller
{
    public function show($id)
    {
        $pengaduan = Pengaduan::with(['kategori', 'siswa.kelas', 'tanggapan.user'])
            ->findOrFail($id);

        return view('siswa.detail-pengaduan', compact('pengaduan'));
    }

    public function storeTanggapan(Request $request, $id)
    {
        $request->validate([
            'tanggapan' => 'required|string'
        ]);

        $pengaduan = Pengaduan::findOrFail($id);

        Tanggapan::create([
            'pengaduan_id' => $pengaduan->id,
            'user_id' => auth()->id(),
            'tanggapan' => $request->tanggapan
        ]);

        return redirect()->back()->with('success', 'Tanggapan berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        
        // Cek apakah pengaduan milik siswa yang sedang login
        if ($pengaduan->siswa_id !== auth()->id()) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses untuk menghapus pengaduan ini');
        }

        // Hapus semua tanggapan terkait
        $pengaduan->tanggapan()->delete();
        
        // Hapus pengaduan
        $pengaduan->delete();

        return redirect()->route('siswa.list-pengaduan')->with('success', 'Pengaduan berhasil dihapus');
    }
} 