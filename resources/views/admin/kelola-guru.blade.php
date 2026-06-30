<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="theme-color" content="#064e3b">
    <title>Kelola Guru - Admin Panel E-Presensi</title>
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
                <img src="https://img.icons8.com/fluency/96/school.png" class="w-9 h-9 drop-shadow-lg" alt="Logo">
            </div>
            <div>
                <h1 class="text-white font-black text-xl tracking-tight leading-none">Admin<span class="text-emerald-400">Panel</span></h1>
                <p class="text-[10px] text-emerald-200/60 font-bold uppercase tracking-widest mt-1">SMK Ampana Kota</p>
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
                    <h2 class="text-xl md:text-[26px] font-black text-slate-800 tracking-tight leading-none">Manajemen Guru</h2>
                    <p class="text-slate-500 text-[11px] md:text-sm font-bold mt-1 tracking-wide">Pangkalan Data Pendidik</p>
                </div>
            </div>
            
            <div class="hidden md:flex items-center">
                <span class="px-4 py-2 bg-amber-100/80 text-amber-800 rounded-full text-xs font-bold tracking-widest uppercase shadow-sm border border-amber-200/50">
                    Administrator
                </span>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto hide-scrollbar p-5 md:p-10 pb-28 md:pb-10">
            <div class="max-w-6xl mx-auto space-y-6 md:space-y-8">
                
                <div class="bg-gradient-to-r from-emerald-600 to-teal-500 rounded-[2rem] p-6 md:p-8 shadow-[0_15px_40px_-10px_rgba(16,185,129,0.4)] flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 relative overflow-hidden">
                    <div class="absolute -right-10 -top-10 w-48 h-48 bg-white/10 rounded-full blur-2xl"></div>
                    <div class="absolute left-1/2 bottom-0 w-32 h-32 bg-white/5 rounded-full blur-xl translate-y-1/2"></div>
                    
                    <div class="relative z-10 text-white">
                        <h3 class="text-xl md:text-2xl font-black tracking-tight mb-1">Daftar Akun Terdaftar</h3>
                        <p class="text-emerald-50 text-sm md:text-base font-medium opacity-90">
                            Total ada <span class="font-black text-amber-300 text-lg mx-1">{{ $gurus->count() }}</span> guru terdaftar di sistem.
                        </p>
                    </div>
                    
                    <div class="relative z-10">
                        <div class="p-3 md:p-4 bg-white/20 backdrop-blur-md rounded-2xl border border-white/20 shadow-inner">
                            <svg class="w-8 h-8 md:w-10 md:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-[2rem] shadow-[0_10px_40px_-10px_rgba(0,0,0,0.05)] overflow-hidden border border-white">
                    
                    <div class="hidden sm:flex items-center justify-between p-4 px-6 border-b-2 border-slate-50 bg-slate-50/50">
                        <span class="text-slate-400 text-xs font-bold uppercase tracking-widest pl-16">Profil Guru & Kontak</span>
                        <div class="flex items-center gap-12 w-64 justify-end">
                            <span class="text-slate-400 text-xs font-bold uppercase tracking-widest text-right">Tgl Gabung</span>
                            <span class="text-slate-400 text-xs font-bold uppercase tracking-widest text-center">Status</span>
                        </div>
                    </div>

                    <div class="flex flex-col divide-y divide-slate-50">
                        @forelse($gurus as $guru)
                        <div class="group flex flex-col sm:flex-row sm:items-center justify-between p-4 sm:p-5 sm:px-6 gap-3 sm:gap-4 hover:bg-slate-50/80 transition-all duration-300">
                            
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-[1.25rem] bg-gradient-to-br from-indigo-100 to-indigo-200 flex items-center justify-center text-indigo-700 font-black text-lg shadow-inner shrink-0 group-hover:scale-105 transition-transform duration-300">
                                    {{ strtoupper(substr($guru->name, 0, 1)) }}
                                </div>
                                <div class="overflow-hidden">
                                    <p class="font-extrabold text-slate-800 text-[15px] leading-tight truncate">{{ $guru->name }}</p>
                                    <div class="flex items-center gap-2 mt-1">
                                        <span class="inline-flex items-center text-[9px] sm:text-[10px] font-bold uppercase tracking-widest text-indigo-600 bg-indigo-50 px-2 py-0.5 rounded-lg border border-indigo-100 shrink-0">
                                            Guru Pengajar
                                        </span>
                                        <span class="w-1 h-1 rounded-full bg-slate-300 shrink-0"></span>
                                        <span class="text-[11px] text-slate-500 font-semibold truncate">{{ $guru->email }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center justify-between sm:justify-end gap-4 sm:gap-10 pl-16 sm:pl-0 w-full sm:w-auto mt-1 sm:mt-0">
                                <span class="text-slate-500 font-bold text-[11px] sm:text-xs">
                                    {{ \Carbon\Carbon::parse($guru->created_at)->translatedFormat('d M Y') }}
                                </span>
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-emerald-50 text-emerald-600 rounded-xl text-[10px] sm:text-[11px] font-black uppercase tracking-widest border border-emerald-100 shadow-sm shrink-0">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                    Aktif
                                </span>
                            </div>

                        </div>
                        @empty
                        <div class="p-16 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <div class="w-20 h-20 bg-slate-50 rounded-[2rem] flex items-center justify-center mb-5 border border-slate-100">
                                    <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                </div>
                                <p class="text-slate-700 font-extrabold text-lg tracking-tight">Belum Ada Data</p>
                                <p class="text-slate-400 text-sm font-medium mt-1">Sistem belum mendeteksi pendaftaran akun guru.</p>
                            </div>
                        </div>
                        @endforelse
                    </div>
                    
                    @if($gurus->hasPages())
                    <div class="p-4 md:p-6 border-t border-slate-50 bg-slate-50/30">
                        {{ $gurus->links() }}
                    </div>
                    @endif
                </div>

            </div>
        </div>
    </main>

    <nav class="md:hidden fixed bottom-0 left-0 w-full bg-white/90 backdrop-blur-xl border-t border-slate-100 z-50 rounded-t-[2rem] shadow-[0_-10px_40px_rgba(0,0,0,0.06)] pb-safe pt-2 px-6 flex justify-between items-center">
        
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