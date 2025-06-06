<?php

namespace App\Http\Controllers\Kepsek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Kategori;
use App\Models\User;
use App\Models\Kelas;
use PDF;
use Excel;

class LaporanController extends Controller
{
    public function index()
    {
        $tahunAjaran = request('tahun_ajaran', date('Y').'/'.(date('Y') + 1));
        list($tahunMulai, $tahunSelesai) = explode('/', $tahunAjaran);

        $totalPengaduan = Pengaduan::whereYear('created_at', $tahunMulai)->count();
        $totalSiswa = User::where('role', 'siswa')->count();
        $totalGuruBk = User::where('role', 'guru_bk')->count();
        $totalWaliKelas = User::where('role', 'wali_kelas')->count();
        $kategoris = Kategori::all();

        return view('kepsek.laporan', compact(
            'totalPengaduan',
            'totalSiswa',
            'totalGuruBk',
            'totalWaliKelas',
            'kategoris'
        ));
    }

    public function downloadPengaduan(Request $request)
    {
        $tahunAjaran = $request->tahun_ajaran ?? date('Y').'/'.(date('Y') + 1);
        list($tahunMulai, $tahunSelesai) = explode('/', $tahunAjaran);
        $filename = str_replace('/', '-', $tahunAjaran);

        $query = Pengaduan::with(['siswa', 'kategori'])
            ->whereYear('pengaduan.created_at', $tahunMulai);

        if ($request->tanggal_mulai && $request->tanggal_selesai) {
            $query->whereBetween('pengaduan.created_at', [$request->tanggal_mulai, $request->tanggal_selesai]);
        }

        if ($request->kategori_id) {
            $query->where('kategori_id', $request->kategori_id);
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        $pengaduan = $query->get();

        $pdf = PDF::loadView('kepsek.laporan.pengaduan-pdf', [
            'pengaduan' => $pengaduan,
            'tahun_ajaran' => $tahunAjaran
        ]);

        return $pdf->download('laporan-pengaduan-'.$filename.'.pdf');
    }

    public function downloadKategori(Request $request)
    {
        $tahunAjaran = $request->tahun_ajaran ?? date('Y').'/'.(date('Y') + 1);
        list($tahunMulai, $tahunSelesai) = explode('/', $tahunAjaran);
        $filename = str_replace('/', '-', $tahunAjaran);

        $kategoris = Kategori::withCount(['pengaduan' => function($query) use ($tahunMulai) {
            $query->whereYear('pengaduan.created_at', $tahunMulai);
        }])->get();

        $pdf = PDF::loadView('kepsek.laporan.kategori-pdf', [
            'kategoris' => $kategoris,
            'tahun_ajaran' => $tahunAjaran
        ]);

        return $pdf->download('laporan-kategori-'.$filename.'.pdf');
    }

    public function downloadKelas(Request $request)
    {
        $tahunAjaran = $request->tahun_ajaran ?? date('Y').'/'.(date('Y') + 1);
        list($tahunMulai, $tahunSelesai) = explode('/', $tahunAjaran);
        $filename = str_replace('/', '-', $tahunAjaran);

        $kelas = Kelas::withCount(['siswa', 'pengaduan' => function($query) use ($tahunMulai) {
            $query->whereYear('pengaduan.created_at', $tahunMulai);
        }])->get();

        $pdf = PDF::loadView('kepsek.laporan.kelas-pdf', [
            'kelas' => $kelas,
            'tahun_ajaran' => $tahunAjaran
        ]);

        return $pdf->download('laporan-kelas-'.$filename.'.pdf');
    }

    public function downloadUser(Request $request)
    {
        $tahunAjaran = $request->tahun_ajaran ?? date('Y').'/'.(date('Y') + 1);
        list($tahunMulai, $tahunSelesai) = explode('/', $tahunAjaran);
        $filename = str_replace('/', '-', $tahunAjaran);

        $users = User::with(['kelas', 'pengaduan' => function($query) use ($tahunMulai) {
            $query->whereYear('pengaduan.created_at', $tahunMulai);
        }])->get();

        $pdf = PDF::loadView('kepsek.laporan.user-pdf', [
            'users' => $users,
            'tahun_ajaran' => $tahunAjaran
        ]);

        return $pdf->download('laporan-pengguna-'.$filename.'.pdf');
    }
} 