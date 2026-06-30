<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="theme-color" content="#064e3b">
    <title>Admin Panel - AbsenKU SMKIK</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style> 
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            -webkit-tap-highlight-color: transparent;
        } 
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        .pb-safe { padding-bottom: env(safe-area-inset-bottom, 20px); }
    </style>
</head>
<body class="bg-[#f8fafc] text-slate-800 h-[100dvh] flex overflow-hidden selection:bg-emerald-200">

    <aside class="w-[280px] bg-[#022c22] text-slate-300 flex-col z-30 hidden md:flex relative shadow-[20px_0_40px_rgba(0,0,0,0.1)]">
        <div class="absolute top-0 left-0 w-full h-64 bg-emerald-600/20 blur-[60px] pointer-events-none"></div>

        <div class="h-24 flex items-center px-8 relative z-10 border-b border-white/5">
            <div class="inline-flex p-1.5 rounded-2xl bg-white/10 backdrop-blur-sm mr-3 border border-white/10">
                <img style="" src="{{ asset('img/logo2.png') }}" class="w-9 h-9 drop-shadow-lg" alt="Logo">
            </div>
            <div>
                <h1 class="text-white font-black text-xl tracking-tight leading-none">Admin<span class="text-emerald-400">Panel</span></h1>
                <p class="text-[10px] text-emerald-200/60 font-bold uppercase tracking-widest mt-1">SMKIK Ampana Kota</p>
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
                <svg class="w-5 h-5 {{ request()->routeIs('admin.izin') ? '' : 'group-hover:text-emerald-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
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

    <main class="flex-1 flex flex-col h-[100dvh] overflow-hidden relative bg-[#f1f5f9]">
        
        <header class="h-20 bg-white/80 backdrop-blur-xl flex items-center justify-between px-6 md:px-10 z-20 sticky top-0 shadow-[0_4px_30px_rgba(0,0,0,0.03)] border-b border-white">
            <div class="flex items-center gap-4">
                <div class="md:hidden inline-flex p-1.5 rounded-xl bg-emerald-50 border border-emerald-100">
                    <img src="https://img.icons8.com/fluency/96/school.png" class="w-8 h-8 drop-shadow-sm" alt="Logo">
                </div>
                <div>
                    <h2 class="text-xl md:text-[26px] font-black text-slate-800 tracking-tight leading-none">Dashboard</h2>
                    <p class="text-slate-500 text-[11px] md:text-sm font-bold mt-1 tracking-wide">Sistem Presensi Real-time</p>
                </div>
            </div>
            
            <a href="{{ route('admin.export') }}" class="flex items-center justify-center w-12 h-12 md:w-auto md:px-5 md:py-3 bg-gradient-to-tr from-amber-400 to-amber-500 hover:from-amber-500 hover:to-amber-600 text-amber-950 font-bold rounded-2xl md:rounded-2xl shadow-[0_8px_20px_rgba(245,158,11,0.25)] transition-all duration-300 active:scale-95">
                <svg class="w-5 h-5 md:mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                <span class="hidden md:inline">Cetak Laporan</span>
            </a>
        </header>

        <div class="flex-1 overflow-y-auto hide-scrollbar p-5 md:p-10 pb-28 md:pb-10">
            <div class="max-w-7xl mx-auto space-y-6 md:space-y-8">
                
                <div class="grid grid-cols-2 md:grid-cols-2 gap-4 md:gap-8">
                    
                    <div class="bg-white rounded-[2rem] p-6 shadow-[0_10px_40px_-10px_rgba(0,0,0,0.05)] flex flex-col items-center justify-center text-center relative overflow-hidden border border-white">
                        <div class="absolute -right-4 -top-4 w-20 h-20 bg-emerald-50 rounded-full blur-2xl pointer-events-none"></div>
                        <div class="inline-flex items-center justify-center w-14 h-14 bg-emerald-100/50 text-emerald-600 rounded-2xl mb-4 shadow-sm border border-emerald-100">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <p class="text-4xl font-black text-slate-800 tracking-tight">{{ $totalHadirHariIni }}</p>
                        <p class="text-slate-400 text-[10px] md:text-xs font-extrabold uppercase tracking-widest mt-1">Tepat Waktu</p>
                    </div>

                    <div class="bg-white rounded-[2rem] p-6 shadow-[0_10px_40px_-10px_rgba(0,0,0,0.05)] flex flex-col items-center justify-center text-center relative overflow-hidden border border-white">
                        <div class="absolute -right-4 -top-4 w-20 h-20 bg-rose-50 rounded-full blur-2xl pointer-events-none"></div>
                        <div class="inline-flex items-center justify-center w-14 h-14 bg-rose-100/50 text-rose-600 rounded-2xl mb-4 shadow-sm border border-rose-100">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <p class="text-4xl font-black text-slate-800 tracking-tight">{{ $totalTerlambatHariIni }}</p>
                        <p class="text-slate-400 text-[10px] md:text-xs font-extrabold uppercase tracking-widest mt-1">Terlambat</p>
                    </div>
                </div>

                <div class="bg-white rounded-[2rem] shadow-[0_10px_40px_-10px_rgba(0,0,0,0.05)] overflow-hidden border border-white">
                    <div class="p-5 md:p-6 border-b border-slate-50 flex items-center justify-between bg-slate-50/50">
                        <h4 class="text-lg md:text-xl font-extrabold text-slate-800 tracking-tight">Log Kehadiran</h4>
                        <span class="inline-flex items-center gap-2 px-3 py-1 bg-emerald-100 text-emerald-700 rounded-full text-[10px] font-black uppercase tracking-widest">
                            <span class="relative flex h-2 w-2">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                            </span>
                            Live
                        </span>
                    </div>
                    
                    <div class="overflow-x-auto p-2">
                        <table class="w-full text-left border-collapse min-w-[500px]">
                            <tbody class="text-sm font-medium">
                                @forelse($semuaAbsenHariIni as $absen)
                                <tr class="group hover:bg-slate-50 transition-colors">
                                    <td class="p-4 rounded-l-2xl">
                                        <div class="flex items-center gap-4">
                                            <div class="w-12 h-12 rounded-[1.25rem] bg-gradient-to-br from-slate-100 to-slate-200 flex items-center justify-center text-slate-600 font-black text-lg shadow-inner">
                                                {{ substr($absen->user->name, 0, 1) }}
                                            </div>
                                            <div>
                                                <p class="font-extrabold text-slate-800 text-[15px]">{{ $absen->user->name }}</p>
                                                <p class="text-[11px] text-slate-400 font-bold mt-0.5 tracking-wide">{{ $absen->user->email }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-4">
                                        <div class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-slate-100/80 text-slate-600 font-bold font-mono text-xs">
                                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            {{ $absen->time_in }}
                                        </div>
                                    </td>
                                    <td class="p-4">
                                        @if($absen->status == 'hadir')
                                            <span class="inline-flex items-center px-3 py-1 bg-emerald-50 text-emerald-600 rounded-xl text-[11px] font-black uppercase tracking-widest border border-emerald-100">
                                                Hadir
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-3 py-1 bg-rose-50 text-rose-600 rounded-xl text-[11px] font-black uppercase tracking-widest border border-rose-100">
                                                Terlambat
                                            </span>
                                        @endif
                                    </td>
                                    <td class="p-4 text-right rounded-r-2xl">
                                        <a href="{{ asset('storage/absensi/' . $absen->photo_in) }}" target="_blank" class="inline-flex items-center justify-center p-2.5 rounded-xl bg-slate-50 text-indigo-500 hover:bg-indigo-500 hover:text-white hover:shadow-md hover:shadow-indigo-500/20 transition-all duration-300">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="p-12 text-center">
                                        <div class="flex flex-col items-center justify-center">
                                            <div class="w-16 h-16 bg-slate-50 rounded-[1.5rem] flex items-center justify-center mb-4">
                                                <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                                            </div>
                                            <p class="text-slate-600 font-extrabold tracking-wide">Layar Monitor Kosong</p>
                                            <p class="text-slate-400 text-xs font-bold mt-1">Belum ada wajah yang terekam hari ini.</p>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <nav class="md:hidden fixed bottom-0 left-0 w-full bg-white/90 backdrop-blur-xl border-t border-slate-100 z-50 rounded-t-3xl shadow-[0_-10px_40px_rgba(0,0,0,0.06)] pb-safe pt-2 px-6 flex justify-between items-center">
        
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
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
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

        <form id="logout-form-mobile" method="POST" action="{{ route('logout') }}" class="hidden">@csrf</form>
        <button type="button" onclick="confirmLogout('logout-form-mobile')" class="flex flex-col items-center gap-1 p-2 min-w-[64px] text-rose-400 hover:text-rose-600">
            <div class="px-3 py-1.5 rounded-full transition-all duration-300">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
            </div>
            <span class="text-[10px] font-extrabold tracking-wide">Keluar</span>
        </button>

    </nav>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Modifikasi fungsi logout agar menerima parameter ID form (Mobile vs Desktop)
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
</body>
</html>