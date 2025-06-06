<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda Wali Kelas - SekolahCare</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #388e3c;
            --primary-light: #e8f5e9;
            --primary-dark: #2e7d32;
        }
        
        body {
            background-color: #f8f9fa;
            min-height: 100vh;
        }

        .navbar {
            background-color: var(--primary-color);
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            color: white !important;
            font-weight: 600;
            font-size: 1.5rem;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .nav-link:hover, .nav-link.active {
            color: white !important;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .dashboard-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .welcome-section {
            background-color: white;
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .class-info {
            background-color: var(--primary-light);
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .stats-card {
            background-color: white;
            border-radius: 15px;
            padding: 1.5rem;
            height: 100%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }

        .stats-card:hover {
            transform: translateY(-5px);
        }

        .stats-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            font-size: 1.75rem;
        }

        .stats-icon.total { background-color: var(--primary-light); color: var(--primary-color); }
        .stats-icon.pending { background-color: #fff3cd; color: #856404; }
        .stats-icon.progress { background-color: #cce5ff; color: #004085; }
        .stats-icon.completed { background-color: #d4edda; color: #155724; }

        .recent-complaints {
            background-color: white;
            border-radius: 15px;
            padding: 1.5rem;
            margin-top: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .complaint-card {
            border: 1px solid #e0e0e0;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
        }

        .complaint-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
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
            background-color: var(--primary-color);
            border: none;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
        }

        .student-info {
            background-color: #f8f9fa;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            font-size: 0.95rem;
        }

        .category-badge {
            background-color: var(--primary-light);
            color: var(--primary-color);
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
            border-radius: 15px;
            padding: 1.5rem;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
            cursor: pointer;
            color: #000;
            text-decoration: none;
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
            background-color: var(--primary-light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.5rem;
            color: var(--primary-color);
        }

        .section-title {
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        .info-item {
            display: flex;
            align-items: center;
            margin-bottom: 0.75rem;
        }

        .info-item i {
            margin-right: 0.75rem;
            color: var(--primary-color);
        }

        /* Mobile Responsive Styles */
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

            .class-info {
                padding: 1.25rem;
                margin-bottom: 1.5rem;
            }

            .class-info .row {
                gap: 1rem;
            }

            .class-info .col-md-4 {
                width: 100%;
            }

            .info-item {
                background: white;
                padding: 1rem;
                border-radius: 10px;
                margin-bottom: 0.5rem;
                box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            }

            .section-title {
                font-size: 1.25rem;
                margin-bottom: 1rem;
            }

            .stats-card {
                padding: 1.25rem;
                text-align: center;
                margin-bottom: 0.5rem;
            }

            .stats-icon {
                margin: 0 auto 0.75rem;
                width: 50px;
                height: 50px;
                font-size: 1.5rem;
            }

            .stats-card h3 {
                font-size: 1.75rem;
                margin-bottom: 0.5rem;
            }

            .quick-actions {
                grid-template-columns: repeat(2, 1fr);
                gap: 0.75rem;
                margin-top: 1.5rem;
            }

            .quick-action-card {
                padding: 1rem;
            }

            .quick-action-icon {
                width: 45px;
                height: 45px;
                font-size: 1.25rem;
                margin-bottom: 0.75rem;
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

            .recent-complaints {
                padding: 1rem;
                margin-top: 1.5rem;
            }

            .recent-complaints h4 {
                font-size: 1.25rem;
            }

            .complaint-card {
                padding: 1rem;
            }

            .complaint-card .student-info {
                padding: 0.5rem 0.75rem;
                font-size: 0.9rem;
            }

            .complaint-card h5 {
                font-size: 1rem;
                line-height: 1.3;
            }

            .complaint-header-mobile {
                flex-direction: column;
                align-items: flex-start !important;
                gap: 0.5rem;
            }

            .status-badge {
                padding: 0.4rem 0.8rem;
                font-size: 0.8rem;
            }

            .category-badge {
                padding: 0.4rem 0.8rem;
                font-size: 0.8rem;
            }

            .complaint-footer-mobile {
                flex-direction: column;
                gap: 0.75rem;
                align-items: stretch !important;
            }

            .complaint-footer-mobile .btn {
                width: 100%;
            }

            /* Navbar mobile optimization */
            .navbar-nav {
                text-align: center;
                padding-top: 1rem;
            }

            .navbar-nav .nav-item {
                margin: 0.25rem 0;
            }

            .navbar-brand {
                font-size: 1.25rem;
            }

            /* Alert mobile optimization */
            .alert {
                padding: 0.75rem;
                font-size: 0.9rem;
            }

            .alert i {
                font-size: 1.1rem;
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
                        <a class="nav-link active" href="{{ route('waliKelas.beranda') }}"><i class="bi bi-house-door"></i> Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('waliKelas.daftar-pengaduan') }}"><i class="bi bi-list-ul"></i> Daftar Pengaduan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('waliKelas.profile') }}"><i class="bi bi-person-circle"></i> Profil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="dashboard-container">
        <!-- Welcome Section -->
        <div class="welcome-section">
            <h1>Selamat Datang, {{ $user->name }}!</h1>
            <p>Wali Kelas {{ $user->kelas->nama ?? '-' }}</p>
        </div>

        <!-- Class Information -->
        <div class="class-info">
            <h4 class="section-title"><i class="bi bi-people-fill"></i> Informasi Kelas</h4>
            <div class="row">
                <div class="col-md-4">
                    <div class="info-item">
                        <i class="bi bi-mortarboard-fill"></i>
                        <div>
                            <strong>Nama Kelas</strong>
                            <p class="mb-0">{{ $user->kelas->nama ?? '-' }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-item">
                        <i class="bi bi-person-fill"></i>
                        <div>
                            <strong>Jumlah Siswa</strong>
                            <p class="mb-0">{{ $jumlahSiswa ?? 0 }} Siswa</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-item">
                        <i class="bi bi-book-fill"></i>
                        <div>
                            <strong>Wali Kelas</strong>
                            <p class="mb-0">{{ $user->name }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="row g-4">
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-icon total">
                        <i class="bi bi-file-text"></i>
                    </div>
                    <h3>{{ $totalPengaduan }}</h3>
                    <p class="text-muted mb-0">Total Pengaduan</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-icon pending">
                        <i class="bi bi-clock"></i>
                    </div>
                    <h3>{{ $pengaduanMenunggu }}</h3>
                    <p class="text-muted mb-0">Menunggu</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-icon progress">
                        <i class="bi bi-gear"></i>
                    </div>
                    <h3>{{ $pengaduanDiproses }}</h3>
                    <p class="text-muted mb-0">Diproses</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-icon completed">
                        <i class="bi bi-check-circle"></i>
                    </div>
                    <h3>{{ $pengaduanSelesai }}</h3>
                    <p class="text-muted mb-0">Selesai</p>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="quick-actions">
            <a href="{{ route('waliKelas.daftar-pengaduan') }}" class="quick-action-card">
                <div class="quick-action-icon">
                    <i class="bi bi-list-check"></i>
                </div>
                <h5>Daftar Pengaduan</h5>
                <p class="text-muted mb-0">Lihat semua pengaduan</p>
            </a>
            <a href="{{ route('waliKelas.daftar-pengaduan', ['status' => 'Menunggu']) }}" class="quick-action-card">
                <div class="quick-action-icon">
                    <i class="bi bi-clock-history"></i>
                </div>
                <h5>Pengaduan Menunggu</h5>
                <p class="text-muted mb-0">Lihat pengaduan yang menunggu</p>
            </a>
            <a href="{{ route('waliKelas.daftar-pengaduan', ['status' => 'Diproses']) }}" class="quick-action-card">
                <div class="quick-action-icon">
                    <i class="bi bi-gear-wide-connected"></i>
                </div>
                <h5>Pengaduan Diproses</h5>
                <p class="text-muted mb-0">Lihat pengaduan yang sedang diproses</p>
            </a>
            <a href="{{ route('waliKelas.daftar-pengaduan', ['status' => 'Selesai']) }}" class="quick-action-card">
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
                <h4 class="mb-0">Pengaduan Terbaru dari {{ $user->kelas->nama ?? 'Kelas Saya' }}</h4>
                <a href="{{ route('waliKelas.daftar-pengaduan') }}" class="btn btn-link text-decoration-none">Lihat Semua</a>
            </div>

            @forelse($pengaduanTerbaru as $pengaduan)
                <div class="complaint-card">
                    <div class="student-info">
                        <i class="bi bi-person"></i> {{ $pengaduan->siswa->name }}
                    </div>
                    <div class="d-flex justify-content-between align-items-start mb-2 complaint-header-mobile">
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
                    <div class="d-flex justify-content-end complaint-footer-mobile">
                        <a href="{{ route('waliKelas.detail-pengaduan', $pengaduan->id) }}" class="btn btn-primary">
                            <i class="bi bi-eye"></i> Lihat Detail
                        </a>
                    </div>
                </div>
            @empty
                <div class="alert alert-info">
                    <i class="bi bi-info-circle me-2"></i> Belum ada pengaduan yang tersedia.
                </div>
            @endforelse
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
