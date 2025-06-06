<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Wali Kelas - SekolahCare</title>
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

        .profile-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .profile-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .profile-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin: 0 auto 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--primary-light);
            border: 5px solid white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .profile-avatar i {
            font-size: 100px;
            color: var(--primary-color);
        }

        .profile-info {
            margin-bottom: 2rem;
        }

        .info-item {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            padding: 1rem;
            background-color: #f8f9fa;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .info-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .info-icon {
            width: 40px;
            height: 40px;
            background-color: var(--primary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            color: white;
        }

        .info-content {
            flex-grow: 1;
        }

        .info-label {
            font-size: 0.875rem;
            color: #6c757d;
            margin-bottom: 0.25rem;
        }

        .info-value {
            font-weight: 500;
            color: #212529;
        }

        .btn-edit {
            background-color: var(--primary-color);
            border: none;
            padding: 0.75rem 2rem;
            font-weight: 500;
            color: white;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-edit:hover {
            background-color: var(--primary-dark);
            color: white;
            transform: translateY(-2px);
        }

        .btn-danger {
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-danger:hover {
            transform: translateY(-2px);
        }

        .class-badge {
            background-color: var(--primary-light);
            color: var(--primary-color);
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            margin-bottom: 1rem;
            display: inline-block;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .class-badge:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .class-info {
            background-color: var(--primary-light);
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .class-info h5 {
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .class-stats {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .stat-item {
            background-color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            text-align: center;
        }

        .stat-value {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary-color);
        }

        .stat-label {
            font-size: 0.875rem;
            color: #6c757d;
        }

        /* Mobile Responsive Styles */
        @media (max-width: 768px) {
            .profile-container {
                margin: 1rem;
                padding: 1.25rem;
                border-radius: 10px;
            }

            .profile-header {
                margin-bottom: 1.5rem;
            }

            .profile-avatar {
                width: 120px;
                height: 120px;
                margin-bottom: 0.75rem;
            }

            .profile-avatar i {
                font-size: 80px;
            }

            .profile-header h2 {
                font-size: 1.5rem;
                margin-bottom: 0.25rem;
            }

            .profile-header p {
                font-size: 0.9rem;
            }

            .class-info {
                padding: 1.25rem;
                margin-bottom: 1.5rem;
            }

            .class-info h5 {
                font-size: 1.1rem;
                margin-bottom: 0.75rem;
            }

            .class-badge {
                width: 100%;
                text-align: center;
                padding: 0.5rem 1rem;
                font-size: 0.9rem;
            }

            .class-stats {
                flex-direction: column;
                gap: 0.75rem;
            }

            .stat-item {
                padding: 0.75rem;
                display: flex;
                align-items: center;
                justify-content: space-between;
                text-align: left;
            }

            .stat-value {
                font-size: 1.25rem;
                margin-bottom: 0;
            }

            .stat-label {
                font-size: 0.85rem;
                margin-bottom: 0;
            }

            .profile-info {
                margin-bottom: 1.5rem;
            }

            .info-item {
                padding: 0.75rem;
                margin-bottom: 0.75rem;
                flex-wrap: wrap;
            }

            .info-icon {
                width: 35px;
                height: 35px;
                margin-right: 0.75rem;
            }

            .info-icon i {
                font-size: 0.9rem;
            }

            .info-content {
                width: calc(100% - 50px);
            }

            .info-label {
                font-size: 0.8rem;
                margin-bottom: 0.2rem;
            }

            .info-value {
                font-size: 0.95rem;
            }

            .text-center {
                display: flex;
                flex-direction: column;
                gap: 0.75rem;
            }

            .btn-edit, .btn-danger {
                width: 100%;
                padding: 0.75rem;
                font-size: 0.95rem;
            }

            .btn-danger {
                margin-left: 0 !important;
            }

            /* Navbar mobile optimization */
            .navbar {
                padding: 0.5rem 1rem;
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
                        <a class="nav-link" href="{{ route('waliKelas.beranda') }}"><i class="bi bi-house-door"></i> Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('waliKelas.daftar-pengaduan') }}"><i class="bi bi-list-ul"></i> Daftar Pengaduan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('waliKelas.profile') }}"><i class="bi bi-person-circle"></i> Profil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <div class="profile-container">
            <div class="profile-header">
                <div class="profile-avatar">
                    <i class="bi bi-person-circle"></i>
                </div>
                <h2>{{ $user->name }}</h2>
                <p class="text-muted">Wali Kelas</p>
            </div>

            <!-- Kelas yang diampu -->
            <div class="class-info">
                <h5><i class="bi bi-mortarboard-fill"></i> Kelas yang Diampu</h5>
                <div class="class-badge">
                    <i class="bi bi-people-fill"></i> {{ $user->kelas->nama ?? '-' }}
                </div>
                <div class="class-stats">
                    <div class="stat-item">
                        <div class="stat-label">Total Siswa</div>
                        <div class="stat-value">32</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-label">Pengaduan</div>
                        <div class="stat-value">15</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-label">Tahun Ajaran</div>
                        <div class="stat-value">2024/2025</div>
                    </div>
                </div>
            </div>

            <div class="profile-info">
                <!-- Nama -->
                <div class="info-item">
                    <div class="info-icon">
                        <i class="bi bi-person"></i>
                    </div>
                    <div class="info-content">
                        <div class="info-label">Nama Lengkap</div>
                        <div class="info-value">{{ $user->name }}</div>
                    </div>
                </div>

                <!-- NIP -->
                <div class="info-item">
                    <div class="info-icon">
                        <i class="bi bi-card-text"></i>
                    </div>
                    <div class="info-content">
                        <div class="info-label">NIP</div>
                        <div class="info-value">{{ $user->nomor_induk }}</div>
                    </div>
                </div>

                <!-- Kelas -->
                <div class="info-item">
                    <div class="info-icon">
                        <i class="bi bi-mortarboard"></i>
                    </div>
                    <div class="info-content">
                        <div class="info-label">Kelas</div>
                        <div class="info-value">{{ $user->kelas->nama ?? '-' }}</div>
                    </div>
                </div>

                <!-- No HP -->
                <div class="info-item">
                    <div class="info-icon">
                        <i class="bi bi-telephone"></i>
                    </div>
                    <div class="info-content">
                        <div class="info-label">Nomor Telepon</div>
                        <div class="info-value">{{ $user->no_hp ?? '-' }}</div>
                    </div>
                </div>

                <!-- Email -->
                <div class="info-item">
                    <div class="info-icon">
                        <i class="bi bi-envelope"></i>
                    </div>
                    <div class="info-content">
                        <div class="info-label">Email</div>
                        <div class="info-value">{{ $user->email }}</div>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <a href="{{ route('waliKelas.profile.edit') }}" class="btn btn-edit">
                    <i class="bi bi-pencil"></i> Edit Profil
                </a>
                <form action="{{ route('logout') }}" method="POST" class="w-100">
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 