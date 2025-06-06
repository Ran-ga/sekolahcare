<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pengaduan - SekolahCare</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
            min-height: 100vh;
        }
        .navbar {
            background-color: #dc3545;
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
        .sidebar {
            background-color: white;
            min-height: calc(100vh - 56px);
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .sidebar .nav-link {
            color: #333 !important;
            padding: 0.8rem 1rem;
            border-radius: 5px;
            margin: 0.2rem 0;
        }
        .sidebar .nav-link:hover {
            background-color: #f8f9fa;
        }
        .sidebar .nav-link.active {
            background-color: #dc3545;
            color: white !important;
        }
        .main-content {
            padding: 2rem;
        }
        .card {
            border: none;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-bottom: 1.5rem;
        }
        .card-header {
            background-color: white;
            border-bottom: 1px solid #eee;
            font-weight: 600;
        }
        .btn-primary {
            background: linear-gradient(45deg, #dc3545, #ff6b6b);
            border: none;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: linear-gradient(45deg, #c82333, #e74c3c);
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(220, 53, 69, 0.2);
        }
        .btn-primary i {
            margin-right: 4px;
        }
        .complaints-container {
            max-width: 1000px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: white;
            border-radius: 10px;
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
        .complaint-date {
            color: #6c757d;
            font-size: 0.875rem;
        }
        .btn-detail {
            background-color: #dc3545;
            border: none;
            padding: 0.5rem 1rem;
            font-weight: 500;
        }
        .btn-detail:hover {
            background-color: #c82333;
        }
        .pagination {
            margin-top: 2rem;
        }
        .page-link {
            color: #dc3545;
            padding: 0.5rem 0.75rem;
            border: 1px solid #dee2e6;
        }
        .page-item.active .page-link {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .page-link:hover {
            color: #c82333;
            background-color: #e9ecef;
        }
        .stats-card {
            background: linear-gradient(45deg, #dc3545, #c82333);
            color: white;
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            box-shadow: 0 4px 6px rgba(220, 53, 69, 0.1);
        }
        .stats-card h3 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }
        .stats-card p {
            margin-bottom: 0;
            opacity: 0.9;
        }
        .btn-delete {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            font-weight: 500;
            margin-left: 0.5rem;
        }
        .btn-delete:hover {
            background-color: #c82333;
            color: white;
        }

        /* Mobile Responsive Styles */
        @media (max-width: 768px) {
            .navbar {
                padding: 0.5rem 1rem;
            }
            
            .navbar-brand {
                font-size: 1.25rem;
            }

            .main-content {
                padding: 1rem;
            }

            .sidebar {
                position: fixed;
                top: 56px;
                left: -100%;
                width: 80%;
                height: calc(100vh - 56px);
                z-index: 1000;
                transition: left 0.3s ease;
            }

            .sidebar.show {
                left: 0;
            }

            /* Complaints Container Mobile */
            .complaints-container {
                margin: 0;
                padding: 1rem;
                border-radius: 0;
            }

            /* Stats Cards Mobile */
            .stats-card {
                padding: 1rem;
                margin-bottom: 0.75rem;
            }

            .stats-card h3 {
                font-size: 1.5rem;
            }

            .stats-card p {
                font-size: 0.875rem;
            }

            /* Filter Section Mobile */
            .row.g-3 {
                margin: 0 -0.5rem;
            }

            .col-md-3 {
                padding: 0 0.5rem;
                margin-bottom: 0.75rem;
                width: 100%;
            }

            .card {
                margin-bottom: 0.75rem;
            }

            .card-body {
                padding: 0.75rem;
            }

            /* Search Bar Mobile */
            .input-group {
                margin-bottom: 0.5rem;
            }

            .input-group .form-control {
                height: 38px;
            }

            /* Filter Actions Mobile */
            .d-flex.justify-content-between.align-items-center {
                flex-direction: column;
                gap: 1rem;
            }

            .d-flex.gap-2 {
                width: 100%;
            }

            .d-flex.gap-2 .btn {
                flex: 1;
                padding: 0.5rem;
                font-size: 0.875rem;
            }

            .text-muted {
                font-size: 0.875rem;
                text-align: center;
            }

            /* Complaint Cards Mobile */
            .complaint-card {
                padding: 1rem;
                margin-bottom: 0.75rem;
            }

            .complaint-card h5 {
                font-size: 1rem;
                margin-bottom: 0.5rem;
            }

            .status-badge {
                padding: 0.35rem 0.75rem;
                font-size: 0.75rem;
            }

            .complaint-date {
                font-size: 0.75rem;
            }

            .badge {
                font-size: 0.75rem;
            }

            .btn-detail, .btn-delete {
                padding: 0.375rem 0.75rem;
                font-size: 0.875rem;
            }

            /* Pagination Mobile */
            .pagination {
                flex-wrap: wrap;
                justify-content: center;
                gap: 0.25rem;
            }

            .page-link {
                padding: 0.375rem 0.75rem;
                font-size: 0.875rem;
            }

            /* Modal Mobile */
            .modal-dialog {
                margin: 0.5rem;
            }

            .modal-body {
                padding: 1rem;
                font-size: 0.875rem;
            }

            /* Toast Messages Mobile */
            .toast {
                width: 100%;
                max-width: 300px;
            }

            /* Improved Complaints List Mobile */
            .complaints-list {
                margin: 0 -1rem;
                padding: 0 1rem;
            }

            .complaint-card {
                padding: 1rem;
                margin-bottom: 0.75rem;
                border-radius: 8px;
            }

            /* Card Header Mobile */
            .complaint-card .d-flex.justify-content-between {
                flex-direction: column;
                gap: 0.5rem;
            }

            .complaint-card h5 {
                font-size: 1rem;
                line-height: 1.3;
                margin-bottom: 0.25rem;
                width: 100%;
            }

            /* Status Badge Mobile */
            .status-badge {
                align-self: flex-start;
                padding: 0.25rem 0.5rem;
                font-size: 0.75rem;
                width: auto;
                display: inline-flex;
                align-items: center;
                gap: 0.25rem;
            }

            .status-badge i {
                font-size: 0.875rem;
            }

            /* Complaint Meta Info Mobile */
            .complaint-date {
                font-size: 0.75rem;
                display: flex;
                flex-wrap: wrap;
                gap: 0.5rem;
                align-items: center;
                margin-bottom: 0.5rem;
            }

            .complaint-date .mx-2 {
                display: none;
            }

            .complaint-date i {
                font-size: 0.875rem;
            }

            /* Complaint Content Mobile */
            .complaint-card p {
                font-size: 0.875rem;
                line-height: 1.4;
                margin: 0.5rem 0;
            }

            /* Card Footer Mobile */
            .complaint-card .d-flex.justify-content-between.align-items-center {
                flex-direction: column;
                align-items: stretch !important;
                gap: 0.75rem;
            }

            .complaint-card .badge.bg-secondary {
                font-size: 0.75rem;
                padding: 0.35rem 0.75rem;
                margin-bottom: 0.25rem;
                display: inline-block;
            }

            /* Action Buttons Mobile */
            .complaint-card .d-flex.justify-content-between.align-items-center > div {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 0.5rem;
                width: 100%;
            }

            .btn-detail, .btn-delete {
                width: 100%;
                padding: 0.5rem;
                font-size: 0.875rem;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 0.25rem;
                margin: 0;
            }

            /* Empty State Mobile */
            .text-center.py-5 {
                padding: 2rem 1rem !important;
            }

            .text-center.py-5 i {
                font-size: 2.5rem !important;
            }

            .text-center.py-5 h4 {
                font-size: 1.25rem;
                margin-top: 1rem;
            }

            .text-center.py-5 p {
                font-size: 0.875rem;
                margin-bottom: 0;
            }
        }

        /* Improved Mobile Navigation */
        @media (max-width: 768px) {
            .nav-item {
                margin: 0.25rem 0;
            }

            .nav-link {
                padding: 0.5rem 1rem;
                border-radius: 5px;
            }

            .nav-link i {
                margin-right: 0.5rem;
                width: 20px;
            }

            /* Action Buttons Mobile */
            .d-flex.justify-content-between.align-items-center .btn {
                width: 100%;
                margin-bottom: 0.5rem;
            }

            /* Date Range Inputs Mobile */
            .input-group.mb-2 {
                margin-bottom: 0.5rem !important;
            }

            .input-group input[type="date"] {
                font-size: 0.875rem;
            }
        }

        /* Complaint Description Styles */
        .complaint-card p.text-muted {
            text-align: left;
            margin: 0.75rem 0;
            line-height: 1.5;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            position: relative;
        }

        .complaint-card p.text-muted.expanded {
            -webkit-line-clamp: unset;
        }

        .complaint-card .read-more {
            color: #dc3545;
            font-size: 0.875rem;
            cursor: pointer;
            display: inline-block;
            margin-top: 0.25rem;
            text-decoration: none;
        }

        .complaint-card .read-more:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            /* Mobile Complaint Description */
            .complaint-card p.text-muted {
                font-size: 0.875rem;
                margin: 0.5rem 0;
                line-height: 1.4;
            }

            .complaint-card .read-more {
                font-size: 0.8rem;
                padding: 0.25rem 0;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SekolahCare Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="/admin/profile"><i class="bi bi-person-circle"></i> Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 px-0 sidebar">
                <div class="p-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                <i class="bi bi-speedometer2 me-2"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.kelola-pengguna') }}">
                                <i class="bi bi-people me-2"></i> Kelola Pengguna
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin.kelola-laporan') }}">
                                <i class="bi bi-file-text me-2"></i> Kelola Pengaduan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.kategori') }}">
                                <i class="bi bi-tags me-2"></i> Kategori
                            </a>
                        </li>
                        <li class="nav-item d-lg-none">
                            <a class="nav-link" href="/admin/profile">
                                <i class="bi bi-person-circle me-2"></i> Profil Admin
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 main-content">
                <div class="complaints-container">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="mb-0">Kelola Pengaduan</h4>
                    </div>

                    <!-- Statistics Cards -->
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="stats-card">
                                <h3>{{ $totalPengaduan }}</h3>
                                <p>Total Pengaduan</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="stats-card">
                                <h3>{{ $pengaduanAktif }}</h3>
                                <p>Pengaduan Aktif</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="stats-card">
                                <h3>{{ $pengaduanSelesai }}</h3>
                                <p>Pengaduan Selesai</p>
                            </div>
                        </div>
                    </div>

                    <!-- Filter Form -->
                    <form action="{{ route('admin.kelola-laporan') }}" method="GET" id="filterForm">
                        <!-- Filter Cards -->
                        <div class="row g-3 mb-4">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <label class="form-label">Status Pengaduan</label>
                                        <select class="form-select" name="status" id="statusFilter">
                                            <option value="">Semua Status</option>
                                            <option value="Menunggu" {{ request('status') == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                                            <option value="Diproses" {{ request('status') == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                                            <option value="Selesai" {{ request('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <label class="form-label">Kategori</label>
                                        <select class="form-select" name="kategori" id="categoryFilter">
                                            <option value="">Semua Kategori</option>
                                            @foreach($kategoris as $kategori)
                                                <option value="{{ $kategori->id }}" {{ request('kategori') == $kategori->id ? 'selected' : '' }}>
                                                    {{ $kategori->nama_kategori }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <label class="form-label">Rentang Tanggal</label>
                                        <div class="input-group mb-2">
                                            <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                            <input type="date" class="form-control" name="tanggal_mulai" value="{{ request('tanggal_mulai') }}" placeholder="Dari">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                            <input type="date" class="form-control" name="tanggal_selesai" value="{{ request('tanggal_selesai') }}" placeholder="Sampai">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <label class="form-label">Urutkan Berdasarkan</label>
                                        <select class="form-select" name="sort" id="sortFilter">
                                            <option value="terbaru" {{ request('sort') == 'terbaru' ? 'selected' : '' }}>Terbaru</option>
                                            <option value="terlama" {{ request('sort') == 'terlama' ? 'selected' : '' }}>Terlama</option>
                                            <option value="judul_asc" {{ request('sort') == 'judul_asc' ? 'selected' : '' }}>Judul (A-Z)</option>
                                            <option value="judul_desc" {{ request('sort') == 'judul_desc' ? 'selected' : '' }}>Judul (Z-A)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Search Bar -->
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="Cari berdasarkan judul, isi pengaduan, atau nama siswa...">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="bi bi-search"></i> Cari
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Filter Actions -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-funnel"></i> Terapkan Filter
                                </button>
                                <a href="{{ route('admin.kelola-laporan') }}" class="btn btn-outline-secondary">
                                    <i class="bi bi-arrow-counterclockwise"></i> Reset
                                </a>
                            </div>
                            <div class="text-muted">
                                Menampilkan <strong>{{ $pengaduan->firstItem() ?? 0 }} - {{ $pengaduan->lastItem() ?? 0 }}</strong> dari <strong>{{ $pengaduan->total() }}</strong> pengaduan
                            </div>
                        </div>
                    </form>

                    <!-- Complaints List -->
                    <div class="complaints-list">
                        @forelse($pengaduan as $p)
                            <div class="complaint-card">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h5 class="mb-0">{{ $p->judul }}</h5>
                                    <span class="status-badge status-{{ strtolower($p->status) }}">
                                        @if($p->status == 'Menunggu')
                                            <i class="bi bi-clock"></i>
                                        @elseif($p->status == 'Diproses')
                                            <i class="bi bi-gear"></i>
                                        @else
                                            <i class="bi bi-check-circle"></i>
                                        @endif
                                        {{ $p->status }}
                                    </span>
                                </div>
                                <div class="complaint-date mb-2">
                                    <i class="bi bi-person me-1"></i> {{ $p->siswa->name }}
                                    <span class="mx-2">•</span>
                                    <i class="bi bi-calendar me-1"></i> {{ $p->created_at->format('d M Y') }}
                                </div>
                                <p class="text-muted" data-complaint-id="{{ $p->id }}">{{ $p->isi_pengaduan }}</p>
                                @if(strlen($p->isi_pengaduan) > 150)
                                    <a href="javascript:void(0)" class="read-more" data-complaint-id="{{ $p->id }}">Baca selengkapnya</a>
                                @endif
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="badge bg-secondary">{{ $p->kategori->nama_kategori }}</span>
                                    <div>
                                        <a href="{{ route('admin.detail-pengaduan', $p->id) }}" class="btn btn-primary btn-detail">
                                            <i class="bi bi-eye"></i> Lihat Detail
                                        </a>
                                        <button class="btn btn-delete btn-delete-pengaduan" 
                                                data-pengaduan-id="{{ $p->id }}"
                                                data-pengaduan-judul="{{ $p->judul }}">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-5">
                                <i class="bi bi-inbox" style="font-size: 3rem; color: #6c757d;"></i>
                                <h4 class="mt-3">Belum ada pengaduan</h4>
                                <p class="text-muted">Belum ada pengaduan yang dibuat oleh siswa</p>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <nav class="mt-4">
                        <ul class="pagination justify-content-center">
                            @if($pengaduan->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link">Previous</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $pengaduan->previousPageUrl() }}">Previous</a>
                                </li>
                            @endif

                            @php
                                $start = max(1, $pengaduan->currentPage() - 4);
                                $end = min($pengaduan->lastPage(), $start + 9);
                                if ($end - $start < 9) {
                                    $start = max(1, $end - 9);
                                }
                            @endphp

                            @if($start > 1)
                                <li class="page-item">
                                    <a class="page-link" href="{{ $pengaduan->url(1) }}">1</a>
                                </li>
                                @if($start > 2)
                                    <li class="page-item disabled">
                                        <span class="page-link">...</span>
                                    </li>
                                @endif
                            @endif

                            @for($i = $start; $i <= $end; $i++)
                                <li class="page-item {{ $i == $pengaduan->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $pengaduan->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            @if($end < $pengaduan->lastPage())
                                @if($end < $pengaduan->lastPage() - 1)
                                    <li class="page-item disabled">
                                        <span class="page-link">...</span>
                                    </li>
                                @endif
                                <li class="page-item">
                                    <a class="page-link" href="{{ $pengaduan->url($pengaduan->lastPage()) }}">{{ $pengaduan->lastPage() }}</a>
                                </li>
                            @endif

                            @if($pengaduan->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $pengaduan->nextPageUrl() }}">Next</a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <span class="page-link">Next</span>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus pengaduan ini? Tindakan ini tidak dapat dibatalkan.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <form id="deleteForm" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Flash Messages -->
    @if(session('success'))
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 1050">
        <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-success text-white">
                <i class="bi bi-check-circle me-2"></i>
                <strong class="me-auto">Sukses</strong>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ session('success') }}
            </div>
        </div>
    </div>
    @endif

    @if(session('error'))
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 1050">
        <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-danger text-white">
                <i class="bi bi-exclamation-circle me-2"></i>
                <strong class="me-auto">Error</strong>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ session('error') }}
            </div>
        </div>
    </div>
    @endif

    <script>
        // Handle delete button click
        document.querySelectorAll('.btn-delete-pengaduan').forEach(button => {
            button.addEventListener('click', function() {
                const pengaduanId = this.getAttribute('data-pengaduan-id');
                const pengaduanJudul = this.getAttribute('data-pengaduan-judul');
                const modal = document.getElementById('deleteModal');
                const form = document.getElementById('deleteForm');
                
                // Update modal content
                modal.querySelector('.modal-body').textContent = 
                    `Apakah Anda yakin ingin menghapus pengaduan "${pengaduanJudul}"? Tindakan ini tidak dapat dibatalkan.`;
                
                // Update form action
                form.action = `/admin/kelola-laporan/${pengaduanId}`;
                
                // Show modal
                new bootstrap.Modal(modal).show();
            });
        });

        // Auto-hide toasts after 5 seconds
        document.querySelectorAll('.toast').forEach(toast => {
            setTimeout(() => {
                toast.classList.remove('show');
            }, 5000);
        });

        // Mobile Sidebar Toggle
        document.addEventListener('DOMContentLoaded', function() {
            const navbarToggler = document.querySelector('.navbar-toggler');
            const sidebar = document.querySelector('.sidebar');
            
            if (navbarToggler && sidebar) {
                navbarToggler.addEventListener('click', function() {
                    sidebar.classList.toggle('show');
                });

                // Close sidebar when clicking outside
                document.addEventListener('click', function(event) {
                    const isClickInside = sidebar.contains(event.target) || navbarToggler.contains(event.target);
                    if (!isClickInside && sidebar.classList.contains('show')) {
                        sidebar.classList.remove('show');
                    }
                });

                // Handle window resize
                window.addEventListener('resize', function() {
                    if (window.innerWidth > 768) {
                        sidebar.classList.remove('show');
                    }
                });
            }
        });

        // Add this to your existing scripts
        document.addEventListener('DOMContentLoaded', function() {
            // Handle read more functionality
            document.querySelectorAll('.read-more').forEach(button => {
                button.addEventListener('click', function() {
                    const complaintId = this.getAttribute('data-complaint-id');
                    const textElement = document.querySelector(`p[data-complaint-id="${complaintId}"]`);
                    
                    if (textElement) {
                        textElement.classList.toggle('expanded');
                        this.textContent = textElement.classList.contains('expanded') ? 'Sembunyikan' : 'Baca selengkapnya';
                    }
                });
            });
        });
    </script>
</body>
</html> 