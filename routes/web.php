<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Register Routes
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

// Public Routes
Route::get('/', function () {
    return view('welcome');
});

// Protected Routes
Route::middleware(['auth'])->group(function () {
    // Routes untuk Siswa
    Route::prefix('siswa')->name('siswa.')->group(function () {
        Route::get('/beranda', [App\Http\Controllers\Siswa\BerandaController::class, 'index'])->name('beranda');

        Route::get('/profile', [App\Http\Controllers\Siswa\ProfileController::class, 'index'])->name('profile');
        Route::get('/profile/edit', [App\Http\Controllers\Siswa\ProfileController::class, 'edit'])->name('profile.edit');
        Route::post('/profile/update-password', [App\Http\Controllers\Siswa\ProfileController::class, 'updatePassword'])->name('profile.update-password');

        Route::get('/pengaduan', [App\Http\Controllers\Siswa\PengaduanController::class, 'create'])->name('pengaduan');
        Route::post('/pengaduan', [App\Http\Controllers\Siswa\PengaduanController::class, 'store'])->name('pengaduan.store');

        Route::get('/list-pengaduan', [App\Http\Controllers\Siswa\ListPengaduanController::class, 'index'])->name('list-pengaduan');

        Route::get('/detail-pengaduan/{id}', [App\Http\Controllers\Siswa\DetailPengaduanController::class, 'show'])->name('detail-pengaduan');
        Route::post('/tanggapan/{id}', [App\Http\Controllers\Siswa\DetailPengaduanController::class, 'storeTanggapan'])->name('tanggapan.store');
        Route::delete('/pengaduan/{id}', [App\Http\Controllers\Siswa\DetailPengaduanController::class, 'destroy'])->name('pengaduan.destroy');
    });

    // Routes untuk Guru BK
    Route::prefix('guruBk')->name('guruBk.')->group(function () {
        Route::get('/beranda', [App\Http\Controllers\GuruBk\BerandaController::class, 'index'])->name('beranda');

        Route::get('/profile', [App\Http\Controllers\GuruBk\ProfileController::class, 'index'])->name('profile');
        Route::get('/profile/edit', [App\Http\Controllers\GuruBk\ProfileController::class, 'edit'])->name('profile.edit');
        Route::post('/profile/update-password', [App\Http\Controllers\GuruBk\ProfileController::class, 'updatePassword'])->name('profile.update-password');

        Route::get('/daftar-pengaduan', [App\Http\Controllers\GuruBk\PengaduanController::class, 'index'])->name('daftar-pengaduan');

        Route::get('/detail-pengaduan/{id}', [App\Http\Controllers\GuruBk\PengaduanController::class, 'show'])->name('detail-pengaduan');
        
        Route::post('/tanggapan/{id}', [App\Http\Controllers\GuruBk\PengaduanController::class, 'storeTanggapan'])->name('tanggapan.store');
        
        Route::get('/pengaduan/{id}/update-status/{status}', [App\Http\Controllers\GuruBk\PengaduanController::class, 'updateStatus'])->name('pengaduan.update-status');
    });

    // Admin Routes
    Route::prefix('admin')->name('admin.')->group(function () {
        // Dashboard
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        
        // Profile
        Route::get('/profile', [App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('profile');
        
        // User Management
        Route::get('/kelola-pengguna', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('kelola-pengguna');
        Route::delete('/kelola-pengguna/{user}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('kelola-pengguna.destroy');
        Route::get('/kelola-pengguna/{user}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('kelola-pengguna.edit');
        Route::put('/kelola-pengguna/{user}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('kelola-pengguna.update');
        
        // Report Management
        Route::get('/kelola-laporan', [App\Http\Controllers\Admin\PengaduanController::class, 'index'])->name('kelola-laporan');
        Route::get('/kelola-laporan/{id}', [App\Http\Controllers\Admin\PengaduanController::class, 'show'])->name('detail-pengaduan');
        Route::delete('/kelola-laporan/{id}', [App\Http\Controllers\Admin\PengaduanController::class, 'destroy'])->name('kelola-laporan.destroy');
        Route::delete('/kelola-laporan/{pengaduanId}/tanggapan/{tanggapanId}', [App\Http\Controllers\Admin\PengaduanController::class, 'destroyTanggapan'])->name('kelola-laporan.tanggapan.destroy');
        Route::get('/kelola-laporan/{id}/update-status/{status}', [App\Http\Controllers\Admin\PengaduanController::class, 'updateStatus'])->name('kelola-laporan.update-status');
        
        // Category Management
        Route::get('/kategori', [App\Http\Controllers\Admin\KategoriController::class, 'index'])->name('kategori');
        Route::post('/kategori', [App\Http\Controllers\Admin\KategoriController::class, 'store'])->name('kategori.store');
        Route::put('/kategori/{kategori}', [App\Http\Controllers\Admin\KategoriController::class, 'update'])->name('kategori.update');
        Route::delete('/kategori/{kategori}', [App\Http\Controllers\Admin\KategoriController::class, 'destroy'])->name('kategori.destroy');
        
        // Activity Log
        Route::get('/log-aktivitas', function () {
            return view('admin.log-aktivitas');
        })->name('log-aktivitas');
    });

    // Routes untuk Wali Kelas
    Route::prefix('waliKelas')->name('waliKelas.')->group(function () {
        Route::get('/beranda', [App\Http\Controllers\WaliKelas\BerandaController::class, 'index'])->name('beranda');

        Route::get('/profile', [App\Http\Controllers\WaliKelas\ProfileController::class, 'index'])->name('profile');
        Route::get('/profile/edit', [App\Http\Controllers\WaliKelas\ProfileController::class, 'edit'])->name('profile.edit');
        Route::post('/profile/update-password', [App\Http\Controllers\WaliKelas\ProfileController::class, 'updatePassword'])->name('profile.update-password');

        Route::get('/daftar-pengaduan', [App\Http\Controllers\WaliKelas\PengaduanController::class, 'index'])->name('daftar-pengaduan');

        Route::get('/detail-pengaduan/{id}', [App\Http\Controllers\WaliKelas\PengaduanController::class, 'show'])->name('detail-pengaduan');
        
        Route::post('/tanggapan/{id}', [App\Http\Controllers\WaliKelas\PengaduanController::class, 'storeTanggapan'])->name('tanggapan.store');
        
        Route::get('/pengaduan/{id}/update-status/{status}', [App\Http\Controllers\WaliKelas\PengaduanController::class, 'updateStatus'])->name('pengaduan.update-status');
    });

    // Routes untuk Kepala Sekolah
    Route::prefix('kepsek')->name('kepsek.')->group(function () {
        Route::get('/beranda', [App\Http\Controllers\Kepsek\BerandaController::class, 'index'])->name('beranda');

        Route::get('/profile', [App\Http\Controllers\Kepsek\ProfileController::class, 'index'])->name('profile');
        Route::get('/profile/edit', [App\Http\Controllers\Kepsek\ProfileController::class, 'edit'])->name('profile.edit');
        Route::post('/profile/update-password', [App\Http\Controllers\Kepsek\ProfileController::class, 'updatePassword'])->name('profile.update-password');

        Route::get('/daftar-pengaduan', [App\Http\Controllers\Kepsek\PengaduanController::class, 'index'])->name('daftar-pengaduan');
        
        Route::get('/detail-pengaduan/{id}', [App\Http\Controllers\Kepsek\PengaduanController::class, 'show'])->name('detail-pengaduan');
        
        Route::post('/tanggapan/{id}', [App\Http\Controllers\Kepsek\PengaduanController::class, 'storeTanggapan'])->name('tanggapan.store');
        
        Route::get('/pengaduan/{id}/update-status/{status}', [App\Http\Controllers\Kepsek\PengaduanController::class, 'updateStatus'])->name('pengaduan.update-status');

        Route::get('/analisis', [App\Http\Controllers\Kepsek\AnalisisController::class, 'index'])->name('analisis');

        // Laporan Routes
        Route::get('/laporan', [App\Http\Controllers\Kepsek\LaporanController::class, 'index'])->name('laporan');
        Route::get('/laporan/pengaduan', [App\Http\Controllers\Kepsek\LaporanController::class, 'downloadPengaduan'])->name('laporan.pengaduan');
        Route::get('/laporan/kategori', [App\Http\Controllers\Kepsek\LaporanController::class, 'downloadKategori'])->name('laporan.kategori');
        Route::get('/laporan/kelas', [App\Http\Controllers\Kepsek\LaporanController::class, 'downloadKelas'])->name('laporan.kelas');
        Route::get('/laporan/user', [App\Http\Controllers\Kepsek\LaporanController::class, 'downloadUser'])->name('laporan.user');
    });
});
