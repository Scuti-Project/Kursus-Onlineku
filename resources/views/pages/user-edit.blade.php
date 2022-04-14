@extends('layout.app')

@section('site-title', 'User')
@section('page-title', 'Edit Data User')
@section('isUser', 'active')

@section('main-content')

<div class="row">
	<div class="col-12">
		<div class="card border-left-primary mb-5">
			<div class="card-body">
				<form method="POST" action="{{ route('user.update', $user->user_id) }}">
					@csrf
					@method('PATCH')
					<div class="form-group">
						<label class="control-label">User ID</label>
						<input type="text" name="user_id" class="form-control @error('user_id') is-invalid @enderror" value="{{ $user->user_id }}" required>
					@error('user_id')
						<div class="invalid-feedback">{{ $message }}</div>
					@enderror
					</div>

					<div class="form-group">
						<label class="control-label">Password</label>
						<input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
						<small class="form-text text-muted">
							Kosongkan bila tidak ingin diubah
						</small>
					@error('password')
						<div class="invalid-feedback">{{ $message }}</div>
					@enderror
					</div>

					<div class="form-group">
						<label class="control-label">Nama</label>
						<input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ $user->nama }}" required>
					@error('nama')
						<div class="invalid-feedback">{{ $message }}</div>
					@enderror
					</div>

					<div class="form-group">
						<label class="control-label">Alamat</label>
						<textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat">{{ $user->alamat }}</textarea>
					@error('alamat')
						<div class="invalid-feedback">{{ $message }}</div>
					@enderror
					</div>

					<div class="form-group">
						<label class="control-label">Kota</label>
						<input type="text" name="kota" class="form-control @error('kota') is-invalid @enderror" value="{{ $user->kota }}" required>
					@error('kota')
						<div class="invalid-feedback">{{ $message }}</div>
					@enderror
					</div>

					<div class="form-group">
						<label class="control-label">Tipe User</label>
						<select class="form-control @error('user_type') is-invalid @enderror" name="user_type" required>
						@if($user->user_type == 'admin')
							<option value="peserta">Peserta</option>
							<option value="admin" selected>Admin</option>
						@else
							<option value="peserta" selected>Peserta</option>
							<option value="admin">Admin</option>
						@endif
						</select>
					@error('user_type')
						<div class="invalid-feedback">{{ $message }}</div>
					@enderror
					</div>

					<div class="form-group">
						<button class="btn btn-primary float-right">Simpan</button>
						<a href="{{ route('user.index') }}" data-dismiss="modal" class="btn btn-danger float-right mr-2">Batal</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection