<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pengguna - SekolahCare</title>
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
        .table th {
            font-weight: 600;
            background-color: #f8f9fa;
        }
        .btn-action {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
        }
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6c757d;
        }
        .role-badge {
            padding: 0.35rem 0.75rem;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 500;
        }
        .role-admin {
            background-color: #dc3545;
            color: white;
        }
        .role-guruBk {
            background-color: #198754;
            color: white;
        }
        .role-waliKelas {
            background-color: #198754;
            color: white;
        }
        .role-kepsek {
            background-color: #6f42c1;
            color: white;
        }
        .role-siswa {
            background-color: #0d6efd;
            color: white;
        }
        .status-badge {
            padding: 0.35rem 0.75rem;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 500;
        }
        .status-active {
            background-color: #d1e7dd;
            color: #0f5132;
        }
        .status-inactive {
            background-color: #f8d7da;
            color: #842029;
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

            /* Header Mobile */
            .d-flex.justify-content-between.align-items-center {
                flex-direction: column;
                gap: 1rem;
            }

            .d-flex.justify-content-between.align-items-center .btn {
                width: 100%;
            }

            /* Filter Section Mobile */
            .card-body .row.g-3 {
                margin: 0;
            }

            .card-body .col-md-3,
            .card-body .col-md-4,
            .card-body .col-md-2 {
                padding: 0.5rem;
                width: 100%;
            }

            .input-group {
                margin-bottom: 1rem;
            }

            /* Table Mobile */
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

            .user-avatar {
                width: 32px;
                height: 32px;
                font-size: 0.875rem;
            }

            .role-badge {
                padding: 0.25rem 0.5rem;
                font-size: 0.75rem;
            }

            .btn-action {
                padding: 0.25rem 0.4rem;
                font-size: 0.75rem;
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
            }

            .form-label {
                font-size: 0.875rem;
            }

            /* Toast Messages Mobile */
            .toast {
                width: 100%;
                max-width: 300px;
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
                            <a class="nav-link" href="/admin/dashboard">
                                <i class="bi bi-speedometer2 me-2"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/admin/kelola-pengguna">
                                <i class="bi bi-people me-2"></i> Kelola Pengguna
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/kelola-laporan">
                                <i class="bi bi-file-text me-2"></i> Kelola Pengaduan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/kategori">
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
                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="mb-0">Kelola Pengguna</h4>
                    <button class="btn btn-primary">
                        <i class="bi bi-plus"></i> Tambah Pengguna
                    </button>
                </div>

                <!-- Filter Section -->
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('admin.kelola-pengguna') }}" method="GET">
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label class="form-label">Role</label>
                                    <select class="form-select" name="role">
                                        <option value="">Semua Role</option>
                                        <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="guruBk" {{ request('role') == 'guruBk' ? 'selected' : '' }}>Guru BK</option>
                                        <option value="waliKelas" {{ request('role') == 'waliKelas' ? 'selected' : '' }}>Wali Kelas</option>
                                        <option value="kepsek" {{ request('role') == 'kepsek' ? 'selected' : '' }}>Kepala Sekolah</option>
                                        <option value="siswa" {{ request('role') == 'siswa' ? 'selected' : '' }}>Siswa</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Kelas</label>
                                    <select class="form-select" name="kelas">
                                        <option value="">Semua Kelas</option>
                                        @foreach($kelas as $k)
                                            <option value="{{ $k->id }}" {{ request('kelas') == $k->id ? 'selected' : '' }}>
                                                {{ $k->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Cari Pengguna</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search" placeholder="Cari nama, email, atau nomor induk..." value="{{ request('search') }}">
                                        <button class="btn btn-outline-secondary" type="submit">
                                            <i class="bi bi-search"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">&nbsp;</label>
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-secondary w-100" type="submit">
                                            <i class="bi bi-funnel"></i> Filter
                                        </button>
                                        <a href="{{ route('admin.kelola-pengguna') }}" class="btn btn-outline-secondary">
                                            <i class="bi bi-arrow-counterclockwise"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Users Table -->
                <div class="card">
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
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $user)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="user-avatar me-3">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">{{ $user->name }}</h6>
                                                    <small class="text-muted">ID: {{ $user->id }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            @php
                                                $roleMap = [
                                                    'guru_bk' => 'guruBk',
                                                    'wali_kelas' => 'waliKelas',
                                                    'kepala_sekolah' => 'kepsek'
                                                ];
                                                $displayRole = $roleMap[$user->role] ?? $user->role;
                                                $displayName = [
                                                    'guru_bk' => 'Guru BK',
                                                    'wali_kelas' => 'Wali Kelas',
                                                    'kepala_sekolah' => 'Kepala Sekolah'
                                                ][$user->role] ?? ucfirst($user->role);
                                            @endphp
                                            <span class="role-badge role-{{ $displayRole }}">
                                                {{ $displayName }}
                                            </span>
                                        </td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if($user->kelas)
                                                <span class="badge bg-info">{{ $user->kelas->nama }}</span>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>{{ $user->created_at->format('d M Y, H:i') }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary btn-action btn-edit" 
                                                    data-user-id="{{ $user->id }}">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger btn-action btn-delete" 
                                                    data-user-id="{{ $user->id }}"
                                                    data-user-name="{{ $user->name }}">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data pengguna</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <nav class="mt-4">
                            <ul class="pagination justify-content-center">
                                @if($users->onFirstPage())
                                    <li class="page-item disabled">
                                        <span class="page-link">Previous</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $users->previousPageUrl() }}">Previous</a>
                                    </li>
                                @endif

                                @php
                                    $start = max(1, $users->currentPage() - 4);
                                    $end = min($users->lastPage(), $start + 9);
                                    if ($end - $start < 9) {
                                        $start = max(1, $end - 9);
                                    }
                                @endphp

                                @if($start > 1)
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $users->url(1) }}">1</a>
                                    </li>
                                    @if($start > 2)
                                        <li class="page-item disabled">
                                            <span class="page-link">...</span>
                                        </li>
                                    @endif
                                @endif

                                @for($i = $start; $i <= $end; $i++)
                                    <li class="page-item {{ $i == $users->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $users->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                @if($end < $users->lastPage())
                                    @if($end < $users->lastPage() - 1)
                                        <li class="page-item disabled">
                                            <span class="page-link">...</span>
                                        </li>
                                    @endif
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $users->url($users->lastPage()) }}">{{ $users->lastPage() }}</a>
                                    </li>
                                @endif

                                @if($users->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $users->nextPageUrl() }}">Next</a>
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

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus pengguna ini? Tindakan ini tidak dapat dibatalkan.
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

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="name" id="editName" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="editEmail" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nomor HP</label>
                            <input type="text" class="form-control" name="no_hp" id="editNoHp" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <select class="form-select" name="role" id="editRole" required>
                                <option value="admin">Admin</option>
                                <option value="guruBk">Guru BK</option>
                                <option value="waliKelas">Wali Kelas</option>
                                <option value="kepsek">Kepala Sekolah</option>
                                <option value="siswa">Siswa</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kelas</label>
                            <select class="form-select" name="kelas_id" id="editKelas">
                                <option value="">Pilih Kelas</option>
                                @foreach($kelas as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                @endforeach
                            </select>
                            <small class="text-muted">Hanya diisi untuk siswa dan wali kelas</small>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="reset_password" id="resetPassword">
                                <label class="form-check-label" for="resetPassword">
                                    Reset Password (Default: password123)
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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

        // Handle edit button click
        document.querySelectorAll('.btn-edit').forEach(button => {
            button.addEventListener('click', function() {
                const userId = this.getAttribute('data-user-id');
                const modal = document.getElementById('editModal');
                const form = document.getElementById('editForm');
                
                // Fetch user data
                fetch(`/admin/kelola-pengguna/${userId}/edit`)
                    .then(response => response.json())
                    .then(data => {
                        // Update form fields
                        document.getElementById('editName').value = data.user.name;
                        document.getElementById('editEmail').value = data.user.email;
                        document.getElementById('editNoHp').value = data.user.no_hp || '';
                        document.getElementById('editRole').value = data.user.role;
                        document.getElementById('editKelas').value = data.user.kelas_id || '';
                        document.getElementById('resetPassword').checked = false;
                        
                        // Update form action
                        form.action = `/admin/kelola-pengguna/${userId}`;
                        
                        // Show modal
                        new bootstrap.Modal(modal).show();
                    });
            });
        });

        // Handle delete button click
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function() {
                const userId = this.getAttribute('data-user-id');
                const userName = this.getAttribute('data-user-name');
                const modal = document.getElementById('deleteModal');
                const form = document.getElementById('deleteForm');
                
                // Update modal content
                modal.querySelector('.modal-body').textContent = 
                    `Apakah Anda yakin ingin menghapus pengguna "${userName}"? Tindakan ini tidak dapat dibatalkan.`;
                
                // Update form action
                form.action = `/admin/kelola-pengguna/${userId}`;
                
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
    </script>
</body>
</html> 