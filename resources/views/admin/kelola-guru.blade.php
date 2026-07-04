@extends('layouts.admin.kelola-guru')

@section('title', 'Kelola Guru - Admin Panel E-Presensi')
@section('page_title', 'Manajemen Guru')
@section('page_subtitle', 'Pangkalan Data Pendidik')

@section('content')
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
@endsection