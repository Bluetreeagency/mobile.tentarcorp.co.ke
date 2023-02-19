<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
   <meta name="apple-mobile-web-app-capable" content="yes" />
   <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
   <meta name="theme-color" content="#000000">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <title>@yield('title')</title>
   <meta name="description" content="">
   <meta name="keywords" content="" />

   <link rel="apple-touch-icon" sizes="57x57" href="{!! asset('assets/favicon/apple-icon-57x57.png') !!}">
   <link rel="apple-touch-icon" sizes="60x60" href="{!! asset('assets/favicon/apple-icon-60x60.png') !!}">
   <link rel="apple-touch-icon" sizes="72x72" href="{!! asset('assets/favicon/apple-icon-72x72.png') !!}">
   <link rel="apple-touch-icon" sizes="76x76" href="{!! asset('assets/favicon/apple-icon-76x76.png') !!}">
   <link rel="apple-touch-icon" sizes="114x114" href="{!! asset('assets/favicon/apple-icon-114x114.png') !!}">
   <link rel="apple-touch-icon" sizes="120x120" href="{!! asset('assets/favicon/apple-icon-120x120.png') !!}">
   <link rel="apple-touch-icon" sizes="144x144" href="{!! asset('assets/favicon/apple-icon-144x144.png') !!}">
   <link rel="apple-touch-icon" sizes="152x152" href="{!! asset('assets/favicon/apple-icon-152x152.png') !!}">
   <link rel="apple-touch-icon" sizes="180x180" href="{!! asset('assets/favicon/apple-icon-180x180.png') !!}">
   <link rel="icon" type="image/png" sizes="192x192"  href="{!! asset('assets/favicon/android-icon-192x192.png') !!}">
   <link rel="icon" type="image/png" sizes="32x32" href="{!! asset('assets/favicon/favicon-32x32.png') !!}">
   <link rel="icon" type="image/png" sizes="96x96" href="{!! asset('assets/favicon/favicon-96x96.png') !!}">
   <link rel="icon" type="image/png" sizes="16x16" href="{!! asset('assets/favicon/favicon-16x16.png') !!}">
   <link rel="manifest" href="{!! asset('manifest.json') !!}">
   <meta name="msapplication-TileColor" content="#ffffff">
   <meta name="msapplication-TileImage" content="{!! asset('assets/favicon/ms-icon-144x144.png') !!}">
   <meta name="theme-color" content="#ffffff">

   <link rel="stylesheet" href="{!! asset('assets/css/style.css') !!}">
   <link rel="stylesheet" href="{!! asset('assets/fonts/fontawesome/css/all.min.css') !!}">
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
   <link href="{!! asset('assets/fonts/main/bundled.fonts.css') !!}" rel="stylesheet">
   <link rel="stylesheet" href="{!! asset('assets/js/plugins/intl-tel-input-master/build/css/intlTelInput.css') !!}">
   <script>
      if ("serviceWorker" in navigator) {
         window.addEventListener("load", function() {
         navigator.serviceWorker
            .register("/serviceWorker.js")
            .then(res => console.log("service worker registered"))
            .catch(err => console.log("service worker not registered", err))
         })
      }
   </script>
   <link rel="stylesheet" href="{!! asset('assets/css/custome.css') !!}">
   @yield('stylesheet')
   @livewireStyles
</head>
