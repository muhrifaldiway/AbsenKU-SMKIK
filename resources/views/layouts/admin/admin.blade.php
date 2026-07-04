<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="theme-color" content="#064e3b">
    <title>@yield('title', 'Admin Panel - AbsenKU SMKIK')</title>
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