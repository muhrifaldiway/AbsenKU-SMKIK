<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0, viewport-fit=cover">
    <title>Pengaturan Sistem - Admin Panel</title>
    
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <meta name="theme-color" content="#022c22"> <link rel="apple-touch-icon" href="{{ asset('icons/icon-192x192.png') }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="Admin AbsenKU">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-slate-50 text-slate-800 h-screen flex overflow-hidden">

    <aside class="w-[280px] bg-[#022c22] text-slate-300 flex-col z-30 hidden md:flex relative shadow-[20px_0_40px_rgba(0,0,0,0.1)]">
        <div class="absolute top-0 left-0 w-full h-64 bg-emerald-600/20 blur-[60px] pointer-events-none"></div>

        <div class="h-24 flex items-center px-8 relative z-10 border-b border-white/5">
            <div class="inline-flex p-1.5 rounded-2xl bg-white/10 backdrop-blur-sm mr-3 border border-white/10">
                <img src="https://img.icons8.com/fluency/96/school.png" class="w-9 h-9 drop-shadow-lg" alt="Logo">
            </div>
            <div>
                <h1 class="text-white font-black text-xl tracking-tight leading-none">Admin<span class="text-emerald-400">Panel</span></h1>
                <p class="text-[10px] text-emerald-200/70 font-bold uppercase tracking-widest mt-1">SMK Ampana Kota</p>
            </div>
        </div>

        <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto hide-scrollbar relative z-10">
            <p class="px-4 text-[10px] font-bold text-emerald-400/50 uppercase tracking-widest mb-4">Navigasi Utama</p>
            
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'bg-emerald-500 text-white shadow-[0_8px_20px_rgba(16,185,129,0.3)]' : 'hover:bg-white/5 hover:text-white text-emerald-100/70' }} flex items-center gap-4 px-5 py-3.5 rounded-2xl transition-all duration-300 group">
                <svg class="w-5 h-5 {{ request()->routeIs('dashboard') ? '' : 'group-hover:text-emerald-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                <span class="font-bold tracking-wide">Beranda</span>
            </a>

            @if(auth()->user()->role == 'admin')
            <a href="{{ route('admin.guru') }}" class="{{ request()->routeIs('admin.guru') ? 'bg-emerald-500 text-white shadow-[0_8px_20px_rgba(16,185,129,0.3)]' : 'hover:bg-white/5 hover:text-white text-emerald-100/70' }} flex items-center gap-4 px-5 py-3.5 rounded-2xl transition-all duration-300 group">
                <svg class="w-5 h-5 {{ request()->routeIs('admin.guru') ? '' : 'group-hover:text-emerald-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                <span class="font-bold tracking-wide">Kelola Guru</span>
            </a>
            
            <a href="{{ route('admin.izin') }}" class="{{ request()->routeIs('admin.izin') ? 'bg-emerald-500 text-white shadow-[0_8px_20px_rgba(16,185,129,0.3)]' : 'hover:bg-white/5 hover:text-white text-emerald-100/70' }} flex items-center gap-4 px-5 py-3.5 rounded-2xl transition-all duration-300 group">
                <svg class="w-5 h-5 {{ request()->routeIs('admin.izin') ? '' : 'group-hover:text-emerald-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                <span class="font-bold tracking-wide">Perizinan</span>
            </a>

            <a href="{{ route('admin.pengaturan') }}" class="{{ request()->routeIs('admin.pengaturan') ? 'bg-emerald-500 text-white shadow-[0_8px_20px_rgba(16,185,129,0.3)]' : 'hover:bg-white/5 hover:text-white text-emerald-100/70' }} flex items-center gap-4 px-5 py-3.5 rounded-2xl transition-all duration-300 group">
                <svg class="w-5 h-5 {{ request()->routeIs('admin.pengaturan') ? '' : 'group-hover:text-emerald-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                <span class="font-bold tracking-wide">Sistem GPS</span>
            </a>
            @endif
        </nav>

        <div class="p-6 relative z-10">
            <form id="logout-form-desktop" method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="button" onclick="confirmLogout('logout-form-desktop')" class="flex items-center gap-4 w-full px-5 py-3.5 rounded-2xl bg-rose-500/10 text-rose-400 hover:bg-rose-500 hover:text-white shadow-sm transition-all duration-300 text-left group">
                    <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    <span class="font-bold tracking-wide">Keluar</span>
                </button>
            </form>
        </div>
    </aside>

    <main class="flex-1 flex flex-col h-screen overflow-hidden bg-slate-50/50">
        <header class="h-20 bg-white/80 backdrop-blur-md border-b border-slate-200 flex items-center justify-between px-8 z-10 sticky top-0">
            <h2 class="text-2xl font-bold text-slate-800 tracking-tight">Pengaturan Sistem</h2>
            <div class="flex items-center gap-4">
                <span class="px-3 py-1 bg-amber-100 text-amber-700 rounded-full text-xs font-bold tracking-wide">Hak Akses: Administrator</span>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-8">
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
    </main>

    <nav class="md:hidden fixed bottom-0 left-0 w-full bg-white/95 backdrop-blur-xl border-t border-slate-100 z-50 rounded-t-[2rem] shadow-[0_-10px_40px_rgba(0,0,0,0.06)] pb-safe pt-2 px-6 flex justify-between items-center">
        
        <a href="{{ route('dashboard') }}" class="flex flex-col items-center gap-1 p-2 min-w-[64px] {{ request()->routeIs('dashboard') ? 'text-emerald-600' : 'text-slate-400 hover:text-slate-600' }}">
            <div class="{{ request()->routeIs('dashboard') ? 'bg-emerald-100 px-5 py-1.5' : 'px-3 py-1.5' }} rounded-full transition-all duration-300">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
            </div>
            <span class="text-[10px] font-extrabold tracking-wide">Beranda</span>
        </a>

        @if(auth()->user()->role == 'admin')
        <a href="{{ route('admin.guru') }}" class="flex flex-col items-center gap-1 p-2 min-w-[64px] {{ request()->routeIs('admin.guru') ? 'text-emerald-600' : 'text-slate-400 hover:text-slate-600' }}">
            <div class="{{ request()->routeIs('admin.guru') ? 'bg-emerald-100 px-5 py-1.5' : 'px-3 py-1.5' }} rounded-full transition-all duration-300">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
            </div>
            <span class="text-[10px] font-extrabold tracking-wide">Guru</span>
        </a>
        <a href="{{ route('admin.izin') }}" class="flex flex-col items-center gap-1 p-2 min-w-[64px] {{ request()->routeIs('admin.izin') ? 'text-emerald-600' : 'text-slate-400 hover:text-slate-600' }}">
            <div class="{{ request()->routeIs('admin.izin') ? 'bg-emerald-100 px-5 py-1.5' : 'px-3 py-1.5' }} rounded-full transition-all duration-300">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
            </div>
            <span class="text-[10px] font-extrabold tracking-wide">Izin</span>
        </a>

        <a href="{{ route('admin.pengaturan') }}" class="flex flex-col items-center gap-1 p-2 min-w-[64px] {{ request()->routeIs('admin.pengaturan') ? 'text-emerald-600' : 'text-slate-400 hover:text-slate-600' }}">
            <div class="{{ request()->routeIs('admin.pengaturan') ? 'bg-emerald-100 px-5 py-1.5' : 'px-3 py-1.5' }} rounded-full transition-all duration-300">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            </div>
            <span class="text-[10px] font-extrabold tracking-wide">Sistem</span>
        </a>
        @endif
        
        <form id="logout-form-mobile" method="POST" action="{{ route('logout') }}" class="flex flex-col items-center gap-1 p-2 min-w-[64px] text-rose-400 hover:text-rose-600">
            @csrf
            <button type="button" onclick="confirmLogout('logout-form-mobile')" class="px-3 py-1.5 rounded-full transition-all duration-300">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
            </button>
            <span class="text-[10px] font-extrabold tracking-wide">Keluar</span>
        </form>

    </nav>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Logika SweetAlert untuk Notifikasi Sukses
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

        // Konfirmasi Logout
        function confirmLogout(formId) {
            Swal.fire({
                title: 'Akhiri Sesi?',
                text: "Anda akan keluar dari Panel Administrator",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#022c22',
                confirmButtonText: 'Ya, Keluar',
                cancelButtonText: 'Batal',
                background: '#ffffff', 
                color: '#1e293b',
                customClass: {
                    popup: 'rounded-[2rem] shadow-2xl border-0 pb-4',
                    title: 'text-2xl font-extrabold tracking-tight mt-2',
                    confirmButton: 'rounded-2xl px-6 py-3 font-bold tracking-wide',
                    cancelButton: 'rounded-2xl px-6 py-3 font-bold tracking-wide'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            });
        }
    </script>

    <script>
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
</body>
</html>