@extends('layout.app')

@section('site-title', 'Materi')
@section('page-title', 'Detail Materi')
@section('isMateri', 'active')

@section('custom-style-library')
<link rel="stylesheet" href="https://cdn.plyr.io/3.5.6/plyr.css" />
@endsection

@section('main-content')

<div class="row">
	<div class="col-12">
		<div class="card border-left-primary mb-5">
			<div class="card-body">
				<div>
					<a href="{{ route('materi.index') }}" class="row col align-items-center">
						<i class="fa fa-angle-left fa-lg mr-3"></i>
						<h5 class="card-title my-auto text-primary font-weight-bold">{{ $materi->judul_materi }}</h5>
					</a>
				</div>
				<div class="col-10 mx-auto mt-4">
					<video id="player" class="video-max-height" controls>
						<source src="{{ url('/getVidMateri/' . $materi->id_materi) }}">
					</video>
				</div>
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