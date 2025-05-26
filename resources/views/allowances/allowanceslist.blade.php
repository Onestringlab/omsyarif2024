@extends('layouts.app')

@section('title')
Data Gaji
@endsection

@section('content')
<div class="container">
	<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ asset('/months') }}">Data</a></li>
			<li class="breadcrumb-item active" aria-current="page">Gaji</li>
		</ol>
	</nav>
	<div class="card">
		<h5 class="card-header text-bg-success"> Data Gaji</h5>
		<div class="card-body">
			@if(Session::get('message') != '')
			<div class="alert alert-danger">{{ Session::get('message') }}</div>
			@endif
			<h5 class="card-title">{{$month->month}} {{$month->year}}</h5>
			<div class="table-responsive">
				<table class="table table-striped table-hover ">
					<thead class="thead-dark">
						<tr class="align-middle text-center">
							<th>No</th>
							<th>NIP</th>
							<th>Nama</th>
							<th width="100">Pokok</th>
							<th width="100">Kotor</th>
							<th width="100">Potongan</th>
							<th width="100">Gaji Bersih</th>
							<th class="text-center" width="200">
								<a class=" btn btn-primary" href="{{asset('/')}}allowances/create/{{ $month->id }}">
									<i class="fas fa-plus"></i></a>
								<a class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#uploadAllowances">
									<i class="fa-sharp fa-solid fa-upload"></i></a>
								<a class="btn btn-warning" href="{{asset('/')}}allowances/pdf/{{ $month->id }}" target="_blank">
									<i class="fa-regular fa-file-pdf"></i></a>
								<a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#removeAllowances">
									<i class="fas fa-trash"></i></a>
							</th>
						</tr>
					</thead>
					<tbody>
						@php ($no = 1)
						@foreach ($rows as $row)
						@php ($encryptedParams = encrypt(['id' => $row->id, 'nip' => $row->nip]))
						<tr class="align-middle">
							<td>{{ $no++ }}.</td>
							<td>{{ $row->nip }}</td>
							<td>{{ $row->nmpeg }}</td>
							<td class="text-end">{{ toCurrency($row['gjpokok']) }}</td>
							<td class="text-end">{{ toCurrency($row['kotor']) }}</td>
							<td class="text-end">{{ toCurrency($row['totpot']) }}</td>
							<td class="text-end">{{ toCurrency($row['bersih']) }}</td>
							<td class=" text-center">
								<a class="btn btn-success" href="{{asset('/')}}allowances/show/{{ $month->id }}/{{ $row->id }}"><i class="fas fa-info-circle"></i></a>
								<a class="btn btn-secondary" href="{{asset('/')}}allowances/{{ $month->id }}/{{ $row->id }}/edit"><i class="far fa-edit"></i></a>
								<input type="hidden" class="form-control shareLink" value=" {{asset('/')}}bersihpdfshare/{{ $encryptedParams }}" readonly>
								<button class="btn btn-warning" onclick="copyToClipboard(this, '{{ $row->salam }}')"><i class="fa-solid fa-link"></i></button>
								<a class="btn btn-danger" href="{{asset('/')}}allowances/{{ $month->id }}/{{ $row->id }}/delete"><i class="far fa-trash-alt"></i></a>
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
<div class="modal fade" id="uploadAllowances" tabindex="-1" aria-labelledby="uploadAllowancesLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="uploadAllowancesLabel">Mengunggah File Gaji</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="{{ asset('/allowances/import') }}" method="post" enctype="multipart/form-data">
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
<div class="modal fade" id="removeAllowances" tabindex="-1" aria-labelledby="removeAllowancesLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="removeSalariesLabel">Menghapus Data Gaji</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="mb-3 row">
					<div class="col-sm-12">
						PERINGATAN!!!<br>
						SEMUA data gaji pada bulan ini akan DIHAPUS!!!
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="month_id" value="{{ $month->id }}">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
					<a class="btn btn-danger" href="{{asset('/')}}allowances/remove/{{ $month->id }}">Hapus</a>
				</div>
			</div>

		</div>
	</div>
</div>
@endsection