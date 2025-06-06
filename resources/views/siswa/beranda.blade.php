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
            background-color: #1a73e8;
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
        .welcome-card {
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
        .complaint-item {
            padding: 1rem;
            border-bottom: 1px solid #e9ecef;
        }
        .complaint-item:last-child {
            border-bottom: none;
        }
        .status-badge {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 500;
        }
        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }
        .status-progress {
            background-color: #cce5ff;
            color: #004085;
        }
        .status-completed {
            background-color: #d4edda;
            color: #155724;
        }
        .btn-create {
            background-color: #1a73e8;
            border: none;
            padding: 0.75rem 2rem;
            font-weight: 500;
        }
        .btn-create:hover {
            background-color: #1557b0;
        }

        /* Mobile Responsive Styles */
        @media (max-width: 768px) {
            .dashboard-container {
                margin: 1rem auto;
                padding: 0 0.5rem;
            }
            
            .welcome-card {
                padding: 1.5rem;
                margin-bottom: 1rem;
            }
            
            .welcome-card .d-flex {
                flex-direction: column;
                gap: 1rem;
            }
            
            .welcome-card h2 {
                font-size: 1.5rem;
            }
            
            .btn-create {
                width: 100%;
                text-align: center;
            }
            
            .stats-card {
                margin-bottom: 1rem;
            }
            
            .stats-card h3 {
                font-size: 1.5rem;
            }
            
            .recent-complaints {
                padding: 1rem;
                margin-top: 1rem;
            }
            
            .recent-complaints .card {
                margin-bottom: 1rem;
            }
            
            .recent-complaints .card-body {
                padding: 1rem;
            }
            
            .recent-complaints .card-title {
                font-size: 1rem;
            }
            
            .recent-complaints .card-text {
                font-size: 0.875rem;
            }
            
            .navbar .container {
                padding: 0.5rem 1rem;
            }
            
            .navbar-brand {
                font-size: 1.25rem;
            }
            
            .nav-link {
                padding: 0.5rem 1rem;
            }
            
            .nav-link i {
                margin-right: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">SekolahCare</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('siswa.beranda') }}"><i class="bi bi-house-door"></i> Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('siswa.pengaduan') }}"><i class="bi bi-plus-circle"></i> Buat Pengaduan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('siswa.list-pengaduan') }}"><i class="bi bi-list-ul"></i> Riwayat Pengaduan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('siswa.profile') }}"><i class="bi bi-person-circle"></i> Profil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="dashboard-container">
        <!-- Welcome Section -->
        <div class="welcome-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2>Selamat Datang, {{ auth()->user()->name }}!</h2>
                    <p class="text-muted mb-0">Apa yang bisa kami bantu hari ini?</p>
                </div>
                <a href="{{ route('siswa.pengaduan') }}" class="btn btn-primary btn-create">
                    <i class="bi bi-plus-circle"></i> Buat Pengaduan Baru
                </a>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="row g-4">
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-icon total">
                        <i class="bi bi-file-text"></i>
                    </div>
                    <h3>{{ $total_pengaduan }}</h3>
                    <p class="text-muted mb-0">Total Pengaduan</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-icon pending">
                        <i class="bi bi-clock"></i>
                    </div>
                    <h3>{{ $pengaduan_menunggu }}</h3>
                    <p class="text-muted mb-0">Menunggu</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-icon progress">
                        <i class="bi bi-gear"></i>
                    </div>
                    <h3>{{ $pengaduan_diproses }}</h3>
                    <p class="text-muted mb-0">Diproses</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-icon completed">
                        <i class="bi bi-check-circle"></i>
                    </div>
                    <h3>{{ $pengaduan_selesai }}</h3>
                    <p class="text-muted mb-0">Selesai</p>
                </div>
            </div>
        </div>

        <!-- Recent Complaints Section -->
        <div class="recent-complaints mt-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Pengaduan Terbaru</h5>
                <a href="{{ route('siswa.list-pengaduan') }}" class="btn btn-outline-primary btn-sm d-flex align-items-center gap-2">
                    <span>Lihat Semua</span>
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
            <div class="row g-3">
                @forelse($pengaduan_terbaru as $pengaduan)
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <span class="badge bg-{{ $pengaduan->status == 'Menunggu' ? 'warning' : ($pengaduan->status == 'Diproses' ? 'info' : 'success') }}">
                                        {{ $pengaduan->status }}
                                    </span>
                                    <small class="text-muted">{{ $pengaduan->created_at->diffForHumans() }}</small>
                                </div>
                                <h6 class="card-title mb-2 text-truncate">{{ $pengaduan->judul }}</h6>
                                <p class="card-text small text-muted mb-3">{{ Str::limit($pengaduan->isi_pengaduan, 100) }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="badge bg-light text-dark">
                                        <i class="bi bi-tag me-1"></i>
                                        {{ $pengaduan->kategori->nama_kategori }}
                                    </span>
                                    <a href="{{ route('siswa.detail-pengaduan', $pengaduan->id) }}" class="btn btn-link btn-sm p-0 text-primary">
                                        Lihat Detail <i class="bi bi-arrow-right ms-1"></i>
                                    </a>
                                </div>
                </div>
            </div>
                </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info mb-0">
                            <i class="bi bi-info-circle me-2"></i> Belum ada pengaduan yang dibuat.
            </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html> 