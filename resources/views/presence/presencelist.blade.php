@extends('layouts.app')

@section('title')
Data Presence 
@endsection

@section('content')
<div class="container">
	<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ asset('/months') }}">Data</a></li>
			<li class="breadcrumb-item active" aria-current="page">Presensi</li>
		</ol>
	</nav>
	<div class="card">
		<h5 class="card-header text-bg-success"> Data Presensi </h5>
		<div class="card-body">
			@if(Session::get('message') != '')
			<div class="alert alert-danger">{{ Session::get('message') }}</div>
			@endif
			<h5 class="card-title">{{$month->month}} {{$month->year}}</h5>
			<div class="table-responsive">
				<table class="table table-striped table-hover ">
					<thead class="thead-dark">
						<tr class="table-primary">
							<th width="30" class="text-center">No</th>
							<th width="180" class="text-center">NIP</th>
							<th class="text-center">Nama</th>
							<th width="60" class="text-center">TK</th>
							<th width="60" class="text-center">PTK</th>
							<th width="60" class="text-center">KUM</th>
							<th width="60" class="text-center">KUT</th>
							<th width="120" class="text-center">Status</th>
							<th width="180" class="text-center">Alasan</th>
							<th width="180" class="text-end">
								<a class="btn btn-primary" href="{{asset('/')}}presence/create/{{ $month->id }}">
									<i class="fas fa-plus"></i></a>
								<a class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#uploadPresence">
									<i class="fa-sharp fa-solid fa-upload"></i></a>
								<a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#removePresence">
									<i class="fas fa-trash"></i></a>
							</th>
						</tr>
					</thead>
					<tbody>
						@php ($no = 1)
						@foreach ($rows as $row)
						<tr>
							<td>{{ $no++ }}.</td>
							<td>{{ $row['nip'] }}</td>
							<td>{{ $row['nama'] }}</td>
							<td class="text-center">{{ $row['tk'] }}</td>
							<td class="text-center">{{ $row['ptk'] }}%</td>
							<td class="text-center">{{ $row['kum'] }}</td>
							<td class="text-center">{{ $row['kut'] }}</td>
							<td class="text-center">{{ $row['status'] }}</td>
							<td>{{ $row['alasan'] }}</td>
							<td class="text-end">
								<a class="btn btn-success" href="{{asset('/')}}presence/show/{{ $month->id }}/{{ $row->id }}"><i class="fas fa-info-circle"></i></i></a>
								<a class="btn btn-secondary" href="{{asset('/')}}presence/{{ $month->id }}/{{ $row->id }}/edit"><i class="far fa-edit"></i></a>
								<a class="btn btn-danger" href="{{asset('/')}}presence/{{ $month->id }}/{{ $row->id }}/delete"><i class="far fa-trash-alt"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="uploadPresence" tabindex="-1" aria-labelledby="uploadPresenceLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="uploadPresenceLabel">Mengunggah File Presensi</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="{{ asset('/presence/import') }}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="mb-3 row">
						<label for="point" class="col-sm-2 col-form-label">File</label>
						<div class="col-sm-12">
							<input class="form-control" type="file" name="file" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="month_id" value="{{ $month->id }}">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
						<button type="Submit" class="btn btn-primary">Unggah</button>
					</div>
				</form>
			</div>

		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="removePresence" tabindex="-1" aria-labelledby="removePresenceLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="removePresenceLabel">Menghapus Data Presensi</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="mb-3 row">
					<div class="col-sm-12">
						PERINGATAN!!!<br>
						SEMUA data presensi pada bulan ini akan DIHAPUS!!!
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="month_id" value="{{ $month->id }}">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
					<a class="btn btn-danger" href="{{asset('/')}}presence/remove/{{ $month->id }}">Hapus</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection