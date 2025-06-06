<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengaduan - SekolahCare</title>
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
        .detail-container {
            max-width: 1000px;
            margin: 2rem auto;
            padding: 0 1rem;
        }
        .complaint-card {
            background-color: white;
            border-radius: 10px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .student-info {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid #e9ecef;
        }
        .student-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
        }
        .student-avatar i {
            font-size: 2rem;
            color: #dc3545;
        }
        .status-badge {
            padding: 0.75rem 1.5rem;
            border-radius: 30px;
            font-size: 0.875rem;
            font-weight: 600;
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
        .complaint-content {
            margin-bottom: 2rem;
        }
        .complaint-meta {
            background-color: #f8f9fa;
            border-radius: 12px;
            padding: 1.25rem;
            margin-bottom: 2rem;
        }
        .meta-items {
            display: flex;
            gap: 2rem;
            align-items: center;
        }
        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: #495057;
            padding: 0.5rem 1rem;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }
        .meta-item i {
            font-size: 1.1rem;
            color: #dc3545;
        }
        .response-section {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 1.5rem;
            margin-top: 2rem;
        }
        .response-item {
            background-color: white;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1rem;
        }
        .response-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
        }
        .response-author {
            font-weight: 500;
            color: #dc3545;
        }
        .response-date {
            color: #6c757d;
            font-size: 0.875rem;
        }
        .btn-back {
            background-color: #dc3545;
            border: none;
            padding: 0.75rem 2rem;
            font-weight: 500;
        }
        .btn-back:hover {
            background-color: #c82333;
        }
        .btn-delete {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 0.75rem 2rem;
            font-weight: 500;
            margin-left: 1rem;
        }
        .btn-delete:hover {
            background-color: #c82333;
            color: white;
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
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.log-aktivitas') }}">
                                <i class="bi bi-journal-text me-2"></i> Log Aktivitas
                            </a>
                        </li> -->
                    </ul>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 main-content">
                <div class="detail-container">
                    <div class="complaint-card">
                        <!-- Student Info -->
                        <div class="student-info">
                            <div class="student-avatar">
                                <i class="bi bi-person-circle"></i>
                            </div>
                            <div>
                                <h5 class="mb-1">{{ $pengaduan->siswa->name }}</h5>
                                <p class="text-muted mb-0">{{ $pengaduan->siswa->kelas->nama }}</p>
                            </div>
                        </div>

                        <!-- Complaint Details -->
                        <div class="complaint-details">
                            <div class="d-flex justify-content-between align-items-start mb-4">
                                <h4 class="mb-0">{{ $pengaduan->judul }}</h4>
                                <div class="d-flex gap-2">
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
                                    <div class="dropdown">
                                        <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                            <i class="bi bi-arrow-repeat"></i> Ubah Status
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item {{ $pengaduan->status == 'Menunggu' ? 'active' : '' }}" 
                                                   href="{{ route('admin.kelola-laporan.update-status', ['id' => $pengaduan->id, 'status' => 'Menunggu']) }}">
                                                    <i class="bi bi-clock"></i> Menunggu
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item {{ $pengaduan->status == 'Diproses' ? 'active' : '' }}" 
                                                   href="{{ route('admin.kelola-laporan.update-status', ['id' => $pengaduan->id, 'status' => 'Diproses']) }}">
                                                    <i class="bi bi-gear"></i> Diproses
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item {{ $pengaduan->status == 'Selesai' ? 'active' : '' }}" 
                                                   href="{{ route('admin.kelola-laporan.update-status', ['id' => $pengaduan->id, 'status' => 'Selesai']) }}">
                                                    <i class="bi bi-check-circle"></i> Selesai
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="complaint-meta">
                                <div class="meta-items">
                                    <div class="meta-item">
                                        <i class="bi bi-calendar"></i>
                                        <div>
                                            <small class="text-muted d-block">Tanggal Pengaduan</small>
                                            <span>{{ $pengaduan->created_at->format('d M Y H:i') }}</span>
                                        </div>
                                    </div>
                                    <div class="meta-item">
                                        <i class="bi bi-tag"></i>
                                        <div>
                                            <small class="text-muted d-block">Kategori</small>
                                            <span>{{ $pengaduan->kategori->nama_kategori }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="complaint-content mb-4">
                                <h5 class="mb-3">Isi Pengaduan</h5>
                                <p class="text-muted">{{ $pengaduan->isi_pengaduan }}</p>

                                @if($pengaduan->foto_pendukung)
                                    <div class="mt-4">
                                        <h6 class="mb-3">Foto Pendukung</h6>
                                        <div class="supporting-photo">
                                            <img src="{{ Storage::url($pengaduan->foto_pendukung) }}" 
                                                 alt="Foto Pendukung" 
                                                 class="img-fluid rounded"
                                                 style="max-height: 400px; width: auto;"
                                                 onerror="this.onerror=null; this.src='{{ asset('images/no-image.png') }}';">
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <!-- Responses -->
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="mb-0">Tanggapan</h5>
                                </div>
                                <div class="card-body">
                                    @if($pengaduan->tanggapan->count() > 0)
                                        @foreach($pengaduan->tanggapan as $tanggapan)
                                        <div class="border-bottom mb-3 pb-3">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div>
                                                    <h6 class="mb-1">{{ $tanggapan->user->name }}</h6>
                                                    <small class="text-muted">{{ $tanggapan->created_at->format('d M Y H:i') }}</small>
                                                </div>
                                                <form action="{{ route('admin.kelola-laporan.tanggapan.destroy', ['pengaduanId' => $pengaduan->id, 'tanggapanId' => $tanggapan->id]) }}" 
                                                      method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" 
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus tanggapan ini?')">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <p class="mt-2 mb-0">{{ $tanggapan->tanggapan }}</p>
                                        </div>
                                        @endforeach
                                    @else
                                        <p class="text-muted">Belum ada tanggapan</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="text-center mt-4">
                            <a href="{{ route('admin.kelola-laporan') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Kembali ke Daftar Pengaduan
                            </a>
                            <button type="button" class="btn btn-delete" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                <i class="bi bi-trash"></i> Hapus Pengaduan
                            </button>
                        </div>
                    </div>
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
                    <form action="{{ route('admin.kelola-laporan.destroy', $pengaduan->id) }}" method="POST" style="display: inline;">
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
        // Auto-hide toasts after 5 seconds
        document.querySelectorAll('.toast').forEach(toast => {
            setTimeout(() => {
                toast.classList.remove('show');
            }, 5000);
        });

        // Handle status change confirmation
        document.querySelectorAll('.dropdown-item').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                const newStatus = this.textContent.trim();
                const currentStatus = document.querySelector('.status-badge').textContent.trim();
                
                if (newStatus === currentStatus) {
                    return;
                }

                if (confirm(`Apakah Anda yakin ingin mengubah status pengaduan menjadi "${newStatus}"?`)) {
                    window.location.href = this.href;
                }
            });
        });
    </script>
</body>
</html>
