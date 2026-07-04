@extends('layouts.admin.admin')
@section('title', 'Pengaturan Sistem - Admin Panel')

@push('styles')
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <link rel="apple-touch-icon" href="{{ asset('icons/icon-192x192.png') }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="Admin AbsenKU">
@endpush

@section('content')
    <header class="h-20 bg-white/80 backdrop-blur-md border-b border-slate-200 flex items-center justify-between px-8 z-10 sticky top-0">
        <div class="flex items-center gap-4">
            <div class="inline-flex p-1.5 rounded-2xl bg-white/10 backdrop-blur-sm mr-3 border border-white/10">
                <img src="{{ asset('img/logo2.png') }}" class="w-9 h-9 drop-shadow-lg" alt="Logo">
            </div>
            <div>
                <h2 class="text-xl md:text-[26px] font-black text-slate-800 tracking-tight leading-none">Pengaturan Sistem</h2>
                <p class="text-slate-500 text-[11px] md:text-sm font-bold mt-1 tracking-wide">Konfigurasi Parameter Sistem</p>
            </div>
        </div>
    </header>

    <div class="flex-1 overflow-y-auto p-8 pb-28 md:pb-8">
        <div class="max-w-4xl mx-auto">
            
            <div class="bg-white rounded-[2rem] shadow-[0_8px_30px_rgba(0,0,0,0.04)] border border-slate-100 overflow-hidden mb-24 md:mb-0">
                <div class="p-6 md:p-8 border-b border-slate-50 bg-slate-50/50">
                    <h3 class="text-xl font-black text-slate-800 tracking-tight">Konfigurasi Sistem</h3>
                    <p class="text-slate-500 text-xs font-bold mt-1">Atur parameter lokasi dan batas waktu presensi.</p>
                </div>
            
                <form action="{{ route('admin.pengaturan.update') }}" method="POST" class="p-6 md:p-8 space-y-8">
                    @csrf
                    @method('PUT')
                    
                    <div class="space-y-5">
                        <div class="flex items-center gap-3 mb-4 border-b border-slate-100 pb-3">
                            <div class="w-8 h-8 rounded-lg bg-indigo-50 flex items-center justify-center text-indigo-600 shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                            </div>
                            <h4 class="text-xs md:text-sm font-black text-slate-700 uppercase tracking-widest">Informasi Sekolah</h4>
                        </div>
            
                        <div class="space-y-5">
                            <div>
                                <label class="block text-[11px] font-extrabold text-slate-500 uppercase tracking-widest mb-2 ml-1">Nama Instansi / Sekolah</label>
                                <input type="text" name="school_name" value="{{ $setting->school_name ?? '' }}" required class="w-full px-5 py-4 bg-slate-50 border border-slate-200 focus:border-indigo-500/50 focus:ring-4 focus:ring-indigo-500/10 rounded-2xl text-sm font-bold text-slate-800 focus:bg-white transition-all outline-none" placeholder="Cth: SMK Informatika Ampana">
                            </div>
            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <div>
                                    <label class="block text-[11px] font-extrabold text-slate-500 uppercase tracking-widest mb-2 ml-1">Latitude (Garis Lintang)</label>
                                    <div class="relative">
                                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-[10px] font-black text-slate-400">LAT</span>
                                        <input type="text" name="latitude" value="{{ $setting->latitude ?? '' }}" required class="w-full pl-12 pr-4 py-4 bg-slate-50 border border-slate-200 focus:border-indigo-500/50 focus:ring-4 focus:ring-indigo-500/10 rounded-2xl text-sm font-bold text-slate-800 focus:bg-white transition-all outline-none" placeholder="-0.8917...">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-[11px] font-extrabold text-slate-500 uppercase tracking-widest mb-2 ml-1">Longitude (Garis Bujur)</label>
                                    <div class="relative">
                                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-[10px] font-black text-slate-400">LNG</span>
                                        <input type="text" name="longitude" value="{{ $setting->longitude ?? '' }}" required class="w-full pl-12 pr-4 py-4 bg-slate-50 border border-slate-200 focus:border-indigo-500/50 focus:ring-4 focus:ring-indigo-500/10 rounded-2xl text-sm font-bold text-slate-800 focus:bg-white transition-all outline-none" placeholder="121.587...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <div class="space-y-5 pt-2">
                        <div class="flex items-center gap-3 mb-4 border-b border-slate-100 pb-3">
                            <div class="w-8 h-8 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-600 shrink-0">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <h4 class="text-xs md:text-sm font-black text-slate-700 uppercase tracking-widest">Regulasi Waktu & Jarak</h4>
                        </div>
            
                        <div class="bg-emerald-50/50 p-4 md:p-5 rounded-2xl border border-emerald-100/50">
                            <label class="block text-[11px] font-extrabold text-emerald-600 uppercase tracking-widest mb-3 text-center md:text-left">Radius Geofencing (Meter)</label>
                            <div class="flex flex-col md:flex-row md:items-center gap-4">
                                <input type="number" name="radius" value="{{ $setting->radius ?? 50 }}" required class="w-full md:w-1/3 px-5 py-4 bg-white border border-emerald-200/60 rounded-xl text-lg font-black text-emerald-800 focus:ring-4 focus:ring-emerald-500/20 transition-all outline-none text-center" placeholder="50">
                                <p class="text-[12px] font-bold text-emerald-700/80 leading-relaxed text-center md:text-left">Jarak maksimal area diperbolehkan presensi dari koordinat. (Saran: 50 - 100 meter).</p>
                            </div>
                        </div>
            
                        <div class="grid grid-cols-2 gap-4 mt-5">
                            <div>
                                <label class="block text-[11px] font-extrabold text-slate-500 uppercase tracking-widest mb-2 ml-1 text-center md:text-left">Jam Masuk</label>
                                <input type="time" name="time_in" value="{{ $setting->time_in ?? '07:15' }}" required class="w-full px-2 md:px-4 py-4 bg-slate-50 border border-slate-200 focus:border-indigo-500/50 focus:ring-4 focus:ring-indigo-500/10 rounded-2xl text-[15px] font-black text-slate-800 focus:bg-white transition-all outline-none text-center">
                            </div>
                            <div>
                                <label class="block text-[11px] font-extrabold text-slate-500 uppercase tracking-widest mb-2 ml-1 text-center md:text-left">Jam Pulang</label>
                                <input type="time" name="time_out" value="{{ $setting->time_out ?? '02:10' }}" required class="w-full px-2 md:px-4 py-4 bg-slate-50 border border-slate-200 focus:border-indigo-500/50 focus:ring-4 focus:ring-indigo-500/10 rounded-2xl text-[15px] font-black text-slate-800 focus:bg-white transition-all outline-none text-center">
                            </div>
                        </div>
                    </div>
            
                    <div class="pt-6 border-t border-slate-100 flex flex-col md:flex-row items-center justify-between gap-4">
                        <p class="text-[10px] font-extrabold text-slate-400 text-center md:text-left uppercase tracking-widest w-full">*Pastikan semua data terisi benar</p>
                        
                        <button type="submit" class="w-full md:w-auto flex items-center justify-center gap-2 px-8 py-4 bg-slate-900 hover:bg-slate-800 text-white text-xs md:text-sm font-black uppercase tracking-widest rounded-2xl shadow-[0_10px_20px_rgba(15,23,42,0.15)] transition-all transform hover:-translate-y-1 active:scale-95 shrink-0">
                            <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Logika SweetAlert untuk Notifikasi Sukses spesifik di halaman pengaturan
        document.addEventListener("DOMContentLoaded", function() {
            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: @json(session('success')),
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 4000,
                    timerProgressBar: true,
                });
            @endif
        });

        // Register Service Worker PWA (Khusus untuk panel pengaturan jika diperlukan)
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js')
                    .then(registration => {
                        console.log('PWA ServiceWorker Admin berhasil didaftarkan');
                    })
                    .catch(err => {
                        console.log('PWA ServiceWorker gagal didaftarkan: ', err);
                    });
            });
        }
    </script>
@endpush