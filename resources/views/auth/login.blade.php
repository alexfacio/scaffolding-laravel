@extends('layouts.master-sp')

@section('title', 'Inicio de Sesión')

@section('body-class', 'login')

@section('styles')
	@parent
@endsection

@section('content')
<div class="card">
    <span class="alert-ajax">
		<div class="alert alert-success alert-dismissible fade in" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true" class="fa fa-times"></span>
			</button>
			<h4 class="alert-heading h4">Bienvenidos!</h4>
			<p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
		</div>
	</span>
    <div class="card-header">
        <img class="logo-img" src="{{ asset('assets/img/logo.png') }}" alt="{{ config('app.name') }}">
        <h5 class="h5">Inicio de sesión</h5>
    </div>
    <form class="card-block form-horizontal login-container" role="form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input id="email" type="email" class="form-control" placeholder="Usuario" name="email" value="{{ old('email') }}" required autofocus>
            </div>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <div class="input-group">
				<span class="input-group-addon"><i class="fa fa-lock"></i></span>
				<input id="password" type="password" class="form-control" placeholder="Contraseña" name="password" required>
			</div>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <div class="checkbox style-inputs">
                <label>
                    <input type="checkbox" name="remember">
                    <span class="lbl padding-8">Recordar mi sesión</span>
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-red">
            LOGIN
        </button>
        <a class="btn btn-link" href="{{ url(config('rules_route.base_sindi').'password/reset') }}">
            Olvidé mi contraseña
        </a>
    </form>
    <form class="card-footer reset-psw">
		<p>Ingresa tu correo electrónico que registraste para enviarte las indicaciones para restablecer tu contraseña.</p>
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-user"></i></span>
			<input type="email" class="form-control" placeholder="Username">
		</div>
		<a href="#" class="btn btn-link back-login">Regresar a inicio de sesíon</a>
	</form>
</div>
@endsection
@section('scripts')
	@parent
	<script src="{{ url('/') }}{{ elixir ('assets/js/login.min.js') }}" charset="utf-8"></script>
@endsection