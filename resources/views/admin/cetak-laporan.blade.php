<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan Presensi - {{ $setting->school_name ?? 'Admin Panel' }}</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f8fafc;
        }

        /* Tombol Kembali (Hanya tampil di layar, hilang saat diprint) */
        .back-button {
            position: fixed;
            top: 20px;
            left: 20px;
            padding: 10px 20px;
            background-color: #064e3b;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 14px;
            z-index: 9999;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: background 0.3s;
        }
        .back-button:hover { background-color: #047857; }

        .paper {
            background: white;
            padding: 40px;
            max-width: 800px;
            margin: 0 auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .header h1 { margin: 0; font-size: 22px; text-transform: uppercase; letter-spacing: 1px; }
        .header p { margin: 5px 0 0; font-size: 14px; color: #555; }
        
        .info-cetak {
            margin-bottom: 15px;
            font-size: 13px;
            color: #555;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .data-table th, .data-table td {
            border: 1px solid #333;
            padding: 8px 10px;
            text-align: center;
            font-size: 12px;
        }
        .data-table th {
            background-color: #f2f2f2;
            font-weight: bold;
            text-transform: uppercase;
        }
        .text-left { text-align: left !important; }
        
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
<body onload="window.print()"> 

    <a href="{{ url()->previous() }}" class="back-button no-print">← Kembali</a>

    <div class="paper">
        <div class="header">
            <h1>REKAPITULASI PRESENSI GURU</h1>
            <p>{{ $setting->school_name ?? 'SMK INFORMATIKA KOMPUTER AMPANA KOTA' }}</p>
        </div>

        <div class="info-cetak">
            <strong>Dicetak pada:</strong> {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y - H:i') }} WITA<br>
            <strong>Dicetak oleh:</strong> {{ auth()->user()->name ?? 'Administrator' }}
        </div>

        <table class="data-table">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="20%">Nama Guru</th>
                    <th width="15%">Tanggal</th>
                    <th width="12%">Masuk</th>
                    <th width="12%">Pulang</th>
                    <th width="10%">Status</th>
                    <th width="26%">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @forelse($semuaRiwayat as $index => $absen)
                    @php
                        $batasMasuk = $setting->jam_masuk ?? '07:15:00';
                        $batasPulang = $setting->jam_pulang ?? '14:00:00';

                        $terlambatMasuk = $absen->time_in > $batasMasuk;
                        $pulangCepat = ($absen->time_out != null && $absen->time_out < $batasPulang);
                        
                        $keterangan = '-';
                        if($terlambatMasuk && $pulangCepat) $keterangan = 'Telat & Pulang Cepat';
                        elseif($terlambatMasuk) $keterangan = 'Terlambat';
                        elseif($pulangCepat) $keterangan = 'Pulang Cepat';
                    @endphp
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td class="text-left"><strong>{{ $absen->user ? $absen->user->name : 'Guru Dihapus' }}</strong></td>
                        <td>{{ \Carbon\Carbon::parse($absen->date)->translatedFormat('d M Y') }}</td>
                        <td>{{ $absen->time_in ?: '-' }}</td>
                        <td>{{ $absen->time_out ?: '-' }}</td>
                        <td>{{ strtoupper($absen->status) }}</td>
                        <td>{{ $keterangan }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="padding: 20px;">Belum ada data presensi yang tercatat di sistem.</td>
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
    </div>

</body>
</html>