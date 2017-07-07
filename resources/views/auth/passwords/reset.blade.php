@extends('layouts.master-sp')

@section('title', 'Restablecer contraseña')

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
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="card-header">
        <img class="logo-img" src="{{ asset('assets/img/logo.png') }}" alt="{{ config('app.name') }}">
        <h5 class="h5">Restablecer contraseña</h5>
    </div>
    <form class="card-block form-horizontal login-container" role="form" method="POST" action="{{ url('/password/reset') }}">
        {{ csrf_field() }}
        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input id="email" type="email" class="form-control" placeholder="Usuario" name="email" value="{{ $email or old('email') }}" required autofocus>
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
                <input id="password" type="password" class="form-control" placeholder="Contraseña" name="email" value="{{ old('email') }}" required>
            </div>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input id="password" type="password" class="form-control" placeholder="Confirmar contraseña" name="password_confirmation" required>
            </div>
            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
        </div>

        <button type="submit" class="btn btn-red">
            Restablecer contraseña
        </button>
    </form>
</div>
@endsection
@section('scripts')
	@parent
	<script src="{{ url('/') }}{{ elixir ('assets/js/login.min.js') }}" charset="utf-8"></script>
@endsection