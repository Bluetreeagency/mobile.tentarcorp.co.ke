<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
   <meta name="apple-mobile-web-app-capable" content="yes" />
   <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
   <meta name="theme-color" content="#000000">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <title>@yield('title')</title>
   <meta name="description" content="">
   <meta name="keywords" content="bootstrap, wallet, banking, fintech mobile template, cordova, phonegap, mobile, html, responsive" />
   <link rel="stylesheet" href="{!! asset('assets/css/style.css') !!}">
   <link rel="stylesheet" href="{!! asset('assets/fonts/fontawesome/css/all.min.css') !!}">
   <link rel="stylesheet" href="{!! asset('assets/css/custome.css') !!}">
   <link rel="manifest" href="{!! asset('manifest.json') !!}">
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
   <link href="{!! asset('assets/fonts/main/bundled.fonts.css') !!}" rel="stylesheet">
   @yield('stylesheet')
</head>
