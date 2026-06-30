<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <meta name="theme-color" content="#064e3b">
    {{-- <link rel="apple-touch-icon" href="{{ asset('icons/icon-192x192.png') }}"> --}}
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="AbsenKU">
    
    <x-page-title title="Selamat Datang Di" />
    <link rel="icon" href="{{ asset('img/logo2.png') }}" type="image/png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Inter', sans-serif; 
            background-color: #f1f5f9; /* Abu-abu netral untuk layar desktop */
        }
        .app-container {
            max-width: 480px; 
            margin: 0 auto;
            min-height: 100dvh;
            /* Menggunakan gradasi Hijau Tua (Logo) yang menenangkan mata */
            background: linear-gradient(135deg, #064e3b 0%, #059669 100%);
            position: relative;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }
    </style>
</head>
<body>
    <div class="app-container text-white">
        <div class="absolute -top-32 -right-32 w-80 h-80 bg-amber-300 opacity-20 rounded-full blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-32 -left-32 w-96 h-96 bg-emerald-300 opacity-20 rounded-full blur-3xl pointer-events-none"></div>

        <div class="flex-1 flex flex-col items-center justify-center p-8 z-10 relative">
            
            <div class="w-36 h-36 bg-white rounded-full shadow-2xl flex items-center justify-center mb-8 relative p-1">
                <div class="absolute inset-0 rounded-full bg-white animate-ping opacity-20" style="animation-duration: 3s;"></div>
                
                <img
                    src="{{ asset('img/logo3.png') }}"
                    alt="Logo SMK Informatika"
                    style="width: 200px; height: 150px; max-width: none;"
                    class="object-contain relative z-10"
                >
            </div>
            
            <h1 class="text-4xl font-black tracking-tight mb-2 text-center drop-shadow-md text-white leading-tight">
                Absen <span class="text-amber-400">KU</span> <br>
                <span class="text-amber-400">SMK <span class="text-white">IK</span></span><br>
                <!-- <span>Ampana Kota</span> -->
            </h1>
            
            <p class="text-emerald-100 font-medium text-center text-sm px-4 leading-relaxed mt-3">
                Sistem Presensi Cerdas <br>
                SMK Informatika Komputer Ampana Kota
            </p>
        </div>

        <div class="p-8 z-10 w-full mb-4">
            @auth
                <a href="{{ url('/dashboard') }}" class="w-full flex items-center justify-center gap-3 bg-amber-500 text-amber-950 py-4 rounded-2xl font-bold text-lg shadow-[0_8px_30px_rgb(245,158,11,0.3)] hover:bg-amber-400 active:scale-95 transition-all">
                    Buka Aplikasi
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path></svg>
                </a>
            @else
                <a href="{{ route('login') }}" class="w-full flex items-center justify-center gap-3 bg-amber-500 text-amber-950 py-4 rounded-2xl font-bold text-lg shadow-[0_8px_30px_rgb(245,158,11,0.3)] hover:bg-amber-400 active:scale-95 transition-all">
                    Mulai Login
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                </a>
            @endauth
            
            <div class="text-center mt-6">
                <p class="text-emerald-200/60 text-xs font-semibold tracking-widest uppercase">Versi 1.0.0</p>
            </div>
        </div>
    </div>

    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js')
                    .then(registration => {
                        console.log('PWA ServiceWorker berhasil didaftarkan');
                    })
                    .catch(err => {
                        console.log('PWA ServiceWorker gagal didaftarkan: ', err);
                    });
            });
        }
    </script>
</body>
</html>