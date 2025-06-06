<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - SekolahCare</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
        .stats-card {
            background: linear-gradient(45deg, #dc3545, #ff6b6b);
            color: white;
        }
        .stats-card .icon {
            font-size: 2rem;
            opacity: 0.8;
        }
        .table th {
            font-weight: 600;
            background-color: #f8f9fa;
        }
        .btn-action {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
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

        /* Mobile Responsive Styles */
        @media (max-width: 768px) {
            .navbar {
                padding: 0.5rem 1rem;
            }
            
            .navbar-brand {
                font-size: 1.25rem;
            }

            .navbar-nav {
                background-color: #dc3545;
                padding: 1rem;
                border-radius: 0 0 10px 10px;
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

            .stats-card {
                margin-bottom: 1rem;
            }

            .stats-card .icon {
                font-size: 1.5rem;
            }

            .card {
                margin-bottom: 1rem;
            }

            .card-header {
                padding: 0.75rem;
            }

            .card-body {
                padding: 1rem;
            }

            .table-responsive {
                margin: 0 -1rem;
                padding: 0 1rem;
                width: calc(100% + 2rem);
            }

            .table {
                font-size: 0.875rem;
            }

            .table td, .table th {
                padding: 0.5rem;
            }

            .btn-action {
                padding: 0.25rem 0.5rem;
                font-size: 0.75rem;
            }

            .col-md-4 {
                margin-bottom: 1rem;
            }

            .stats-card h3 {
                font-size: 1.5rem;
            }

            .stats-card h6 {
                font-size: 0.875rem;
            }

            .badge {
                font-size: 0.75rem;
            }

            /* Category Cards Mobile Layout */
            .col-md-4.mb-3 {
                padding: 0 0.5rem;
            }

            .card-title {
                font-size: 1rem;
            }

            .card-text {
                font-size: 0.875rem;
            }

            /* Chart Responsiveness */
            canvas {
                max-height: 300px !important;
            }
        }

        /* Sidebar Toggle Animation */
        .navbar-toggler {
            border: none;
            padding: 0;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        .navbar-toggler-icon {
            width: 1.5em;
            height: 1.5em;
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

            /* Stats Grid for Mobile */
            .row .col-md-4:first-child {
                margin-top: 1rem;
            }

            /* Mobile Table Scroll Indicator */
            .table-responsive::after {
                content: '';
                position: absolute;
                right: 0;
                top: 0;
                bottom: 0;
                width: 5px;
                background: linear-gradient(to right, transparent, rgba(220, 53, 69, 0.1));
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
                            <a class="nav-link active" href="{{ route('admin.dashboard') }}">
                                <i class="bi bi-speedometer2 me-2"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.kelola-pengguna') }}">
                                <i class="bi bi-people me-2"></i> Kelola Pengguna
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.kelola-laporan') }}">
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
                <!-- Dashboard Overview -->
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="card stats-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="card-title">Total Pengguna</h6>
                                        <h3 class="mb-0">{{ $totalUsers }}</h3>
                                    </div>
                                    <div class="icon">
                                        <i class="bi bi-people"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card stats-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="card-title">Laporan Aktif</h6>
                                        <h3 class="mb-0">{{ $activeComplaints }}</h3>
                                    </div>
                                    <div class="icon">
                                        <i class="bi bi-file-text"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card stats-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="card-title">Selesai Bulan Ini</h6>
                                        <h3 class="mb-0">{{ $completedThisMonth }}</h3>
                                    </div>
                                    <div class="icon">
                                        <i class="bi bi-check-circle"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- User Management -->
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Kelola Pengguna</h5>
                        <a href="{{ route('admin.kelola-pengguna') }}" class="btn btn-primary btn-sm">
                            <i class="bi bi-arrow-right"></i> Lihat Selengkapnya
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Pengguna</th>
                                        <th>Role</th>
                                        <th>Email</th>
                                        <th>Kelas</th>
                                        <th>Dibuat pada</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recentUsers as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td><span class="badge bg-primary">{{ ucfirst($user->role) }}</span></td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->kelas ? $user->kelas->nama : 'N/A' }}</td>
                                        <td>{{ $user->created_at->format('d M Y, H:i') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Report Management -->
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Kelola Pengaduan</h5>
                        <a href="{{ route('admin.kelola-laporan') }}" class="btn btn-primary btn-sm">
                            <i class="bi bi-arrow-right"></i> Lihat Selengkapnya
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Judul</th>
                                        <th>Kategori</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recentComplaints as $complaint)
                                    <tr>
                                        <td>#{{ $complaint->id }}</td>
                                        <td>{{ $complaint->judul }}</td>
                                        <td>{{ $complaint->kategori->nama_kategori }}</td>
                                        <td><span class="badge bg-warning">{{ $complaint->status }}</span></td>
                                        <td>{{ $complaint->created_at->format('d M Y') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Categories -->
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Kategori Pengaduan</h5>
                        <a href="{{ route('admin.kategori') }}" class="btn btn-primary btn-sm">
                            <i class="bi bi-arrow-right"></i> Lihat Selengkapnya
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($categories as $category)
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title">{{ $category->nama_kategori }}</h6>
                                        <p class="card-text text-muted">{{ $category->pengaduan_count }} laporan aktif</p>
                                        
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Activity Logs -->
                <!-- <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Log Aktivitas</h5>
                        <a href="#" class="btn btn-primary btn-sm">
                            <i class="bi bi-arrow-right"></i> Lihat Selengkapnya
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Waktu</th>
                                        <th>User</th>
                                        <th>Aktivitas</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>15 Mar 2024, 10:30</td>
                                        <td>Dr. Siti Aminah</td>
                                        <td>Menanggapi Pengaduan</td>
                                        <td>#1234 - AC Ruang Kelas 10A</td>
                                    </tr>
                                    <tr>
                                        <td>15 Mar 2024, 09:15</td>
                                        <td>Admin</td>
                                        <td>Menambah Pengguna</td>
                                        <td>Rangga Fatahillah Azis</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                 Statistics -->
                <!-- <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Statistik Pengaduan</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <canvas id="reportsChart"></canvas>
                            </div>
                            <div class="col-md-4">
                                <canvas id="categoryChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Charts -->
    <script>
        // Reports Chart
        const reportsCtx = document.getElementById('reportsChart').getContext('2d');
        new Chart(reportsCtx, {
            type: 'line',
            data: {
                labels: {!! json_encode($monthlyStats['labels']) !!},
                datasets: [{
                    label: 'Laporan Masuk',
                    data: {!! json_encode($monthlyStats['incoming']) !!},
                    borderColor: '#dc3545',
                    tension: 0.1
                }, {
                    label: 'Laporan Selesai',
                    data: {!! json_encode($monthlyStats['completed']) !!},
                    borderColor: '#198754',
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: window.innerWidth >= 768,
                aspectRatio: window.innerWidth >= 768 ? 2 : 1,
                plugins: {
                    title: {
                        display: true,
                        text: 'Tren Laporan Bulanan'
                    }
                }
            }
        });

        // Category Chart
        const categoryCtx = document.getElementById('categoryChart').getContext('2d');
        new Chart(categoryCtx, {
            type: 'doughnut',
            data: {
                labels: {!! json_encode($categoryDistribution['labels']) !!},
                datasets: [{
                    data: {!! json_encode($categoryDistribution['data']) !!},
                    backgroundColor: [
                        '#dc3545',
                        '#0d6efd',
                        '#198754',
                        '#ffc107',
                        '#6c757d'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: window.innerWidth >= 768,
                aspectRatio: window.innerWidth >= 768 ? 2 : 1,
                plugins: {
                    title: {
                        display: true,
                        text: 'Distribusi Kategori'
                    }
                }
            }
        });
    </script>

    <!-- Mobile Sidebar Toggle -->
    <script>
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
    </script>
</body>
</html> 