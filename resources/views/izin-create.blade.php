@extends('layouts.user.izin')
@section('title', 'Formulir Izin')

@section('content')
    <div class="bg-[#064e3b] px-6 pt-10 pb-20 rounded-b-[2.5rem] shadow-lg">
        <h2 class="text-white text-xl font-black tracking-tight">Formulir Izin</h2>
        <p class="text-emerald-200 text-xs font-medium mt-1">Isi data ketidakhadiran Anda</p>
    </div>

    <div class="flex-1 overflow-y-auto hide-scrollbar -mt-12 z-10 px-6 pb-28">
        
        <div class="bg-white rounded-[2rem] shadow-xl border border-slate-100 p-6">
            
            <form action="{{ route('izin.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                @csrf
                
                <div class="grid grid-cols-2 gap-3">
                    <div class="space-y-1">
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest">Mulai</label>
                        <input type="date" name="tanggal_mulai" required class="w-full px-4 py-3 border border-slate-200 rounded-2xl bg-slate-50 text-sm font-bold focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-500 outline-none transition-all">
                    </div>
                    <div class="space-y-1">
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest">Sampai</label>
                        <input type="date" name="tanggal_selesai" required class="w-full px-4 py-3 border border-slate-200 rounded-2xl bg-slate-50 text-sm font-bold focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-500 outline-none transition-all">
                    </div>
                </div>

                <div class="space-y-1">
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest">Jenis Pengajuan</label>
                    <select name="jenis" required class="w-full px-4 py-3 border border-slate-200 rounded-2xl bg-slate-50 text-sm font-bold focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-500 outline-none transition-all">
                        <option value="sakit">Sakit (Butuh Surat Dokter)</option>
                        <option value="izin">Izin Kepentingan Pribadi</option>
                        <option value="dinas_luar">Dinas Luar / Tugas Sekolah</option>
                    </select>
                </div>

                <div class="space-y-1">
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest">Alasan Detail</label>
                    <textarea name="keterangan" rows="4" required class="w-full px-4 py-3 border border-slate-200 rounded-2xl bg-slate-50 text-sm font-medium focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-500 outline-none transition-all" placeholder="Tuliskan alasan ketidakhadiran..."></textarea>
                </div>

                <div class="space-y-1">
                    <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest">Upload Bukti (Opsional)</label>
                    <input type="file" name="surat_dokumen" accept="image/*" class="w-full text-sm text-slate-500 file:mr-3 file:py-2 file:px-3 file:rounded-xl file:border-0 file:text-[10px] file:font-black file:uppercase file:bg-emerald-100 file:text-emerald-700 hover:file:bg-emerald-200 transition-colors">
                </div>

                <button type="submit" class="w-full py-4 mt-4 bg-[#064e3b] text-white text-sm font-black uppercase tracking-widest rounded-2xl shadow-xl hover:bg-emerald-800 transition-all active:scale-95">
                    Kirim Pengajuan
                </button>
                
                <a href="{{ route('dashboard') }}" class="block w-full py-4 mt-2 text-center bg-white border-2 border-slate-200 text-slate-500 text-sm font-black uppercase tracking-widest rounded-2xl hover:bg-slate-50 transition-all active:scale-95">
                    Kembali
                </a>
            </form>
            
        </div>

    </div>

    @include('components.user.bottom-nav')
@endsection