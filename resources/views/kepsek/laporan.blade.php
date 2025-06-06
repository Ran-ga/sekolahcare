<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan - SekolahCare</title>
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
            background-color: #1a237e;
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
        .report-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .report-card:hover {
            transform: translateY(-5px);
        }
        .report-icon {
            width: 60px;
            height: 60px;
            background-color: #1a237e;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            color: white;
            font-size: 1.5rem;
        }
        .stats-card {
            background-color: white;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .stats-number {
            font-size: 2rem;
            font-weight: 600;
            color: #1a237e;
            margin-bottom: 0.5rem;
        }
        .stats-label {
            color: #6c757d;
            font-size: 0.9rem;
        }
        .year-selector {
            background-color: white;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
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
                        <a class="nav-link" href="{{ route('kepsek.daftar-pengaduan') }}"><i class="bi bi-list-ul"></i> Daftar Pengaduan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('kepsek.laporan') }}"><i class="bi bi-file-earmark-text"></i> Laporan</a>
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
        <!-- Year Selector -->
        <div class="year-selector">
            <form id="yearForm" class="row align-items-center">
                <div class="col-md-4">
                    <label for="tahun_ajaran" class="form-label">Tahun Ajaran</label>
                    <select class="form-select" id="tahun_ajaran" name="tahun_ajaran">
                        @php
                            $currentYear = date('Y');
                            $startYear = 2020; // You can adjust this
                        @endphp
                        @for($year = $currentYear; $year >= $startYear; $year--)
                            <option value="{{ $year }}/{{ $year + 1 }}" {{ request('tahun_ajaran') == $year.'/'.($year + 1) ? 'selected' : '' }}>
                                {{ $year }}/{{ $year + 1 }}
                            </option>
                        @endfor
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary mt-4">
                        <i class="bi bi-search"></i> Filter
                    </button>
                </div>
            </form>
        </div>

        <!-- Statistics -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-number">{{ $totalPengaduan }}</div>
                    <div class="stats-label">Total Pengaduan</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-number">{{ $totalSiswa }}</div>
                    <div class="stats-label">Total Siswa</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-number">{{ $totalGuruBk }}</div>
                    <div class="stats-label">Total Guru BK</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <div class="stats-number">{{ $totalWaliKelas }}</div>
                    <div class="stats-label">Total Wali Kelas</div>
                </div>
            </div>
        </div>

        <!-- Report Cards -->
        <div class="row">
            <!-- Laporan Pengaduan -->
            <div class="col-md-6 mb-4">
                <div class="report-card p-4">
                    <div class="report-icon">
                        <i class="bi bi-file-earmark-text"></i>
                    </div>
                    <h4 class="text-center mb-3">Laporan Pengaduan</h4>
                    <p class="text-muted text-center mb-4">Download laporan pengaduan dengan filter berdasarkan tanggal, kategori, dan status</p>
                    <form action="{{ route('kepsek.laporan.pengaduan') }}" method="GET" class="mb-3">
                        <input type="hidden" name="tahun_ajaran" value="{{ request('tahun_ajaran') }}">
                        <div class="mb-3">
                            <label class="form-label">Tanggal</label>
                            <div class="row">
                                <div class="col">
                                    <input type="date" class="form-control" name="tanggal_mulai">
                                </div>
                                <div class="col">
                                    <input type="date" class="form-control" name="tanggal_selesai">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kategori</label>
                            <select class="form-select" name="kategori_id">
                                <option value="">Semua Kategori</option>
                                @foreach($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="status">
                                <option value="">Semua Status</option>
                                <option value="Menunggu">Menunggu</option>
                                <option value="Diproses">Diproses</option>
                                <option value="Selesai">Selesai</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-download"></i> Download Laporan
                        </button>
                    </form>
                </div>
            </div>

            <!-- Laporan Kategori -->
            <div class="col-md-6 mb-4">
                <div class="report-card p-4">
                    <div class="report-icon">
                        <i class="bi bi-tags"></i>
                    </div>
                    <h4 class="text-center mb-3">Laporan Kategori</h4>
                    <p class="text-muted text-center mb-4">Download laporan kategori pengaduan beserta jumlah pengaduan per kategori</p>
                    <a href="{{ route('kepsek.laporan.kategori', ['tahun_ajaran' => request('tahun_ajaran')]) }}" class="btn btn-primary w-100">
                        <i class="bi bi-download"></i> Download Laporan
                    </a>
                </div>
            </div>

            <!-- Laporan Kelas -->
            <div class="col-md-6 mb-4">
                <div class="report-card p-4">
                    <div class="report-icon">
                        <i class="bi bi-mortarboard"></i>
                    </div>
                    <h4 class="text-center mb-3">Laporan Kelas</h4>
                    <p class="text-muted text-center mb-4">Download laporan data kelas beserta jumlah siswa dan pengaduan per kelas</p>
                    <a href="{{ route('kepsek.laporan.kelas', ['tahun_ajaran' => request('tahun_ajaran')]) }}" class="btn btn-primary w-100">
                        <i class="bi bi-download"></i> Download Laporan
                    </a>
                </div>
            </div>

            <!-- Laporan Pengguna -->
            <div class="col-md-6 mb-4">
                <div class="report-card p-4">
                    <div class="report-icon">
                        <i class="bi bi-people"></i>
                    </div>
                    <h4 class="text-center mb-3">Laporan Pengguna</h4>
                    <p class="text-muted text-center mb-4">Download laporan data pengguna (siswa, guru BK, dan wali kelas)</p>
                    <a href="{{ route('kepsek.laporan.user', ['tahun_ajaran' => request('tahun_ajaran')]) }}" class="btn btn-primary w-100">
                        <i class="bi bi-download"></i> Download Laporan
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
