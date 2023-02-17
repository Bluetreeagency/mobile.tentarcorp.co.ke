var staticCacheName = "tentarcorp-v" + new Date().getTime();
var filesToCache = [
   // '/',
   // '/explore',
   '/assets/css/style.css',
   '/assets/css/src/bootstrap/bootstrap.min.css',
   //'/assets/vendor/sidebar/demo.css',
   '/assets/css/custom.css',
   '/assets/fonts/fontawesome/css/all.min.css',
   //'/assets/js/tentarcorp.js',
   '/assets/js/plugins/jquery/jquery-3.2.1.min.js',
];

// Cache on install
self.addEventListener("install", event => {
   this.skipWaiting();
   event.waitUntil(
      caches.open(staticCacheName)
      .then(cache => {
            return cache.addAll(filesToCache);
      })
   )
});

// Clear cache on activate
self.addEventListener('activate', event => {
   event.waitUntil(
      caches.keys().then(cacheNames => {
         return Promise.all(
               cacheNames
                  .filter(cacheName => (cacheName.startsWith("tentarcorp-")))
                  .filter(cacheName => (cacheName !== staticCacheName))
                  .map(cacheName => caches.delete(cacheName))
         );
      })
   );
});

// Serve from Cache
self.addEventListener("fetch", event => {
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                return response || fetch(event.request);
            })
            .catch(() => {
                return caches.match('offline');
            })
    )
});
