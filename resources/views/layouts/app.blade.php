<!doctype html>
<html lang="en">
   @include('partials._head')
   <body>
      <!-- loader -->
      {{-- <div id="">
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
      @auth
      @include('partials._side_nav')
      @endauth
      @auth
         <!-- App Bottom Menu -->
         @include('partials._footer_nav')
         <!-- * App Bottom Menu -->
      @endauth
      @include('partials._javascripts')
   </body>
</html>
