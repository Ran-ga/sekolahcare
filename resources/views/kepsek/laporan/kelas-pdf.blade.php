<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Kelas</title>
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
    </style>
</head>
<body>
    <div class="header">
        <h2>Laporan Data Kelas</h2>
        <p>SekolahCare - Sistem Pengaduan Siswa</p>
        <p>Tanggal Cetak: {{ date('d/m/Y H:i:s') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kelas</th>
                <th>Jumlah Siswa</th>
                <th>Jumlah Pengaduan</th>
                <th>Rata-rata Pengaduan per Siswa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kelas as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->nama_kelas }}</td>
                <td>{{ $item->siswa_count }}</td>
                <td>{{ $item->pengaduan_count }}</td>
                <td>{{ $item->siswa_count > 0 ? number_format($item->pengaduan_count / $item->siswa_count, 2) : 0 }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="2">Total</th>
                <th>{{ $kelas->sum('siswa_count') }}</th>
                <th>{{ $kelas->sum('pengaduan_count') }}</th>
                <th>{{ $kelas->sum('siswa_count') > 0 ? number_format($kelas->sum('pengaduan_count') / $kelas->sum('siswa_count'), 2) : 0 }}</th>
            </tr>
        </tfoot>
    </table>

    <div class="footer">
        <p>Dokumen ini digenerate secara otomatis oleh sistem SekolahCare</p>
        <p>© {{ date('Y') }} SekolahCare. All rights reserved.</p>
    </div>
</body>
</html> 