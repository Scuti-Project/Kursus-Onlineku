@extends('layout.app')

@section('site-title', 'User')
@section('page-title', 'Kelola User')
@section('isUser', 'active')

@section('custom-style-library')
	<link href="{{ asset('vendor/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('main-content')

<div class="row">
	<div class="col-12">
		@if($errors->has('user_id') || $errors->has('password') || $errors->has('nama') || $errors->has('kota') || $errors->has('tipe_user'))
		    <div class="alert alert-danger fade show mb-5">
		        Gagal menambahkan user, silakan periksa kembali.
		        <button class="close" data-dismiss="alert">&times;</button>
		    </div>
		@elseif(session()->get('success'))
		    <div class="alert alert-success fade show mb-5">
		        {{ session()->get('success') }}
		        <button class="close" data-dismiss="alert">&times;</button>
		    </div>
		@elseif(session()->get('failed'))
		    <div class="alert alert-danger fade show mb-5">
		        {{ session()->get('failed') }}
		        <button class="close" data-dismiss="alert">&times;</button>
		    </div>
		@endif
		<div class="card border-left-primary mb-5">
			<div class="card-body">
				<div class="row col justify-content-between mb-3">
					<h5 class="card-title text-primary font-weight-bold my-auto">Daftar User</h5>
					<button class="btn btn-outline-primary" data-toggle="modal" data-target="#add-user-modal">Tambah User</button>
				</div>
				<div class="table-responsive">
					<table class="table table-striped table-hover datatables">
						<thead>
							<tr>
								<th>No.</th>
								<th>User ID</th>
								<th>Nama</th>
								<th>Alamat</th>
								<th>Kota</th>
								<th style="min-width: 100px">Tipe User</th>
								<th>Opsi</th>
							</tr>
						</thead>
						<tbody>
						@php $no = 1 @endphp
						@foreach($users as $user)
							<tr>
								<td>{{ $no }}.</td>
								<td>{{ $user->user_id }}</td>
								<td>{{ $user->nama }}</td>
								<td>{{ $user->alamat }}</td>
								<td>{{ $user->kota }}</td>
								<td>{{ ucwords($user->user_type) }}</td>
								<td class="d-flex align-items-center justify-content-center">
									<a href="{{ route('user.edit', $user->user_id) }}"><i class="fas fa-edit" title="Edit" data-toggle="tooltip"></i></a>
									<form method="POST" action="{{ route('user.destroy', $user->user_id) }}" onsubmit="return confirm('Anda yakin?')">
										@csrf
										@method('DELETE')

										<button class="btn"><i class="fas fa-trash text-danger" title="Delete" data-toggle="tooltip"></i></button>
									</form>
								</td>
							</tr>
							@php $no++ @endphp
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('modal-content')

<div class="modal fade" id="add-user-modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah User</h5>
			</div>
			<div class="modal-body">
				<form method="POST" action="{{ route('user.store') }}">
					@csrf
					<div class="form-group">
						<label class="control-label">User ID</label>
						<input type="text" name="user_id" class="form-control" required>
					</div>
					<div class="form-group">
						<label class="control-label">Password</label>
						<input type="password" name="password" class="form-control" required>
					</div>
					<div class="form-group">
						<label class="control-label">Nama</label>
						<input type="text" name="nama" class="form-control" required>
					</div>
					<div class="form-group">
						<label class="control-label">Alamat</label>
						<textarea class="form-control" name="alamat"></textarea>
					</div>
					<div class="form-group">
						<label class="control-label">Kota</label>
						<input type="text" name="kota" class="form-control" required>
					</div>
					<div class="form-group">
						<label class="control-label">Tipe User</label>
						<select class="form-control" name="user_type" required>
							<option selected disabled>--- Pilih Tipe User ---</option>
							<option value="peserta">Peserta</option>
							<option value="admin">Admin</option>
						</select>
					</div>
					<div class="form-group">
						<button class="btn btn-primary float-right">Simpan</button>
						<a href="javascript:void(0)" data-dismiss="modal" class="btn btn-danger float-right mr-2">Batal</a>
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