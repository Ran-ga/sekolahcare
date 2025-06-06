<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Aktivitas - SekolahCare</title>
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
        .btn-action {
            background: linear-gradient(45deg, #dc3545, #ff6b6b);
            border: none;
            padding: 0.5rem 1rem;
            font-weight: 500;
            color: white;
        }
        .btn-action:hover {
            background: linear-gradient(45deg, #c82333, #e74c3c);
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(220, 53, 69, 0.2);
        }
        .timeline {
            position: relative;
            padding: 1rem 0;
        }
        .timeline::before {
            content: '';
            position: absolute;
            top: 0;
            left: 1.5rem;
            height: 100%;
            width: 2px;
            background: #e9ecef;
        }
        .timeline-item {
            position: relative;
            padding-left: 3rem;
            padding-bottom: 1.5rem;
        }
        .timeline-item:last-child {
            padding-bottom: 0;
        }
        .timeline-item::before {
            content: '';
            position: absolute;
            left: 1.25rem;
            top: 0.25rem;
            width: 0.5rem;
            height: 0.5rem;
            border-radius: 50%;
            background: #dc3545;
            border: 2px solid white;
            box-shadow: 0 0 0 2px #dc3545;
        }
        .timeline-content {
            background: white;
            padding: 1rem;
            border-radius: 0.5rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .timeline-date {
            font-size: 0.875rem;
            color: #6c757d;
            margin-bottom: 0.5rem;
        }
        .timeline-title {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        .timeline-text {
            color: #6c757d;
            margin-bottom: 0;
        }
        .activity-icon {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            font-size: 1.25rem;
        }
        .activity-icon.login {
            background-color: #d1e7dd;
            color: #0f5132;
        }
        .activity-icon.create {
            background-color: #cff4fc;
            color: #055160;
        }
        .activity-icon.update {
            background-color: #fff3cd;
            color: #856404;
        }
        .activity-icon.delete {
            background-color: #f8d7da;
            color: #842029;
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
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-bell"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.profile') }}"><i class="bi bi-person-circle"></i> Admin</a>
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
                            <a class="nav-link" href="{{ route('admin.kelola-laporan') }}">
                                <i class="bi bi-file-text me-2"></i> Kelola Pengaduan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.kategori') }}">
                                <i class="bi bi-tags me-2"></i> Kategori
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin.log-aktivitas') }}">
                                <i class="bi bi-journal-text me-2"></i> Log Aktivitas
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 main-content">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Log Aktivitas</h5>
                        <div class="d-flex gap-2">
                            <select class="form-select form-select-sm" style="width: auto;">
                                <option value="">Semua User</option>
                                <option value="admin">Admin</option>
                                <option value="guruBk">Guru BK</option>
                                <option value="siswa">Siswa</option>
                            </select>
                            <select class="form-select form-select-sm" style="width: auto;">
                                <option value="">Semua Aktivitas</option>
                                <option value="login">Login</option>
                                <option value="create">Membuat</option>
                                <option value="update">Mengubah</option>
                                <option value="delete">Menghapus</option>
                            </select>
                            <input type="date" class="form-control form-control-sm" style="width: auto;">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
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
                                        <td>15 Maret 2024, 14:30</td>
                                        <td><span class="badge bg-danger">Admin</span></td>
                                        <td>
                                            <i class="bi bi-box-arrow-in-right text-success"></i>
                                            Login
                                        </td>
                                        <td>Admin melakukan login ke sistem</td>
                                    </tr>
                                    <tr>
                                        <td>15 Maret 2024, 14:35</td>
                                        <td><span class="badge bg-primary">Guru BK</span></td>
                                        <td>
                                            <i class="bi bi-pencil-square text-warning"></i>
                                            Update
                                        </td>
                                        <td>Dr. Siti Aminah mengubah status pengaduan #123 menjadi "Diproses"</td>
                                    </tr>
                                    <tr>
                                        <td>15 Maret 2024, 14:40</td>
                                        <td><span class="badge bg-success">Siswa</span></td>
                                        <td>
                                            <i class="bi bi-plus-circle text-info"></i>
                                            Create
                                        </td>
                                        <td>Rangga Fatahillah Azis membuat pengaduan baru dengan judul "Masalah Bullying"</td>
                                    </tr>
                                    <tr>
                                        <td>15 Maret 2024, 14:45</td>
                                        <td><span class="badge bg-success">Siswa</span></td>
                                        <td>
                                            <i class="bi bi-chat-dots text-info"></i>
                                            Create
                                        </td>
                                        <td>Ahmad Rizki menambahkan tanggapan pada pengaduan #124</td>
                                    </tr>
                                    <tr>
                                        <td>15 Maret 2024, 14:50</td>
                                        <td><span class="badge bg-primary">Guru BK</span></td>
                                        <td>
                                            <i class="bi bi-box-arrow-in-right text-success"></i>
                                            Login
                                        </td>
                                        <td>Dr. Siti Aminah melakukan login ke sistem</td>
                                    </tr>
                                    <tr>
                                        <td>15 Maret 2024, 14:55</td>
                                        <td><span class="badge bg-danger">Admin</span></td>
                                        <td>
                                            <i class="bi bi-trash text-danger"></i>
                                            Delete
                                        </td>
                                        <td>Admin menghapus pengaduan #125 karena duplikat</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <nav class="mt-4">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 