<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Pengaduan;
use App\Models\Kategori;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PengaduanController extends Controller
{
    public function create()
    {
        $kategoris = Kategori::all();
        return view('siswa.pengaduan', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:200',
            'kategori_id' => 'required|exists:kategori,id',
            'isi_pengaduan' => 'required|string',
            'foto_pendukung' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        $pengaduan = new Pengaduan();
        $pengaduan->siswa_id = Auth::id();
        $pengaduan->judul = $request->judul;
        $pengaduan->kategori_id = $request->kategori_id;
        $pengaduan->isi_pengaduan = $request->isi_pengaduan;
        $pengaduan->status = 'Menunggu';

        if ($request->hasFile('foto_pendukung')) {
            $foto = $request->file('foto_pendukung');
            $nama_foto = time() . '_' . $foto->getClientOriginalName();
            
            // Buat instance Image dari file yang diupload
            $manager = new ImageManager(new Driver());
            $image = $manager->read($foto);
            
            // Dapatkan dimensi asli
            $width = $image->width();
            $height = $image->height();
            
            // Tentukan dimensi maksimum
            $maxWidth = 800;
            $maxHeight = 800;
            
            // Hitung rasio aspek
            $ratio = min($maxWidth / $width, $maxHeight / $height);
            
            // Hitung dimensi baru
            $newWidth = round($width * $ratio);
            $newHeight = round($height * $ratio);
            
            // Resize gambar dengan dimensi baru
            $image->resize($newWidth, $newHeight);
            
            // Kompres gambar dengan kualitas 80%
            $image->toJpeg(80);
            
            // Simpan gambar yang sudah dikompres
            Storage::disk('public')->put('pengaduan/' . $nama_foto, $image->toJpeg());
            
            $pengaduan->foto_pendukung = 'pengaduan/' . $nama_foto;
        }

        $pengaduan->save();

        return redirect()->route('siswa.list-pengaduan')
            ->with('success', 'Pengaduan berhasil dikirim');
    }
} 