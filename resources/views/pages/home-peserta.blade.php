@extends('layout.app')

@section('site-title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('isDashboard', 'active')

@section('custom-style-library')
<link rel="stylesheet" href="https://cdn.plyr.io/3.5.6/plyr.css" />
@endsection

@section('main-content')

<div class="row col">
	<div class="card-columns">
	@foreach($materis as $materi)
		<a href="{{ url('view-materi/' . $materi->id_materi) }}">
			<div class="card mb-5">
				<div class="col" style="padding: 0; height: 140px; overflow: hidden;">
					<video id="card-img-top players" style="width: 100%; object-fit: cover;">
						<source src="{{ url('/getVidMateri/' . $materi->id_materi) }}">
					</video>
				</div>
				<!-- <img src="{{ url('/getVidMateri/' . $materi->id_materi) }}" class="card-img-top"> -->
				<div class="card-body">
					<p class="card-text text-primary font-weight-bold">{{ $materi->judul_materi }}</p>
				</div>
			</div>
		</a>
	@endforeach
	</div>
</div>

@endsection

@section('necessary-library')
<script src="https://cdn.plyr.io/3.5.6/plyr.js"></script>
<script>
	$(function() {
		const players = new Plyr.setup('.player', {
			enabled: false,
		})
	})
</script>
@endsection