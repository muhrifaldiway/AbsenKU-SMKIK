<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="theme-color" content="#064e3b">
    <title>Kelola Izin Guru - Admin Panel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style> 
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            -webkit-tap-highlight-color: transparent;
            overscroll-behavior-y: none;
        } 
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        .pb-safe { padding-bottom: env(safe-area-inset-bottom, 20px); }
    </style>
</head>
<body class="bg-[#f1f5f9] text-slate-800 h-[100dvh] flex overflow-hidden selection:bg-emerald-200">

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

            <a href="{{ route('admin.izin') }}" class="bg-emerald-500 text-white shadow-[0_8px_20px_rgba(16,185,129,0.3)] flex items-center gap-4 px-5 py-3.5 rounded-2xl transition-all duration-300 group">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
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

    <main class="flex-1 flex flex-col h-[100dvh] overflow-hidden relative">
        
        <header class="h-20 bg-white/90 backdrop-blur-2xl flex items-center justify-between px-6 md:px-10 z-20 sticky top-0 shadow-[0_4px_30px_rgba(0,0,0,0.02)] border-b border-slate-100/50">
            <div class="flex items-center gap-4">
                <div class="md:hidden inline-flex p-1.5 rounded-xl bg-emerald-50 border border-emerald-100">
                    <img src="https://img.icons8.com/fluency/96/school.png" class="w-8 h-8 drop-shadow-sm" alt="Logo">
                </div>
                <div>
                    <h2 class="text-[22px] md:text-[26px] font-black text-slate-800 tracking-tight leading-none">Kelola Izin</h2>
                    <p class="text-slate-500 text-[11px] md:text-sm font-bold mt-1 tracking-wide">Persetujuan Ketidakhadiran</p>
                </div>
            </div>
            
            <div class="hidden md:flex items-center gap-4">
                <span class="px-4 py-2 bg-amber-100/80 text-amber-800 rounded-full text-xs font-bold tracking-widest uppercase shadow-sm border border-amber-200/50">
                    Administrator
                </span>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto hide-scrollbar p-5 md:p-8 pb-32 md:pb-10">
            <div class="max-w-5xl mx-auto space-y-6 md:space-y-8">
                
                <div class="bg-gradient-to-r from-emerald-600 to-teal-500 rounded-[2rem] p-6 md:p-8 shadow-[0_15px_40px_-10px_rgba(16,185,129,0.4)] flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 relative overflow-hidden">
                    <div class="absolute -right-10 -top-10 w-48 h-48 bg-white/10 rounded-full blur-2xl"></div>
                    <div class="absolute left-1/2 bottom-0 w-32 h-32 bg-white/5 rounded-full blur-xl translate-y-1/2"></div>
                    
                    <div class="relative z-10 text-white">
                        <h3 class="text-xl md:text-2xl font-black tracking-tight mb-1">Permohonan Izin</h3>
                        <p class="text-emerald-50/90 text-sm md:text-base font-medium">
                            Terdapat <span class="font-black text-amber-300 text-lg mx-1">{{ $izins->where('status', 'pending')->count() }}</span> surat izin yang perlu ditinjau.
                        </p>
                    </div>
                    
                    <div class="relative z-10 hidden sm:block">
                        <div class="p-3 md:p-4 bg-white/20 backdrop-blur-md rounded-2xl border border-white/20 shadow-inner">
                            <svg class="w-8 h-8 md:w-10 md:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-[2rem] shadow-[0_15px_50px_-15px_rgba(0,0,0,0.05)] border border-white overflow-hidden relative">
                    
                    <div class="p-5 md:p-6 border-b-2 border-slate-50 bg-slate-50/40 flex items-center justify-between sticky top-0 z-10 backdrop-blur-xl">
                        <h4 class="text-lg md:text-xl font-extrabold text-slate-800 tracking-tight">Antrean Pengajuan</h4>
                    </div>

                    <div class="flex flex-col divide-y divide-slate-100/60">
                        @forelse($izins as $izin)
                        <div class="group p-5 md:p-6 flex flex-col md:flex-row md:items-center justify-between hover:bg-slate-50/80 transition-colors duration-200 cursor-pointer active:bg-slate-100 gap-4 md:gap-0">
                            
                            <div class="flex gap-4 items-start w-full md:w-2/3">
                                
                                <div class="w-12 h-12 md:w-14 md:h-14 rounded-2xl bg-gradient-to-br from-indigo-100 to-indigo-200 text-slate-900 flex items-center justify-center font-black text-lg shadow-inner shrink-0 group-hover:scale-105 transition-transform duration-300 border border-indigo-200/50">
                                    {{ strtoupper(substr($izin->user->name, 0, 1)) }}
                                </div>

                                <div class="flex flex-col overflow-hidden w-full">
                                    <div class="flex items-center justify-between md:justify-start gap-3">
                                        <p class="font-extrabold text-slate-800 text-[15px] md:text-base leading-tight truncate">
                                            {{ $izin->user->name }}
                                        </p>
                                        <span class="px-2 py-0.5 rounded-md text-[10px] md:text-[11px] font-bold uppercase tracking-wider shrink-0 
                                            {{ $izin->jenis == 'sakit' ? 'bg-rose-100 text-rose-700 border border-rose-200/50' : 
                                              ($izin->jenis == 'izin' ? 'bg-amber-100 text-amber-700 border border-amber-200/50' : 
                                              'bg-blue-100 text-blue-700 border border-blue-200/50') }}">
                                            {{ str_replace('_', ' ', $izin->jenis) }}
                                        </span>
                                    </div>
                                    
                                    <div class="flex items-center gap-1.5 mt-2">
                                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        <span class="text-[12px] md:text-[13px] text-slate-600 font-bold">
                                            {{ \Carbon\Carbon::parse($izin->tanggal_mulai)->translatedFormat('d M') }} 
                                            <span class="text-slate-400 mx-0.5">-</span> 
                                            {{ \Carbon\Carbon::parse($izin->tanggal_selesai)->translatedFormat('d M Y') }}
                                        </span>
                                    </div>

                                    <p class="text-xs md:text-[13px] text-slate-500 mt-1.5 leading-relaxed truncate md:whitespace-normal line-clamp-2 md:line-clamp-1">
                                        {{ $izin->keterangan }}
                                    </p>
                                    
                                    @if($izin->surat_dokumen)
                                    <div class="mt-2">
                                        <a href="{{ asset('storage/surat_izin/' . $izin->surat_dokumen) }}" target="_blank" class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-slate-100 hover:bg-indigo-50 text-indigo-600 rounded-lg text-[11px] font-bold transition-colors">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path></svg>
                                            Lihat Lampiran
                                        </a>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <div class="flex flex-col items-start md:items-end w-full md:w-auto pt-4 md:pt-0 border-t border-slate-100 md:border-none pl-[4.5rem] md:pl-0">
                                @if($izin->status == 'pending')
                                    <div class="flex items-center gap-2 w-full md:w-auto">
                                        <form action="{{ route('admin.izin.proses', [$izin->id, 'disetujui']) }}" method="POST" class="flex-1 md:flex-none">
                                            @csrf @method('PUT')
                                            <button type="submit" class="w-full flex items-center justify-center gap-1 px-4 py-2 bg-emerald-500 hover:bg-emerald-600 text-white rounded-xl text-xs font-black uppercase tracking-wider shadow-sm transition-all active:scale-95">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                                Terima
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.izin.proses', [$izin->id, 'ditolak']) }}" method="POST" class="flex-1 md:flex-none">
                                            @csrf @method('PUT')
                                            <button type="submit" class="w-full flex items-center justify-center gap-1 px-4 py-2 bg-rose-50 text-rose-600 hover:bg-rose-500 hover:text-white rounded-xl text-xs font-black uppercase tracking-wider border border-rose-100 transition-all active:scale-95">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path></svg>
                                                Tolak
                                            </button>
                                        </form>
                                    </div>
                                    <span class="text-[10px] text-amber-500 font-bold uppercase tracking-widest mt-2 hidden md:block animate-pulse">Menunggu Proses</span>
                                @elseif($izin->status == 'disetujui')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-emerald-50 text-emerald-700 rounded-xl text-[11px] font-black uppercase tracking-widest border border-emerald-200/60 shadow-sm w-full md:w-auto justify-center">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                        Telah Disetujui
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-rose-50 text-rose-700 rounded-xl text-[11px] font-black uppercase tracking-widest border border-rose-200/60 shadow-sm w-full md:w-auto justify-center">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path></svg>
                                        Ditolak
                                    </span>
                                @endif
                            </div>

                        </div>
                        @empty
                        <div class="p-16 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <div class="w-20 h-20 bg-slate-50 border border-slate-100 shadow-inner rounded-[2rem] flex items-center justify-center mb-5">
                                    <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                </div>
                                <p class="text-slate-700 font-black text-lg tracking-tight">Belum Ada Pengajuan</p>
                                <p class="text-slate-500 text-sm font-medium mt-1">Belum ada surat izin dari guru yang masuk.</p>
                            </div>
                        </div>
                        @endforelse
                    </div>

                    @if($izins->hasPages())
                    <div class="p-4 md:p-6 border-t border-slate-50 bg-slate-50/30">
                        {{ $izins->links() }}
                    </div>
                    @endif
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

        <a href="{{ route('admin.izin') }}" class="flex flex-col items-center gap-1 p-2 min-w-[64px] text-emerald-600">
            <div class="bg-emerald-100 px-5 py-1.5 rounded-full transition-all duration-300 shadow-sm">
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
        document.addEventListener("DOMContentLoaded", function() {
            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses!',
                    text: @json(session('success')),
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 4000,
                    timerProgressBar: true,
                    background: '#ffffff',
                    color: '#1e293b',
                    iconColor: '#10b981'
                });
            @endif
        });

        // Diubah untuk mendukung ID form dari parameter
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