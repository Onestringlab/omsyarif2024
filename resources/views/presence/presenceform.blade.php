@extends('layouts.app')

@section('title')
Data Presensi
@endsection

@section('content')
<div class="container">
	<script>
		function button_cancel() {
			location.replace("{{ asset('/') }}presence/data/{{ $month_id }}");
		}
	</script>
	<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ asset('/months') }}">Data</a></li>
			<li class="breadcrumb-item"><a href="{{asset('/')}}presence/data/{{ $month_id }}">Presensi Tunjangan Kinerja</a></li>
			<li class="breadcrumb-item active" aria-current="page">{{ ucfirst($action) }}</li>
		</ol>
	</nav>
	<div class="card border-success">
		<h5 class="card-header text-bg-success"> Data Presensi</h5>
		<div class="card-body">
			@if($action == 'insert')
			<form class="form-horizontal" action="{{ asset('/') }}presence" method="post">
				<div class="mb-3 row">
					<label for="nip" class="col-sm-3 col-form-label"><strong>NIP</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="nip" value="" required>
					</div>
				</div>
				<div class="mb-3 row">
					<label for="nama" class="col-sm-3 col-form-label"><strong>Nama</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="nama" value="" required>
					</div>
				</div>

				<div class="mb-3 row">
					<label for="jabatan" class="col-sm-3 col-form-label"><strong>Jabatan</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="jabatan" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="vd" class="col-sm-3 col-form-label"><strong>Datang Tepat Waktu</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="vd" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="tkd" class="col-sm-3 col-form-label"><strong>Terlambat Karena Dinas</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="tkd" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="tl1" class="col-sm-3 col-form-label"><strong>Terlambat 1 S.D 30 Menit</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="tl1" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="tl2" class="col-sm-3 col-form-label"><strong>Terlambat 31 S.D 60 Menit</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="tl2" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="tl3" class="col-sm-3 col-form-label"><strong>Terlambat 61 S.D 90 Menit</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="tl3" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="tl4" class="col-sm-3 col-form-label"><strong>Terlambat > 90 Menit</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="tl4" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="thm" class="col-sm-3 col-form-label"><strong>Tidak Mengisi Daftar Hadir (Masuk)</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="thm" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="vp" class="col-sm-3 col-form-label"><strong>Pulang Tepat Waktu</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="vp" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="ik" class="col-sm-3 col-form-label"><strong>Izin Keluar Kantor (Pulang)</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="ik" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="psw1" class="col-sm-3 col-form-label"><strong>Pulang Sebelum Waktunya 1 S.D 30 Menit</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="psw1" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="psw2" class="col-sm-3 col-form-label"><strong>Pulang Sebelum Waktunya 31 S.D 60 Menit</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="psw2" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="psw3" class="col-sm-3 col-form-label"><strong>Pulang Sebelum Waktunya 61 S.D 90 Menit</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="psw3" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="psw4" class="col-sm-3 col-form-label"><strong>Pulang Sebelum Waktunya > 90 Menit</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="psw4" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="thp" class="col-sm-3 col-form-label"><strong>Tidak Mengisi Daftar Hadir (Pulang)</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="thp" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="i" class="col-sm-3 col-form-label"><strong>Izin Tidak Masuk Kantor</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="i" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="dls" class="col-sm-3 col-form-label"><strong>Dinas Luar + SPPD</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="dls" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="ct" class="col-sm-3 col-form-label"><strong>Cuti Tahunan</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="ct" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="clt" class="col-sm-3 col-form-label"><strong>Cuti Di Luar Tanggungan Negara</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="clt" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="cpp" class="col-sm-3 col-form-label"><strong>Cuti Persiapan Pensiun</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="cpp" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="ctl" class="col-sm-3 col-form-label"><strong>Cuti Jatah Tahun Yang Lalu</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="ctl" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="tb" class="col-sm-3 col-form-label"><strong>Tugas Belajar</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="tb" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="ld" class="col-sm-3 col-form-label"><strong>Hari Libur Daerah</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="ld" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="bmt" class="col-sm-3 col-form-label"><strong>Belum Menjalankan Tugas</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="bmt" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="ib" class="col-sm-3 col-form-label"><strong>Izin Belajar</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="ib" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="tmk" class="col-sm-3 col-form-label"><strong>Tidak Masuk Kerja</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="tmk" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="cs1" class="col-sm-3 col-form-label"><strong>Cuti Sakit 1 S.D 14 Hari</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="cs1" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="cs14" class="col-sm-3 col-form-label"><strong>Cuti Sakit >14 Hari</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="cs14" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="cm1" class="col-sm-3 col-form-label"><strong>Cuti Melahirkan Pertama</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="cm1" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="cm2" class="col-sm-3 col-form-label"><strong>Cuti Melahirkan Kedua</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="cm2" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="cm3" class="col-sm-3 col-form-label"><strong>Cuti Melahirkan Ketiga</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="cm3" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="cm41" class="col-sm-3 col-form-label"><strong>Cuti Melahirkan Keempat Dan Seterusnya, Bulan Pertama</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="cm41" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="cm42" class="col-sm-3 col-form-label"><strong>Cuti Melahirkan Keempat Dan Seterusnya, Bulan Kedua</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="cm42" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="cm43" class="col-sm-3 col-form-label"><strong>Cuti Melahirkan Keempat Dan Seterusnya, Bulan Ketiga</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="cm43" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="cap1" class="col-sm-3 col-form-label"><strong>Cuti Alasan Penting S.D 10 Hari</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="cap1" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="cap10" class="col-sm-3 col-form-label"><strong>Cuti Aladan Penting >10 Hari</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="cap10" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="cb1" class="col-sm-3 col-form-label"><strong>Cuti Besar Bulan Pertama</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="cb1" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="cb2" class="col-sm-3 col-form-label"><strong>Cuti Besar Bulan Kedua</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="cb2" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="cb3" class="col-sm-3 col-form-label"><strong>Cuti Besar Bulan Ketiga</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="cb3" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="tk" class="col-sm-3 col-form-label"><strong>Total Kehadiran</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="tk" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="ptk" class="col-sm-3 col-form-label"><strong>Pengurangan Tunjangan Kinerja</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="ptk" value="">
					</div>
				</div>
				<!-- <div class="mb-3 row">
					<label for="kum" class="col-sm-3 col-form-label"><strong>Kum</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="kum" value="">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="kut" class="col-sm-3 col-form-label"><strong>Kut</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="kut" value="">
					</div>
				</div> -->
				<div class="mb-3 row">
					<label for="status" class="col-sm-3 col-form-label"><strong>Status</strong></label>
					<div class="col-sm-9">
						<select class="form-control" type="text" name="status">
							<option value="Setuju">Setuju</option>
							<option value="Tidak Setuju">Tidak Setuju</option>
						</select>
					</div>
				</div>
				<div class="mb-3 row">
					<label for="alasan" class="col-sm-3 col-form-label"><strong>Alasan</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="alasan" value="">
					</div>
				</div>
				<div class="mb-3">
					<div class="offset-sm-3 col-sm-9">
						<input type="hidden" name="action" value="{{ $action }}">
						<input type="hidden" name="month_id" value="{{ $month_id }}">
						<button type="submit" class="btn btn-primary">Tambah</button>
						<button type="button" class="btn btn-secondary" onclick="button_cancel()">Kembali</button>
					</div>
				</div>
				{{ csrf_field() }}
			</form>
			@elseif($action == 'update')
			<form class="form-horizontal" action="{{ asset('/') }}presence/{{ $row->id }}" method="post">
				<div class="mb-3 row">
					<label for="nip" class="col-sm-3 col-form-label"><strong>NIP</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="nip" value="{{ $row->nip }}" required>
					</div>
				</div>
				<div class="mb-3 row">
					<label for="nama" class="col-sm-3 col-form-label"><strong>Nama</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="nama" value="{{ $row->nama }}" required>
					</div>
				</div>
				<div class="mb-3 row">
					<label for="jabatan" class="col-sm-3 col-form-label"><strong>Jabatan</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="jabatan" value="{{ $row->jabatan }}">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="vd" class="col-sm-3 col-form-label"><strong>Datang Tepat Waktu</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="vd" value="{{ $row->vd }}">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="tkd" class="col-sm-3 col-form-label"><strong>Terlambat Karena Dinas</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="tkd" value="{{ $row->tkd }}">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="tl1" class="col-sm-3 col-form-label"><strong>Terlambat 1 S.D 30 Menit</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="tl1" value="{{ $row->tl1 }}">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="tl2" class="col-sm-3 col-form-label"><strong>Terlambat 31 S.D 60 Menit</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="tl2" value="{{ $row->tl2 }}">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="tl3" class="col-sm-3 col-form-label"><strong>Terlambat 61 S.D 90 Menit</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="tl3" value="{{ $row->tl3 }}">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="tl4" class="col-sm-3 col-form-label"><strong>Terlambat > 90 Menit</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="tl4" value="{{ $row->tl4 }}">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="thm" class="col-sm-3 col-form-label"><strong>Tidak Mengisi Daftar Hadir (Masuk)</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="thm" value="{{ $row->thm }}">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="vp" class="col-sm-3 col-form-label"><strong>Pulang Tepat Waktu</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="vp" value="{{ $row->vp }}">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="ik" class="col-sm-3 col-form-label"><strong>Izin Keluar Kantor (Pulang)</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="ik" value="{{ $row->ik }}">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="psw1" class="col-sm-3 col-form-label"><strong>Pulang Sebelum Waktunya 1 S.D 30 Menit</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="psw1" value="{{ $row->psw1 }}">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="psw2" class="col-sm-3 col-form-label"><strong>Pulang Sebelum Waktunya 31 S.D 60 Menit</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="psw2" value="{{ $row->psw2 }}">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="psw3" class="col-sm-3 col-form-label"><strong>Pulang Sebelum Waktunya 61 S.D 90 Menit</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="psw3" value="{{ $row->psw3 }}">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="psw4" class="col-sm-3 col-form-label"><strong>Pulang Sebelum Waktunya > 90 Menit</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="psw4" value="{{ $row->psw4 }}">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="thp" class="col-sm-3 col-form-label"><strong>Tidak Mengisi Daftar Hadir (Pulang)</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="thp" value="{{ $row->thp }}">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="i" class="col-sm-3 col-form-label"><strong>Izin Tidak Masuk Kantor</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="i" value="{{ $row->i }}">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="dls" class="col-sm-3 col-form-label"><strong>Dinas Luar + SPPD</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="dls" value="{{ $row->dls }}">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="ct" class="col-sm-3 col-form-label"><strong>Cuti Tahunan</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="ct" value="{{ $row->ct }}">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="clt" class="col-sm-3 col-form-label"><strong>Cuti Di Luar Tanggungan Negara</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="clt" value="{{ $row->clt }}">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="cpp" class="col-sm-3 col-form-label"><strong>Cuti Persiapan Pensiun</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="cpp" value="{{ $row->cpp }}">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="ctl" class="col-sm-3 col-form-label"><strong>Cuti Jatah Tahun Yang Lalu</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="ctl" value="{{ $row->ctl }}">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="tb" class="col-sm-3 col-form-label"><strong>Tugas Belajar</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="tb" value="{{ $row->tb }}">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="ld" class="col-sm-3 col-form-label"><strong>Hari Libur Daerah</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="ld" value="{{ $row->ld }}">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="bmt" class="col-sm-3 col-form-label"><strong>Belum Menjalankan Tugas</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="bmt" value="{{ $row->bmt }}">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="ib" class="col-sm-3 col-form-label"><strong>Izin Belajar</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="ib" value="{{ $row->ib }}">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="tmk" class="col-sm-3 col-form-label"><strong>Tidak Masuk Kerja</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="tmk" value="{{ $row->tmk }}">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="cs1" class="col-sm-3 col-form-label"><strong>Cuti Sakit 1 S.D 14 Hari</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="cs1" value="{{ $row->cs1 }}">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="cs14" class="col-sm-3 col-form-label"><strong>Cuti Sakit >14 Hari</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="cs14" value="{{ $row->cs14 }}">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="cm1" class="col-sm-3 col-form-label"><strong>Cuti Melahirkan Pertama</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="cm1" value="{{ $row->cm1 }}">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="cm2" class="col-sm-3 col-form-label"><strong>Cuti Melahirkan Kedua</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="cm2" value="{{ $row->cm2 }}">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="cm3" class="col-sm-3 col-form-label"><strong>Cuti Melahirkan Ketiga</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="cm3" value="{{ $row->cm3 }}">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="cm41" class="col-sm-3 col-form-label"><strong>Cuti Melahirkan Keempat Dan Seterusnya, Bulan Pertama</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="cm41" value="{{ $row->cm41 }}">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="cm42" class="col-sm-3 col-form-label"><strong>Cuti Melahirkan Keempat Dan Seterusnya, Bulan Kedua</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="cm42" value="{{ $row->cm42 }}">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="cm43" class="col-sm-3 col-form-label"><strong>Cuti Melahirkan Keempat Dan Seterusnya, Bulan Ketiga</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="cm43" value="{{ $row->cm43 }}">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="cap1" class="col-sm-3 col-form-label"><strong>Cuti Alasan Penting S.D 10 Hari</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="cap1" value="{{ $row->cap1 }}">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="cap10" class="col-sm-3 col-form-label"><strong>Cuti Aladan Penting >10 Hari</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="cap10" value="{{ $row->cap10 }}">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="cb1" class="col-sm-3 col-form-label"><strong>Cuti Besar Bulan Pertama</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="cb1" value="{{ $row->cb1 }}">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="cb2" class="col-sm-3 col-form-label"><strong>Cuti Besar Bulan Kedua</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="cb2" value="{{ $row->cb2 }}">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="cb3" class="col-sm-3 col-form-label"><strong>Cuti Besar Bulan Ketiga</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="cb3" value="{{ $row->cb3 }}">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="tk" class="col-sm-3 col-form-label"><strong>Total Kehadiran</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="tk" value="{{ $row->tk }}">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="ptk" class="col-sm-3 col-form-label"><strong>Pengurangan Tunjangan Kinerja</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="ptk" value="{{ $row->ptk }}">
					</div>
				</div>
				<!-- <div class="mb-3 row">
					<label for="kum" class="col-sm-3 col-form-label"><strong>Kum</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="kum" value="{{ $row->kum }}">
					</div>
				</div>
				<div class="mb-3 row">
					<label for="kut" class="col-sm-3 col-form-label"><strong>Kut</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="kut" value="{{ $row->kut }}">
					</div>
				</div> -->
				<div class="mb-3 row">
					<label for="status" class="col-sm-3 col-form-label"><strong>Status</strong></label>
					<div class="col-sm-9">
						<select class="form-control" type="text" name="status">
							<option value="Setuju" {{ $row->status === "Setuju" ? "selected" : ""}}>Setuju</option>
							<option value="Tidak Setuju" {{ $row->status === "Tidak Setuju" ? "selected" : ""}}>Tidak Setuju</option>
						</select>
					</div>
				</div>
				<div class="mb-3 row">
					<label for="alasan" class="col-sm-3 col-form-label"><strong>Alasan</strong></label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="alasan" value="{{ $row->alasan }}">
					</div>
				</div>
				<div class="mb-3 row">
					<div class="offset-sm-3 col-sm-9">
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
			<form class="form-horizontal" action="{{ asset('/') }}presence/{{ $row->id }}" method="post">
				<div class="mb-3 row">
					<label for="nip" class="col-sm-3 control-label"><strong>NIP</strong></label>
					<div class="col-sm-9">
						{{ $row->nip }}
					</div>
				</div>
				<div class="mb-3 row">
					<label for="nama" class="col-sm-3 control-label"><strong>Nama</strong></label>
					<div class="col-sm-9">
						{{ $row->nama }}
					</div>
				</div>
				<div class="mb-3 row">
					<label for="jabatan" class="col-sm-3 control-label"><strong>Jabatan</strong></label>
					<div class="col-sm-9">
						{{ $row->jabatan }}
					</div>
				</div>
				<div class="mb-3 row">
					<label for="vd" class="col-sm-3 control-label"><strong>Datang Tepat Waktu</strong></label>
					<div class="col-sm-9">
						{{ $row->vd }}
					</div>
				</div>
				<div class="mb-3 row">
					<label for="tkd" class="col-sm-3 control-label"><strong>Terlambat Karena Dinas</strong></label>
					<div class="col-sm-9">
						{{ $row->tkd }}
					</div>
				</div>
				<div class="mb-3 row">
					<label for="tl1" class="col-sm-3 control-label"><strong>Terlambat 1 S.D 30 Menit</strong></label>
					<div class="col-sm-9">
						{{ $row->tl1 }}
					</div>
				</div>
				<div class="mb-3 row">
					<label for="tl2" class="col-sm-3 control-label"><strong>Terlambat 31 S.D 60 Menit</strong></label>
					<div class="col-sm-9">
						{{ $row->tl2 }}
					</div>
				</div>
				<div class="mb-3 row">
					<label for="tl3" class="col-sm-3 control-label"><strong>Terlambat 61 S.D 90 Menit</strong></label>
					<div class="col-sm-9">
						{{ $row->tl3 }}
					</div>
				</div>
				<div class="mb-3 row">
					<label for="tl4" class="col-sm-3 control-label"><strong>Terlambat > 90 Menit</strong></label>
					<div class="col-sm-9">
						{{ $row->tl4 }}
					</div>
				</div>
				<div class="mb-3 row">
					<label for="thm" class="col-sm-3 control-label"><strong>Tidak Mengisi Daftar Hadir (Masuk)</strong></label>
					<div class="col-sm-9">
						{{ $row->thm }}
					</div>
				</div>
				<div class="mb-3 row">
					<label for="vp" class="col-sm-3 control-label"><strong>Pulang Tepat Waktu</strong></label>
					<div class="col-sm-9">
						{{ $row->vp }}
					</div>
				</div>
				<div class="mb-3 row">
					<label for="ik" class="col-sm-3 control-label"><strong>Izin Keluar Kantor (Pulang)</strong></label>
					<div class="col-sm-9">
						{{ $row->ik }}
					</div>
				</div>
				<div class="mb-3 row">
					<label for="psw1" class="col-sm-3 control-label"><strong>Pulang Sebelum Waktunya 1 S.D 30 Menit</strong></label>
					<div class="col-sm-9">
						{{ $row->psw1 }}
					</div>
				</div>
				<div class="mb-3 row">
					<label for="psw2" class="col-sm-3 control-label"><strong>Pulang Sebelum Waktunya 31 S.D 60 Menit</strong></label>
					<div class="col-sm-9">
						{{ $row->psw2 }}
					</div>
				</div>
				<div class="mb-3 row">
					<label for="psw3" class="col-sm-3 control-label"><strong>Pulang Sebelum Waktunya 61 S.D 90 Menit</strong></label>
					<div class="col-sm-9">
						{{ $row->psw3 }}
					</div>
				</div>
				<div class="mb-3 row">
					<label for="psw4" class="col-sm-3 control-label"><strong>Pulang Sebelum Waktunya > 90 Menit</strong></label>
					<div class="col-sm-9">
						{{ $row->psw4 }}
					</div>
				</div>
				<div class="mb-3 row">
					<label for="thp" class="col-sm-3 control-label"><strong>Tidak Mengisi Daftar Hadir (Pulang)</strong></label>
					<div class="col-sm-9">
						{{ $row->thp }}
					</div>
				</div>
				<div class="mb-3 row">
					<label for="i" class="col-sm-3 control-label"><strong>Izin Tidak Masuk Kantor</strong></label>
					<div class="col-sm-9">
						{{ $row->i }}
					</div>
				</div>
				<div class="mb-3 row">
					<label for="dls" class="col-sm-3 control-label"><strong>Dinas Luar + SPPD</strong></label>
					<div class="col-sm-9">
						{{ $row->dls }}
					</div>
				</div>
				<div class="mb-3 row">
					<label for="ct" class="col-sm-3 control-label"><strong>Cuti Tahunan</strong></label>
					<div class="col-sm-9">
						{{ $row->ct }}
					</div>
				</div>
				<div class="mb-3 row">
					<label for="clt" class="col-sm-3 control-label"><strong>Cuti Di Luar Tanggungan Negara</strong></label>
					<div class="col-sm-9">
						{{ $row->clt }}
					</div>
				</div>
				<div class="mb-3 row">
					<label for="cpp" class="col-sm-3 control-label"><strong>Cuti Persiapan Pensiun</strong></label>
					<div class="col-sm-9">
						{{ $row->cpp }}
					</div>
				</div>
				<div class="mb-3 row">
					<label for="ctl" class="col-sm-3 control-label"><strong>Cuti Jatah Tahun Yang Lalu</strong></label>
					<div class="col-sm-9">
						{{ $row->ctl }}
					</div>
				</div>
				<div class="mb-3 row">
					<label for="tb" class="col-sm-3 control-label"><strong>Tugas Belajar</strong></label>
					<div class="col-sm-9">
						{{ $row->tb }}
					</div>
				</div>
				<div class="mb-3 row">
					<label for="ld" class="col-sm-3 control-label"><strong>Hari Libur Daerah</strong></label>
					<div class="col-sm-9">
						{{ $row->ld }}
					</div>
				</div>
				<div class="mb-3 row">
					<label for="ld" class="col-sm-3 control-label"><strong>Belum Menjalankan Tugas</strong></label>
					<div class="col-sm-9">
						{{ $row->bmt }}
					</div>
				</div>
				<div class="mb-3 row">
					<label for="ib" class="col-sm-3 control-label"><strong>Izin Belajar</strong></label>
					<div class="col-sm-9">
						{{ $row->ib }}
					</div>
				</div>
				<div class="mb-3 row">
					<label for="tmk" class="col-sm-3 control-label"><strong>Tidak Masuk Kerja</strong></label>
					<div class="col-sm-9">
						{{ $row->tmk }}
					</div>
				</div>
				<div class="mb-3 row">
					<label for="cs1" class="col-sm-3 control-label"><strong>Cuti Sakit 1 S.D 14 Hari</strong></label>
					<div class="col-sm-9">
						{{ $row->cs1 }}
					</div>
				</div>
				<div class="mb-3 row">
					<label for="cs14" class="col-sm-3 control-label"><strong>Cuti Sakit >14 Hari</strong></label>
					<div class="col-sm-9">
						{{ $row->cs14 }}
					</div>
				</div>
				<div class="mb-3 row">
					<label for="cm1" class="col-sm-3 control-label"><strong>Cuti Melahirkan Pertama</strong></label>
					<div class="col-sm-9">
						{{ $row->cm1 }}
					</div>
				</div>
				<div class="mb-3 row">
					<label for="cm2" class="col-sm-3 control-label"><strong>Cuti Melahirkan Kedua</strong></label>
					<div class="col-sm-9">
						{{ $row->cm2 }}
					</div>
				</div>
				<div class="mb-3 row">
					<label for="cm3" class="col-sm-3 control-label"><strong>Cuti Melahirkan Ketiga</strong></label>
					<div class="col-sm-9">
						{{ $row->cm3 }}
					</div>
				</div>
				<div class="mb-3 row">
					<label for="cm41" class="col-sm-3 control-label"><strong>Cuti Melahirkan Keempat Dan Seterusnya, Bulan Pertama</strong></label>
					<div class="col-sm-9">
						{{ $row->cm41 }}
					</div>
				</div>
				<div class="mb-3 row">
					<label for="cm42" class="col-sm-3 control-label"><strong>Cuti Melahirkan Keempat Dan Seterusnya, Bulan Kedua</strong></label>
					<div class="col-sm-9">
						{{ $row->cm42 }}
					</div>
				</div>
				<div class="mb-3 row">
					<label for="cm43" class="col-sm-3 control-label"><strong>Cuti Melahirkan Keempat Dan Seterusnya, Bulan Ketiga</strong></label>
					<div class="col-sm-9">
						{{ $row->cm43 }}
					</div>
				</div>
				<div class="mb-3 row">
					<label for="cap1" class="col-sm-3 control-label"><strong>Cuti Alasan Penting S.D 10 Hari</strong></label>
					<div class="col-sm-9">
						{{ $row->cap1 }}
					</div>
				</div>
				<div class="mb-3 row">
					<label for="cap10" class="col-sm-3 control-label"><strong>Cuti Aladan Penting >10 Hari</strong></label>
					<div class="col-sm-9">
						{{ $row->cap10 }}
					</div>
				</div>
				<div class="mb-3 row">
					<label for="cb1" class="col-sm-3 control-label"><strong>Cuti Besar Bulan Pertama</strong></label>
					<div class="col-sm-9">
						{{ $row->cb1 }}
					</div>
				</div>
				<div class="mb-3 row">
					<label for="cb2" class="col-sm-3 control-label"><strong>Cuti Besar Bulan Kedua</strong></label>
					<div class="col-sm-9">
						{{ $row->cb2 }}
					</div>
				</div>
				<div class="mb-3 row">
					<label for="cb3" class="col-sm-3 control-label"><strong>Cuti Besar Bulan Ketiga</strong></label>
					<div class="col-sm-9">
						{{ $row->cb3 }}
					</div>
				</div>
				<div class="mb-3 row">
					<label for="tk" class="col-sm-3 control-label"><strong>Total Kehadiran</strong></label>
					<div class="col-sm-9">
						{{ $row->tk }}
					</div>
				</div>
				<div class="mb-3 row">
					<label for="ptk" class="col-sm-3 control-label"><strong>Pengurangan Tunjangan Kinerja</strong></label>
					<div class="col-sm-9">
						{{ $row->ptk }}
					</div>
				</div>
				<!-- <div class="mb-3 row">
					<label for="kum" class="col-sm-3 control-label"><strong>Kum</strong></label>
					<div class="col-sm-9">
						{{ $row->kum }}
					</div>
				</div>
				<div class="mb-3 row">
					<label for="kut" class="col-sm-3 control-label"><strong>Kut</strong></label>
					<div class="col-sm-9">
						{{ $row->kut }}
					</div>
				</div> -->
				<div class="mb-3 row">
					<label for="status" class="col-sm-3 control-label"><strong>Status</strong></label>
					<div class="col-sm-9">
						{{ $row->status }}
					</div>
				</div>
				<div class="mb-3 row">
					<label for="alasan" class="col-sm-3 control-label"><strong>Alasan</strong></label>
					<div class="col-sm-9">
						{{ $row->alasan }}
					</div>
				</div>
				<!-- <div class="mb-3 row">
					<label for="created_at" class="col-sm-3 control-label"><strong>Created_at</strong></label>
					<div class="col-sm-9">
						{{ $row->created_at }}
					</div>
				</div> -->
				<!-- <div class="mb-3 row">
					<label for="updated_at" class="col-sm-3 control-label"><strong>Updated_at</strong></label>
					<div class="col-sm-9">
						{{ $row->updated_at }}
					</div>
				</div> -->
				<div class="mb-3 row">
					<div class="offset-sm-3 col-sm-9">
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
			<!-- <div class="mb-3 row">
				<label for="id" class="col-sm-3 control-label"><strong>Id</strong></label>
				<div class="col-sm-9">
					{{ $row->id }}
				</div>
			</div> -->
			<!-- <div class="mb-3 row">
				<label for="month_id" class="col-sm-3 control-label"><strong>Month_id</strong></label>
				<div class="col-sm-9">
					{{ $row->month_id }}
				</div>
			</div> -->
			<div class="mb-3 row">
				<label for="nip" class="col-sm-3 control-label"><strong>NIP</strong></label>
				<div class="col-sm-9">
					{{ $row->nip }}
				</div>
			</div>
			<div class="mb-3 row">
				<label for="nama" class="col-sm-3 control-label"><strong>Nama</strong></label>
				<div class="col-sm-9">
					{{ $row->nama }}
				</div>
			</div>
			<div class="mb-3 row">
				<label for="jabatan" class="col-sm-3 control-label"><strong>Jabatan</strong></label>
				<div class="col-sm-9">
					{{ $row->jabatan }}
				</div>
			</div>
			<div class="mb-3 row">
				<label for="vd" class="col-sm-3 control-label"><strong>Datang Tepat Waktu</strong></label>
				<div class="col-sm-9">
					{{ $row->vd }}
				</div>
			</div>
			<div class="mb-3 row">
				<label for="tkd" class="col-sm-3 control-label"><strong>Terlambat Karena Dinas</strong></label>
				<div class="col-sm-9">
					{{ $row->tkd }}
				</div>
			</div>
			<div class="mb-3 row">
				<label for="tl1" class="col-sm-3 control-label"><strong>Terlambat 1 S.D 30 Menit</strong></label>
				<div class="col-sm-9">
					{{ $row->tl1 }}
				</div>
			</div>
			<div class="mb-3 row">
				<label for="tl2" class="col-sm-3 control-label"><strong>Terlambat 31 S.D 60 Menit</strong></label>
				<div class="col-sm-9">
					{{ $row->tl2 }}
				</div>
			</div>
			<div class="mb-3 row">
				<label for="tl3" class="col-sm-3 control-label"><strong>Terlambat 61 S.D 90 Menit</strong></label>
				<div class="col-sm-9">
					{{ $row->tl3 }}
				</div>
			</div>
			<div class="mb-3 row">
				<label for="tl4" class="col-sm-3 control-label"><strong>Terlambat > 90 Menit</strong></label>
				<div class="col-sm-9">
					{{ $row->tl4 }}
				</div>
			</div>
			<div class="mb-3 row">
				<label for="thm" class="col-sm-3 control-label"><strong>Tidak Mengisi Daftar Hadir (Masuk)</strong></label>
				<div class="col-sm-9">
					{{ $row->thm }}
				</div>
			</div>
			<div class="mb-3 row">
				<label for="vp" class="col-sm-3 control-label"><strong>Pulang Tepat Waktu</strong></label>
				<div class="col-sm-9">
					{{ $row->vp }}
				</div>
			</div>
			<div class="mb-3 row">
				<label for="ik" class="col-sm-3 control-label"><strong>Izin Keluar Kantor (Pulang)</strong></label>
				<div class="col-sm-9">
					{{ $row->ik }}
				</div>
			</div>
			<div class="mb-3 row">
				<label for="psw1" class="col-sm-3 control-label"><strong>Pulang Sebelum Waktunya 1 S.D 30 Menit</strong></label>
				<div class="col-sm-9">
					{{ $row->psw1 }}
				</div>
			</div>
			<div class="mb-3 row">
				<label for="psw2" class="col-sm-3 control-label"><strong>Pulang Sebelum Waktunya 31 S.D 60 Menit</strong></label>
				<div class="col-sm-9">
					{{ $row->psw2 }}
				</div>
			</div>
			<div class="mb-3 row">
				<label for="psw3" class="col-sm-3 control-label"><strong>Pulang Sebelum Waktunya 61 S.D 90 Menit</strong></label>
				<div class="col-sm-9">
					{{ $row->psw3 }}
				</div>
			</div>
			<div class="mb-3 row">
				<label for="psw4" class="col-sm-3 control-label"><strong>Pulang Sebelum Waktunya > 90 Menit</strong></label>
				<div class="col-sm-9">
					{{ $row->psw4 }}
				</div>
			</div>
			<div class="mb-3 row">
				<label for="thp" class="col-sm-3 control-label"><strong>Tidak Mengisi Daftar Hadir (Pulang)</strong></label>
				<div class="col-sm-9">
					{{ $row->thp }}
				</div>
			</div>
			<div class="mb-3 row">
				<label for="i" class="col-sm-3 control-label"><strong>Izin Tidak Masuk Kantor</strong></label>
				<div class="col-sm-9">
					{{ $row->i }}
				</div>
			</div>
			<div class="mb-3 row">
				<label for="dls" class="col-sm-3 control-label"><strong>Dinas Luar + SPPD</strong></label>
				<div class="col-sm-9">
					{{ $row->dls }}
				</div>
			</div>
			<div class="mb-3 row">
				<label for="ct" class="col-sm-3 control-label"><strong>Cuti Tahunan</strong></label>
				<div class="col-sm-9">
					{{ $row->ct }}
				</div>
			</div>
			<div class="mb-3 row">
				<label for="clt" class="col-sm-3 control-label"><strong>Cuti Di Luar Tanggungan Negara</strong></label>
				<div class="col-sm-9">
					{{ $row->clt }}
				</div>
			</div>
			<div class="mb-3 row">
				<label for="cpp" class="col-sm-3 control-label"><strong>Cuti Persiapan Pensiun</strong></label>
				<div class="col-sm-9">
					{{ $row->cpp }}
				</div>
			</div>
			<div class="mb-3 row">
				<label for="ctl" class="col-sm-3 control-label"><strong>Cuti Jatah Tahun Yang Lalu</strong></label>
				<div class="col-sm-9">
					{{ $row->ctl }}
				</div>
			</div>
			<div class="mb-3 row">
				<label for="tb" class="col-sm-3 control-label"><strong>Tugas Belajar</strong></label>
				<div class="col-sm-9">
					{{ $row->tb }}
				</div>
			</div>
			<div class="mb-3 row">
				<label for="ld" class="col-sm-3 control-label"><strong>Hari Libur Daerah</strong></label>
				<div class="col-sm-9">
					{{ $row->ld }}
				</div>
			</div>
			<div class="mb-3 row">
				<label for="ld" class="col-sm-3 control-label"><strong>Belum Menjalankan Tugas</strong></label>
				<div class="col-sm-9">
					{{ $row->bmt }}
				</div>
			</div>
			<div class="mb-3 row">
				<label for="ib" class="col-sm-3 control-label"><strong>Izin Belajar</strong></label>
				<div class="col-sm-9">
					{{ $row->ib }}
				</div>
			</div>
			<div class="mb-3 row">
				<label for="tmk" class="col-sm-3 control-label"><strong>Tidak Masuk Kerja</strong></label>
				<div class="col-sm-9">
					{{ $row->tmk }}
				</div>
			</div>
			<div class="mb-3 row">
				<label for="cs1" class="col-sm-3 control-label"><strong>Cuti Sakit 1 S.D 14 Hari</strong></label>
				<div class="col-sm-9">
					{{ $row->cs1 }}
				</div>
			</div>
			<div class="mb-3 row">
				<label for="cs14" class="col-sm-3 control-label"><strong>Cuti Sakit >14 Hari</strong></label>
				<div class="col-sm-9">
					{{ $row->cs14 }}
				</div>
			</div>
			<div class="mb-3 row">
				<label for="cm1" class="col-sm-3 control-label"><strong>Cuti Melahirkan Pertama</strong></label>
				<div class="col-sm-9">
					{{ $row->cm1 }}
				</div>
			</div>
			<div class="mb-3 row">
				<label for="cm2" class="col-sm-3 control-label"><strong>Cuti Melahirkan Kedua</strong></label>
				<div class="col-sm-9">
					{{ $row->cm2 }}
				</div>
			</div>
			<div class="mb-3 row">
				<label for="cm3" class="col-sm-3 control-label"><strong>Cuti Melahirkan Ketiga</strong></label>
				<div class="col-sm-9">
					{{ $row->cm3 }}
				</div>
			</div>
			<div class="mb-3 row">
				<label for="cm41" class="col-sm-3 control-label"><strong>Cuti Melahirkan Keempat Dan Seterusnya, Bulan Pertama</strong></label>
				<div class="col-sm-9">
					{{ $row->cm41 }}
				</div>
			</div>
			<div class="mb-3 row">
				<label for="cm42" class="col-sm-3 control-label"><strong>Cuti Melahirkan Keempat Dan Seterusnya, Bulan Kedua</strong></label>
				<div class="col-sm-9">
					{{ $row->cm42 }}
				</div>
			</div>
			<div class="mb-3 row">
				<label for="cm43" class="col-sm-3 control-label"><strong>Cuti Melahirkan Keempat Dan Seterusnya, Bulan Ketiga</strong></label>
				<div class="col-sm-9">
					{{ $row->cm43 }}
				</div>
			</div>
			<div class="mb-3 row">
				<label for="cap1" class="col-sm-3 control-label"><strong>Cuti Alasan Penting S.D 10 Hari</strong></label>
				<div class="col-sm-9">
					{{ $row->cap1 }}
				</div>
			</div>
			<div class="mb-3 row">
				<label for="cap10" class="col-sm-3 control-label"><strong>Cuti Aladan Penting >10 Hari</strong></label>
				<div class="col-sm-9">
					{{ $row->cap10 }}
				</div>
			</div>
			<div class="mb-3 row">
				<label for="cb1" class="col-sm-3 control-label"><strong>Cuti Besar Bulan Pertama</strong></label>
				<div class="col-sm-9">
					{{ $row->cb1 }}
				</div>
			</div>
			<div class="mb-3 row">
				<label for="cb2" class="col-sm-3 control-label"><strong>Cuti Besar Bulan Kedua</strong></label>
				<div class="col-sm-9">
					{{ $row->cb2 }}
				</div>
			</div>
			<div class="mb-3 row">
				<label for="cb3" class="col-sm-3 control-label"><strong>Cuti Besar Bulan Ketiga</strong></label>
				<div class="col-sm-9">
					{{ $row->cb3 }}
				</div>
			</div>
			<div class="mb-3 row">
				<label for="tk" class="col-sm-3 control-label"><strong>Total Kehadiran</strong></label>
				<div class="col-sm-9">
					{{ $row->tk }}
				</div>
			</div>
			<div class="mb-3 row">
				<label for="ptk" class="col-sm-3 control-label"><strong>Pengurangan Tunjangan Kinerja</strong></label>
				<div class="col-sm-9">
					{{ $row->ptk }}
				</div>
			</div>
			<!-- <div class="mb-3 row">
				<label for="kum" class="col-sm-3 control-label"><strong>Kum</strong></label>
				<div class="col-sm-9">
					{{ $row->kum }}
				</div>
			</div>
			<div class="mb-3 row">
				<label for="kut" class="col-sm-3 control-label"><strong>Kut</strong></label>
				<div class="col-sm-9">
					{{ $row->kut }}
				</div>
			</div> -->
			<div class="mb-3 row">
				<label for="status" class="col-sm-3 control-label"><strong>Status</strong></label>
				<div class="col-sm-9">
					{{ $row->status }}
				</div>
			</div>
			<div class="mb-3 row">
				<label for="alasan" class="col-sm-3 control-label"><strong>Alasan</strong></label>
				<div class="col-sm-9">
					{{ $row->alasan }}
				</div>
			</div>
			<!-- <div class="mb-3 row">
				<label for="created_at" class="col-sm-3 control-label"><strong>Created_at</strong></label>
				<div class="col-sm-9">
					{{ $row->created_at }}
				</div>
			</div> -->
			<!-- <div class="mb-3 row">
				<label for="updated_at" class="col-sm-3 control-label"><strong>Updated_at</strong></label>
				<div class="col-sm-9">
					{{ $row->updated_at }}
				</div>
			</div> -->
			<div class="mb-3 row">
				<div class="offset-sm-3 col-sm-9">
					<button type="button" class="btn btn-secondary" onclick="button_cancel()">Kembali</button>
				</div>
			</div>
			@endif
		</div>
	</div>
</div>
@endsection