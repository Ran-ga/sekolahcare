<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda Kepala Sekolah - SekolahCare</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #1a237e;
            --primary-light: #e8eaf6;
            --primary-dark: #0d1642;
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
            padding: 2rem 0;
        }

        .stat-card {
            background-color: white;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            font-size: 1.5rem;
            color: white;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--primary-color);
        }

        .stat-label {
            color: #6c757d;
            font-size: 0.9rem;
        }

        .chart-container {
            background-color: white;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .chart-title {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        .recent-complaints {
            background-color: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .complaint-item {
            padding: 1.25rem;
            border-bottom: 1px solid #eee;
            transition: all 0.3s ease;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .complaint-item:hover {
            background-color: var(--primary-light);
            transform: translateX(5px);
            text-decoration: none;
            color: inherit;
        }

        .complaint-item:last-child {
            border-bottom: none;
        }

        .complaint-title {
            font-size: 1.1rem;
            font-weight: 500;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .complaint-info {
            font-size: 0.9rem;
            color: #6c757d;
        }

        .status-badge {
            padding: 0.6rem 1.2rem !important;
            border-radius: 30px !important;
            font-size: 0.85rem !important;
            font-weight: 600 !important;
            text-transform: capitalize !important;
            display: inline-flex !important;
            align-items: center !important;
            gap: 0.5rem !important;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05) !important;
            transition: all 0.3s ease !important;
        }

        .status-badge i {
            font-size: 1rem !important;
        }

        .status-menunggu {
            background-color: #fff3cd !important;
            color: #856404 !important;
            border: 1px solid #ffeeba !important;
        }

        .status-diproses {
            background-color: #e3f2fd !important;
            color: #0d47a1 !important;
            border: 1px solid #bbdefb !important;
        }

        .status-selesai {
            background-color: #e8f5e9 !important;
            color: #1b5e20 !important;
            border: 1px solid #c8e6c9 !important;
        }

        .status-badge:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1) !important;
        }

        .btn-report {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-report:hover {
            background-color: var(--primary-dark);
            color: white;
            transform: translateY(-2px);
        }

        .report-card {
            background-color: white;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .report-title {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .report-item {
            display: flex;
            align-items: center;
            padding: 1rem;
            border-bottom: 1px solid #eee;
            transition: all 0.3s ease;
        }

        .report-item:hover {
            background-color: var(--primary-light);
        }

        .report-item:last-child {
            border-bottom: none;
        }

        .report-icon {
            width: 40px;
            height: 40px;
            background-color: var(--primary-light);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            color: var(--primary-color);
        }

        /* Mobile Responsive Styles */
        @media (max-width: 768px) {
            .dashboard-container {
                padding: 1rem 0;
            }

            /* Statistics Cards Mobile */
            .stat-card {
                padding: 1.25rem;
                margin-bottom: 1rem;
            }

            .stat-icon {
                width: 50px;
                height: 50px;
                font-size: 1.25rem;
                margin-bottom: 0.75rem;
            }

            .stat-value {
                font-size: 1.5rem;
                margin-bottom: 0.25rem;
            }

            .stat-label {
                font-size: 0.85rem;
            }

            /* Recent Complaints Mobile */
            .recent-complaints {
                padding: 1.25rem;
                margin-bottom: 1rem;
            }

            .chart-title {
                font-size: 1.25rem;
                margin-bottom: 1rem;
            }

            .complaint-item {
                padding: 1rem;
            }

            .complaint-item .d-flex {
                flex-direction: column;
                align-items: flex-start !important;
                gap: 0.75rem;
            }

            .complaint-title {
                font-size: 1rem;
                margin-bottom: 0.5rem;
            }

            .complaint-info {
                font-size: 0.85rem;
                margin-bottom: 0.5rem;
            }

            .badge {
                align-self: flex-start;
                font-size: 0.8rem !important;
                padding: 0.4rem 0.8rem !important;
            }

            /* Report Card Mobile */
            .report-card {
                padding: 1.25rem;
                margin-bottom: 1rem;
            }

            .report-title {
                font-size: 1.25rem;
                margin-bottom: 1rem;
            }

            .report-item {
                padding: 0.75rem;
                flex-wrap: wrap;
                gap: 0.75rem;
            }

            .report-icon {
                width: 35px;
                height: 35px;
                margin-right: 0.75rem;
            }

            .report-item h6 {
                font-size: 0.95rem;
                margin-bottom: 0.25rem;
            }

            .report-item p {
                font-size: 0.85rem;
            }

            .report-item .btn-report {
                padding: 0.5rem;
                width: 100%;
                margin-top: 0.5rem;
            }

            /* Button Mobile */
            .btn-report {
                width: 100%;
                padding: 0.75rem;
                font-size: 0.95rem;
                margin-top: 0.5rem;
            }

            /* Layout Adjustments */
            .col-md-3 {
                width: 50%;
                padding: 0 0.5rem;
            }

            .row {
                margin: 0 -0.5rem;
            }

            /* Navbar Mobile */
            .navbar {
                padding: 0.75rem 1rem;
            }

            .navbar-brand {
                font-size: 1.25rem;
            }

            .navbar-nav {
                text-align: center;
                padding-top: 1rem;
            }

            .nav-item {
                margin: 0.25rem 0;
            }

            .nav-link {
                padding: 0.5rem;
                font-size: 0.95rem;
            }

            /* Status Badge Mobile */
            .status-badge {
                padding: 0.4rem 0.8rem !important;
                font-size: 0.8rem !important;
                margin-top: 0.5rem;
            }

            .status-badge i {
                font-size: 0.9rem !important;
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
                        <a class="nav-link active" href="{{ route('kepsek.beranda') }}"><i class="bi bi-house-door"></i> Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kepsek.daftar-pengaduan') }}"><i class="bi bi-list-ul"></i> Daftar Pengaduan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kepsek.laporan') }}"><i class="bi bi-file-earmark-text"></i> Laporan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kepsek.analisis') }}"><i class="bi bi-graph-up"></i> Analisis</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kepsek.profile') }}"><i class="bi bi-person-circle"></i> Profil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container dashboard-container">
        <div class="row">
            <!-- Left Column -->
            <div class="col-md-8">
                <!-- Statistics Cards -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="stat-card">
                            <div class="stat-icon" style="background-color: #1a237e;">
                                <i class="bi bi-exclamation-circle"></i>
                            </div>
                            <div class="stat-value">{{ $totalPengaduan }}</div>
                            <div class="stat-label">Total Pengaduan</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat-card">
                            <div class="stat-icon" style="background-color: #f57c00;">
                                <i class="bi bi-clock"></i>
                            </div>
                            <div class="stat-value">{{ $menunggu }}</div>
                            <div class="stat-label">Menunggu</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat-card">
                            <div class="stat-icon" style="background-color: #2196f3;">
                                <i class="bi bi-arrow-repeat"></i>
                            </div>
                            <div class="stat-value">{{ $diproses }}</div>
                            <div class="stat-label">Diproses</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat-card">
                            <div class="stat-icon" style="background-color: #4caf50;">
                                <i class="bi bi-check-circle"></i>
                            </div>
                            <div class="stat-value">{{ $selesai }}</div>
                            <div class="stat-label">Selesai</div>
                        </div>
                    </div>
                </div>

                <!-- Recent Complaints -->
                <div class="recent-complaints mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
                        <h4 class="chart-title mb-0">Pengaduan Terbaru</h4>
                        <a href="{{ route('kepsek.daftar-pengaduan') }}" class="btn btn-report">
                            <i class="bi bi-list-ul"></i> Lihat semua
                        </a>
                    </div>
                    @foreach($pengaduanTerbaru->take(3) as $pengaduan)
                        <a href="{{ route('kepsek.detail-pengaduan', $pengaduan->id) }}" class="complaint-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="complaint-title mb-0">{{ $pengaduan->judul }}</h6>
                                    <p class="complaint-info mb-0">
                                        <i class="bi bi-mortarboard"></i> {{ $pengaduan->siswa->kelas->nama ?? '-' }}
                                        <i class="bi bi-person ms-2"></i> {{ $pengaduan->siswa->name }}
                                    </p>
                                </div>
                                @php
                                    $status = strtolower(trim($pengaduan->status));
                                @endphp
                                <span class="badge rounded-pill status-badge status-{{ $status }}">
                                    @if($status == 'menunggu')
                                        <i class="bi bi-clock me-1"></i>
                                    @elseif($status == 'diproses')
                                        <i class="bi bi-arrow-repeat me-1"></i>
                                    @elseif($status == 'selesai')
                                        <i class="bi bi-check-circle me-1"></i>
                                    @endif
                                    {{ ucfirst($status) }}
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-md-4">
                <!-- Reports Section -->
                <div class="report-card">
                    <h4 class="report-title">Laporan</h4>
                    <div class="report-item">
                        <div class="report-icon">
                            <i class="bi bi-file-earmark-text"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1">Laporan Bulanan</h6>
                            <p class="mb-0 text-muted">Januari 2024</p>
                        </div>
                        <button class="btn btn-report">
                            <i class="bi bi-download"></i>
                        </button>
                    </div>
                    <div class="report-item">
                        <div class="report-icon">
                            <i class="bi bi-file-earmark-text"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1">Laporan Triwulan</h6>
                            <p class="mb-0 text-muted">Q4 2023</p>
                        </div>
                        <button class="btn btn-report">
                            <i class="bi bi-download"></i>
                        </button>
                    </div>
                    <div class="report-item">
                        <div class="report-icon">
                            <i class="bi bi-file-earmark-text"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1">Laporan Tahunan</h6>
                            <p class="mb-0 text-muted">2023</p>
                        </div>
                        <button class="btn btn-report">
                            <i class="bi bi-download"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
