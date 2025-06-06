<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Kategori</title>
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
        <h2>Laporan Kategori Pengaduan</h2>
        <p>SekolahCare - Sistem Pengaduan Siswa</p>
        <p>Tanggal Cetak: {{ date('d/m/Y H:i:s') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Jumlah Pengaduan</th>
                <th>Persentase</th>
            </tr>
        </thead>
        <tbody>
            @php
                $total = $kategoris->sum('pengaduan_count');
            @endphp
            @foreach($kategoris as $index => $kategori)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $kategori->nama_kategori }}</td>
                <td>{{ $kategori->pengaduan_count }}</td>
                <td>{{ $total > 0 ? number_format(($kategori->pengaduan_count / $total) * 100, 1) : 0 }}%</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="2">Total</th>
                <th>{{ $total }}</th>
                <th>100%</th>
            </tr>
        </tfoot>
    </table>

    <div class="footer">
        <p>Dokumen ini digenerate secara otomatis oleh sistem SekolahCare</p>
        <p>© {{ date('Y') }} SekolahCare. All rights reserved.</p>
    </div>
</body>
</html> 