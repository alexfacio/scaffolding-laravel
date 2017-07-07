@extends('layouts.master-admin')

@section('title', 'Administración')

@section('styles')
	@parent
@endsection

@section('body-class', '')

@section('current-setcorp', 'hide')

@section('breadcums-header')
	<span class="item navbar-text float-xs-left">Administración</span>
@endsection

@section('breadcrumb')
	<li class="item breadcrumb-item active">Administración</li>
@endsection

@section('content')
<?/*@include('admin.partials_section.content-corps')*/ ?>
@endsection

@section('modales')
	<?/*@include('admin.partials_section.modal-addedit')*/ ?>
@endsection

@section('scripts')
	@parent
	<script type="text/javascript" src="{{ url('/') }}{{ elixir ('assets/js/admin-section.min.js') }}" charset="utf-8"></script>
@endsection
