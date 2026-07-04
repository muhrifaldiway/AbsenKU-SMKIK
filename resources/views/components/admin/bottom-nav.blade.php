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