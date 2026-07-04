<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="theme-color" content="#064e3b">
    <title>@yield('title', 'Admin Panel E-Presensi')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style> 
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            -webkit-tap-highlight-color: transparent;
        } 
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        .pb-safe { padding-bottom: env(safe-area-inset-bottom, 20px); }
    </style>
    @stack('styles')
</head>
<body class="bg-[#f8fafc] text-slate-800 h-[100dvh] flex overflow-hidden selection:bg-emerald-200">

    @include('components.admin.sidebar')

    <main class="flex-1 flex flex-col h-[100dvh] overflow-hidden relative bg-[#f1f5f9]">
        
        <header class="h-20 bg-white/80 backdrop-blur-xl flex items-center justify-between px-6 md:px-10 z-20 sticky top-0 shadow-[0_4px_30px_rgba(0,0,0,0.03)] border-b border-white">
            <div class="flex items-center gap-4">
                <div class="inline-flex p-1.5 rounded-2xl bg-white/10 backdrop-blur-sm mr-3 border border-white/10">
                    <img src="{{ asset('img/logo2.png') }}" class="w-9 h-9 drop-shadow-lg" alt="Logo">
                </div>
                <div>
                    <h2 class="text-xl md:text-[26px] font-black text-slate-800 tracking-tight leading-none">@yield('page_title', 'Dashboard')</h2>
                    <p class="text-slate-500 text-[11px] md:text-sm font-bold mt-1 tracking-wide">@yield('page_subtitle', 'Selamat Datang')</p>
                </div>
            </div>
            
            <div class="hidden md:flex items-center">
                <span class="px-4 py-2 bg-amber-100/80 text-amber-800 rounded-full text-xs font-bold tracking-widest uppercase shadow-sm border border-amber-200/50">
                    Administrator
                </span>
            </div>
        </header>

        @yield('content')

    </main>

    @include('components.admin.bottom-nav')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmLogout(formId) {
            Swal.fire({
                title: 'Akhiri Sesi?',
                text: "Anda akan keluar dari Panel Administrator",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#022c22',
                confirmButtonText: 'Ya, Keluar',
                cancelButtonText: 'Batal',
                background: '#ffffff', 
                color: '#1e293b',
                customClass: {
                    popup: 'rounded-[2rem] shadow-2xl border-0 pb-4',
                    title: 'text-2xl font-extrabold tracking-tight mt-2',
                    confirmButton: 'rounded-2xl px-6 py-3 font-bold tracking-wide',
                    cancelButton: 'rounded-2xl px-6 py-3 font-bold tracking-wide'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            });
        }
    </script>
    @stack('scripts')
</body>
</html>