<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Attendance;
use Illuminate\Support\Facades\Storage;

class AttendanceController extends Controller
{
    // Menampilkan halaman kamera absen
    public function create()
    {
        $setting = Setting::first(); 
        if (!$setting) {
            return redirect()->route('dashboard')->with('error', 'Sistem belum diatur. Hubungi Admin.');
        }
        return view('absen', compact('setting'));
    }

    // Memproses data absen dari kamera
    public function store(Request $request)
    {
        // 1. Validasi Data Koordinat & Foto
        $request->validate([
            'image' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        $setting = Setting::first();

        // 2. RUMUS HAVERSINE (Cek Jarak Lokasi)
        $lat1 = $setting->latitude;
        $lon1 = $setting->longitude;
        $lat2 = $request->latitude;
        $lon2 = $request->longitude;

        $theta = $lon1 - $lon2;
        $miles = (sin(deg2rad($lat1)) * sin(deg2rad($lat2))) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
        $miles = acos($miles);
        $miles = rad2deg($miles);
        $jarak_meter = $miles * 60 * 1.1515 * 1609.344;

        if ($jarak_meter > $setting->radius) {
            return redirect()->back()->with('error', 'Gagal! Anda berada ' . round($jarak_meter) . ' meter dari sekolah.');
        }

        // 3. CEK DATABASE: Apakah hari ini sudah ada absen?
        $absenHariIni = Attendance::where('user_id', auth()->user()->id)
                                  ->where('date', date('Y-m-d'))
                                  ->first();

        // 4. VALIDASI CERDAS: Blokir hanya jika MASUK dan PULANG sudah selesai
        if ($absenHariIni && $absenHariIni->time_out !== null) {
            return redirect()->route('dashboard')->with('error', 'Anda sudah menyelesaikan absensi Masuk dan Pulang hari ini!');
        }

        // 5. Proses Decode Foto
        $jam_sekarang = date('H:i:s');
        $image_parts = explode(";base64,", $request->image);
        $image_base64 = base64_decode($image_parts[1]);

        // ==========================================
        // LOGIKA BERCABANG: MASUK ATAU PULANG?
        // ==========================================
        
        if (!$absenHariIni) {
            // ---> SKENARIO A: BELUM ABSEN SAMA SEKALI (SIMPAN SEBAGAI MASUK)
            
            $fileName = 'masuk_' . auth()->user()->id . '_' . time() . '.png';
            Storage::put('public/absensi/' . $fileName, $image_base64);

            $status_hadir = ($jam_sekarang > $setting->jam_masuk) ? 'terlambat' : 'hadir';

            Attendance::create([
                'user_id' => auth()->user()->id,
                'date' => date('Y-m-d'),
                'time_in' => $jam_sekarang,
                'lat_in' => $request->latitude,
                'long_in' => $request->longitude,
                'photo_in' => $fileName,
                'status' => $status_hadir
            ]);

            return redirect()->route('dashboard')->with('success', 'Berhasil Absen Masuk! Selamat bertugas.');
            
        } else {
            // ---> SKENARIO B: SUDAH ABSEN MASUK, MAKA FOTO INI ADALAH ABSEN PULANG
            
            $fileName = 'pulang_' . auth()->user()->id . '_' . time() . '.png';
            Storage::put('public/absensi/' . $fileName, $image_base64);

            // UPDATE data yang sudah ada hari ini, isi kolom "out"-nya
            $absenHariIni->update([
                'time_out' => $jam_sekarang,
                'lat_out' => $request->latitude,
                'long_out' => $request->longitude,
                'photo_out' => $fileName,
            ]);

            return redirect()->route('dashboard')->with('success', 'Berhasil Absen Pulang! Hati-hati di jalan pulang.');
        }
    }
}