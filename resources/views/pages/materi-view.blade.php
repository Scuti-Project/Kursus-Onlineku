@extends('layout.app')

@section('site-title', 'Materi ' . $materi->judul_materi)
@section('isDashboard', 'active')

@section('custom-style-library')
<link rel="stylesheet" href="https://cdn.plyr.io/3.5.6/plyr.css" />
@endsection

@section('main-content')

<div class="row">
	<div class="col-12 col-lg-10 mx-auto">
		<div class="card mb-5">
			<video id="player" class="video-max-height" controls>
				<source src="{{ url('/getVidMateri/' . $materi->id_materi) }}">
			</video>
			<div class="card-body">
				<h5 class="card-text text-primary font-weight-bold">{{ $materi->judul_materi }}</h5>
			</div>
		</div>
	</div>
</div>

@endsection

@section('necessary-library')
<script src="https://cdn.plyr.io/3.5.6/plyr.js"></script>
<script>
	$(function() {
		const player = new Plyr('#player')

		player.on('enterfullscreen', () => {
			$("#player").removeClass('video-max-height')
		})
		player.on('exitfullscreen', () => {
			$("#player").addClass('video-max-height')
		})
	})
</script>
@endsection