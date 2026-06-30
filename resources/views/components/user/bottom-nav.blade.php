<div class="absolute bottom-0 w-full bg-white/95 backdrop-blur-md border-t border-slate-200 pb-safe pt-2 px-6 flex justify-between items-center rounded-t-[2rem] shadow-[0_-10px_40px_rgba(0,0,0,0.08)] z-50 pb-4">
    
    <a href="{{ route('dashboard') }}" class="flex flex-col items-center gap-1 p-2 {{ request()->routeIs('dashboard') ? 'text-emerald-600' : 'text-slate-400' }}">
        <div class="w-10 h-10 rounded-full {{ request()->routeIs('dashboard') ? 'bg-emerald-50' : '' }} flex items-center justify-center transition-all">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
        </div>
        <span class="text-[10px] font-bold">Beranda</span>
    </a>

    <a href="{{ route('riwayat.index') }}" class="flex flex-col items-center gap-1 p-2 {{ request()->routeIs('riwayat.index') ? 'text-emerald-600' : 'text-slate-400' }}">
        <div class="w-10 h-10 rounded-full {{ request()->routeIs('riwayat.index') ? 'bg-emerald-50' : '' }} flex items-center justify-center transition-all">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
        </div>
        <span class="text-[10px] font-bold">Riwayat</span>
    </a>

    <a href="{{ route('profil.edit') }}" class="flex flex-col items-center gap-1 p-2 {{ request()->routeIs('profil.edit') ? 'text-emerald-600' : 'text-slate-400' }}">
        <div class="w-10 h-10 rounded-full {{ request()->routeIs('profil.edit') ? 'bg-emerald-50' : '' }} flex items-center justify-center transition-all">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
        </div>
        <span class="text-[10px] font-bold">Profil</span>
    </a>

    <form id="logout-form" method="POST" action="{{ route('logout') }}" class="m-0 p-0">
        @csrf
        <button type="button" onclick="confirmLogout()" class="flex flex-col items-center gap-1 p-2 text-rose-400 hover:text-rose-600 transition-colors">
            <div class="w-10 h-10 rounded-full flex items-center justify-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
            </div>
            <span class="text-[10px] font-bold">Keluar</span>
        </button>
    </form>
</div>