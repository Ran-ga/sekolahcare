<?php

namespace App\Http\Controllers\Kepsek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AnalisisController extends Controller
{
    public function index(Request $request)
    {
        // Get selected academic year or default to current
        $selectedYear = $request->get('tahun_ajaran', $this->getCurrentAcademicYear());
        
        // Calculate academic year date range
        $startDate = Carbon::createFromFormat('Y', explode('/', $selectedYear)[0])->setMonth(7)->setDay(20);
        $endDate = $startDate->copy()->addYear()->subDay();

        // Get total complaints by status for selected year
        $statusData = Pengaduan::select('status', DB::raw('count(*) as total'))
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('status')
            ->get();

        // Get complaints by month for the selected year
        $monthlyData = Pengaduan::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('YEAR(created_at) as year'),
            DB::raw('count(*) as total')
        )
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        // Get complaints by category for selected year
        $categoryData = Pengaduan::join('kategori', 'pengaduan.kategori_id', '=', 'kategori.id')
            ->select('kategori.nama_kategori as kategori', DB::raw('count(*) as total'))
            ->whereBetween('pengaduan.created_at', [$startDate, $endDate])
            ->groupBy('kategori.nama_kategori')
            ->get();

        // Get complaints by class for selected year
        $classData = Pengaduan::join('users', 'pengaduan.siswa_id', '=', 'users.id')
            ->join('kelas', 'users.kelas_id', '=', 'kelas.id')
            ->select('kelas.nama as kelas', DB::raw('count(*) as total'))
            ->whereBetween('pengaduan.created_at', [$startDate, $endDate])
            ->groupBy('kelas.nama')
            ->orderBy('total', 'desc')
            ->get();

        // Get top complaining students for selected year
        $topStudents = Pengaduan::join('users', 'pengaduan.siswa_id', '=', 'users.id')
            ->join('kelas', 'users.kelas_id', '=', 'kelas.id')
            ->select(
                'users.name as nama',
                'kelas.nama as kelas',
                DB::raw('count(*) as total_pengaduan')
            )
            ->whereBetween('pengaduan.created_at', [$startDate, $endDate])
            ->groupBy('users.id', 'users.name', 'kelas.nama')
            ->orderBy('total_pengaduan', 'desc')
            ->limit(5)
            ->get();

        // Get top responding teachers for selected year
        $topTeachers = DB::table('tanggapan')
            ->join('users', 'tanggapan.user_id', '=', 'users.id')
            ->select(
                'users.name as nama',
                'users.role as peran',
                DB::raw('count(*) as total_tanggapan')
            )
            ->whereIn('users.role', ['guru_bk', 'wali_kelas'])
            ->whereBetween('tanggapan.created_at', [$startDate, $endDate])
            ->groupBy('users.id', 'users.name', 'users.role')
            ->orderBy('total_tanggapan', 'desc')
            ->limit(5)
            ->get();

        // Get user statistics for selected year
        $userStats = [
            'total' => User::count(),
            'siswa' => User::where('role', 'siswa')->count(),
            'guru_bk' => User::where('role', 'guru_bk')->count(),
            'wali_kelas' => User::where('role', 'wali_kelas')->count(),
        ];

        // Get average response time for selected year
        $avgResponseTime = DB::table('pengaduan')
            ->join('tanggapan', 'pengaduan.id', '=', 'tanggapan.pengaduan_id')
            ->select(DB::raw('AVG(TIMESTAMPDIFF(HOUR, pengaduan.created_at, tanggapan.created_at)) as avg_hours'))
            ->whereBetween('pengaduan.created_at', [$startDate, $endDate])
            ->first()
            ->avg_hours;

        // Get academic year options
        $academicYears = $this->getAcademicYearOptions();

        return view('kepsek.analisis', compact(
            'statusData',
            'monthlyData',
            'categoryData',
            'userStats',
            'avgResponseTime',
            'classData',
            'topStudents',
            'topTeachers',
            'academicYears',
            'selectedYear'
        ));
    }

    private function getCurrentAcademicYear()
    {
        $now = Carbon::now();
        $year = $now->year;
        
        // If current date is before July 20, use previous year
        if ($now->month < 7 || ($now->month == 7 && $now->day < 20)) {
            $year--;
        }
        
        return $year . '/' . ($year + 1);
    }

    private function getAcademicYearOptions()
    {
        $currentYear = Carbon::now()->year;
        $options = [];
        
        // Generate options from 2023/2024 to 2026/2027
        for ($year = 2023; $year <= 2026; $year++) {
            $options[] = $year . '/' . ($year + 1);
        }
        
        return $options;
    }
} 