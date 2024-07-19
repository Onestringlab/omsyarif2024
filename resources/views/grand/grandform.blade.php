@extends('layouts.app')

@section('title')
Data Grand 
@endsection

@section('content')
<div class="container">
	<script>
		function button_cancel() {
		location.replace("{{ asset('/') }}grand/data/{{ $month_id }}");
		}
	</script>
	<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
		<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="{{ asset('/months') }}">Data</a></li>
		<li class="breadcrumb-item"><a href="{{asset('/')}}grand/data/{{ $month_id }}">Tunjangan Kinerja</a></li>
		<li class="breadcrumb-item active" aria-current="page">{{ ucfirst($action) }}</li>
		</ol>
	</nav>
	<div class="card">
		<h5 class="card-header text-bg-success"> Data Tunjangan Kinerja</h5>
		<div class="card-body">
		@if($action == 'insert')
		<form class="form-horizontal" action="{{ asset('/') }}grand" method="post">
			<div class="mb-3 row">
			<label for="nip" class="col-sm-2 col-form-label"><strong>Nip</strong></label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="nip" value="" required>
			</div>
			</div>
			<div class="mb-3 row">
			<label for="nama" class="col-sm-2 col-form-label"><strong>Nama</strong></label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="nama" value="" required>
			</div>
			</div>
			<div class="mb-3 row">
			<label for="npwp" class="col-sm-2 col-form-label"><strong>Npwp</strong></label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="npwp" value="">
			</div>
			</div>
			<div class="mb-3 row">
			<label for="panggol" class="col-sm-2 col-form-label"><strong>Panggol</strong></label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="panggol" value="">
			</div>
			</div>
			<div class="mb-3 row">
			<label for="jabatan" class="col-sm-2 col-form-label"><strong>Jabatan</strong></label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="jabatan" value="">
			</div>
			</div>
			<div class="mb-3 row">
			<label for="grad" class="col-sm-2 col-form-label"><strong>Grad</strong></label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="grad" value="">
			</div>
			</div>
			<div class="mb-3 row">
			<label for="maxmedmin" class="col-sm-2 col-form-label"><strong>Maxmedmin</strong></label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="maxmedmin" value="">
			</div>
			</div>
			<div class="mb-3 row">
			<label for="tunjangan" class="col-sm-2 col-form-label"><strong>Tunjangan</strong></label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="tunjangan" value="">
			</div>
			</div>
			<div class="mb-3 row">
			<label for="potabs" class="col-sm-2 col-form-label"><strong>Potabs</strong></label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="potabs" value="">
			</div>
			</div>
			<div class="mb-3 row">
			<label for="potkim" class="col-sm-2 col-form-label"><strong>Potkim</strong></label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="potkim" value="">
			</div>
			</div>
			<div class="mb-3 row">
			<label for="jumlahpot" class="col-sm-2 col-form-label"><strong>Jumlahpot</strong></label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="jumlahpot" value="">
			</div>
			</div>
			<div class="mb-3 row">
			<label for="jumtunjsetpot" class="col-sm-2 col-form-label"><strong>Jumtunjsetpot</strong></label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="jumtunjsetpot" value="">
			</div>
			</div>
			<div class="mb-3 row">
			<label for="tunjpph" class="col-sm-2 col-form-label"><strong>Tunjpph</strong></label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="tunjpph" value="">
			</div>
			</div>
			<div class="mb-3 row">
			<label for="bruto" class="col-sm-2 col-form-label"><strong>Bruto</strong></label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="bruto" value="">
			</div>
			</div>
			<div class="mb-3 row">
			<label for="potpph" class="col-sm-2 col-form-label"><strong>Potpph</strong></label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="potpph" value="">
			</div>
			</div>
			<div class="mb-3 row">
			<label for="netto" class="col-sm-2 col-form-label"><strong>Netto</strong></label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="netto" value="">
			</div>
			</div>
			<div class="mb-3 row">
			<label for="status" class="col-sm-2 col-form-label"><strong>Status</strong></label>
			<div class="col-sm-10">
				<select class="form-control" type="text" name="status">
				<option value="Setuju">Setuju</option>
				<option value="Tidak Setuju">Tidak Setuju</option>
				</select>
			</div>
			</div>
			<div class="mb-3 row">
			<label for="alasan" class="col-sm-2 col-form-label"><strong>Alasan</strong></label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="alasan" value="">
			</div>
			</div>
			<div class="mb-3">
			<div class="offset-sm-2 col-sm-10">
				<input type="hidden" name="action" value="{{ $action }}">
				<input type="hidden" name="month_id" value="{{ $month_id }}">
				<button type="submit" class="btn btn-primary">Tambah</button>
				<button type="button" class="btn btn-secondary" onclick="button_cancel()">Kembali</button>
			</div>
			</div>
			{{ csrf_field() }}
		</form>
		@elseif($action == 'update')
		<form class="form-horizontal" action="{{ asset('/') }}grand/{{ $row->id }}" method="post">
			<div class="mb-3 row">
			<label for="nip" class="col-sm-2 col-form-label"><strong>Nip</strong></label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="nip" value="{{ $row->nip }}" required>
			</div>
			</div>
			<div class="mb-3 row">
			<label for="nama" class="col-sm-2 col-form-label"><strong>Nama</strong></label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="nama" value="{{ $row->nama }}" required>
			</div>
			</div>
			<div class="mb-3 row">
			<label for="npwp" class="col-sm-2 col-form-label"><strong>Npwp</strong></label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="npwp" value="{{ $row->npwp }}">
			</div>
			</div>
			<div class="mb-3 row">
			<label for="panggol" class="col-sm-2 col-form-label"><strong>Panggol</strong></label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="panggol" value="{{ $row->panggol }}">
			</div>
			</div>
			<div class="mb-3 row">
			<label for="jabatan" class="col-sm-2 col-form-label"><strong>Jabatan</strong></label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="jabatan" value="{{ $row->jabatan }}">
			</div>
			</div>
			<div class="mb-3 row">
			<label for="grad" class="col-sm-2 col-form-label"><strong>Grad</strong></label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="grad" value="{{ $row->grad }}">
			</div>
			</div>
			<div class="mb-3 row">
			<label for="maxmedmin" class="col-sm-2 col-form-label"><strong>Maxmedmin</strong></label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="maxmedmin" value="{{ $row->maxmedmin }}">
			</div>
			</div>
			<div class="mb-3 row">
			<label for="tunjangan" class="col-sm-2 col-form-label"><strong>Tunjangan</strong></label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="tunjangan" value="{{ $row->tunjangan }}">
			</div>
			</div>
			<div class="mb-3 row">
			<label for="potabs" class="col-sm-2 col-form-label"><strong>Potabs</strong></label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="potabs" value="{{ $row->potabs }}">
			</div>
			</div>
			<div class="mb-3 row">
			<label for="potkim" class="col-sm-2 col-form-label"><strong>Potkim</strong></label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="potkim" value="{{ $row->potkim }}">
			</div>
			</div>
			<div class="mb-3 row">
			<label for="jumlahpot" class="col-sm-2 col-form-label"><strong>Jumlahpot</strong></label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="jumlahpot" value="{{ $row->jumlahpot }}">
			</div>
			</div>
			<div class="mb-3 row">
			<label for="jumtunjsetpot" class="col-sm-2 col-form-label"><strong>Jumtunjsetpot</strong></label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="jumtunjsetpot" value="{{ $row->jumtunjsetpot }}">
			</div>
			</div>
			<div class="mb-3 row">
			<label for="tunjpph" class="col-sm-2 col-form-label"><strong>Tunjpph</strong></label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="tunjpph" value="{{ $row->tunjpph }}">
			</div>
			</div>
			<div class="mb-3 row">
			<label for="bruto" class="col-sm-2 col-form-label"><strong>Bruto</strong></label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="bruto" value="{{ $row->bruto }}">
			</div>
			</div>
			<div class="mb-3 row">
			<label for="potpph" class="col-sm-2 col-form-label"><strong>Potpph</strong></label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="potpph" value="{{ $row->potpph }}">
			</div>
			</div>
			<div class="mb-3 row">
			<label for="netto" class="col-sm-2 col-form-label"><strong>Netto</strong></label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="netto" value="{{ $row->netto }}">
			</div>
			</div>
			<div class="mb-3 row">
			<label for="status" class="col-sm-2 col-form-label"><strong>Status</strong></label>
			<div class="col-sm-10">
				<select class="form-control" type="text" name="status">
				<option value="Setuju" {{ $row->status === "Setuju" ? "selected" : ""}}>Setuju</option>
				<option value="Tidak Setuju" {{ $row->status === "Tidak Setuju" ? "selected" : ""}}>Tidak Setuju</option>
				</select>
			</div>
			</div>
			<div class="mb-3 row">
			<label for="alasan" class="col-sm-2 col-form-label"><strong>Alasan</strong></label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="alasan" value="{{ $row->alasan }}">
			</div>
			</div>
			<div class="mb-3 row">
			<div class="offset-sm-2 col-sm-10">
				@method("PATCH")
				<input type="hidden" name="action" value="{{ $action }}">
				<input type="hidden" name="id" value="{{ $row->id }}">
				<input type="hidden" name="month_id" value="{{ $month_id }}">
				<button type="submit" class="btn btn-warning">Simpan</button>
				<button type="button" class="btn btn-secondary" onclick="button_cancel()">Kembali</button>
			</div>
			</div>
			{{ csrf_field() }}
		</form>
		@elseif($action == 'delete')
		<form class="form-horizontal" action="{{ asset('/') }}grand/{{ $row->id }}" method="post">
			<div class="mb-3 row">
			<label for="nip" class="col-sm-2 control-label"><strong>Nip</strong></label>
			<div class="col-sm-10">
				{{ $row->nip }}
			</div>
			</div>
			<div class="mb-3 row">
			<label for="nama" class="col-sm-2 control-label"><strong>Nama</strong></label>
			<div class="col-sm-10">
				{{ $row->nama }}
			</div>
			</div>
			<div class="mb-3 row">
			<label for="npwp" class="col-sm-2 control-label"><strong>Npwp</strong></label>
			<div class="col-sm-10">
				{{ $row->npwp }}
			</div>
			</div>
			<div class="mb-3 row">
			<label for="panggol" class="col-sm-2 control-label"><strong>Panggol</strong></label>
			<div class="col-sm-10">
				{{ $row->panggol }}
			</div>
			</div>
			<div class="mb-3 row">
			<label for="jabatan" class="col-sm-2 control-label"><strong>Jabatan</strong></label>
			<div class="col-sm-10">
				{{ $row->jabatan }}
			</div>
			</div>
			<div class="mb-3 row">
			<label for="grad" class="col-sm-2 control-label"><strong>Grad</strong></label>
			<div class="col-sm-10">
				{{ $row->grad }}
			</div>
			</div>
			<div class="mb-3 row">
			<label for="maxmedmin" class="col-sm-2 control-label"><strong>Maxmedmin</strong></label>
			<div class="col-sm-10">
				{{ $row->maxmedmin }}
			</div>
			</div>
			<div class="mb-3 row">
			<label for="tunjangan" class="col-sm-2 control-label"><strong>Tunjangan</strong></label>
			<div class="col-sm-10">
				{{ toCurrency($row->tunjangan) }}
			</div>
			</div>
			<div class="mb-3 row">
			<label for="potabs" class="col-sm-2 control-label"><strong>Potabs</strong></label>
			<div class="col-sm-10">
				{{ $row->potabs }}
			</div>
			</div>
			<div class="mb-3 row">
			<label for="potkim" class="col-sm-2 control-label"><strong>Potkim</strong></label>
			<div class="col-sm-10">
				{{ $row->potkim }}
			</div>
			</div>
			<div class="mb-3 row">
			<label for="jumlahpot" class="col-sm-2 control-label"><strong>Jumlahpot</strong></label>
			<div class="col-sm-10">
				{{ toCurrency($row->jumlahpot) }}
			</div>
			</div>
			<div class="mb-3 row">
			<label for="jumtunjsetpot" class="col-sm-2 control-label"><strong>Jumtunjsetpot</strong></label>
			<div class="col-sm-10">
				{{ toCurrency($row->jumtunjsetpot) }}
			</div>
			</div>
			<div class="mb-3 row">
			<label for="tunjpph" class="col-sm-2 control-label"><strong>Tunjpph</strong></label>
			<div class="col-sm-10">
				{{ toCurrency($row->tunjpph) }}
			</div>
			</div>
			<div class="mb-3 row">
			<label for="bruto" class="col-sm-2 control-label"><strong>Bruto</strong></label>
			<div class="col-sm-10">
				{{ toCurrency($row->bruto) }}
			</div>
			</div>
			<div class="mb-3 row">
			<label for="potpph" class="col-sm-2 control-label"><strong>Potpph</strong></label>
			<div class="col-sm-10">
				{{ toCurrency($row->potpph) }}
			</div>
			</div>
			<div class="mb-3 row">
			<label for="netto" class="col-sm-2 control-label"><strong>Netto</strong></label>
			<div class="col-sm-10">
				{{ toCurrency($row->netto) }}
			</div>
			</div>
			<div class="mb-3 row">
			<label for="status" class="col-sm-2 control-label"><strong>Status</strong></label>
			<div class="col-sm-10">
				{{ $row->status }}
			</div>
			</div>
			<div class="mb-3 row">
			<label for="alasan" class="col-sm-2 control-label"><strong>Alasan</strong></label>
			<div class="col-sm-10">
				{{ $row->alasan }}
			</div>
			</div>
			<div class="mb-3 row">
			<label for="created_at" class="col-sm-2 control-label"><strong>Created_at</strong></label>
			<div class="col-sm-10">
				{{ $row->created_at }}
			</div>
			</div>
			<div class="mb-3 row">
			<label for="updated_at" class="col-sm-2 control-label"><strong>Updated_at</strong></label>
			<div class="col-sm-10">
				{{ $row->updated_at }}
			</div>
			</div>
			<div class="mb-3 row">
			<div class="offset-sm-2 col-sm-10">
				@method("DELETE")
				<input type="hidden" name="action" value="{{ $action }}">
				<input type="hidden" name="id" value="{{ $row->id }}">
				<input type="hidden" name="month_id" value="{{ $month_id }}">
				<button type="submit" class="btn btn-danger">Hapus</button>
				<button type="button" class="btn btn-secondary" onclick="button_cancel()">Kembali</button>
			</div>
			</div>
			{{ csrf_field() }}
		</form>
		@elseif($action == 'detail')
		<div class="mb-3 row">
			<label for="nip" class="col-sm-2 control-label"><strong>Nip</strong></label>
			<div class="col-sm-10">
			{{ $row->nip }}
			</div>
		</div>
		<div class="mb-3 row">
			<label for="nama" class="col-sm-2 control-label"><strong>Nama</strong></label>
			<div class="col-sm-10">
			{{ $row->nama }}
			</div>
		</div>
		<div class="mb-3 row">
			<label for="npwp" class="col-sm-2 control-label"><strong>Npwp</strong></label>
			<div class="col-sm-10">
			{{ $row->npwp }}
			</div>
		</div>
		<div class="mb-3 row">
			<label for="panggol" class="col-sm-2 control-label"><strong>Panggol</strong></label>
			<div class="col-sm-10">
			{{ $row->panggol }}
			</div>
		</div>
		<div class="mb-3 row">
			<label for="jabatan" class="col-sm-2 control-label"><strong>Jabatan</strong></label>
			<div class="col-sm-10">
			{{ $row->jabatan }}
			</div>
		</div>
		<div class="mb-3 row">
			<label for="grad" class="col-sm-2 control-label"><strong>Grad</strong></label>
			<div class="col-sm-10">
			{{ $row->grad }}
			</div>
		</div>
		<div class="mb-3 row">
			<label for="maxmedmin" class="col-sm-2 control-label"><strong>Maxmedmin</strong></label>
			<div class="col-sm-10">
			{{ $row->maxmedmin }}
			</div>
		</div>
		<div class="mb-3 row">
			<label for="tunjangan" class="col-sm-2 control-label"><strong>Tunjangan</strong></label>
			<div class="col-sm-10">
			{{ toCurrency($row->tunjangan) }}
			</div>
		</div>
		<div class="mb-3 row">
			<label for="potabs" class="col-sm-2 control-label"><strong>Potabs</strong></label>
			<div class="col-sm-10">
			{{ $row->potabs }}
			</div>
		</div>
		<div class="mb-3 row">
			<label for="potkim" class="col-sm-2 control-label"><strong>Potkim</strong></label>
			<div class="col-sm-10">
			{{ $row->potkim }}
			</div>
		</div>
		<div class="mb-3 row">
			<label for="jumlahpot" class="col-sm-2 control-label"><strong>Jumlahpot</strong></label>
			<div class="col-sm-10">
			{{ toCurrency($row->jumlahpot) }}
			</div>
		</div>
		<div class="mb-3 row">
			<label for="jumtunjsetpot" class="col-sm-2 control-label"><strong>Jumtunjsetpot</strong></label>
			<div class="col-sm-10">
			{{ toCurrency($row->jumtunjsetpot) }}
			</div>
		</div>
		<div class="mb-3 row">
			<label for="tunjpph" class="col-sm-2 control-label"><strong>Tunjpph</strong></label>
			<div class="col-sm-10">
			{{ toCurrency($row->tunjpph) }}
			</div>
		</div>
		<div class="mb-3 row">
			<label for="bruto" class="col-sm-2 control-label"><strong>Bruto</strong></label>
			<div class="col-sm-10">
			{{ toCurrency($row->bruto) }}
			</div>
		</div>
		<div class="mb-3 row">
			<label for="potpph" class="col-sm-2 control-label"><strong>Potpph</strong></label>
			<div class="col-sm-10">
			{{ toCurrency($row->potpph) }}
			</div>
		</div>
		<div class="mb-3 row">
			<label for="netto" class="col-sm-2 control-label"><strong>Netto</strong></label>
			<div class="col-sm-10">
			{{ toCurrency($row->netto) }}
			</div>
		</div>
		<div class="mb-3 row">
			<label for="status" class="col-sm-2 control-label"><strong>Status</strong></label>
			<div class="col-sm-10">
			{{ $row->status }}
			</div>
		</div>
		<div class="mb-3 row">
			<label for="alasan" class="col-sm-2 control-label"><strong>Alasan</strong></label>
			<div class="col-sm-10">
			{{ $row->alasan }}
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