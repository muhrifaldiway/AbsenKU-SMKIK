@extends('layouts.user.profil')
@section('title', 'Profil')

@section('content')
    <div class="bg-[#064e3b] px-6 pt-10 pb-20 rounded-b-[2.5rem] shadow-lg">
        <h2 class="text-white text-xl font-black tracking-tight">Profil Guru</h2>
        <p class="text-emerald-200 text-xs font-medium mt-1">Kelola data dan keamanan akun</p>
    </div>

    <div class="flex-1 overflow-y-auto hide-scrollbar -mt-12 z-10 px-6 pb-28">
        
        <div class="bg-white rounded-[2rem] shadow-xl border border-slate-100 p-6 relative mt-16">
            
            <div class="absolute -top-16 left-0 right-0 flex justify-center">
                <div class="relative">
                    <div class="w-28 h-28 rounded-full bg-indigo-50 border-4 border-white shadow-lg overflow-hidden flex items-center justify-center">
                        @if(auth()->user()->foto)
                            <img src="{{ asset('storage/profil/' . auth()->user()->foto) }}" alt="Profil" class="w-full h-full object-cover">
                        @else
                            <span class="text-4xl font-black text-indigo-500">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                        @endif
                    </div>
                    <div class="absolute bottom-2 right-2 bg-emerald-500 w-7 h-7 rounded-full flex items-center justify-center text-white border-2 border-white shadow-sm">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                    </div>
                </div>
            </div>

            <div class="flex flex-col items-center mt-16 mb-6">
                <h3 class="font-black text-slate-800 text-lg">{{ auth()->user()->name }}</h3>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">{{ auth()->user()->email }}</p>
            </div>

            <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf
                @method('PUT')
            
                <div class="p-4 bg-slate-50 border border-slate-100 rounded-2xl">
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">Ubah Foto</label>
                    <input type="file" name="foto" accept="image/*" class="w-full text-sm text-slate-500 file:mr-3 file:py-2 file:px-3 file:rounded-xl file:border-0 file:text-[10px] file:font-black file:uppercase file:bg-indigo-100 file:text-indigo-700 hover:file:bg-indigo-200 transition-colors">
                </div>
            
                <div class="p-4 bg-slate-50 border border-slate-100 rounded-2xl space-y-3">
                    <h4 class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Keamanan</h4>
                    
                    <div class="space-y-1">
                        <label class="text-[10px] font-bold text-slate-500">Kata Sandi Baru</label>
                        <input type="password" name="password" placeholder="••••••••" class="w-full px-4 py-3 border border-slate-200 rounded-xl bg-white text-sm font-medium focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 outline-none transition-all">
                    </div>
                    
                    <div class="space-y-1">
                        <label class="text-[10px] font-bold text-slate-500">Konfirmasi Kata Sandi</label>
                        <input type="password" name="password_confirmation" placeholder="••••••••" class="w-full px-4 py-3 border border-slate-200 rounded-xl bg-white text-sm font-medium focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 outline-none transition-all">
                    </div>
                </div>
            
                <button type="submit" class="w-full py-4 bg-[#064e3b] text-white text-sm font-black uppercase tracking-widest rounded-2xl shadow-xl hover:bg-emerald-800 transition-all active:scale-95">
                    Simpan Perubahan
                </button>
            </form>
        </div>

    </div>

    @include('components.user.bottom-nav')
@endsection

@push('scripts')
    <script>
        // Gunakan event DOMContentLoaded agar script berjalan setelah halaman dimuat
        document.addEventListener("DOMContentLoaded", function() {
            
            // PESAN SUKSES
            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: "{{ session('success') }}",
                    confirmButtonColor: '#064e3b', // Menggunakan warna hijau header Anda
                    confirmButtonText: 'Oke',
                    customClass: {
                        popup: 'rounded-3xl', // Agar sudutnya melengkung sama dengan card aplikasi
                        confirmButton: 'px-8 py-2 rounded-xl font-bold'
                    }
                });
            @endif

            // PESAN GAGAL / ERROR
            @if($errors->any())
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan!',
                    text: '{{ $errors->first() }}',
                    confirmButtonColor: '#ef4444', // Warna merah error
                    confirmButtonText: 'Coba Lagi',
                    customClass: {
                        popup: 'rounded-3xl',
                        confirmButton: 'px-8 py-2 rounded-xl font-bold'
                    }
                });
            @endif
            
        });
    </script>
@endpush