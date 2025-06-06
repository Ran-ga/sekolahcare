<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pengaduan;
use App\Models\Kategori;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Get total users count
        $totalUsers = User::count();
        
        // Get active complaints count
        $activeComplaints = Pengaduan::whereIn('status', ['Menunggu', 'Diproses'])->count();
        
        // Get completed complaints this month
        $completedThisMonth = Pengaduan::where('status', 'Selesai')
            ->whereMonth('created_at', Carbon::now()->month)
            ->count();
            
        // Get recent users
        $recentUsers = User::with('kelas')
            ->latest()
            ->take(3)
            ->get();
            
        // Get recent complaints
        $recentComplaints = Pengaduan::with(['siswa', 'kategori'])
            ->latest()
            ->take(3)
            ->get();
            
        // Get categories with active complaints count
        $categories = Kategori::withCount(['pengaduan' => function($query) {
            $query->whereIn('status', ['Menunggu', 'Diproses']);
        }])->take(3)->get();
        
        // Get additional statistics for the chart
        $totalComplaints = Pengaduan::count();
        $completedComplaints = Pengaduan::where('status', 'Selesai')->count();
        
        // Get monthly statistics for the chart
        $monthlyStats = $this->getMonthlyStats();
        
        // Get category distribution for the chart
        $categoryDistribution = $this->getCategoryDistribution();

        return view('admin.dashboard', compact(
            'totalUsers',
            'activeComplaints',
            'completedThisMonth',
            'recentUsers',
            'recentComplaints',
            'categories',
            'monthlyStats',
            'categoryDistribution',
            'totalComplaints',
            'completedComplaints'
        ));
    }

    private function getMonthlyStats()
    {
        $months = collect(range(0, 5))->map(function($i) {
            return Carbon::now()->subMonths($i)->format('M');
        })->reverse();

        $incomingComplaints = collect(range(0, 5))->map(function($i) {
            return Pengaduan::whereMonth('created_at', Carbon::now()->subMonths($i)->month)
                ->whereYear('created_at', Carbon::now()->subMonths($i)->year)
                ->count();
        })->reverse();

        $completedComplaints = collect(range(0, 5))->map(function($i) {
            return Pengaduan::where('status', 'Selesai')
                ->whereMonth('created_at', Carbon::now()->subMonths($i)->month)
                ->whereYear('created_at', Carbon::now()->subMonths($i)->year)
                ->count();
        })->reverse();

        return [
            'labels' => $months,
            'incoming' => $incomingComplaints,
            'completed' => $completedComplaints
        ];
    }

    private function getCategoryDistribution()
    {
        $categories = Kategori::withCount('pengaduan')->get();
        
        return [
            'labels' => $categories->pluck('nama_kategori'),
            'data' => $categories->pluck('pengaduan_count')
        ];
    }
} 