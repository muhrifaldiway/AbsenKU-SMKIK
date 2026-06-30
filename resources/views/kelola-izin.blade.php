<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola Izin Guru - Admin Panel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-slate-50 text-slate-800 h-screen flex overflow-hidden">

    <aside class="w-72 bg-slate-900 text-slate-300 flex flex-col shadow-2xl z-20 hidden md:flex">
        <div class="h-20 flex items-center px-8 border-b border-slate-800 bg-slate-950/50">
            <img src="https://img.icons8.com/fluency/96/school.png" class="w-8 h-8 mr-3" alt="Logo">
            <div>
                <h1 class="text-white font-bold text-lg tracking-wide">Admin Panel</h1>
                <p class="text-xs text-slate-500 font-medium uppercase tracking-widest">SMK Ampana</p>
            </div>
        </div>

        <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
            <p class="px-4 text-xs font-semibold text-slate-500 uppercase tracking-wider mb-4 mt-2">Menu Utama</p>
            
            <a href="{{ route('dashboard') }}" class="hover:bg-slate-800 hover:text-white text-slate-400 flex items-center gap-3 px-4 py-3 rounded-xl transition-all group">
                <svg class="w-5 h-5 group-hover:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                <span class="font-medium">Pantau Hari Ini</span>
            </a>
            
            <a href="{{ route('admin.pengaturan') }}" class="hover:bg-slate-800 hover:text-white text-slate-400 flex items-center gap-3 px-4 py-3 rounded-xl transition-all group mt-2">
                <svg class="w-5 h-5 group-hover:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                <span class="font-medium">Pengaturan Radius GPS</span>
            </a>

            <a href="{{ route('admin.guru') }}" class="hover:bg-slate-800 hover:text-white text-slate-400 flex items-center gap-3 px-4 py-3 rounded-xl transition-all group mt-2">
                <svg class="w-5 h-5 group-hover:text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                <span class="font-medium">Kelola Guru</span>
            </a>

            <a href="{{ route('admin.izin') }}" class="bg-indigo-600 text-white shadow-lg shadow-indigo-900/20 flex items-center gap-3 px-4 py-3 rounded-xl transition-all group mt-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                <span class="font-medium">Persetujuan Izin</span>
            </a>
        </nav>

        <div class="p-4 border-t border-slate-800 bg-slate-900">
            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="button" onclick="confirmLogout()" class="flex items-center gap-3 w-full p-3 rounded-xl hover:bg-rose-500/10 hover:text-rose-400 transition-all text-left">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    <span class="font-medium">Logout Admin</span>
                </button>
            </form>
        </div>
    </aside>

    <main class="flex-1 flex flex-col h-screen overflow-hidden bg-slate-50/50">
        <header class="h-20 bg-white/80 backdrop-blur-md border-b border-slate-200 flex items-center justify-between px-8 z-10 sticky top-0">
            <h2 class="text-2xl font-bold text-slate-800 tracking-tight">Persetujuan Izin Guru</h2>
            <div class="flex items-center gap-4">
                <span class="px-3 py-1 bg-amber-100 text-amber-700 rounded-full text-xs font-bold tracking-wide">Hak Akses: Administrator</span>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-8">
            <div class="max-w-6xl mx-auto space-y-6">
                
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-slate-100 bg-slate-50 flex justify-between items-center">
                        <h4 class="text-lg font-bold text-slate-800">Daftar Permohonan Surat Izin</h4>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="text-slate-500 text-sm uppercase tracking-wider border-b border-slate-200 bg-slate-50/50">
                                    <th class="p-4 font-semibold">Nama Guru</th>
                                    <th class="p-4 font-semibold">Jenis & Alasan</th>
                                    <th class="p-4 font-semibold">Rentang Tanggal</th>
                                    <th class="p-4 font-semibold text-center">Bukti Surat</th>
                                    <th class="p-4 font-semibold text-center">Status</th>
                                    <th class="p-4 font-semibold text-right">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-slate-100">
                                @forelse($izins as $izin)
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="p-4 font-bold text-slate-800">
                                        {{ $izin->user->name }}
                                    </td>
                                    <td class="p-4">
                                        <span class="px-2 py-0.5 rounded text-xs font-bold uppercase {{ $izin->jenis == 'sakit' ? 'bg-rose-100 text-rose-700' : ($izin->jenis == 'izin' ? 'bg-amber-100 text-amber-700' : 'bg-blue-100 text-blue-700') }}">
                                            {{ str_replace('_', ' ', $izin->jenis) }}
                                        </span>
                                        <p class="text-xs text-slate-500 mt-1 max-w-xs truncate" title="{{ $izin->keterangan }}">{{ $izin->keterangan }}</p>
                                    </td>
                                    <td class="p-4 text-slate-600 font-medium">
                                        {{ \Carbon\Carbon::parse($izin->tanggal_mulai)->translatedFormat('d M') }} s/d 
                                        {{ \Carbon\Carbon::parse($izin->tanggal_selesai)->translatedFormat('d M Y') }}
                                    </td>
                                    <td class="p-4 text-center">
                                        @if($izin->surat_dokumen)
                                            <a href="{{ asset('storage/surat_izin/' . $izin->surat_dokumen) }}" target="_blank" class="px-3 py-1 bg-indigo-50 text-indigo-600 rounded-lg hover:bg-indigo-100 font-semibold text-xs transition-colors inline-flex items-center gap-1">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                                Lihat
                                            </a>
                                        @else
                                            <span class="text-slate-400 text-xs italic">Tidak ada</span>
                                        @endif
                                    </td>
                                    <td class="p-4 text-center">
                                        @if($izin->status == 'pending')
                                            <span class="px-2.5 py-1 bg-amber-100 text-amber-800 rounded-full text-xs font-bold uppercase tracking-wider">Pending</span>
                                        @elseif($izin->status == 'disetujui')
                                            <span class="px-2.5 py-1 bg-emerald-100 text-emerald-800 rounded-full text-xs font-bold uppercase tracking-wider">Disetujui</span>
                                        @else
                                            <span class="px-2.5 py-1 bg-rose-100 text-rose-800 rounded-full text-xs font-bold uppercase tracking-wider">Ditolak</span>
                                        @endif
                                    </td>
                                    <td class="p-4 text-right">
                                        @if($izin->status == 'pending')
                                        <div class="flex items-center justify-end gap-2">
                                            <form action="{{ route('admin.izin.proses', [$izin->id, 'disetujui']) }}" method="POST">
                                                @csrf @method('PUT')
                                                <button type="submit" class="px-3 py-1.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg text-xs font-bold shadow-sm transition-all flex items-center gap-1">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                                    Terima
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.izin.proses', [$izin->id, 'ditolak']) }}" method="POST">
                                                @csrf @method('PUT')
                                                <button type="submit" class="px-3 py-1.5 bg-rose-600 hover:bg-rose-700 text-white rounded-lg text-xs font-bold shadow-sm transition-all flex items-center gap-1">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12"></path></svg>
                                                    Tolak
                                                </button>
                                            </form>
                                        </div>
                                        @else
                                            <span class="text-xs font-medium text-slate-400 italic">Selesai diproses</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="p-12 text-center text-slate-400">
                                        <svg class="w-12 h-12 text-slate-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                        <p class="font-medium">Belum ada permohonan surat izin yang masuk.</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: @json(session('success')),
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 4000,
                    timerProgressBar: true,
                });
            @endif
        });

        function confirmLogout() {
            Swal.fire({
                title: 'Konfirmasi Keluar',
                text: "Apakah Anda yakin ingin keluar?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#4f46e5',
                confirmButtonText: 'Ya, Keluar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            });
        }
    </script>
</body>
</html>