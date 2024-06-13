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
						<tr class="align-middle text-center table-primary">
							<th width="30">No</th>
							<!-- <th>Month_id</th> -->
							<th width="180">NIP</th>
							<th width="300">Nama</th>
							<!-- <th>Jabatan</th> -->
							<!-- <th>Vd</th>
							<th>Tkd</th>
							<th>Tl1</th>
							<th>Tl2</th>
							<th>Tl3</th>
							<th>Tl4</th>
							<th>Thm</th>
							<th>Vp</th>
							<th>Ik</th>
							<th>Psw1</th>
							<th>Psw2</th>
							<th>Psw3</th>
							<th>Psw4</th>
							<th>Thp</th>
							<th>I</th>
							<th>Dls</th>
							<th>Ct</th>
							<th>Clt</th>
							<th>Cpp</th>
							<th>Ctl</th>
							<th>Tb</th>
							<th>Ld</th>
							<th>Ib</th>
							<th>Tmk</th>
							<th>Cs1</th>
							<th>Cs14</th>
							<th>Cm1</th>
							<th>Cm2</th>
							<th>Cm3</th>
							<th>Cm41</th>
							<th>Cm42</th>
							<th>Cm43</th>
							<th>Cap1</th>
							<th>Cap10</th>
							<th>Cb1</th>
							<th>Cb2</th>
							<th>Cb3</th> -->
							<th width="60">TK</th>
							<th width="60">PTK</th>
							<th width="60">KUM</th>
							<th width="60">KUT</th>
							<th width="120">Status</th>
							<th>Alasan</th>
							<!-- <th>Created_at</th>
							<th>Updated_at</th> -->
							<th class="text-end" width="150">
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
							<!-- <td>{{ $row['month_id'] }}</td> -->
							<td>{{ $row['nip'] }}</td>
							<td>{{ $row['nama'] }}</td>
							<!-- <td>{{ $row['jabatan'] }}</td> -->
							<!-- <td>{{ $row['vd'] }}</td>
							<td>{{ $row['tkd'] }}</td>
							<td>{{ $row['tl1'] }}</td>
							<td>{{ $row['tl2'] }}</td>
							<td>{{ $row['tl3'] }}</td>
							<td>{{ $row['tl4'] }}</td>
							<td>{{ $row['thm'] }}</td>
							<td>{{ $row['vp'] }}</td>
							<td>{{ $row['ik'] }}</td>
							<td>{{ $row['psw1'] }}</td>
							<td>{{ $row['psw2'] }}</td>
							<td>{{ $row['psw3'] }}</td>
							<td>{{ $row['psw4'] }}</td>
							<td>{{ $row['thp'] }}</td>
							<td>{{ $row['i'] }}</td>
							<td>{{ $row['dls'] }}</td>
							<td>{{ $row['ct'] }}</td>
							<td>{{ $row['clt'] }}</td>
							<td>{{ $row['cpp'] }}</td>
							<td>{{ $row['ctl'] }}</td>
							<td>{{ $row['tb'] }}</td>
							<td>{{ $row['ld'] }}</td>
							<td>{{ $row['ib'] }}</td>
							<td>{{ $row['tmk'] }}</td>
							<td>{{ $row['cs1'] }}</td>
							<td>{{ $row['cs14'] }}</td>
							<td>{{ $row['cm1'] }}</td>
							<td>{{ $row['cm2'] }}</td>
							<td>{{ $row['cm3'] }}</td>
							<td>{{ $row['cm41'] }}</td>
							<td>{{ $row['cm42'] }}</td>
							<td>{{ $row['cm43'] }}</td>
							<td>{{ $row['cap1'] }}</td>
							<td>{{ $row['cap10'] }}</td>
							<td>{{ $row['cb1'] }}</td>
							<td>{{ $row['cb2'] }}</td>
							<td>{{ $row['cb3'] }}</td> -->
							<td class="text-center">{{ $row['tk'] }}</td>
							<td class="text-center">{{ $row['ptk'] }}%</td>
							<td class="text-center">{{ $row['kum'] }}</td>
							<td class="text-center">{{ $row['kut'] }}</td>
							<td class="text-center">{{ $row['status'] }}</td>
							<td>{{ $row['alasan'] }}</td>
							<!-- <td>{{ $row['created_at'] }}</td>
							<td>{{ $row['updated_at'] }}</td> -->
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
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="Submit" class="btn btn-primary">Upload</button>
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
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<a class="btn btn-danger" href="{{asset('/')}}presence/remove/{{ $month->id }}">Delete</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection