<!doctype html>
<html lang="en">
   @include('partials._head')
   <body>
      <!-- loader -->
      {{-- <div id="loader">
         <img src="assets/img/loading-icon.png" alt="icon" class="loading-icon">
      </div> --}}
      <!-- * loader -->

      <!-- App Header -->
      @yield('header')
      <!-- * App Header -->

      <!-- App Capsule -->
      <div id="appCapsule" class="full-height">
         @yield('content')
      </div>
      <!-- * App Capsule -->

      <!-- App Bottom Menu -->
      @include('partials._footer_nav')
      <!-- * App Bottom Menu -->
      @include('partials._javascripts')
   </body>
</html>
