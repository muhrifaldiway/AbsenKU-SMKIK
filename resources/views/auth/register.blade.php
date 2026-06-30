<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-center items-center p-4 sm:pt-0 bg-gradient-to-br from-[#064e3b] via-emerald-800 to-slate-900 relative overflow-hidden">
        
        <div class="absolute -top-20 -left-20 w-96 h-96 bg-emerald-400 rounded-full mix-blend-overlay filter blur-[100px] opacity-40 animate-pulse pointer-events-none"></div>
        <div class="absolute -bottom-20 -right-20 w-80 h-80 bg-amber-400 rounded-full mix-blend-overlay filter blur-[80px] opacity-20 pointer-events-none"></div>

        <div class="w-full sm:max-w-xl px-8 py-10 bg-white/95 backdrop-blur-xl shadow-[0_20px_50px_rgba(0,0,0,0.3)] sm:rounded-[2.5rem] rounded-3xl border border-white/40 relative z-10">
            
            <div class="text-center mb-8">
                <div class="inline-flex p-4 rounded-3xl bg-emerald-50 text-emerald-500 mb-4 shadow-inner border border-emerald-100">
                    <img src="{{ asset('img/logo3.png') }}" class="w-20 h-20 rounded-full object-cover relative z-10" alt="Logo SMK">
                </div>
                <h2 class="text-3xl font-black text-slate-800 tracking-tight">Daftar Akun Baru</h2>
                <p class="text-slate-400 text-[11px] mt-2 font-black uppercase tracking-widest">AbsenKU SMK Informatika Komputer</p>
                <div class="h-1.5 w-16 bg-gradient-to-r from-emerald-400 to-teal-500 mx-auto mt-4 rounded-full"></div>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="md:col-span-2">
                        <label for="name" class="block text-[11px] font-black text-slate-500 uppercase tracking-widest mb-1 ml-1">Nama Lengkap</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400 group-focus-within:text-emerald-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                            </div>
                            <input id="name" type="text" name="name" :value="old('name')" required autofocus 
                                class="block w-full pl-11 pr-4 py-3.5 border-slate-200 focus:border-emerald-500 focus:ring-emerald-500 rounded-2xl shadow-sm transition duration-200 bg-slate-50 hover:bg-slate-100/50 text-sm font-medium" 
                                placeholder="Cth: Budi Santoso, S.Kom">
                        </div>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="md:col-span-2">
                        <label for="email" class="block text-[11px] font-black text-slate-500 uppercase tracking-widest mb-1 ml-1">Email Sekolah</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400 group-focus-within:text-emerald-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206" /></svg>
                            </div>
                            <input id="email" type="email" name="email" :value="old('email')" required 
                                class="block w-full pl-11 pr-4 py-3.5 border-slate-200 focus:border-emerald-500 focus:ring-emerald-500 rounded-2xl shadow-sm transition duration-200 bg-slate-50 hover:bg-slate-100/50 text-sm font-medium" 
                                placeholder="guru@smkampana.sch.id">
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div>
                        <label for="password" class="block text-[11px] font-black text-slate-500 uppercase tracking-widest mb-1 ml-1">Password</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400 group-focus-within:text-emerald-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                            </div>
                            <input id="password" type="password" name="password" required 
                                class="block w-full pl-11 pr-12 py-3.5 border-slate-200 focus:border-emerald-500 focus:ring-emerald-500 rounded-2xl shadow-sm transition duration-200 bg-slate-50 hover:bg-slate-100/50 text-sm font-medium"
                                placeholder="••••••••">
                            <button type="button" onclick="togglePassword('password', 'eye-icon-1')" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-emerald-600 focus:outline-none transition-colors">
                                <span id="eye-icon-1">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                </span>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-[11px] font-black text-slate-500 uppercase tracking-widest mb-1 ml-1">Ulangi Sandi</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400 group-focus-within:text-emerald-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04M12 21.455c-3.832 0-7.29-2.036-9.176-5.265A11.952 11.952 0 0012 20.055a11.952 11.952 0 009.176-3.865 11.952 11.952 0 01-9.176 5.265z" /></svg>
                            </div>
                            <input id="password_confirmation" type="password" name="password_confirmation" required 
                                class="block w-full pl-11 pr-12 py-3.5 border-slate-200 focus:border-emerald-500 focus:ring-emerald-500 rounded-2xl shadow-sm transition duration-200 bg-slate-50 hover:bg-slate-100/50 text-sm font-medium"
                                placeholder="••••••••">
                            <button type="button" onclick="togglePassword('password_confirmation', 'eye-icon-2')" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-emerald-600 focus:outline-none transition-colors">
                                <span id="eye-icon-2">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                                </span>
                            </button>
                        </div>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                </div>

                <div class="pt-6">
                    <button type="submit" class="w-full py-4 bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white font-black uppercase tracking-widest rounded-2xl shadow-[0_10px_20px_rgba(16,185,129,0.3)] transition-all duration-300 active:scale-95 flex justify-center items-center gap-2">
                        <span>Buat Akun Sekarang</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6" /></svg>
                    </button>
                </div>

                <div class="text-center mt-6">
                    <p class="text-xs font-bold text-slate-500">
                        Sudah punya akun? 
                        <a href="{{ route('login') }}" class="text-emerald-600 hover:text-emerald-500 font-black decoration-2 underline-offset-4 hover:underline ml-1">Masuk di sini</a>
                    </p>
                </div>
            </form>
            
            <div class="mt-10 text-center">
                <p class="text-slate-400 text-[10px] font-bold uppercase tracking-widest leading-relaxed">
                    &copy; {{ date('Y') }} • Tim IT Development <br>SMK Informatika Ampana Kota.
                </p>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const iconSpan = document.getElementById(iconId);
            
            const eyeOpenSVG = `<svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>`;
            
            const eyeClosedSVG = `<svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" /></svg>`;
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                iconSpan.innerHTML = eyeClosedSVG; 
            } else {
                passwordInput.type = 'password';
                iconSpan.innerHTML = eyeOpenSVG;
            }
        }
    </script>
</x-guest-layout>