<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0, viewport-fit=cover">
    <meta name="theme-color" content="#064e3b"> 
    <title>Kamera Absen - SMK Ampana</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f1f5f9; margin: 0; }
        .app-container { 
            max-width: 480px; 
            margin: 0 auto; 
            min-height: 100dvh; 
            background-color: #f8fafc; 
            display: flex; 
            flex-direction: column; 
            position: relative; 
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            padding-bottom: env(safe-area-inset-bottom);
        }
    </style>
</head>
<body>

    @php
        $absenHariIni = \App\Models\Attendance::where('user_id', auth()->user()->id)
                                              ->where('date', date('Y-m-d'))
                                              ->first();
        
        $isPulang = isset($absenHariIni) && $absenHariIni->time_in != null;
    @endphp

    <div class="app-container">
        <div class="{{ $isPulang ? 'bg-gradient-to-br from-cyan-600 via-blue-500 to-indigo-600' : 'bg-gradient-to-br from-[#064e3b] via-[#059669] to-[#047857]' }} px-6 pt-10 pb-16 rounded-b-[2.5rem] shadow-lg text-center relative z-10 transition-colors">
            <h2 class="text-2xl font-black text-white tracking-wide">
                {{ $isPulang ? 'Absen Pulang' : 'Absen Masuk' }}
            </h2>
            <p class="text-white/80 text-[10px] font-bold mt-1 uppercase tracking-widest">Sistem Geofencing SMK Ampana</p>
        </div>

        <div class="flex-1 flex flex-col items-center px-6 -mt-8 z-20 pb-10 overflow-y-auto">
            
            <div class="w-full bg-white rounded-3xl shadow-xl p-2 border border-slate-100 mb-6 relative mt-4">
                
                <div class="absolute top-0 left-1/2 -translate-x-1/2 -translate-y-1/2 {{ $isPulang ? 'bg-blue-500 text-white' : 'bg-amber-400 text-amber-950' }} px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest shadow-md z-30">
                    Mode: {{ $isPulang ? 'Pulang' : 'Masuk' }}
                </div>

                <div class="bg-slate-900 rounded-2xl overflow-hidden relative shadow-inner mt-2">
                    <div id="my_camera" class="w-full h-72 flex items-center justify-center bg-black"></div>
                    
                    <div class="absolute inset-4 pointer-events-none border-2 border-dashed border-white/30 rounded-full opacity-50"></div>
                    <div class="absolute top-4 right-4 bg-rose-500 w-3 h-3 rounded-full animate-pulse border-2 border-white shadow-sm z-30"></div>
                </div>
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest text-center mt-3 mb-2">Pastikan Wajah & Cahaya Terang</p>
            </div>

            <div class="w-full bg-white p-4 rounded-2xl border border-slate-100 shadow-sm mb-auto flex items-center gap-4">
                <div class="p-3 bg-emerald-50 rounded-xl text-emerald-500 flex-shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                </div>
                <div>
                    <h4 class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-1">Status Lokasi (GPS)</h4>
                    <p id="lokasi-teks" class="text-amber-400 font-mono text-xs font-bold animate-pulse">Mencari sinyal GPS...</p>
                </div>
            </div>

            <div class="w-full mt-8">
                <form method="POST" action="{{ route('absen.store') }}" id="form-absen">
                    @csrf
                    <input type="hidden" name="image" id="image-tag">
                    <input type="hidden" name="latitude" id="lat-tag">
                    <input type="hidden" name="longitude" id="long-tag">

                    <button type="button" onClick="take_snapshot()" id="btn-absen" class="w-full py-4 {{ $isPulang ? 'bg-blue-600 hover:bg-blue-700' : 'bg-[#064e3b] hover:bg-emerald-800' }} text-white text-sm font-black uppercase tracking-widest rounded-2xl shadow-xl transition-all active:scale-95 disabled:opacity-50 disabled:grayscale disabled:cursor-not-allowed" disabled>
                        Tunggu Lokasi...
                    </button>
                </form>
                
                <a href="{{ route('dashboard') }}" class="block w-full py-4 mt-3 text-center bg-white border-2 border-slate-200 text-slate-500 text-sm font-black uppercase tracking-widest rounded-2xl hover:bg-slate-50 transition-all active:scale-95">
                    Batal & Kembali
                </a>
            </div>
            
        </div>
    </div>

    <script>
        Webcam.set({
            width: 320,
            height: 240,
            image_format: 'jpeg',
            jpeg_quality: 90,
            flip_horiz: true
        });
        Webcam.attach('#my_camera');

        // Variabel untuk menyimpan teks tombol asli
        var teksTombolSiap = "{{ $isPulang ? 'AMBIL FOTO & PULANG' : 'AMBIL FOTO & MASUK' }}";

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function(position) {
                    var lat = position.coords.latitude;
                    var lng = position.coords.longitude;
                    
                    document.getElementById('lat-tag').value = lat;
                    document.getElementById('long-tag').value = lng;
                    
                    document.getElementById('lokasi-teks').innerHTML = "Koordinat: " + lat + ", " + lng;
                    document.getElementById('lokasi-teks').classList.remove('text-amber-400', 'animate-pulse');
                    document.getElementById('lokasi-teks').classList.add('text-emerald-500');
                    
                    var btn = document.getElementById('btn-absen');
                    btn.disabled = false;
                    btn.innerHTML = teksTombolSiap; // Menggunakan variabel dinamis
                    btn.classList.add('animate-bounce');
                },
                function(error) {
                    document.getElementById('lokasi-teks').innerHTML = "Akses GPS Ditolak / Gagal!";
                    document.getElementById('lokasi-teks').classList.replace('text-amber-400', 'text-rose-500');
                    alert('Mohon izinkan akses lokasi (GPS) pada browser Anda untuk melakukan absensi.');
                }
            );
        } else {
            document.getElementById('lokasi-teks').innerHTML = "Browser tidak mendukung GPS.";
        }

        function take_snapshot() {
            try {
                if (!Webcam.loaded) {
                    alert("Kamera belum siap, tunggu sebentar.");
                    return;
                }

                Webcam.snap(function(data_uri) {
                    document.getElementById('image-tag').value = data_uri;
                    
                    var btn = document.getElementById('btn-absen');
                    btn.innerHTML = "MEMPROSES... ⏳";
                    btn.disabled = true;
                    btn.classList.remove('animate-bounce');
                    
                    document.getElementById('form-absen').submit();
                });
            } catch (err) {
                alert("Error JavaScript: " + err.message);
            }
        }
    </script>
</body>
</html>