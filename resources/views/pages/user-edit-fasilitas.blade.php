@extends('layout.app')

@section('site-title', 'Fasilitas')
@section('page-title', 'Edit Fasilitas Kepesertaan User')
@section('isFasilitas', 'active')

@section('custom-style-library')
	<link href="{{ asset('vendor/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('main-content')

<div class="row">
	<div class="col-12">
		<div class="card border-left-primary mb-5">
			<div class="card-body">
				<h5 class="card-title text-primary font-weight-bold">Fasilitas {{ $user->nama }}</h5>
			@error('id_materi')
				<div class="alert alert-danger fade show">
					{{ $message }}
					<button class="close" data-dismiss="alert">&times;</button>
				</div>
			@enderror
				<form action="{{ route('fasilitas.store', $user->user_id) }}" method="POST">
					@csrf
					<div class="table-responsive">
						<table class="table table-striped table-hover datatables">
							<thead>
								<tr>
									<th>No.</th>
									<th>Judul Materi</th>
									<th class="text-center">Pilih</th>
								</tr>
							</thead>
							<tbody>
							@php $no = 1 @endphp
							@foreach($fasilitas as $materi)
								<tr>
									<td>{{ $no++ }}.</td>
									<td>{{ $materi->judul_materi }}</td>
									<td class="text-center">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" name="id_materi[]" value="{{ $materi->id_materi }}" id="customCheck-{{ $materi->id_materi }}" checked>
											<label class="custom-control-label" for="customCheck-{{ $materi->id_materi }}"></label>
										</div>
									</td>
								</tr>
							@endforeach
							@foreach($unselected_materis as $materi)
								<tr>
									<td>{{ $no++ }}.</td>
									<td>{{ $materi->judul_materi }}</td>
									<td class="text-center">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" name="id_materi[]" value="{{ $materi->id_materi }}" id="customCheck-{{ $materi->id_materi }}">
											<label class="custom-control-label" for="customCheck-{{ $materi->id_materi }}"></label>
										</div>
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>
					</div>
					<div class="form-group mt-3">
						<input type="hidden" name="user_id" value="{{ $user->user_id }}">
						<button class="btn btn-primary">Simpan</button>
						<a href="{{ route('fasilitas.index') }}" data-dismiss="modal" class="btn btn-danger ml-1">Batal</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection

@section('necessary-library')
<script src="{{ asset('vendor/datatables/datatables.min.js') }}"></script>
@endsection