-- Database Schema untuk SekolahCare
-- Sistem Manajemen Pengaduan Sekolah

-- Buat database (opsional)
-- CREATE DATABASE sekolahcare;
-- USE sekolahcare;

-- Tabel 1: kelas
CREATE TABLE kelas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(10) NOT NULL COMMENT 'Nama kelas (misalnya: 9A, 8B, dll)'
);

-- Tabel 2: users
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL COMMENT 'Nama lengkap pengguna',
    email VARCHAR(100) UNIQUE COMMENT 'Email (jika ada sistem login)',
    password VARCHAR(255) COMMENT 'Password (disimpan dalam bentuk hash)',
    role ENUM('admin', 'siswa', 'guru_bk', 'wali_kelas', 'kepala_sekolah') NOT NULL COMMENT 'Peran pengguna',
    kelas_id INT NULL COMMENT 'Hanya diisi untuk siswa dan wali kelas',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT 'Waktu pembuatan',
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Waktu terakhir diperbarui',
    
    -- Foreign key constraint
    FOREIGN KEY (kelas_id) REFERENCES kelas(id) ON DELETE SET NULL ON UPDATE CASCADE
);

-- Tabel 3: kategori
CREATE TABLE kategori (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_kategori VARCHAR(50) NOT NULL COMMENT 'Nama kategori (contoh: Fasilitas, Bullying)'
);

-- Tabel 4: pengaduan
CREATE TABLE pengaduan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    siswa_id INT NOT NULL COMMENT 'ID siswa yang membuat pengaduan',
    judul VARCHAR(200) NOT NULL COMMENT 'Judul pengaduan',
    isi_pengaduan TEXT NOT NULL COMMENT 'Deskripsi pengaduan',
    status ENUM('Menunggu', 'Diproses', 'Selesai') DEFAULT 'Menunggu' COMMENT 'Status pengaduan',
    kategori_id INT NOT NULL COMMENT 'ID kategori pengaduan',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT 'Tanggal dibuat',
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Tanggal terakhir diperbarui',
    
    -- Foreign key constraints
    FOREIGN KEY (siswa_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (kategori_id) REFERENCES kategori(id) ON DELETE RESTRICT ON UPDATE CASCADE
);

-- Tabel 5: tanggapan
CREATE TABLE tanggapan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pengaduan_id INT NOT NULL COMMENT 'ID pengaduan yang ditanggapi',
    user_id INT NOT NULL COMMENT 'ID pengguna yang memberi tanggapan (guru, wali kelas, atau siswa untuk feedback)',
    isi_tanggapan TEXT NOT NULL COMMENT 'Isi dari tanggapan atau feedback',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT 'Waktu tanggapan dibuat',
    
    -- Foreign key constraints
    FOREIGN KEY (pengaduan_id) REFERENCES pengaduan(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Buat indeks untuk optimasi query
CREATE INDEX idx_users_role ON users(role);
CREATE INDEX idx_users_kelas ON users(kelas_id);
CREATE INDEX idx_pengaduan_siswa ON pengaduan(siswa_id);
CREATE INDEX idx_pengaduan_kategori ON pengaduan(kategori_id);
CREATE INDEX idx_pengaduan_status ON pengaduan(status);
CREATE INDEX idx_tanggapan_pengaduan ON tanggapan(pengaduan_id);
CREATE INDEX idx_tanggapan_user ON tanggapan(user_id);

-- Data contoh untuk testing (opsional)
-- INSERT INTO kelas (nama) VALUES 
-- ('7A'), ('7B'), ('8A'), ('8B'), ('9A'), ('9B');

-- INSERT INTO kategori (nama_kategori) VALUES 
-- ('Fasilitas'), ('Bullying'), ('Akademik'), ('Kedisiplinan'), ('Kebersihan'), ('Lainnya');

-- INSERT INTO users (name, email, password, role, kelas_id) VALUES 
-- ('Administrator', 'admin@sekolah.edu', '$2y$10$example_hash', 'admin', NULL),
-- ('Guru BK', 'gurubk@sekolah.edu', '$2y$10$example_hash', 'guru_bk', NULL),
-- ('Wali Kelas 9A', 'wali9a@sekolah.edu', '$2y$10$example_hash', 'wali_kelas', 5),
-- ('Kepala Sekolah', 'kepsek@sekolah.edu', '$2y$10$example_hash', 'kepala_sekolah', NULL),
-- ('Ahmad Siswa', 'ahmad@siswa.edu', '$2y$10$example_hash', 'siswa', 5);

-- Tampilkan struktur tabel yang telah dibuat
-- SHOW TABLES;
-- DESCRIBE kelas;
-- DESCRIBE users;
-- DESCRIBE kategori;
-- DESCRIBE pengaduan;
-- DESCRIBE tanggapan;