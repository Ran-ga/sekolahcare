<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - SekolahCare</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            background-image: linear-gradient(135deg, #1a73e8 0%, #0f4c9e 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px 0;
            font-family: 'Segoe UI', Arial, sans-serif;
        }
        .register-container {
            background-color: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            margin: 20px;
        }
        .register-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        .register-header h1 {
            color: #1a73e8;
            font-size: 2rem;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }
        .register-header p {
            color: #666;
            margin-bottom: 1.5rem;
        }
        .form-label {
            color: #333;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }
        .form-control {
            border: 2px solid #e1e5ea;
            border-radius: 8px;
            padding: 0.75rem;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #1a73e8;
            box-shadow: 0 0 0 0.2rem rgba(26,115,232,.25);
        }
        .btn-register {
            background-color: #1a73e8;
            border: none;
            padding: 0.75rem;
            border-radius: 8px;
            width: 100%;
            font-weight: 600;
            color: white;
            margin-top: 1rem;
            transition: all 0.3s ease;
        }
        .btn-register:hover {
            background-color: #1557b0;
            transform: translateY(-1px);
        }
        .error-message {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
        .form-select {
            border: 2px solid #e1e5ea;
            border-radius: 8px;
            padding: 0.75rem;
        }
        .form-select:focus {
            border-color: #1a73e8;
            box-shadow: 0 0 0 0.2rem rgba(26,115,232,.25);
        }
        .alert {
            border-radius: 8px;
            margin-bottom: 1.5rem;
        }
        .login-link {
            text-align: center;
            margin-top: 1.5rem;
            color: #666;
        }
        .login-link a {
            color: #1a73e8;
            text-decoration: none;
            font-weight: 500;
        }
        .login-link a:hover {
            text-decoration: underline;
        }
        @media (max-width: 576px) {
            .register-container {
                margin: 10px;
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-header">
            <h1>SekolahCare</h1>
            <p>Platform Pengaduan Masalah Sekolah<br>SMAN 17 Kabupaten Tangerang</p>
        </div>
            
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="role" class="form-label">Daftar Sebagai</label>
                <select class="form-select @error('role') is-invalid @enderror" 
                        id="role" 
                        name="role" 
                        required>
                    <option value="">Pilih Role</option>
                    <option value="siswa" {{ old('role') == 'siswa' ? 'selected' : '' }}>Siswa</option>
                    <option value="wali_kelas" {{ old('role') == 'wali_kelas' ? 'selected' : '' }}>Wali Kelas</option>
                </select>
                @error('role')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" 
                       class="form-control @error('name') is-invalid @enderror" 
                       id="name" 
                       name="name" 
                       value="{{ old('name') }}" 
                       placeholder="Masukkan nama lengkap"
                       required>
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" 
                       class="form-control @error('email') is-invalid @enderror" 
                       id="email" 
                       name="email" 
                       value="{{ old('email') }}" 
                       placeholder="Masukkan email"
                       required>
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" 
                       class="form-control @error('password') is-invalid @enderror" 
                       id="password" 
                       name="password" 
                       placeholder="Masukkan password"
                       required>
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" 
                       class="form-control" 
                       id="password_confirmation" 
                       name="password_confirmation" 
                       placeholder="Konfirmasi password"
                       required>
            </div>

            <div class="mb-3">
                <label for="nomor_induk" class="form-label" id="nomor_induk_label">NISN</label>
                <input type="text" 
                       class="form-control @error('nomor_induk') is-invalid @enderror" 
                       id="nomor_induk" 
                       name="nomor_induk" 
                       value="{{ old('nomor_induk') }}"
                       placeholder="Masukkan nomor induk"
                       required>
                @error('nomor_induk')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="no_hp" class="form-label">Nomor HP</label>
                <input type="text" 
                       class="form-control @error('no_hp') is-invalid @enderror" 
                       id="no_hp" 
                       name="no_hp" 
                       value="{{ old('no_hp') }}" 
                       placeholder="Masukkan nomor HP"
                       required>
                @error('no_hp')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select class="form-select @error('jenis_kelamin') is-invalid @enderror" 
                        id="jenis_kelamin" 
                        name="jenis_kelamin" 
                        required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('jenis_kelamin')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3" id="kelas_field">
                <label for="kelas_id" class="form-label">Kelas</label>
                <select class="form-select @error('kelas_id') is-invalid @enderror" 
                        id="kelas_id" 
                        name="kelas_id">
                    <option value="">Pilih Kelas</option>
                    @foreach ($kelas as $k)
                        <option value="{{ $k->id }}" {{ old('kelas_id') == $k->id ? 'selected' : '' }}>
                            {{ $k->nama }}
                        </option>
                    @endforeach
                </select>
                @error('kelas_id')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-register">
                <i class="fas fa-user-plus me-2"></i>Daftar Sekarang
            </button>

            <div class="login-link">
                Sudah punya akun? <a href="{{ route('login') }}">Login</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('role').addEventListener('change', function() {
            const role = this.value;
            const kelasField = document.getElementById('kelas_field');
            const nomorIndukLabel = document.getElementById('nomor_induk_label');

            if (role === 'siswa') {
                kelasField.style.display = 'block';
                nomorIndukLabel.textContent = 'NISN';
                document.getElementById('kelas_id').required = true;
            } else if (role === 'wali_kelas') {
                kelasField.style.display = 'none';
                nomorIndukLabel.textContent = 'NUPTK';
                document.getElementById('kelas_id').required = false;
            } else {
                kelasField.style.display = 'none';
                document.getElementById('kelas_id').required = false;
            }
        });

        // Trigger change event on page load if role is already selected
        window.addEventListener('load', function() {
            document.getElementById('role').dispatchEvent(new Event('change'));
        });
    </script>
</body>
</html> 