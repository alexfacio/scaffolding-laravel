<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta charset="utf-8">
<meta name="theme-color" content="#d9dadb">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
<meta name="viewport" content="initial-scale=1, maximum-scale=1.0, user-scalable=no, minimal-ui, shrink-to-fit=no">
<!-- CONFIGURATION -->
<!-- Allow web app to be run in full-screen mode. -->
<meta name="apple-mobile-web-app-capable" content="yes">
<!-- Allow web app to be run in full-screen mode. Android-->
<meta name="mobile-web-app-capable" content="yes">
<!-- Make the app title different than the page title. -->
<meta name="apple-mobile-web-app-title" content="{{ config('app.name') }}">
<!-- Configure the status bar. -->
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<!-- Disable automatic phone number detection.
<meta name="format-detection" content="telephone=no">-->
<!-- ICONS -->
<!-- Android -->
<link rel="icon" sizes="192x192" href="{{ asset ('assets/img/icon-app/FG_icono192.png') }}">
<link rel="icon" sizes="128x128" href="{{ asset ('assets/img/icon-app/FG_icono128.png') }}">
<!-- IPhone Icon  -->
<link href="{{ asset ('assets/img/icon-app/FG_icono57.png') }}" rel="apple-touch-icon" />
<!-- IPad Icon  -->
<link href="{{ asset ('assets/img/icon-app/FG_icono76.png') }}" rel="apple-touch-icon" sizes="76x76" />
<!-- IPhone Retinal Icon -->
<link href="{{ asset ('assets/img/icon-app/FG_icono128.png') }}" rel="apple-touch-icon" sizes="120x120" />
<!-- IPad Retinal Icon -->
<link href="{{ asset ('assets/img/icon-app/FG_icono152.png') }}" rel="apple-touch-icon" sizes="152x152" />
<!-- IPhone 6 Plus Icon  -->
<link href="{{ asset ('assets/img/icon-app/FG_icono192.png') }}" rel="apple-touch-icon" sizes="180x180" />
<!-- iPhone -->
<link href="{{ asset ('assets/img/icon-app/startupimage320x460.png') }}" media="(device-width: 320px) and (device-height: 480px) and (-webkit-device-pixel-ratio: 1)" rel="apple-touch-startup-image">
<!-- iPhone (Retina) -->
<link href="{{ asset ('assets/img/icon-app/startupimage640x920.png') }}" media="(device-width: 320px) and (device-height: 480px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
<!-- iPhone 5 -->
<link href="{{ asset ('assets/img/icon-app/startupimage640x1096.png') }}" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
<!-- iPad (portrait) -->
<link href="{{ asset ('assets/img/icon-app/startupimage768x1004.png') }}" media="(device-width: 768px) and (device-height: 1024px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 1)" rel="apple-touch-startup-image">
<!-- iPad (landscape) -->
<link href="{{ asset ('assets/img/icon-app/startupimage748x1024.png') }}" media="(device-width: 768px) and (device-height: 1024px) and (orientation: landscape) and (-webkit-device-pixel-ratio: 1)" rel="apple-touch-startup-image">
<!-- iPad (Retina, portrait) -->
<link href="{{ asset ('assets/img/icon-app/startupimage_1536x2008.png') }}" media="(device-width: 768px) and (device-height: 1024px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
<!-- iPad (Retina, landscape) -->
<link href="{{ asset ('assets/img/icon-app/startupimage1496x2048.png') }}" media="(device-width: 768px) and (device-height: 1024px) and (orientation: landscape) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">

<title>{{ config('app.name') }} - @yield('title', '')</title>
<!--[if lt IE 9]>
    <script src="{{ url('/') }}{{ asset ('assets/js/html5shiv/dist/html5shiv.min.js') }}"></script>
<![endif]-->