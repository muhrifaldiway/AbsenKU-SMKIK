<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="theme-color" content="#064e3b"> 
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <link rel="icon" href="{{ asset('img/logo2.png') }}" type="image/png">
    
    {{-- Dynamic Title --}}
    <x-page-title title="Profil" />
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f1f5f9; }
        .app-container { 
            max-width: 480px; 
            margin: 0 auto; 
            min-height: 100dvh; 
            background-color: #f8fafc; 
            display: flex; 
            flex-direction: column; 
            overflow: hidden; 
            position: relative; 
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
    @stack('styles')
</head>
<body>
    <div class="app-container">
        
        {{-- Area Konten Utama --}}
        @yield('content')
        
        {{-- Bottom Navigation yang muncul di semua halaman user --}}
        @include('components.user.bottom-nav')

    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('scripts')
</body>
</html>