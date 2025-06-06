<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengaduan - SekolahCare</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
            min-height: 100vh;
        }
        .navbar {
            background-color: #1a73e8;
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
            color: #1a73e8;
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
            color: #1a73e8;
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
            color: #1a73e8;
        }
        .response-date {
            color: #6c757d;
            font-size: 0.875rem;
        }
        .btn-back {
            background-color: #1a73e8;
            border: none;
            padding: 0.75rem 2rem;
            font-weight: 500;
        }
        .btn-back:hover {
            background-color: #1557b0;
        }

        /* Mobile Responsive Styles */
        @media (max-width: 768px) {
            .detail-container {
                margin: 1rem auto;
                padding: 0 0.5rem;
            }
            
            .complaint-card {
                padding: 1rem;
                margin-bottom: 1rem;
                border-radius: 8px;
            }

            /* Student Info Mobile */
            .student-info {
                margin-bottom: 1rem;
                padding-bottom: 1rem;
            }
            
            .student-avatar {
                width: 50px;
                height: 50px;
                margin-right: 0.75rem;
                flex-shrink: 0;
            }
            
            .student-avatar i {
                font-size: 1.5rem;
            }
            
            .student-info h5 {
                font-size: 1rem;
                margin-bottom: 0.25rem;
            }
            
            .student-info p {
                font-size: 0.875rem;
                margin-bottom: 0;
            }

            /* Complaint Details Header Mobile */
            .complaint-details-header {
                flex-direction: column;
                align-items: flex-start !important;
                gap: 1rem;
            }
            
            .complaint-details-header h4 {
                font-size: 1.25rem;
                line-height: 1.3;
                margin-bottom: 0;
            }
            
            .status-badge {
                padding: 0.5rem 1rem;
                font-size: 0.75rem;
                align-self: flex-start;
            }

            /* Meta Items Mobile */
            .complaint-meta {
                padding: 1rem;
                margin-bottom: 1.5rem;
            }
            
            .meta-items {
                flex-direction: column;
                gap: 0.75rem;
                align-items: stretch;
            }
            
            .meta-item {
                padding: 0.75rem;
                gap: 0.5rem;
                width: 100%;
            }
            
            .meta-item i {
                font-size: 1rem;
                flex-shrink: 0;
            }
            
            .meta-item div {
                flex: 1;
            }
            
            .meta-item small {
                font-size: 0.75rem;
            }
            
            .meta-item span {
                font-size: 0.875rem;
            }

            /* Complaint Content Mobile */
            .complaint-content {
                margin-bottom: 1.5rem;
            }
            
            .complaint-content h5 {
                font-size: 1.1rem;
                margin-bottom: 0.75rem;
            }
            
            .complaint-content p {
                font-size: 0.9rem;
                line-height: 1.5;
            }
            
            .complaint-content h6 {
                font-size: 1rem;
                margin-bottom: 0.75rem;
            }

            /* Supporting Photo Mobile */
            .supporting-photo img {
                max-height: 250px !important;
                width: 100%;
                object-fit: cover;
                border-radius: 8px;
            }

            /* Response Section Mobile */
            .response-section {
                padding: 1rem;
                margin-top: 1.5rem;
                border-radius: 8px;
            }
            
            .response-section h5 {
                font-size: 1.1rem;
                margin-bottom: 1rem;
            }

            /* Response Cards Mobile */
            .response-card {
                background-color: white;
                border-radius: 8px;
                padding: 1rem;
                margin-bottom: 1rem;
                box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            }
            
            .response-header {
                margin-bottom: 0.75rem;
            }
            
            .response-header .d-flex {
                align-items: flex-start;
                gap: 0.5rem;
            }
            
            .response-header i {
                font-size: 1.5rem;
                margin-top: 0.125rem;
                flex-shrink: 0;
            }
            
            .response-header h6 {
                font-size: 0.9rem;
                margin-bottom: 0.25rem;
            }
            
            .response-header .badge {
                font-size: 0.7rem;
                padding: 0.25rem 0.5rem;
            }
            
            .response-header small {
                font-size: 0.75rem;
            }
            
            .response-content p {
                font-size: 0.875rem;
                line-height: 1.4;
                margin-bottom: 0;
            }

            /* Response Form Mobile */
            .response-form {
                margin-top: 1.5rem;
            }
            
            .response-form h6 {
                font-size: 1rem;
                margin-bottom: 0.75rem;
            }
            
            .response-form textarea {
                font-size: 0.875rem;
                min-height: 100px;
            }
            
            .response-form .btn {
                width: 100%;
                padding: 0.75rem;
                font-size: 0.875rem;
            }

            /* Alert Mobile */
            .alert {
                font-size: 0.875rem;
                padding: 0.75rem;
            }
            
            .alert i {
                font-size: 1rem;
            }

            /* Action Buttons Mobile */
            .action-buttons-mobile {
                flex-direction: column;
                gap: 0.75rem;
                align-items: stretch;
            }
            
            .action-buttons-mobile .btn {
                width: 100%;
                padding: 0.75rem 1rem;
                font-size: 0.875rem;
                justify-content: center;
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }
            
            .action-buttons-mobile .btn i {
                font-size: 0.875rem;
            }

            /* Navbar Mobile */
            .navbar-nav {
                text-align: center;
            }
            
            .navbar-nav .nav-item {
                margin: 0.25rem 0;
            }
            
            .navbar-nav .nav-link {
                font-size: 0.9rem;
            }
        }

        /* Very Small Screens */
        @media (max-width: 480px) {
            .complaint-card {
                padding: 0.75rem;
            }
            
            .meta-item {
                padding: 0.5rem;
            }
            
            .response-section {
                padding: 0.75rem;
            }
            
            .response-card {
                padding: 0.75rem;
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
                        <a class="nav-link" href="{{ route('siswa.beranda') }}"><i class="bi bi-house-door"></i> Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('siswa.pengaduan') }}"><i class="bi bi-plus-circle"></i> Buat Pengaduan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('siswa.list-pengaduan') }}"><i class="bi bi-list-ul"></i> Riwayat Pengaduan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('siswa.profile') }}"><i class="bi bi-person-circle"></i> Profil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
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
                <div class="d-flex justify-content-between align-items-start mb-4 complaint-details-header">
                    <h4 class="mb-0">{{ $pengaduan->judul }}</h4>
                    <span class="status-badge status-{{ strtolower($pengaduan->status) }}">
                        @if($pengaduan->status == 'Menunggu')
                            <i class="bi bi-clock"></i>
                        @elseif($pengaduan->status == 'Diproses')
                            <i class="bi bi-gear"></i>
                        @else
                            <i class="bi bi-check-circle"></i>
                        @endif
                        {{ $pengaduan->status }}
                    </span>
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

                <!-- Response Section -->
                <div class="response-section">
                    <h5 class="mb-3">Tanggapan</h5>
                    @forelse($pengaduan->tanggapan as $tanggapan)
                        <div class="response-card mb-3">
                            <div class="response-header">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person-circle fs-4 me-2"></i>
                                    <div>
                                        <div class="d-flex align-items-center gap-2">
                                            <h6 class="mb-0">{{ $tanggapan->user->name }}</h6>
                                            @if($tanggapan->user->role == 'guru_bk')
                                                <span class="badge bg-success">Guru BK</span>
                                            @elseif($tanggapan->user->role == 'wali_kelas')
                                                <span class="badge bg-success">Wali Kelas</span>
                                            @elseif($tanggapan->user->role == 'siswa')
                                                <span class="badge bg-info">Siswa</span>
                                            @elseif($tanggapan->user->role == 'kepala_sekolah')
                                                <span class="badge bg-primary">Kepala Sekolah</span>
                                            @endif
                                        </div>
                                        <small class="text-muted">{{ $tanggapan->created_at->format('d M Y H:i') }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="response-content mt-3">
                                <p class="mb-0">{{ $tanggapan->tanggapan }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle me-2"></i> Belum ada tanggapan untuk pengaduan ini.
                        </div>
                    @endforelse

                    <!-- Response Form -->
                    <div class="response-form mt-4">
                        <h6 class="mb-3">Tambahkan Tanggapan</h6>
                        @if($pengaduan->status != 'Selesai')
                            <form action="{{ route('siswa.tanggapan.store', $pengaduan->id) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <textarea class="form-control @error('tanggapan') is-invalid @enderror" 
                                        name="tanggapan" rows="3" placeholder="Tulis tanggapan Anda di sini...">{{ old('tanggapan') }}</textarea>
                                    @error('tanggapan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-send"></i> Kirim Tanggapan
                                    </button>
                                </div>
                            </form>
                        @else
                            <div class="alert alert-info">
                                <i class="bi bi-info-circle me-2"></i> Pengaduan ini sudah selesai dan tidak dapat ditanggapi lagi.
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Back Button -->
            <div class="text-center mt-4">
                <div class="d-flex justify-content-center gap-2 action-buttons-mobile">
                    <a href="{{ route('siswa.list-pengaduan') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali ke Daftar Pengaduan
                    </a>
                    @if($pengaduan->siswa_id === auth()->id())
                        <form action="{{ route('siswa.pengaduan.destroy', $pengaduan->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengaduan ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash"></i> Hapus Pengaduan
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>