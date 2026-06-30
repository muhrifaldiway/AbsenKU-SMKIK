@extends('layouts.user.dashboard') 
@section('title', 'Dashboard')

@section('content')

    <div class="flex-1 overflow-y-auto hide-scrollbar -mt-20 z-10 px-6 pb-28">
        
        @php
            $sudahMasuk = isset($absenHariIni) && $absenHariIni->time_in != null;
            $sudahPulang = isset($absenHariIni) && $absenHariIni->time_out != null;
        @endphp

        <div class="bg-white rounded-[2rem] shadow-xl p-5 grid grid-cols-3 gap-2 text-center mb-6 mt-12 border border-slate-100 relative overflow-hidden">
            <div class="absolute -top-6 -right-6 w-20 h-20 bg-emerald-50 rounded-full blur-2xl pointer-events-none"></div>
            
            <div class="flex flex-col items-center relative z-10">
                <div class="w-8 h-8 bg-emerald-50 text-emerald-500 rounded-full flex items-center justify-center mb-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Hadir</span>
                <span class="text-xl font-black text-emerald-600">{{ $totalHadir ?? 0 }}</span>
            </div>
            
            <div class="flex flex-col items-center border-l border-slate-100 relative z-10">
                <div class="w-8 h-8 bg-rose-50 text-rose-500 rounded-full flex items-center justify-center mb-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Terlambat</span>
                <span class="text-xl font-black text-rose-500">{{ $totalTerlambat ?? 0 }}</span>
            </div>
            
            <div class="flex flex-col items-center border-l border-slate-100 relative z-10">
                <div class="w-8 h-8 bg-indigo-50 text-indigo-500 rounded-full flex items-center justify-center mb-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                </div>
                <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Status</span>
                <span class="mt-1 px-2 py-0.5 rounded-md text-[9px] font-black tracking-widest uppercase {{ !$sudahMasuk ? 'bg-rose-100 text-rose-600' : (!$sudahPulang ? 'bg-amber-100 text-amber-600' : 'bg-emerald-100 text-emerald-600') }}">
                    {{ !$sudahMasuk ? 'BELUM' : (!$sudahPulang ? 'DI SEKOLAH' : 'SELESAI') }}
                </span>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-8">
            
            @if(!$sudahMasuk)
                <a href="{{ route('absen.create') }}" class="group bg-gradient-to-br from-amber-400 to-amber-500 text-amber-950 p-5 rounded-3xl shadow-[0_8px_20px_rgba(251,191,36,0.3)] flex flex-col items-center gap-2 transition-all active:scale-95 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-16 h-16 bg-white opacity-20 rounded-bl-full pointer-events-none group-hover:scale-110 transition-transform"></div>
                    <svg class="w-8 h-8 mb-1 opacity-90 group-hover:-translate-y-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    <div class="text-center z-10">
                        <span class="block font-black text-sm uppercase tracking-wide">Absen Masuk</span>
                        <span class="block text-[9px] font-bold opacity-70 mt-0.5">Kamera & Lokasi</span>
                    </div>
                </a>
            @elseif(!$sudahPulang)
                <a href="{{ route('absen.create') }}" class="group bg-gradient-to-br from-cyan-400 to-blue-500 text-white p-5 rounded-3xl shadow-[0_8px_20px_rgba(6,182,212,0.3)] flex flex-col items-center gap-2 transition-all active:scale-95 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-16 h-16 bg-white opacity-20 rounded-bl-full pointer-events-none group-hover:scale-110 transition-transform"></div>
                    <svg class="w-8 h-8 mb-1 opacity-90 group-hover:-translate-y-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    <div class="text-center z-10">
                        <span class="block font-black text-sm uppercase tracking-wide">Absen Pulang</span>
                        <span class="block text-[9px] font-bold opacity-80 mt-0.5">Waktunya Istirahat</span>
                    </div>
                </a>
            @else
                <div class="bg-slate-100 border-2 border-slate-200 text-slate-400 p-5 rounded-3xl flex flex-col items-center gap-2 relative overflow-hidden">
                    <svg class="w-8 h-8 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <div class="text-center z-10">
                        <span class="block font-black text-sm uppercase tracking-wide">Tugas Selesai</span>
                        <span class="block text-[9px] font-bold mt-0.5">Sampai Jumpa Besok</span>
                    </div>
                </div>
            @endif
            
            <a href="{{ route('izin.create') }}" class="group bg-white border-2 border-emerald-50 text-emerald-800 p-5 rounded-3xl shadow-lg flex flex-col items-center gap-2 transition-all hover:border-emerald-200 active:scale-95 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-16 h-16 bg-emerald-50 rounded-bl-full pointer-events-none group-hover:scale-110 transition-transform"></div>
                <svg class="w-8 h-8 mb-1 text-emerald-500 opacity-90 group-hover:-translate-y-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                <div class="text-center z-10">
                    <span class="block font-black text-sm uppercase tracking-wide">Ajukan Izin</span>
                    <span class="block text-[9px] font-bold text-slate-400 mt-0.5">Sakit / Dinas Luar</span>
                </div>
            </a>
        </div>

        <div class="flex items-center justify-between mb-3 px-1">
            <h3 class="text-sm font-black text-slate-700">Riwayat Terbaru</h3>
        </div>
        
        <div class="space-y-3">
            @forelse($riwayat->take(5) as $absen)
                @php
                    $isHadir = strtolower($absen->status) == 'hadir';
                    $terlambatMasuk = $absen->time_in > $setting->jam_masuk;
                    $pulangCepat = ($absen->time_out != null && $absen->time_out < $setting->jam_pulang);
                @endphp
                <div class="bg-white p-4 rounded-2xl border border-slate-100 shadow-sm relative overflow-hidden">
                    <div class="absolute left-0 top-0 bottom-0 w-1.5 {{ $isHadir ? 'bg-emerald-500' : 'bg-rose-500' }}"></div>
                    
                    <div class="flex justify-between items-start">
                        <div class="flex items-center gap-3 pl-2">
                            <div class="w-10 h-10 rounded-xl flex items-center justify-center {{ $isHadir ? 'bg-emerald-50 text-emerald-500' : 'bg-rose-50 text-rose-500' }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                            <div>
                                <p class="text-xs font-black text-slate-700">{{ \Carbon\Carbon::parse($absen->date)->format('d-m-Y') }}</p>
                                <p class="text-[10px] font-bold text-slate-400 mt-0.5">
                                    Masuk: <span class="{{ $terlambatMasuk ? 'text-rose-500' : 'text-slate-600' }}">{{ $absen->time_in ?: '--:--' }}</span>
                                    <span class="mx-1 text-slate-300">|</span>
                                    Pulang: <span class="{{ $pulangCepat ? 'text-rose-500' : 'text-slate-600' }}">{{ $absen->time_out ?: '--:--' }}</span>
                                </p>
                            </div>
                        </div>

                        <div class="flex flex-col gap-1 items-end">
                            <span class="px-3 py-1 rounded-xl text-[9px] font-black uppercase tracking-widest border {{ $isHadir ? 'bg-emerald-50 border-emerald-100 text-emerald-600' : 'bg-rose-50 border-rose-100 text-rose-600' }}">
                                {{ $absen->status }}
                            </span>
                            
                            @if($terlambatMasuk || $pulangCepat)
                                <span class="text-[8px] font-bold text-rose-500 uppercase tracking-wide">
                                    {{ $terlambatMasuk ? 'Telat ' : '' }} {{ $pulangCepat ? 'Pulang Cepat' : '' }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-white p-6 rounded-2xl border border-slate-100 border-dashed text-center">
                    <div class="w-12 h-12 bg-slate-50 text-slate-300 rounded-full flex items-center justify-center mx-auto mb-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <p class="text-xs font-bold text-slate-400">Belum ada riwayat presensi.</p>
                </div>
            @endforelse
        </div>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{!! session('success') !!}',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 4000,
                    timerProgressBar: true,
                    customClass: {
                        popup: 'bg-white rounded-2xl shadow-xl border border-slate-100',
                        title: 'text-emerald-600 font-black',
                        htmlContainer: 'text-slate-600 font-bold text-sm'
                    }
                });
            @endif

            @if(session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Perhatian!',
                    text: '{!! session('error') !!}',
                    confirmButtonText: 'Mengerti',
                    confirmButtonColor: '#059669',
                    customClass: {
                        popup: 'rounded-3xl shadow-2xl',
                        confirmButton: 'px-6 py-2 rounded-xl font-bold'
                    }
                });
            @endif
        });
    </script>
@endsection