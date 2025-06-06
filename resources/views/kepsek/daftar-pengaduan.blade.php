<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengaduan - SekolahCare</title>
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
            background-color: var(--primary-color);
            border: none;
            padding: 0.5rem 1rem;
            font-weight: 500;
        }

        .btn-detail:hover {
            background-color: var(--primary-dark);
        }

        .pagination {
            margin-top: 2rem;
        }

        .page-link {
            color: var(--primary-color);
            padding: 0.5rem 0.75rem;
            border: 1px solid #dee2e6;
        }

        .page-item.active .page-link {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .page-link:hover {
            color: var(--primary-dark);
            background-color: #e9ecef;
        }

        /* Mobile Responsive Styles */
        @media (max-width: 768px) {
            .complaints-container {
                margin: 1rem;
                padding: 1rem;
                border-radius: 8px;
            }
            
            /* Mobile Filter Toggle */
            .mobile-filter-toggle {
                display: block;
                width: 100%;
                margin-bottom: 1rem;
                background-color: var(--primary-color);
                color: white;
                border: none;
            }

            .mobile-filter-toggle:hover {
                background-color: var(--primary-dark);
            }
            
            .filter-collapse {
                display: none;
            }
            
            .filter-collapse.show {
                display: block;
            }
            
            /* Stack filter cards vertically on mobile */
            .filter-row .col-md-3 {
                margin-bottom: 1rem;
            }
            
            .filter-row .card {
                margin-bottom: 0;
            }
            
            /* Date range inputs stacked */
            .date-range-mobile .input-group {
                margin-bottom: 0.5rem;
            }
            
            .date-range-mobile .input-group:last-child {
                margin-bottom: 0;
            }
            
            /* Search bar mobile optimization */
            .search-mobile .input-group {
                flex-direction: column;
            }
            
            .search-mobile .form-control {
                border-radius: 0.375rem;
                margin-bottom: 0.5rem;
            }
            
            .search-mobile .btn {
                border-radius: 0.375rem;
                width: 100%;
            }
            
            /* Filter actions mobile */
            .filter-actions-mobile {
                flex-direction: column;
                gap: 1rem;
                align-items: stretch !important;
            }
            
            .filter-actions-mobile .d-flex {
                justify-content: center;
                gap: 0.5rem;
            }
            
            .filter-actions-mobile .btn {
                flex: 1;
                min-width: 120px;
            }
            
            .filter-actions-mobile .text-muted {
                text-align: center;
                font-size: 0.875rem;
            }
            
            /* Complaint card mobile optimization */
            .complaint-card {
                padding: 1rem;
            }
            
            .complaint-card h5 {
                font-size: 1.1rem;
                line-height: 1.3;
                margin-bottom: 0.5rem;
            }
            
            .complaint-header-mobile {
                flex-direction: column;
                align-items: flex-start !important;
                gap: 0.5rem;
            }
            
            .status-badge {
                align-self: flex-start;
                font-size: 0.75rem;
                padding: 0.25rem 0.75rem;
            }
            
            .complaint-footer-mobile {
                flex-direction: column;
                gap: 1rem;
                align-items: stretch !important;
            }
            
            .complaint-footer-mobile .badge {
                align-self: flex-start;
            }
            
            .complaint-footer-mobile .btn-detail {
                width: 100%;
                text-align: center;
            }
            
            /* Pagination mobile */
            .pagination {
                flex-wrap: wrap;
                justify-content: center;
                gap: 0.25rem;
            }
            
            .page-item {
                margin: 0.125rem;
            }
            
            .page-link {
                padding: 0.375rem 0.5rem;
                font-size: 0.875rem;
            }
            
            /* Empty state mobile */
            .empty-state-mobile i {
                font-size: 2rem !important;
            }
            
            .empty-state-mobile h4 {
                font-size: 1.25rem;
                margin-top: 1rem;
            }
            
            .empty-state-mobile p {
                font-size: 0.875rem;
            }
            
            /* Navbar mobile optimization */
            .navbar-nav {
                text-align: center;
            }
            
            .navbar-nav .nav-item {
                margin: 0.25rem 0;
            }
        }
        
        /* Desktop only styles */
        @media (min-width: 769px) {
            .mobile-filter-toggle {
                display: none;
            }
            
            .filter-collapse {
                display: block !important;
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
                        <a class="nav-link" href="{{ route('kepsek.beranda') }}"><i class="bi bi-house-door"></i> Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('kepsek.daftar-pengaduan') }}"><i class="bi bi-list-ul"></i> Daftar Pengaduan</a>
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
    <div class="container">
        <div class="complaints-container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0">Daftar Pengaduan</h4>
            </div>

            <!-- Mobile Filter Toggle Button -->
            <button class="btn btn-outline-primary mobile-filter-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#filterCollapse">
                <i class="bi bi-funnel"></i> Filter & Pencarian
            </button>

            <!-- Filter Form -->
            <form action="{{ route('kepsek.daftar-pengaduan') }}" method="GET" id="filterForm">
                <div class="collapse filter-collapse" id="filterCollapse">
                    <!-- Filter Cards -->
                    <div class="row g-3 mb-4 filter-row">
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
                                    <div class="input-group search-mobile">
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
                    <div class="d-flex justify-content-between align-items-center mb-4 filter-actions-mobile">
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-funnel"></i> Terapkan Filter
                            </button>
                            <a href="{{ route('kepsek.daftar-pengaduan') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-counterclockwise"></i> Reset
                            </a>
                        </div>
                        <div class="text-muted">
                            Menampilkan <strong>{{ $pengaduan->firstItem() ?? 0 }} - {{ $pengaduan->lastItem() ?? 0 }}</strong> dari <strong>{{ $pengaduan->total() }}</strong> pengaduan
                        </div>
                    </div>
                </div>
            </form>

            <!-- Complaints List -->
            <div class="complaints-list">
                @forelse($pengaduan as $p)
                    <div class="complaint-card">
                        <div class="d-flex justify-content-between align-items-start mb-2 complaint-header-mobile">
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
                        <p class="text-muted mb-3">{{ Str::limit($p->isi_pengaduan, 150) }}</p>
                        <div class="d-flex justify-content-between align-items-center complaint-footer-mobile">
                            <span class="badge bg-secondary">{{ $p->kategori->nama_kategori }}</span>
                            <a href="{{ route('kepsek.detail-pengaduan', $p->id) }}" class="btn btn-primary btn-detail">
                                <i class="bi bi-eye"></i> Lihat Detail
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-5 empty-state-mobile">
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

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 