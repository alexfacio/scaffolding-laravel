<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="es_MX"> <!--<![endif]-->
	<head>
		@include('admin.includes.head')
		@include('admin.includes.styles')
	</head>
	<body class="@yield('body-class', '')">
		<!--[if lt IE 8]>
			<p class="browserupgrade">Estas usando un navegador <strong>sin actualizar</strong>. Porfavor ebtra a <a href="http://browsehappy.com/">y actualiza tu navegador web</a> para mejorar tu experiencia de navegación en nuestro sitio.</p>
		<![endif]-->
		@include('admin.includes.header')

		@yield('content')

		@include('admin.includes.footer')
		<span class="url_base" data-url="{{ url('/') }}" data-url_sindi="{{ config('rules_route.base_sindi') }}"></span>
		@include('admin.includes.scripts')
	</body>
</html>