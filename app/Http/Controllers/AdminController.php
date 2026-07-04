<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AbsensiExport;

class AdminController extends Controller
{
    public function pengaturan()
    {
        // Ambil data pengaturan pertama (atau buat kosong jika belum ada)
        $setting = Setting::first() ?? new Setting(); 
        
        return view('admin.pengaturan', compact('setting'));
    }

    // Fungsi BARU untuk menyimpan/memperbarui data GPS & Waktu
    public function updatePengaturan(Request $request)
    {
        // 1. Validasi inputan form
        $request->validate([
            'school_name' => 'required|string',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
            'radius' => 'required|numeric',
            'time_in' => 'required',
            'time_out' => 'required',
        ]);

        // 2. Cari data pengaturan yang sudah ada
        $setting = Setting::first();

        if ($setting) {
            // Jika sudah ada, Update (Perbarui)
            $setting->update($request->all());
        } else {
            // Jika tabel masih kosong, Create (Buat Baru)
            Setting::create($request->all());
        }

        // 3. Kembalikan ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Pengaturan sistem berhasil diperbarui!');
    }

    // Fungsi untuk menampilkan daftar guru
    public function kelolaGuru()
    {
        // Ubah get() menjadi paginate(10)
        $gurus = \App\Models\User::where('role', 'guru')->orderBy('name', 'asc')->paginate(10);
        return view('admin.kelola-guru', compact('gurus'));
    }

    // Fungsi Export Native Laravel (Anti-Error)
    public function cetakLaporanAdmin()
    {
        // Mengambil semua data absensi beserta relasi usernya, diurutkan dari yang terbaru
        $semuaRiwayat = \App\Models\Attendance::with('user')->orderBy('date', 'desc')->get();
        
        // Mengambil pengaturan sekolah (nama sekolah, jam masuk, dll)
        $setting = \App\Models\Setting::first();

        // Mengarahkan ke halaman cetak khusus admin
        return view('admin.cetak-laporan', compact('semuaRiwayat', 'setting'));
    }

    public function daftarIzin()
    {
        // Ubah get() menjadi paginate(10)
        $izins = \App\Models\Leave::with('user')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.kelola-izin', compact('izins'));
    }

    public function prosesIzin($id, $status)
    {
        $izin = \App\Models\Leave::findOrFail($id);
        if (in_array($status, ['disetujui', 'ditolak'])) {
            $izin->status = $status;
            $izin->save();
        }
        return redirect()->back()->with('success', 'Status pengajuan izin berhasil diperbarui!');
    }
}