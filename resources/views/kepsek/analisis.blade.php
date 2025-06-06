<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analisis - SekolahCare</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

        .analysis-container {
            padding: 2rem 0;
        }

        .chart-card {
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

        /* Mobile Responsive Styles */
        @media (max-width: 768px) {
            .analysis-container {
                padding: 1rem 0;
            }

            /* Academic Year Selector Mobile */
            .d-flex.justify-content-between.align-items-center {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            h2 {
                font-size: 1.5rem;
            }

            .form-select {
                width: 100% !important;
            }

            /* Statistics Cards Mobile */
            .stat-card {
                padding: 1.25rem;
                margin-bottom: 1rem;
                text-align: center;
            }

            .stat-icon {
                width: 50px;
                height: 50px;
                font-size: 1.25rem;
                margin: 0 auto 0.75rem;
            }

            .stat-value {
                font-size: 1.75rem;
                margin-bottom: 0.25rem;
            }

            .stat-label {
                font-size: 0.85rem;
            }

            .col-md-3 {
                width: 50%;
                padding: 0 0.5rem;
            }

            /* Chart Cards Mobile */
            .chart-card {
                padding: 1rem;
                margin-bottom: 1rem;
                overflow-x: hidden;
            }

            .chart-title {
                font-size: 1.1rem;
                margin-bottom: 1rem;
                text-align: center;
            }

            /* Chart Container Heights */
            .chart-container {
                position: relative;
                height: 300px;
                width: 100%;
            }

            #monthlyChart, #categoryChart, #classChart {
                max-height: 300px !important;
            }

            #statusChart {
                max-height: 250px !important;
            }

            /* Layout Adjustments */
            .row {
                margin: 0 -0.5rem;
            }

            .col-md-8, .col-md-4 {
                padding: 0 0.5rem;
            }

            /* Average Response Time Mobile */
            .text-center .stat-value {
                font-size: 2.5rem;
            }

            .text-center .stat-label {
                font-size: 1rem;
            }

            /* List Groups Mobile */
            .list-group-item {
                padding: 0.75rem;
            }

            .list-group-item h6 {
                font-size: 0.95rem;
                margin-bottom: 0.25rem;
            }

            .list-group-item small {
                font-size: 0.8rem;
            }

            .badge.rounded-pill {
                font-size: 0.8rem;
                padding: 0.4rem 0.8rem;
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
                        <a class="nav-link" href="{{ route('kepsek.laporan') }}"><i class="bi bi-file-earmark-text"></i> Laporan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('kepsek.analisis') }}"><i class="bi bi-graph-up"></i> Analisis</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kepsek.profile') }}"><i class="bi bi-person-circle"></i> Profil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container analysis-container">
        <!-- Academic Year Selector -->
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">Analisis Data {{ $selectedYear }}</h2>
                    <form action="{{ route('kepsek.analisis') }}" method="GET" class="d-flex align-items-center flex-wrap">
                        <label for="tahun_ajaran" class="me-2 mb-2 mb-md-0">Tahun Ajaran:</label>
                        <select name="tahun_ajaran" id="tahun_ajaran" class="form-select" style="width: auto;" onchange="this.form.submit()">
                            @foreach($academicYears as $year)
                                <option value="{{ $year }}" {{ $year == $selectedYear ? 'selected' : '' }}>
                                    {{ $year }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                </div>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="stat-icon" style="background-color: #1a237e;">
                        <i class="bi bi-people"></i>
                    </div>
                    <div class="stat-value">{{ $userStats['total'] }}</div>
                    <div class="stat-label">Total Pengguna</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="stat-icon" style="background-color: #f57c00;">
                        <i class="bi bi-mortarboard"></i>
                    </div>
                    <div class="stat-value">{{ $userStats['siswa'] }}</div>
                    <div class="stat-label">Total Siswa</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="stat-icon" style="background-color: #2196f3;">
                        <i class="bi bi-person-workspace"></i>
                    </div>
                    <div class="stat-value">{{ $userStats['guru_bk'] }}</div>
                    <div class="stat-label">Total Guru BK</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="stat-icon" style="background-color: #4caf50;">
                        <i class="bi bi-person-badge"></i>
                    </div>
                    <div class="stat-value">{{ $userStats['wali_kelas'] }}</div>
                    <div class="stat-label">Total Wali Kelas</div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Left Column -->
            <div class="col-md-8">
                <!-- Monthly Complaints Chart -->
                <div class="chart-card">
                    <h4 class="chart-title">Tren Pengaduan Bulanan</h4>
                    <div class="chart-container">
                        <canvas id="monthlyChart"></canvas>
                    </div>
                </div>

                <!-- Category Distribution Chart -->
                <div class="chart-card">
                    <h4 class="chart-title">Distribusi Kategori Pengaduan</h4>
                    <div class="chart-container">
                        <canvas id="categoryChart"></canvas>
                    </div>
                </div>

                <!-- Class Distribution Chart -->
                <div class="chart-card">
                    <h4 class="chart-title">Distribusi Pengaduan per Kelas</h4>
                    <div class="chart-container">
                        <canvas id="classChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-md-4">
                <!-- Status Distribution Chart -->
                <div class="chart-card">
                    <h4 class="chart-title">Distribusi Status Pengaduan</h4>
                    <div class="chart-container" style="height: 250px;">
                        <canvas id="statusChart"></canvas>
                    </div>
                </div>

                <!-- Average Response Time -->
                <div class="chart-card">
                    <h4 class="chart-title">Waktu Respon Rata-rata</h4>
                    <div class="text-center">
                        <div class="stat-value">{{ number_format($avgResponseTime, 1) }}</div>
                        <div class="stat-label">Jam</div>
                    </div>
                </div>

                <!-- Top Students -->
                <div class="chart-card">
                    <h4 class="chart-title">Siswa dengan Pengaduan Terbanyak</h4>
                    <div class="list-group">
                        @foreach($topStudents as $student)
                        <div class="list-group-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-0">{{ $student->nama }}</h6>
                                    <small class="text-muted">{{ $student->kelas }}</small>
                                </div>
                                <span class="badge bg-primary rounded-pill">{{ $student->total_pengaduan }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Top Teachers -->
                <div class="chart-card">
                    <h4 class="chart-title">Guru dengan Tanggapan Terbanyak</h4>
                    <div class="list-group">
                        @foreach($topTeachers as $teacher)
                        <div class="list-group-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-0">{{ $teacher->nama }}</h6>
                                    <small class="text-muted">{{ ucfirst(str_replace('_', ' ', $teacher->peran)) }}</small>
                                </div>
                                <span class="badge bg-primary rounded-pill">{{ $teacher->total_tanggapan }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Chart Initialization -->
    <script>
        // Add responsive options to all charts
        const commonChartOptions = {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        boxWidth: 12,
                        padding: 15,
                        font: {
                            size: window.innerWidth < 768 ? 10 : 12
                        }
                    }
                }
            }
        };

        // Monthly Complaints Chart
        const monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
        new Chart(monthlyCtx, {
            type: 'line',
            data: {
                labels: {!! json_encode($monthlyData->map(function($item) {
                    return date('M Y', mktime(0, 0, 0, $item->month, 1, $item->year));
                })) !!},
                datasets: [{
                    label: 'Jumlah Pengaduan',
                    data: {!! json_encode($monthlyData->pluck('total')) !!},
                    borderColor: '#1a237e',
                    tension: 0.1,
                    fill: false
                }]
            },
            options: {
                ...commonChartOptions,
                aspectRatio: window.innerWidth < 768 ? 1 : 2,
                scales: {
                    x: {
                        ticks: {
                            font: {
                                size: window.innerWidth < 768 ? 8 : 12
                            },
                            maxRotation: 45,
                            minRotation: 45
                        }
                    },
                    y: {
                        ticks: {
                            font: {
                                size: window.innerWidth < 768 ? 10 : 12
                            }
                        }
                    }
                }
            }
        });

        // Category Distribution Chart
        const categoryCtx = document.getElementById('categoryChart').getContext('2d');
        new Chart(categoryCtx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($categoryData->pluck('kategori')) !!},
                datasets: [{
                    label: 'Jumlah Pengaduan',
                    data: {!! json_encode($categoryData->pluck('total')) !!},
                    backgroundColor: [
                        '#1a237e',
                        '#f57c00',
                        '#2196f3',
                        '#4caf50',
                        '#9c27b0'
                    ]
                }]
            },
            options: {
                ...commonChartOptions,
                aspectRatio: window.innerWidth < 768 ? 1 : 2,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    x: {
                        ticks: {
                            font: {
                                size: window.innerWidth < 768 ? 8 : 12
                            }
                        }
                    },
                    y: {
                        ticks: {
                            font: {
                                size: window.innerWidth < 768 ? 10 : 12
                            }
                        }
                    }
                }
            }
        });

        // Status Distribution Chart
        const statusCtx = document.getElementById('statusChart').getContext('2d');
        new Chart(statusCtx, {
            type: 'doughnut',
            data: {
                labels: {!! json_encode($statusData->pluck('status')) !!},
                datasets: [{
                    data: {!! json_encode($statusData->pluck('total')) !!},
                    backgroundColor: [
                        '#fff3cd',
                        '#e3f2fd',
                        '#e8f5e9'
                    ],
                    borderColor: [
                        '#ffeeba',
                        '#bbdefb',
                        '#c8e6c9'
                    ]
                }]
            },
            options: {
                ...commonChartOptions,
                aspectRatio: 1
            }
        });

        // Class Distribution Chart
        const classCtx = document.getElementById('classChart').getContext('2d');
        new Chart(classCtx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($classData->pluck('kelas')) !!},
                datasets: [{
                    label: 'Jumlah Pengaduan',
                    data: {!! json_encode($classData->pluck('total')) !!},
                    backgroundColor: [
                        '#1a237e',
                        '#f57c00',
                        '#2196f3',
                        '#4caf50',
                        '#9c27b0',
                        '#e91e63',
                        '#00bcd4',
                        '#ff9800'
                    ]
                }]
            },
            options: {
                ...commonChartOptions,
                aspectRatio: window.innerWidth < 768 ? 1 : 2,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    x: {
                        ticks: {
                            font: {
                                size: window.innerWidth < 768 ? 8 : 12
                            }
                        }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                            font: {
                                size: window.innerWidth < 768 ? 10 : 12
                            }
                        }
                    }
                }
            }
        });

        // Handle resize
        window.addEventListener('resize', function() {
            const isMobile = window.innerWidth < 768;
            const charts = [monthlyChart, categoryChart, classChart];
            
            charts.forEach(chart => {
                if (chart) {
                    chart.options.aspectRatio = isMobile ? 1 : 2;
                    chart.update();
                }
            });
        });
    </script>
</body>
</html>
