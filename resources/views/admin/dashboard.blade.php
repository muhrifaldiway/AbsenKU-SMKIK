@extends('layouts.admin.admin')
@section('title', 'Beranda Admin - AbsenKU SMKIK')

@section('content')
    <header class="h-20 bg-white/80 backdrop-blur-xl flex items-center justify-between px-6 md:px-10 z-20 sticky top-0 shadow-[0_4px_30px_rgba(0,0,0,0.03)] border-b border-white">
        <div class="flex items-center gap-4">
            <div class="inline-flex p-1.5 rounded-2xl bg-white/10 backdrop-blur-sm mr-3 border border-white/10">
                <img src="{{ asset('img/logo2.png') }}" class="w-9 h-9 drop-shadow-lg" alt="Logo">
            </div>
            <div>
                <h2 class="text-xl md:text-[26px] font-black text-slate-800 tracking-tight leading-none">Dashboard</h2>
                <p class="text-slate-500 text-[11px] md:text-sm font-bold mt-1 tracking-wide">Sistem Presensi Real-time</p>
            </div>
        </div>
        
        <a href="{{ route('admin.cetak.laporan') }}" 
            target="_blank" 
            class="flex items-center justify-center w-12 h-12 md:w-auto md:px-5 md:py-3 bg-gradient-to-tr from-amber-400 to-amber-500 hover:from-amber-500 hover:to-amber-600 text-amber-950 font-bold rounded-2xl md:rounded-2xl shadow-[0_8px_20px_rgba(245,158,11,0.25)] transition-all duration-300 active:scale-95">
                
                <svg class="w-5 h-5 md:mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                </svg>
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
@endsection