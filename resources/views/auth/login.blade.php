<x-guest-layout>
    <div class="fixed inset-0 flex flex-col justify-center items-center bg-white overflow-hidden">
        
        <div class="relative w-full h-full sm:max-w-md px-8 pt-12 pb-6 flex flex-col justify-center overflow-y-auto">
            
            <div class="text-center mb-10 shrink-0">
                <div class="inline-flex p-1 rounded-full bg-white mb-4 shadow-lg border-4 border-slate-50 relative">
                    <div class="absolute inset-0 rounded-full bg-emerald-100 animate-ping opacity-50" style="animation-duration: 3s;"></div>
                    <img src="{{ asset('img/logo3.png') }}" class="w-20 h-20 rounded-full object-cover relative z-10" alt="Logo SMK">
                </div>
                <h2 class="text-3xl font-black text-slate-800 tracking-tight">A<span class="text-emerald-600">bsenKU</span></h2>
                <p class="text-slate-500 text-xs mt-2 font-bold uppercase tracking-widest">SMK Informatika Komputer</p>
                <p class="text-slate-500 text-xs font-bold uppercase tracking-widest">Ampana Kota</p>
                <div class="h-1.5 w-16 bg-amber-400 mx-auto mt-4 rounded-full"></div>
            </div>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-5 shrink-0">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-bold text-slate-700 mb-2 pl-1">Alamat Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206" /></svg>
                        </div>
                        <input id="email" type="email" name="email" :value="old('email')" required autofocus 
                            class="block w-full pl-11 pr-4 py-3.5 border-slate-200 focus:border-emerald-500 focus:ring-emerald-500 rounded-2xl shadow-sm transition duration-200 bg-slate-50/50 text-sm font-medium" 
                            placeholder="guru@smkampana.sch.id">
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div>
                    <div class="flex justify-between items-center mb-2 pl-1 pr-1">
                        <label for="password" class="block text-sm font-bold text-slate-700">Kata Sandi</label>
                        @if (Route::has('password.request'))
                            <a class="text-xs text-emerald-600 hover:text-emerald-500 font-bold transition-colors" href="{{ route('password.request') }}">Lupa Sandi?</a>
                        @endif
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                        </div>
                        <input id="password" type="password" name="password" required 
                            class="block w-full pl-11 pr-4 py-3.5 border-slate-200 focus:border-emerald-500 focus:ring-emerald-500 rounded-2xl shadow-sm transition duration-200 bg-slate-50/50 text-sm font-medium"
                            placeholder="••••••••">
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <button type="submit" class="w-full mt-2 py-4 bg-amber-500 hover:bg-amber-400 text-amber-950 font-bold rounded-2xl shadow-[0_8px_25px_rgb(245,158,11,0.3)] transition-all duration-300 transform hover:-translate-y-1 active:scale-95 flex justify-center items-center gap-2">
                    <span>Masuk ke Akun</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" /></svg>
                </button>
            </form>

            <div class="relative flex py-8 items-center shrink-0">
                <div class="flex-grow border-t border-slate-100"></div>
                <span class="flex-shrink mx-4 text-slate-400 text-[10px] font-bold uppercase tracking-widest">Atau masuk via</span>
                <div class="flex-grow border-t border-slate-100"></div>
            </div>

            <a href="{{ route('google.login') }}" class="w-full flex justify-center items-center gap-3 px-4 py-3.5 border-2 border-slate-100 rounded-2xl font-bold text-slate-600 hover:bg-slate-50 hover:border-slate-200 transition-all duration-200 active:scale-95 group shrink-0">
                <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" class="w-5 h-5 group-hover:scale-110 transition-transform">
                <span class="text-sm">Single Sign-On Google</span>
            </a>
            
            <div class="text-center mt-6 shrink-0">
                <p class="text-xs font-bold text-slate-500">
                    Belum terdaftar? 
                    <a href="{{ route('register') }}" class="text-emerald-600 hover:text-emerald-500 font-black decoration-2 underline-offset-4 hover:underline ml-1">Registrasi di sini</a>
                </p>
            </div>
            
            <div class="mt-auto pt-8 text-center shrink-0">
                <p class="text-slate-400 text-[10px] font-bold uppercase tracking-widest leading-relaxed">
                    &copy; {{ date('Y') }} • Tim IT Development <br>SMK Informatika Ampana Kota.
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>