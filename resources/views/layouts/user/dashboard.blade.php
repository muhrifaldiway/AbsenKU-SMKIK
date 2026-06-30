<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="theme-color" content="#064e3b"> 
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <link rel="icon" href="{{ asset('img/logo2.png') }}" type="image/png">
    
    <x-page-title title="Dashboard" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f1f5f9; }
        .app-container {
            max-width: 480px; 
            margin: 0 auto;
            min-height: 100dvh;
            background-color: #f8fafc;
            position: relative;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body>
    <div class="app-container">
        
        @include('components.user.header')
        <div class="flex-1 overflow-y-auto hide-scrollbar p-4">
            @yield('content')
        </div>
        @include('components.user.bottom-nav')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Script untuk Jam Digital Real-Time
        function updateClock() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            document.getElementById('live-clock').textContent = `${hours}:${minutes}:${seconds}`;
        }
        setInterval(updateClock, 1000);
        updateClock(); // Panggil sekali agar tidak delay 1 detik di awal

        function confirmLogout() {
            Swal.fire({
                title: 'Keluar Aplikasi?',
                text: "Sesi Anda akan diakhiri.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444', 
                cancelButtonColor: '#059669',
                confirmButtonText: 'Ya, Keluar',
                cancelButtonText: 'Batal',
                customClass: {
                    popup: 'rounded-3xl',
                    confirmButton: 'rounded-xl font-bold px-6',
                    cancelButton: 'rounded-xl font-bold px-6'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            });
        }
    </script>
</body>
</html>