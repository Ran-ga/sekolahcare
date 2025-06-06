<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::withCount('pengaduan')->get();
        return view('admin.kategori', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategori'
        ]);

        Kategori::create($request->all());

        return redirect()->route('admin.kategori')
            ->with('success', 'Kategori berhasil ditambahkan');
    }

    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:kategori,nama_kategori,' . $kategori->id
        ]);

        $kategori->update($request->all());

        return redirect()->route('admin.kategori')
            ->with('success', 'Kategori berhasil diperbarui');
    }

    public function destroy(Kategori $kategori)
    {
        // Find or create the 'Lainnya' kategori
        $lainnya = Kategori::firstOrCreate(
            ['nama_kategori' => 'Lainnya'],
            ['nama_kategori' => 'Lainnya']
        );

        // Reassign all pengaduan to 'Lainnya'
        $kategori->pengaduan()->update(['kategori_id' => $lainnya->id]);

        // Delete the kategori
        $kategori->delete();

        return redirect()->route('admin.kategori')
            ->with('success', 'Kategori berhasil dihapus dan pengaduan terkait dipindahkan ke kategori Lainnya');
    }
} 