@extends('layouts.master-sp')

@section('title', 'Inicio de Sesión')

@section('body-class', 'login')

@section('styles')
	@parent
@endsection

@section('content')
<div class="card">
	<span class="alert-ajax">
	</span>
	<div class="card-header">
		<img class="logo-img" src="{{ asset('assets/img/logo.png') }}" alt="{{ config('app.name') }}">
	</div>
	<form class="card-block login-container" id="frm_login">
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-user"></i></span>
				<input type="text" name="username" class="form-control validate[required]" data-prompt-position="topLeft" placeholder="Usuario o correo electrónico">
			</div>
		</div>
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-lock"></i></span>
				<input type="password" name="password" class="form-control validate[required]" data-prompt-position="topLeft" placeholder="Contraseña">
			</div>
		</div>
		<button type="submit" class="btn btn-red btn-login">LOGIN</button>
		<a href="#" class="btn btn-link btn-forget">Olvidé mi contraseña</a>
	</form>
	<form class="card-footer reset-psw" id="frm_reset_pass">
		<p>Ingresa tu correo electrónico que registraste para enviarte las indicaciones para restablecer tu contraseña.</p>
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-user"></i></span>
			<input type="email" class="form-control validate[required,custom[email]]" data-prompt-position="topLeft" placeholder="Email">
		</div>
		<a href="#" class="btn btn-link back-login">Regresar a inicio de sesíon</a>
	</form>
</div>
@endsection

@section('scripts')
	@parent
	<script src="{{ url('/') }}{{ elixir ('assets/js/login.min.js') }}" charset="utf-8"></script>
@endsection