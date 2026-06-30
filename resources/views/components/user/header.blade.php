<div class="bg-gradient-to-br from-[#064e3b] via-[#059669] to-[#047857] rounded-b-[2.5rem] px-6 pt-10 pb-10 relative shadow-lg overflow-hidden">
    <div class="absolute top-0 right-0 w-64 h-64 bg-emerald-400 rounded-full mix-blend-overlay filter blur-3xl opacity-40 pointer-events-none animate-pulse"></div>
    <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-amber-400 rounded-full mix-blend-overlay filter blur-3xl opacity-20 pointer-events-none"></div>
    <div class="absolute top-20 left-20 w-32 h-32 bg-indigo-400 rounded-full mix-blend-overlay filter blur-3xl opacity-20 pointer-events-none"></div>
    
    <div class="flex justify-between items-center relative z-10 mb-6">
        <div class="text-white flex-1 min-w-0 pr-4">
            <div class="flex items-center gap-2 mb-1">
                <span class="bg-emerald-800/60 border border-emerald-400/30 text-emerald-100 text-[9px] font-black tracking-widest uppercase px-2.5 py-0.5 rounded-full shadow-sm">
                    Guru SMK
                </span>
                <p class="text-emerald-100 text-[10px] font-bold tracking-widest uppercase truncate">
                    {{ \Carbon\Carbon::now()->translatedFormat('d M Y') }}
                </p>
            </div>
            <h1 class="text-2xl font-black tracking-tight drop-shadow-sm flex items-center gap-2">
                <span class="truncate max-w-[300px]">Halo, {{ auth()->user()->name }}</span>
                <span class="inline-block origin-bottom-right hover:animate-ping cursor-default text-xl">👋</span>
            </h1>
        </div>

        <a href="{{ route('profil.edit') }}" class="flex-shrink-0 w-14 h-14 rounded-full bg-white/20 p-1 backdrop-blur-md border border-white/40 shadow-2xl active:scale-95 transition-transform relative group">
            <span class="absolute top-0 right-0 w-3.5 h-3.5 bg-green-400 border-2 border-[#064e3b] rounded-full animate-pulse z-20 shadow-[0_0_10px_rgba(74,222,128,0.8)]"></span>
            <div class="w-full h-full rounded-full overflow-hidden bg-emerald-800 flex items-center justify-center text-white font-bold relative z-10 group-hover:opacity-90 transition-opacity">
                @if(auth()->user()->foto)
                    <img src="{{ asset('storage/profil/' . auth()->user()->foto) }}" alt="Profil" class="w-full h-full object-cover">
                @else
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                @endif
            </div>
        </a>
    </div>

    <div class="relative z-10 bg-black/10 backdrop-blur-md border border-white/20 rounded-[1.5rem] p-4 shadow-2xl flex flex-col gap-4">
        
        <div class="flex justify-between items-center border-b border-white/10 pb-3">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center text-white backdrop-blur-sm shadow-inner border border-white/10">
                    <svg class="w-5 h-5 opacity-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <p class="text-emerald-50 text-[9px] uppercase font-bold tracking-widest mb-0.5 opacity-80">Waktu Server (Live)</p>
                    <h2 id="live-clock" class="text-3xl font-black text-white tracking-tighter drop-shadow-md leading-none">00:00:00</h2>
                </div>
            </div>
            <div class="text-right">
                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-emerald-500/50 border border-emerald-400/30 text-[10px] font-black text-white uppercase tracking-widest shadow-sm">
                    <span class="w-1.5 h-1.5 bg-green-300 rounded-full animate-ping"></span> WITA
                </span>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-3">
            <div class="bg-black/10 rounded-xl p-2.5 border border-white/10 flex items-center gap-3 hover:bg-black/20 transition-colors">
                <div class="w-8 h-8 rounded-full bg-amber-400/20 text-amber-300 flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
                <div>
                    <p class="text-[8px] text-emerald-100 font-bold uppercase tracking-widest opacity-80 mb-0.5">Batas Masuk</p>
                    <p class="text-xs font-black text-white tracking-wide">07:15 <span class="text-[8px] opacity-70 uppercase">Pagi</span></p>
                </div>
            </div>

            <div class="bg-black/10 rounded-xl p-2.5 border border-white/10 flex items-center gap-3 hover:bg-black/20 transition-colors">
                <div class="w-8 h-8 rounded-full bg-indigo-400/20 text-indigo-300 flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                </div>
                <div>
                    <p class="text-[8px] text-emerald-100 font-bold uppercase tracking-widest opacity-80 mb-0.5">Waktu Pulang</p>
                    <p class="text-xs font-black text-white tracking-wide">02:10 <span class="text-[8px] opacity-70 uppercase">Sore</span></p>
                </div>
            </div>
        </div>
        <div class="mt-4 pt-4 border-t border-white/20 space-y-5">
    
            <div class="flex gap-4 items-start bg-white/5 p-3 rounded-2xl border border-white/10">
                <div class="text-amber-300 mt-1 flex-shrink-0">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21L14.017 18C14.017 16.8954 14.9124 16 16.017 16H19.017C19.5693 16 20.017 15.5523 20.017 15V9C20.017 8.44772 19.5693 8 19.017 8H15.017L16.2057 4.43389C16.4855 3.59479 15.9125 2.70994 15.0354 2.53508L14.017 2.33235L8.01701 8.33235C7.45472 8.89464 7.01701 9.68434 7.01701 10.4907V18C7.01701 19.6569 8.36015 21 10.017 21H14.017Z"/></svg>
                </div>
                <p class="text-lg text-emerald-50 italic font-semibold leading-relaxed">
                    "Pendidikan adalah tiket ke masa depan. Hari esok dimiliki oleh orang-orang yang mempersiapkannya hari ini."
                </p>
            </div>
        
            <div class="bg-black/10 rounded-2xl p-4 flex justify-between items-center border border-white/10">
                <div>
                    <p class="text-[10px] text-emerald-100 font-black uppercase tracking-widest">Target Kehadiran</p>
                    <div class="w-32 bg-white/20 rounded-full h-2 mt-2">
                        <div class="bg-emerald-400 h-2 rounded-full shadow-[0_0_10px_rgba(52,211,153,0.6)]" style="width: 75%"></div>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-lg text-white font-black leading-none">75%</p>
                    <p class="text-[9px] font-bold text-emerald-100 opacity-80 uppercase mt-1">Bulanan</p>
                </div>
            </div>
        </div>
    </div>
    
</div>