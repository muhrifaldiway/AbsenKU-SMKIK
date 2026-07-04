<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Riwayat Presensi - {{ auth()->user()->name }}</title>
    <link rel="icon" href="{{ asset('img/logo2.png') }}" type="image/png">
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }
        .back-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #064e3b;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .back-button:hover {
            background-color: #047857;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .header h1 { margin: 0; font-size: 24px; text-transform: uppercase; }
        .header p { margin: 5px 0 0; font-size: 14px; color: #555; }
        .user-info {
            margin-bottom: 20px;
        }
        .user-info table { width: 100%; border: none; }
        .user-info td { padding: 3px 0; font-size: 14px; }
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .data-table th, .data-table td {
            border: 1px solid #333;
            padding: 8px 12px;
            text-align: center;
            font-size: 13px;
        }
        .data-table th {
            background-color: #f2f2f2;
            font-weight: bold;
            text-transform: uppercase;
        }
        .footer {
            margin-top: 50px;
            text-align: right;
            font-size: 14px;
        }
        .signature {
            display: inline-block;
            text-align: center;
            width: 200px;
        }
        .signature-line {
            border-top: 1px solid #333;
            margin-top: 60px;
            padding-top: 5px;
        }
        /* Mode Cetak Kertas */
        @media print {
            body { background-color: white; padding: 0; }
            .paper { box-shadow: none; max-width: 100%; padding: 0; }
            .no-print { display: none !important; }
            @page { margin: 1cm; size: auto; }
        }
    </style>
</head>
<body onload="window.print()"> <div class="header">
    <a href="{{ url()->previous() }}" class="back-button no-print">← Kembali</a>
        <h1>LAPORAN KEHADIRAN BULANAN</h1>
        <p>{{ $setting->school_name ?? 'SMK INFORMATIKA KOMPUTER AMPANA KOTA' }}</p>
        <p>Periode: {{ \Carbon\Carbon::now()->translatedFormat('F Y') }}</p>
    </div>

    <div class="user-info">
        <table>
            <tr>
                <td width="15%"><strong>Nama Guru</strong></td>
                <td width="2%">:</td>
                <td>{{ $user->name }}</td> </tr>
            <tr>
                <td><strong>Email</strong></td>
                <td>:</td>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <td><strong>Total Kehadiran</strong></td>
                <td>:</td>
                <td>{{ $riwayatGuruIni->count() }} Hari</td>
            </tr>
        </table>
    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="25%">Tanggal</th>
                <th width="20%">Jam Masuk</th>
                <th width="20%">Jam Pulang</th>
                <th width="15%">Status</th>
                <th width="15%">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($riwayatGuruIni as $index => $absen)
                @php
                    $terlambatMasuk = $absen->time_in > $setting->jam_masuk;
                    $pulangCepat = ($absen->time_out != null && $absen->time_out < $setting->jam_pulang);
                    
                    $keterangan = '-';
                    if($terlambatMasuk && $pulangCepat) $keterangan = 'Telat & Pulang Cepat';
                    elseif($terlambatMasuk) $keterangan = 'Terlambat';
                    elseif($pulangCepat) $keterangan = 'Pulang Cepat';
                @endphp
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ \Carbon\Carbon::parse($absen->date)->translatedFormat('l, d F Y') }}</td>
                    <td>{{ $absen->time_in ?: '-' }}</td>
                    <td>{{ $absen->time_out ?: '-' }}</td>
                    <td>{{ strtoupper($absen->status) }}</td>
                    <td>{{ $keterangan }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="padding: 20px;">Tidak ada data presensi pada bulan ini.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        <div class="signature">
            <p>Ampana Kota, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
            <p style="margin-bottom: 60px;">Kepala Sekolah</p>
            <div class="signature-line">
                <strong>( ......................................... )</strong>
            </div>
        </div>
    </div>

</body>
</html>