// Service Worker for Landing Page
const CACHE_NAME = 'landing-page-v1';
const urlsToCache = [
    '/',
    '/build/assets/app.css',
    '/build/assets/landing.css',
    '/build/assets/app.js',
    '/build/assets/landing.js',
    'https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap'
];

self.addEventListener('install', function(event) {
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then(function(cache) {
                return cache.addAll(urlsToCache);
            })
    );
});

self.addEventListener('fetch', function(event) {
    event.respondWith(
        caches.match(event.request)
            .then(function(response) {
                // Return cached version or fetch from network
                return response || fetch(event.request);
            })
    );
});
