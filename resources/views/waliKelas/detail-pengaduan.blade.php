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
            background-color: #2e7d32;
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
            color: #2e7d32;
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
            color: #2e7d32;
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
            color: #2e7d32;
        }
        .response-date {
            color: #6c757d;
            font-size: 0.875rem;
        }
        .btn-back {
            background-color: #2e7d32;
            border: none;
            padding: 0.75rem 2rem;
            font-weight: 500;
        }
        .btn-back:hover {
            background-color: #1b5e20;
        }

        /* Mobile Responsive Styles */
        @media (max-width: 768px) {
            .detail-container {
                margin: 1rem auto;
                padding: 0 0.75rem;
            }
            
            .complaint-card {
                padding: 1.25rem;
                margin-bottom: 1rem;
            }
            
            .student-info {
                flex-direction: column;
                text-align: center;
                padding-bottom: 1rem;
                margin-bottom: 1rem;
            }
            
            .student-avatar {
                margin: 0 auto 1rem;
            }
            
            .complaint-details h4 {
                font-size: 1.25rem;
                margin-bottom: 0.5rem;
            }
            
            .d-flex.justify-content-between.align-items-start {
                flex-direction: column;
                gap: 1rem;
            }
            
            .status-badge {
                align-self: flex-start;
                padding: 0.5rem 1rem;
                font-size: 0.8rem;
            }
            
            .complaint-meta {
                padding: 1rem;
                margin-bottom: 1.5rem;
            }
            
            .meta-items {
                flex-direction: column;
                gap: 1rem;
            }
            
            .meta-item {
                width: 100%;
                justify-content: flex-start;
            }
            
            .complaint-content {
                margin-bottom: 1.5rem;
            }
            
            .complaint-content h5 {
                font-size: 1.1rem;
            }
            
            .supporting-photo img {
                max-height: 300px;
                width: 100%;
                object-fit: cover;
            }
            
            .response-section {
                padding: 1rem;
                margin-top: 1.5rem;
            }
            
            .response-section h5 {
                font-size: 1.1rem;
            }
            
            .response-card {
                padding: 1rem;
            }
            
            .response-header {
                flex-direction: column;
                gap: 0.5rem;
            }
            
            .response-header .d-flex {
                flex-wrap: wrap;
                gap: 0.5rem;
            }
            
            .response-content {
                font-size: 0.95rem;
            }
            
            .response-form {
                margin-top: 1.5rem;
            }
            
            .response-form h6 {
                font-size: 1rem;
            }
            
            .response-form textarea {
                font-size: 0.95rem;
            }
            
            .d-flex.justify-content-between.align-items-center {
                flex-direction: column;
                gap: 1rem;
            }
            
            .d-flex.justify-content-between.align-items-center .badge {
                text-align: center;
                width: 100%;
            }
            
            .d-flex.justify-content-between.align-items-center .btn {
                width: 100%;
            }
            
            /* Navbar mobile optimization */
            .navbar-nav {
                text-align: center;
                padding-top: 1rem;
            }
            
            .navbar-nav .nav-item {
                margin-bottom: 0.5rem;
            }
            
            .navbar-brand {
                font-size: 1.5rem;
            }
            
            /* Back button mobile */
            .text-center.mt-4 .btn {
                width: 100%;
                margin-top: 1rem;
            }

            /* Status message mobile optimization */
            .status-message {
                display: block;
                text-align: center;
                padding: 0.75rem;
                margin-bottom: 1rem;
                font-size: 0.9rem;
                line-height: 1.4;
                border-radius: 8px;
                background-color: #fff3cd;
                border: 1px solid #ffeeba;
                color: #856404;
                white-space: normal;
            }

            .status-message i {
                display: block;
                font-size: 1.25rem;
                margin-bottom: 0.5rem;
            }

            .status-message .status-text {
                display: block;
                margin-bottom: 0.25rem;
            }

            .status-message .status-change {
                display: block;
                font-weight: 600;
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
                        <a class="nav-link" href="{{ route('waliKelas.profile') }}"><i class="bi bi-person-circle"></i> Profil</a>
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
                <div class="d-flex justify-content-between align-items-start mb-4">
                    <h4 class="mb-0">{{ $pengaduan->judul }}</h4>
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
                            <form action="{{ route('waliKelas.tanggapan.store', $pengaduan->id) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <textarea class="form-control @error('tanggapan') is-invalid @enderror" 
                                        name="tanggapan" rows="3" placeholder="Tulis tanggapan Anda di sini...">{{ old('tanggapan') }}</textarea>
                                    @error('tanggapan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        @if($pengaduan->status == 'Menunggu')
                                            <input type="hidden" name="status" value="Diproses">
                                            <span class="badge bg-warning status-message">
                                                <i class="bi bi-info-circle"></i>
                                                <span class="status-text">Status akan berubah otomatis</span>
                                                <span class="status-change">menjadi "Diproses"</span>
                                                <span class="status-text">setelah memberikan tanggapan</span>
                                            </span>
                                        @elseif($pengaduan->status == 'Diproses')
                                            <a href="{{ route('waliKelas.pengaduan.update-status', ['id' => $pengaduan->id, 'status' => 'Selesai']) }}" 
                                               class="btn btn-success"
                                               onclick="return confirm('Apakah Anda yakin ingin mengubah status menjadi Selesai?')">
                                                <i class="bi bi-check-circle"></i> Ubah Status Menjadi Selesai
                                            </a>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-success">
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
                <a href="{{ route('waliKelas.daftar-pengaduan') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali ke Daftar Pengaduan
                </a>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 