@extends('layouts.app')

@section('title')
Data Months 
@endsection

@section('content')
<div class="container">
	<script>
		function button_cancel() {
		location.replace("{{ asset('/') }}months");
		}
	</script>
	<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
		<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ asset('/months') }}">Data Gaji</a></li>
		<li class="breadcrumb-item active" aria-current="page">Bulan</li>
		</ol>
	</nav>
	<div class="card border-success">
		<h5 class="card-header text-bg-success"> Data Bulan</h5>
		<div class="card-body">
		@if($action == 'insert')
		<form class="form-horizontal" action="{{ asset('/') }}months" method="post">
			<div class="mb-3 row">
			<label for="month" class="col-sm-2 col-form-label"><strong>Bulan</strong></label>
			<div class="col-sm-10">
				@error('month')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
				<select name="month" class="form-control">
				<option value="Januari">Januari</option>
				<option value="Februari">Februari</option>
				<option value="Maret">Maret</option>
				<option value="April">April</option>
				<option value="Mei">Mei</option>
				<option value="Juni">Juni</option>
				<option value="Juli">Juli</option>
				<option value="Agustus">Agustus</option>
				<option value="September">September</option>
				<option value="Oktober">Oktober</option>
				<option value="November">November</option>
				<option value="Desember">Desember</option>
				<option value="THR">THR</option>
				<option value="Ke-13">Ke-13</option>

				</select>
			</div>
			</div>
			<div class="mb-3 row">
			<label for="year" class="col-sm-2 col-form-label"><strong>Tahun</strong></label>
			<div class="col-sm-10">
				@error('year')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
				<input class="form-control" type="number" name="year" value="">
			</div>
			</div>
			<div class="mb-3">
			<div class="offset-sm-2 col-sm-10">
				<input type="hidden" name="action" value="{{ $action }}">
				<button type="submit" class="btn btn-primary">Tambah</button>
				<button type="button" class="btn btn-secondary" onclick="button_cancel()">Kembali</button>
			</div>
			</div>
			{{ csrf_field() }}
		</form>
		@elseif($action == 'update')
		<form class="form-horizontal" action="{{ asset('/') }}months/{{ $row->id }}" method="post">
			<div class="mb-3 row">
			<label for="month" class="col-sm-2 col-form-label"><strong>Bulan</strong></label>
			<div class="col-sm-10">
				@error('month')
				<div class="alert alert-danger">{{ $message }}</div>
				@enderror
				<select name="month" class="form-control">
				<option value="Januari" {{ $row->month === "Januari" ? "selected" : ""}}>Januari</option>
				<option value="Februari" {{ $row->month === "Februari" ? "selected" : ""}}>Februari</option>
				<option value="Maret" {{ $row->month === "Maret" ? "selected" : ""}}>Maret</option>
				<option value="April" {{ $row->month === "April" ? "selected" : ""}}>April</option>
				<option value="Mei" {{ $row->month === "Mei" ? "selected" : ""}}>Mei</option>
				<option value="Juni" {{ $row->month === "Juni" ? "selected" : ""}}>Juni</option>
				<option value="Juli" {{ $row->month === "Juli" ? "selected" : ""}}>Juli</option>
				<option value="Agustus" {{ $row->month === "Agustus" ? "selected" : ""}}>Agustus</option>
				<option value="September" {{ $row->month === "September" ? "selected" : ""}}>September</option>
				<option value="Oktober" {{ $row->month === "Oktober" ? "selected" : ""}}>Oktober</option>
				<option value="November" {{ $row->month === "November" ? "selected" : ""}}>November</option>
				<option value="Desember" {{ $row->month === "Desember" ? "selected" : ""}}>Desember</option>
				<option value="THR" {{ $row->month === "THR" ? "selected" : ""}}>THR</option>
				<option value="Ke-13" {{ $row->month === "Ke-13" ? "selected" : ""}}>Ke-13</option>

				</select>
			</div>
			</div>
			<div class="mb-3 row">
			<label for="year" class="col-sm-2 col-form-label"><strong>Tahun</strong></label>
			<div class="col-sm-10">
				<input class="form-control" type="number" name="year" value="{{ $row->year }}">
			</div>
			</div>
			<!-- <div class="mb-3 row">
			<label for="created_at" class="col-sm-2 col-form-label"><strong>Created_at</strong></label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="created_at" value="{{ $row->created_at }}">
			</div>
			</div> -->
			<!-- <div class="mb-3 row">
			<label for="updated_at" class="col-sm-2 col-form-label"><strong>Updated_at</strong></label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="updated_at" value="{{ $row->updated_at }}">
			</div>
			</div> -->
			<div class="mb-3 row">
			<div class="offset-sm-2 col-sm-10">
				@method("PATCH")
				<input type="hidden" name="action" value="{{ $action }}">
				<input type="hidden" name="id" value="{{ $row->id }}">
				<button type="submit" class="btn btn-warning">Simpan</button>
				<button type="button" class="btn btn-secondary" onclick="button_cancel()">Kembali</button>
			</div>
			</div>
			{{ csrf_field() }}
		</form>
		@elseif($action == 'delete')
		<form class="form-horizontal" action="{{ asset('/') }}months/{{ $row->id }}" method="post">
			<div class="mb-3 row">
			<div class="col-sm-12">
				<div class="alert alert-danger">
				<strong>PERINGATAN!!!</strong>
				Penghapusan ini akan <strong>MENGHAPUS SEMUA DATA</strong> pada bulan ini.
				</div>
			</div>
			</div>
			<div class="mb-3 row">
			<label for="month" class="col-sm-2 control-label"><strong>Bulan</strong></label>
			<div class="col-sm-10">
				{{ $row->month }}
			</div>
			</div>
			<div class="mb-3 row">
			<label for="year" class="col-sm-2 control-label"><strong>Tahun</strong></label>
			<div class="col-sm-10">
				{{ $row->year }}
			</div>
			</div>
			<div class="mb-3 row">
			<div class="offset-sm-2 col-sm-10">
				@method("DELETE")
				<input type="hidden" name="action" value="{{ $action }}">
				<input type="hidden" name="id" value="{{ $row->id }}">
				<button type="submit" class="btn btn-danger">Hapus</button>
				<button type="button" class="btn btn-secondary" onclick="button_cancel()">Kembali</button>
			</div>
			</div>
			{{ csrf_field() }}
		</form>
		@elseif($action == 'detail')
		<div class="mb-3 row">
			<label for="month" class="col-sm-2 control-label"><strong>Bulan</strong></label>
			<div class="col-sm-10">
			{{ $row->month }}
			</div>
		</div>
		<div class="mb-3 row">
			<label for="year" class="col-sm-2 control-label"><strong>Tahun</strong></label>
			<div class="col-sm-10">
			{{ $row->year }}
			</div>
		</div>
		<div class="mb-3 row">
			<div class="offset-sm-2 col-sm-10">
			<button type="button" class="btn btn-secondary" onclick="button_cancel()">Kembali</button>
			</div>
		</div>
		@endif
		</div>
	</div>
</div>
@endsection