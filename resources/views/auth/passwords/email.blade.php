@extends('layouts.master-sp')

@section('title', 'Olvidé mi contraseña')

@section('body-class', 'login')

@section('styles')
	@parent
@endsection

<!-- Main Content -->
@section('content')
<div class="card">
    <span class="alert-ajax">
		<div class="alert alert-success alert-dismissible fade in" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true" class="fa fa-times"></span>
			</button>
			<h4 class="alert-heading h4"><i class="fa fa-send"></i> Mensaje enviado</h4>
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
        <h4 class="h5">Olvidé mi contraseña</h5>
    </div>
    <form class="card-block form-horizontal login-container" role="form" method="POST" action="{{ url('/password/email') }}">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input id="email" type="email" class="form-control" placeholder="Usuario" name="email" value="{{ old('email') }}" required>
                </div>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <button type="submit" class="btn btn-red">Enviar email</button>
    </form>
</div>
@endsection
@section('scripts')
	@parent
	<script src="{{ url('/') }}{{ elixir ('assets/js/login.min.js') }}" charset="utf-8"></script>
@endsection