<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Pengguna</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h2 {
            margin: 0;
            color: #1a237e;
        }
        .header p {
            margin: 5px 0;
            color: #666;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #1a237e;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            color: #666;
            font-size: 10px;
        }
        .section {
            margin-bottom: 30px;
        }
        .section-title {
            background-color: #f0f0f0;
            padding: 5px 10px;
            margin-bottom: 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Laporan Data Pengguna</h2>
        <p>SekolahCare - Sistem Pengaduan Siswa</p>
        <p>Tanggal Cetak: {{ date('d/m/Y H:i:s') }}</p>
    </div>

    <!-- Siswa Section -->
    <div class="section">
        <div class="section-title">Data Siswa</div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIS</th>
                    <th>Kelas</th>
                    <th>Jumlah Pengaduan</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $siswa = $users->where('role', 'siswa');
                    $no = 1;
                @endphp
                @foreach($siswa as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->nomor_induk }}</td>
                    <td>{{ $item->kelas ? $item->kelas->nama : '-' }}</td>
                    <td>{{ $item->pengaduan->count() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Guru BK Section -->
    <div class="section">
        <div class="section-title">Data Guru BK</div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Email</th>
                    <th>No. HP</th>
                    <th>Jumlah Tanggapan</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $guruBk = $users->where('role', 'guru_bk');
                    $no = 1;
                @endphp
                @foreach($guruBk as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->nomor_induk }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->no_hp ?? '-' }}</td>
                    <td>{{ $item->tanggapan->count() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Wali Kelas Section -->
    <div class="section">
        <div class="section-title">Data Wali Kelas</div>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Email</th>
                    <th>No. HP</th>
                    <th>Jumlah Tanggapan</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $waliKelas = $users->where('role', 'wali_kelas');
                    $no = 1;
                @endphp
                @foreach($waliKelas as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->nomor_induk }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->no_hp ?? '-' }}</td>
                    <td>{{ $item->tanggapan->count() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="footer">
        <p>Dokumen ini digenerate secara otomatis oleh sistem SekolahCare</p>
        <p>© {{ date('Y') }} SekolahCare. All rights reserved.</p>
    </div>
</body>
</html> 