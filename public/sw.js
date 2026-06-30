const CACHE_NAME = "absenku-v1";

// Daftar aset yang akan disimpan di memori HP agar loading lebih cepat
const urlsToCache = ["/"];

self.addEventListener("install", function (event) {
    event.waitUntil(
        caches.open(CACHE_NAME).then(function (cache) {
            return cache.addAll(urlsToCache);
        }),
    );
});

self.addEventListener("fetch", function (event) {
    event.respondWith(
        caches.match(event.request).then(function (response) {
            if (response) {
                return response; // Gunakan cache jika ada
            }
            return fetch(event.request); // Jika tidak, ambil dari internet
        }),
    );
});
