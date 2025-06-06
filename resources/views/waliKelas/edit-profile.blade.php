<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil - SekolahCare</title>
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

        .password-form {
            background-color: var(--primary-light);
            padding: 2rem;
            border-radius: 10px;
            margin-top: 2rem;
        }

        .btn-save {
            background-color: var(--primary-color);
            border: none;
            padding: 0.75rem 2rem;
            font-weight: 500;
            color: white;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-save:hover {
            background-color: var(--primary-dark);
            color: white;
            transform: translateY(-2px);
        }

        .password-requirements {
            font-size: 0.875rem;
            color: #6c757d;
            margin-top: 0.5rem;
        }

        .password-match {
            font-size: 0.875rem;
            margin-top: 0.5rem;
        }

        .password-match.valid {
            color: #198754;
        }

        .password-match.invalid {
            color: #dc3545;
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

        .class-badge {
            background-color: white;
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

            <!-- Password Change Form -->
            <div class="password-form">
                <h4 class="mb-4">Ubah Password</h4>
                <form action="{{ route('waliKelas.profile.update-password') }}" method="POST" id="passwordForm">
                    @csrf
                    <div class="mb-3">
                        <label for="current_password" class="form-label">Password Saat Ini</label>
                        <input type="password" class="form-control @error('current_password') is-invalid @enderror" 
                               id="current_password" name="current_password" required>
                        @error('current_password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="new_password" class="form-label">Password Baru</label>
                        <input type="password" class="form-control @error('new_password') is-invalid @enderror" 
                               id="new_password" name="new_password" required>
                        @error('new_password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="password-requirements">
                            Password harus minimal 8 karakter dan mengandung huruf dan angka
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="new_password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                        <input type="password" class="form-control" 
                               id="new_password_confirmation" name="new_password_confirmation" required>
                        <div class="password-match" id="passwordMatch"></div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-save">
                            <i class="bi bi-check-circle"></i> Simpan Perubahan
                        </button>
                        <a href="{{ route('waliKelas.profile') }}" class="btn btn-secondary ms-2">
                            <i class="bi bi-x-circle"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const newPassword = document.getElementById('new_password');
            const confirmPassword = document.getElementById('new_password_confirmation');
            const passwordMatch = document.getElementById('passwordMatch');
            const form = document.getElementById('passwordForm');

            function validatePassword() {
                const password = newPassword.value;
                const confirm = confirmPassword.value;

                if (confirm === '') {
                    passwordMatch.textContent = '';
                    passwordMatch.className = 'password-match';
                    return;
                }

                if (password === confirm) {
                    passwordMatch.textContent = 'Password cocok';
                    passwordMatch.className = 'password-match valid';
                } else {
                    passwordMatch.textContent = 'Password tidak cocok';
                    passwordMatch.className = 'password-match invalid';
                }
            }

            confirmPassword.addEventListener('input', validatePassword);
            newPassword.addEventListener('input', validatePassword);

            form.addEventListener('submit', function(e) {
                if (newPassword.value !== confirmPassword.value) {
                    e.preventDefault();
                    alert('Password tidak cocok!');
                }
            });
        });
    </script>
</body>
</html> 