@extends('layouts.user.riwayat')
@section('title', 'Riwayat Presensi')

@section('content')

    @php
        $setting = \App\Models\Setting::first();
    @endphp

    <div class="bg-[#064e3b] px-6 pt-10 pb-8 rounded-b-[2rem] shadow-lg relative overflow-hidden">
        <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-400 rounded-full mix-blend-overlay filter blur-2xl opacity-40"></div>
        <div class="absolute -bottom-10 -left-10 w-24 h-24 bg-amber-400 rounded-full mix-blend-overlay filter blur-2xl opacity-20"></div>

        <h2 class="text-white text-2xl font-black tracking-tight relative z-10">Riwayat Presensi</h2>
        <p class="text-emerald-200 text-xs font-bold mt-1 relative z-10 tracking-wide">Daftar kehadiran Anda bulan ini</p>
    </div>

    <div class="flex-1 overflow-y-auto hide-scrollbar px-6 py-6 pb-28">
        
        <div class="bg-white p-5 rounded-3xl border border-slate-100 shadow-sm flex justify-between items-center mb-6">
            <div>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Total Tercatat</p>
                <p class="text-2xl font-black text-slate-800">{{ $semuaRiwayat ? $semuaRiwayat->count() : 0 }} <span class="text-xs font-semibold text-slate-400">Hari</span></p>
            </div>
            
            <a href="{{ route('user.riwayat.export') }}" class="flex items-center justify-center gap-2 px-5 py-3 bg-gradient-to-tr from-amber-400 to-amber-500 text-amber-950 font-bold rounded-2xl shadow-[0_8px_20px_rgba(245,158,11,0.25)] hover:shadow-[0_10px_25px_rgba(245,158,11,0.35)] hover:from-amber-500 hover:to-amber-600 transition-all duration-300 active:scale-95">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                <span class="text-xs uppercase tracking-widest font-black">Cetak</span>
            </a>
        </div>

        <div class="space-y-4">
            @forelse($semuaRiwayat as $absen)
                @php
                    $isHadir = strtolower($absen->status) == 'hadir';
                    
                    // Logika Pengecekan Waktu
                    $terlambatMasuk = $absen->time_in > $setting->jam_masuk;
                    $pulangCepat = ($absen->time_out != null && $absen->time_out < $setting->jam_pulang);
                @endphp

                <div class="bg-white p-4 rounded-2xl border border-slate-100 shadow-[0_4px_15px_rgba(0,0,0,0.03)] flex items-center justify-between relative overflow-hidden transition-all hover:shadow-md">
                    
                    <div class="absolute left-0 top-0 bottom-0 w-1.5 {{ $isHadir ? 'bg-emerald-500' : 'bg-rose-500' }}"></div>

                    <div class="flex items-center gap-3 pl-2">
                        <div class="w-11 h-11 rounded-2xl flex items-center justify-center {{ $isHadir ? 'bg-emerald-50 text-emerald-600' : 'bg-rose-50 text-rose-500' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <div>
                            <p class="font-black text-slate-800 text-sm">{{ \Carbon\Carbon::parse($absen->date)->translatedFormat('d M Y') }}</p>
                            
                            <p class="text-[10px] font-bold text-slate-400 mt-1 flex items-center gap-1.5">
                                <span class="bg-slate-100 px-1.5 py-0.5 rounded text-slate-500">Masuk</span>
                                <span class="{{ $terlambatMasuk ? 'text-rose-500' : 'text-slate-700' }}">{{ $absen->time_in ?: '--:--' }}</span>
                                
                                <span class="text-slate-300 mx-0.5">|</span>
                                
                                <span class="bg-slate-100 px-1.5 py-0.5 rounded text-slate-500">Pulang</span>
                                <span class="{{ $pulangCepat ? 'text-rose-500' : 'text-slate-700' }}">{{ $absen->time_out ?: '--:--' }}</span>
                            </p>
                        </div>
                    </div>

                    <div class="flex flex-col items-end gap-1.5">
                        <span class="px-3 py-1 {{ $isHadir ? 'bg-emerald-100 text-emerald-700' : 'bg-rose-100 text-rose-700' }} rounded-full text-[9px] font-black uppercase tracking-widest shadow-sm">
                            {{ $absen->status }}
                        </span>
                        
                        @if($terlambatMasuk || $pulangCepat)
                            <div class="flex flex-col items-end">
                                @if($terlambatMasuk)
                                    <span class="text-[8px] font-black text-rose-500 uppercase tracking-widest">Telat Masuk</span>
                                @endif
                                @if($pulangCepat)
                                    <span class="text-[8px] font-black text-rose-500 uppercase tracking-widest">Pulang Cepat</span>
                                @endif
                            </div>
                        @else
                            <span class="text-[8px] font-black text-emerald-500 uppercase tracking-widest">Disiplin</span>
                        @endif
                    </div>
                </div>
            @empty
                <div class="text-center py-12 bg-white rounded-3xl border border-slate-100 border-dashed">
                    <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4 border border-slate-100">
                        <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                    </div>
                    <p class="text-sm font-bold text-slate-400">Belum ada riwayat bulan ini.</p>
                </div>
            @endforelse
        </div>

    </div>

    @include('components.user.bottom-nav')

@endsection