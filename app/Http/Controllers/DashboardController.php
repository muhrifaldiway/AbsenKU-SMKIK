<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // JIKA YANG LOGIN ADALAH ADMIN
        if ($user->role === 'admin') {
            $semuaAbsenHariIni = Attendance::with('user')
                ->where('date', date('Y-m-d'))
                ->orderBy('time_in', 'desc')
                ->get();
                
            $totalHadirHariIni = $semuaAbsenHariIni->where('status', 'hadir')->count();
            $totalTerlambatHariIni = $semuaAbsenHariIni->where('status', 'terlambat')->count();

            return view('admin.dashboard', compact('semuaAbsenHariIni', 'totalHadirHariIni', 'totalTerlambatHariIni')); 
        }

        // JIKA YANG LOGIN ADALAH GURU
        $bulanIni = date('m');
        $tahunIni = date('Y');

        // 1. Ambil Pengaturan Sekolah (PENTING AGAR JAM MASUK/PULANG TERDETEKSI)
        $setting = \App\Models\Setting::first();

        // 2. Menghitung Statistik Bulan Ini
        $totalHadir = Attendance::where('user_id', $user->id)
            ->whereMonth('date', $bulanIni)
            ->whereYear('date', $tahunIni)
            ->where('status', 'hadir')
            ->count();

        $totalTerlambat = Attendance::where('user_id', $user->id)
            ->whereMonth('date', $bulanIni)
            ->whereYear('date', $tahunIni)
            ->where('status', 'terlambat')
            ->count();

        // 3. Cek apakah hari ini sudah absen?
        $absenHariIni = Attendance::where('user_id', $user->id)
            ->where('date', date('Y-m-d'))
            ->first();

        // 4. Mengambil 5 Riwayat Absen Terakhir
        $riwayat = Attendance::where('user_id', $user->id)
            ->orderBy('date', 'desc')
            ->orderBy('time_in', 'desc')
            ->take(5)
            ->get();

        // 5. Kirim semua data ke dashboard (termasuk $setting)
        return view('dashboard', compact('totalHadir', 'totalTerlambat', 'absenHariIni', 'riwayat', 'setting'));
    }

    // Fungsi untuk halaman Semua Riwayat Guru
    public function riwayat()
    {
        $user = Auth::user();
        
        // Ambil semua riwayat absen dari yang terbaru
        $semuaRiwayat = \App\Models\Attendance::where('user_id', auth()->id())
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);

        return view('riwayat', compact('semuaRiwayat'));
    }

    

    // ==========================================
    // FUNGSI UNTUK FITUR IZIN / SAKIT (GURU)
    // ==========================================

    // 1. Menampilkan Form Izin
    public function buatIzin()
    {
        return view('izin-create');
    }

    // 2. Memproses & Menyimpan Izin ke Database
    public function simpanIzin(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'jenis' => 'required|in:sakit,izin,dinas_luar',
            'keterangan' => 'required|string',
            'surat_dokumen' => 'nullable|image|max:2048' // Batas file 2MB
        ]);

        $input = $request->all();
        $input['user_id'] = \Illuminate\Support\Facades\Auth::id();

        // Jika ada file foto/surat yang diupload
        if ($request->hasFile('surat_dokumen')) {
            $namaFile = time() . '_' . $request->file('surat_dokumen')->getClientOriginalName();
            $request->file('surat_dokumen')->move(public_path('storage/surat_izin'), $namaFile);
            $input['surat_dokumen'] = $namaFile;
        }

        // Simpan ke database
        \App\Models\Leave::create($input);

        // Kembali ke dashboard dengan pesan sukses
        return redirect()->route('dashboard')->with('success', 'Pengajuan surat izin Anda berhasil dikirim ke Admin!');
    }

    // ==========================================
    // FUNGSI PROFIL PENGGUNA
    // ==========================================

    public function profil()
    {
        return view('profil');
    }

    public function updateProfil(\Illuminate\Http\Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'password' => 'nullable|min:6|confirmed',
        ]);

        // Proses Update Foto
        if ($request->hasFile('foto')) {
            $namaFoto = time() . '_' . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('storage/profil'), $namaFoto);
            
            // Hapus foto lama jika ada dan bukan bawaan
            if ($user->foto && file_exists(public_path('storage/profil/' . $user->foto))) {
                unlink(public_path('storage/profil/' . $user->foto));
            }

            $user->foto = $namaFoto;
        }

        // Proses Update Password (Hanya jika diisi)
        if ($request->filled('password')) {
            $user->password = \Illuminate\Support\Facades\Hash::make($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Profil Anda berhasil diperbarui!');
    }
}