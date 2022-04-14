@extends('layout.app')

@section('site-title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('isDashboard', 'active')

@section('main-content')

<div class="row">
	<div class="col-12 col-lg-6 mx-auto">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">Selamat datang, {{ Auth::user()->nama }}!</h5>
				<p>This dashboard page is empty.</p>
			</div>
		</div>
	</div>
</div>

@endsection