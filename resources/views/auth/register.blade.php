@extends('layouts.master-sp')

@section('title', 'Registrarte a Sindi')

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
        <h5 class="h5">Regístrate Sindi</h5>
    </div>
    <form class="card-block form-horizontal login-container" role="form" method="POST" action="{{ url('/register') }}">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input id="name" type="text" class="form-control" placeholder="Nombre completo" name="name" value="{{ old('name') }}" required autofocus>
            </div>
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input id="email" type="email" class="form-control" placeholder="Nombre completo" name="email" value="{{ old('email') }}" required>
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
            <div class="input-group">
				<span class="input-group-addon"><i class="fa fa-lock"></i></span>
				<input id="password-confirm" type="password" class="form-control" placeholder="Confirmar contraseña" name="password_confirmation" required>
			</div>
        </div>

        <button type="submit" class="btn btn-red">Registrarse</button>
    </form>
</div>
@endsection

@section('scripts')
	@parent
	<script src="{{ url('/') }}{{ elixir ('assets/js/login.min.js') }}" charset="utf-8"></script>
@endsection