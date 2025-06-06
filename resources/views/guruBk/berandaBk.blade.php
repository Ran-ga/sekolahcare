<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - SekolahCare</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
            min-height: 100vh;
        }
        .navbar {
            background-color: #2e7d32;
        }
        .navbar-brand {
            color: white !important;
            font-weight: 600;
        }
        .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
        }
        .nav-link:hover {
            color: white !important;
        }
        .dashboard-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }
        .welcome-section {
            background-color: white;
            border-radius: 10px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .stats-card {
            background-color: white;
            border-radius: 10px;
            padding: 1.5rem;
            height: 100%;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
        .stats-card:hover {
            transform: translateY(-5px);
        }
        .stats-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            font-size: 1.5rem;
        }
        .stats-icon.pending {
            background-color: #fff3cd;
            color: #856404;
        }
        .stats-icon.progress {
            background-color: #cce5ff;
            color: #004085;
        }
        .stats-icon.completed {
            background-color: #d4edda;
            color: #155724;
        }
        .stats-icon.total {
            background-color: #e2e3e5;
            color: #383d41;
        }
        .recent-complaints {
            background-color: white;
            border-radius: 10px;
            padding: 1.5rem;
            margin-top: 2rem;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .complaint-card {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            transition: transform 0.2s;
        }
        .complaint-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .status-badge {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            border: 2px solid transparent;
        }
        .status-menunggu {
            background-color: #fff8e1;
            color: #ff8f00;
            border-color: #ffe082;
        }
        .status-diproses {
            background-color: #e3f2fd;
            color: #1976d2;
            border-color: #90caf9;
        }
        .status-selesai {
            background-color: #e8f5e9;
            color: #2e7d32;
            border-color: #a5d6a7;
        }
        .btn-primary {
            background-color: #2e7d32;
            border: none;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
        }
        .btn-primary:hover {
            background-color: #1b5e20;
        }
        .student-info {
            background-color: #f8f9fa;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            margin-bottom: 1rem;
        }
        .category-badge {
            background-color: #e8f5e9;
            color: #2e7d32;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 500;
        }
        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-top: 2rem;
        }
        .quick-action-card {
            background-color: white;
            border-radius: 10px;
            padding: 1.5rem;
            text-align: center;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            cursor: pointer;
            color: #000;
        }
        .quick-action-card:hover {
            transform: translateY(-5px);
            color: #000;
        }
        .quick-action-card h5 {
            color: #000;
            margin-top: 1rem;
        }
        .quick-action-card p {
            color: #000;
            opacity: 0.7;
        }
        .quick-action-icon {
            width: 60px;
            height: 60px;
            background-color: #e8f5e9;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.5rem;
            color: #2e7d32;
        }

        /* Mobile Optimizations */
        @media (max-width: 768px) {
            .dashboard-container {
                margin: 1rem auto;
                padding: 0 0.75rem;
            }
            
            .welcome-section {
                padding: 1.5rem;
                margin-bottom: 1.5rem;
                text-align: center;
            }
            
            .welcome-section h1 {
                font-size: 1.5rem;
                margin-bottom: 0.5rem;
            }
            
            .stats-card {
                padding: 1.25rem;
                text-align: center;
                margin-bottom: 1rem;
            }
            
            .stats-card h3 {
                font-size: 1.75rem;
                margin-bottom: 0.5rem;
            }
            
            .stats-icon {
                margin: 0 auto 1rem;
            }
            
            .quick-actions {
                grid-template-columns: repeat(2, 1fr);
                gap: 0.75rem;
                margin-top: 1.5rem;
            }
            
            .quick-action-card {
                padding: 1rem;
            }
            
            .quick-action-card h5 {
                font-size: 0.9rem;
                margin-top: 0.75rem;
                margin-bottom: 0.5rem;
            }
            
            .quick-action-card p {
                font-size: 0.8rem;
                margin-bottom: 0;
            }
            
            .quick-action-icon {
                width: 45px;
                height: 45px;
                font-size: 1.2rem;
                margin-bottom: 0.75rem;
            }
            
            .recent-complaints {
                padding: 1rem;
                margin-top: 1.5rem;
            }
            
            .recent-complaints h4 {
                font-size: 1.25rem;
                margin-bottom: 1rem;
            }
            
            .complaint-card {
                padding: 1rem;
                margin-bottom: 1rem;
            }
            
            .complaint-card h5 {
                font-size: 1rem;
                margin-bottom: 0.75rem;
                line-height: 1.3;
            }
            
            .complaint-card p {
                font-size: 0.9rem;
                line-height: 1.4;
            }
            
            .student-info {
                padding: 0.5rem 0.75rem;
                font-size: 0.9rem;
                margin-bottom: 0.75rem;
            }
            
            .status-badge {
                padding: 0.4rem 0.8rem;
                font-size: 0.8rem;
                gap: 0.3rem;
            }
            
            .category-badge {
                padding: 0.4rem 0.8rem;
                font-size: 0.8rem;
            }
            
            .btn-primary {
                padding: 0.6rem 1rem;
                font-size: 0.9rem;
                width: 100%;
            }
            
            /* Mobile specific layout adjustments */
            .d-flex.justify-content-between.align-items-start {
                flex-direction: column;
                align-items: flex-start !important;
                gap: 0.5rem;
            }
            
            .d-flex.justify-content-between.align-items-center.mb-3 {
                flex-direction: column;
                align-items: flex-start !important;
                gap: 0.5rem;
            }
            
            .navbar-nav {
                text-align: center;
                padding-top: 1rem;
            }
            
            .navbar-nav .nav-item {
                margin-bottom: 0.5rem;
            }
            
            .navbar-brand {
                font-size: 1.5rem;
            }
        }

        /* Extra small devices */
        @media (max-width: 576px) {
            .dashboard-container {
                padding: 0 0.5rem;
            }
            
            .welcome-section {
                padding: 1rem;
            }
            
            .welcome-section h1 {
                font-size: 1.3rem;
            }
            
            .stats-card {
                padding: 1rem;
            }
            
            .stats-card h3 {
                font-size: 1.5rem;
            }
            
            .quick-actions {
                grid-template-columns: 1fr;
                gap: 0.5rem;
            }
            
            .quick-action-card {
                padding: 0.75rem;
            }
            
            .quick-action-card h5 {
                font-size: 0.85rem;
            }
            
            .quick-action-card p {
                font-size: 0.75rem;
            }
            
            .quick-action-icon {
                width: 40px;
                height: 40px;
                font-size: 1.1rem;
            }
            
            .recent-complaints {
                padding: 0.75rem;
            }
            
            .complaint-card {
                padding: 0.75rem;
            }
            
            .status-badge {
                padding: 0.3rem 0.6rem;
                font-size: 0.75rem;
            }
            
            .category-badge {
                padding: 0.3rem 0.6rem;
                font-size: 0.75rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('guruBk.beranda') }}">SekolahCare</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('guruBk.beranda') }}"><i class="bi bi-house-door"></i> Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('guruBk.daftar-pengaduan') }}"><i class="bi bi-list-ul"></i> Daftar Pengaduan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('guruBk.profile') }}"><i class="bi bi-person-circle"></i> Profil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="dashboard-container">
        <!-- Welcome Section -->
        <div class="welcome-section">
            <h1>Selamat Datang, Pak Budi!</h1>
            <p>Guru BK</p>
        </div>

        <!-- Statistics Cards -->
        <div class="row g-4">
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-icon total">
                        <i class="bi bi-file-text"></i>
                    </div>
                    <h3>45</h3>
                    <p class="text-muted mb-0">Total Pengaduan</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-icon pending">
                        <i class="bi bi-clock"></i>
                    </div>
                    <h3>12</h3>
                    <p class="text-muted mb-0">Menunggu</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-icon progress">
                        <i class="bi bi-gear"></i>
                    </div>
                    <h3>8</h3>
                    <p class="text-muted mb-0">Diproses</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-icon completed">
                        <i class="bi bi-check-circle"></i>
                    </div>
                    <h3>25</h3>
                    <p class="text-muted mb-0">Selesai</p>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="quick-actions">
            <a href="#" class="quick-action-card text-decoration-none">
                <div class="quick-action-icon">
                    <i class="bi bi-list-check"></i>
                </div>
                <h5>Daftar Pengaduan</h5>
                <p class="text-muted mb-0">Lihat semua pengaduan</p>
            </a>
            <a href="#" class="quick-action-card text-decoration-none">
                <div class="quick-action-icon">
                    <i class="bi bi-clock-history"></i>
                </div>
                <h5>Pengaduan Menunggu</h5>
                <p class="text-muted mb-0">Lihat pengaduan yang menunggu</p>
            </a>
            <a href="#" class="quick-action-card text-decoration-none">
                <div class="quick-action-icon">
                    <i class="bi bi-gear-wide-connected"></i>
                </div>
                <h5>Pengaduan Diproses</h5>
                <p class="text-muted mb-0">Lihat pengaduan yang sedang diproses</p>
            </a>
            <a href="#" class="quick-action-card text-decoration-none">
                <div class="quick-action-icon">
                    <i class="bi bi-check-circle-fill"></i>
                </div>
                <h5>Pengaduan Selesai</h5>
                <p class="text-muted mb-0">Lihat pengaduan yang sudah selesai</p>
            </a>
        </div>

        <!-- Recent Complaints -->
        <div class="recent-complaints">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0">Pengaduan Terbaru</h4>
                <a href="{{ route('guruBk.daftar-pengaduan') }}" class="btn btn-link text-decoration-none">Lihat Semua</a>
            </div>

            @forelse($pengaduanTerbaru as $pengaduan)
                <div class="complaint-card">
                    <div class="student-info">
                        <i class="bi bi-person"></i> {{ $pengaduan->siswa->name }} - {{ $pengaduan->siswa->kelas->nama_kelas }}
                    </div>
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h5 class="mb-0">{{ $pengaduan->judul }}</h5>
                        <span class="status-badge status-{{ strtolower($pengaduan->status) }}">
                            @if($pengaduan->status == 'Menunggu')
                                <i class="bi bi-clock-history"></i>
                            @elseif($pengaduan->status == 'Diproses')
                                <i class="bi bi-gear-wide-connected"></i>
                            @else
                                <i class="bi bi-check-circle-fill"></i>
                            @endif
                            {{ $pengaduan->status }}
                        </span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="category-badge">{{ $pengaduan->kategori->nama_kategori }}</span>
                        <small class="text-muted">{{ $pengaduan->created_at->format('d M Y') }}</small>
                    </div>
                    <p class="mb-3">{{ Str::limit($pengaduan->isi_pengaduan, 150) }}</p>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('guruBk.detail-pengaduan', $pengaduan->id) }}" class="btn btn-primary">
                            <i class="bi bi-eye"></i> Lihat Detail
                        </a>
                    </div>
                </div>
            @empty
                <div class="alert alert-info">
                    <i class="bi bi-info-circle me-2"></i> Belum ada pengaduan terbaru.
                </div>
            @endforelse
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>