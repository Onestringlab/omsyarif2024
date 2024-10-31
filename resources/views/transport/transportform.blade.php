@extends('layouts.app')

@section('title')
Data Transport 
@endsection

@section('content')
<div class="container">
    <script>
        function button_cancel() {
            location.replace("{{ asset('/') }}transport/data/{{ $month_id }}");
        }
    </script>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ asset('/months') }}">Data</a></li>
            <li class="breadcrumb-item"><a href="{{ asset('/') }}transport/data/{{ $month_id }}">Uang Transport</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ ucfirst($action) }}</li>
        </ol>
    </nav>
    <div class="card">
        <h5 class="card-header text-bg-success"> Data Uang Transportasi</h5>
        <div class="card-body">
            @if($action == 'insert')
            <form class="form-horizontal" action="{{ asset('/') }}transport" method="post">
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="nama" value="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nip_nik" class="col-sm-3 col-form-label">NIP/NIK</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="nip_nik" value="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="pangkat_gol" class="col-sm-3 col-form-label">Pangkat/Gol.</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="pangkat_gol" value="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="jabatan" value="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="standar_biaya" class="col-sm-3 col-form-label">Standar Biaya</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="standar_biaya" value="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="satker" class="col-sm-3 col-form-label">Satuan Kerja</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="satker" value="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="total_kehadiran" class="col-sm-3 col-form-label">Total Kehadiran</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="total_kehadiran" value="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="fasilitas_kendaraan_dinas" class="col-sm-3 col-form-label">Fasilitas Kendaraan Dinas</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="fasilitas_kendaraan_dinas" value="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="fasilitas_uang_transportasi" class="col-sm-3 col-form-label">Fasilitas Uang Transportasi</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="fasilitas_uang_transportasi" value="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jumlah_diterima" class="col-sm-3 col-form-label">Jumlah Diterima</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="jumlah_diterima" value="">
                    </div>
                </div>
                <div class="mb-3">
                    <div class="offset-sm-3 col-sm-10">
                        <input type="hidden" name="action" value="{{ $action }}">
                        <input type="hidden" name="month_id" value="{{ $month_id }}">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <button type="button" class="btn btn-secondary" onclick="button_cancel()">Kembali</button>
                    </div>
                </div>
                {{ csrf_field() }}
            </form>
            @elseif($action == 'update')
            <form class="form-horizontal" action="{{ asset('/') }}transport/{{ $row->id }}" method="post">
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="nama" value="{{ $row->nama }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nip_nik" class="col-sm-3 col-form-label">NIP/NIK</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="nip_nik" value="{{ $row->nip_nik }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="pangkat_gol" class="col-sm-3 col-form-label">Pangkat/Gol.</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="pangkat_gol" value="{{ $row->pangkat_gol }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="jabatan" value="{{ $row->jabatan }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="standar_biaya" class="col-sm-3 col-form-label">Standar Biaya</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="standar_biaya" value="{{ $row->standar_biaya }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="satker" class="col-sm-3 col-form-label">Satuan Kerja</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="satker" value="{{ $row->satker }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="total_kehadiran" class="col-sm-3 col-form-label">Total Kehadiran</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="total_kehadiran" value="{{ $row->total_kehadiran }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="fasilitas_kendaraan_dinas" class="col-sm-3 col-form-label">Fasilitas Kendaraan Dinas</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="fasilitas_kendaraan_dinas" value="{{ $row->fasilitas_kendaraan_dinas }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="fasilitas_uang_transportasi" class="col-sm-3 col-form-label">Fasilitas Uang Transportasi</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="fasilitas_uang_transportasi" value="{{ $row->fasilitas_uang_transportasi }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jumlah_diterima" class="col-sm-3 col-form-label">Jumlah Diterima</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="jumlah_diterima" value="{{ $row->jumlah_diterima }}">
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
            <form class="form-horizontal" action="{{ asset('/') }}transport/{{ $row->id }}" method="post">
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-3 control-label">Nama</label>
                    <div class="col-sm-9">
                        {{ $row->nama }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nip_nik" class="col-sm-3 control-label">NIP/NIK</label>
                    <div class="col-sm-9">
                        {{ $row->nip_nik }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="pangkat_gol" class="col-sm-3 control-label">Pangkat/Gol.</label>
                    <div class="col-sm-9">
                        {{ $row->pangkat_gol }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jabatan" class="col-sm-3 control-label">Jabatan</label>
                    <div class="col-sm-9">
                        {{ $row->jabatan }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="standar_biaya" class="col-sm-3 control-label">Standar Biaya</label>
                    <div class="col-sm-9">
                        {{ $row->standar_biaya }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="satker" class="col-sm-3 control-label">Satuan Kerja</label>
                    <div class="col-sm-9">
                        {{ $row->satker }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="total_kehadiran" class="col-sm-3 control-label">Total Kehadiran</label>
                    <div class="col-sm-9">
                        {{ $row->total_kehadiran }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="fasilitas_kendaraan_dinas" class="col-sm-3 control-label">Fasilitas Kendaraan Dinas</label>
                    <div class="col-sm-9">
                        {{ $row->fasilitas_kendaraan_dinas }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="fasilitas_uang_transportasi" class="col-sm-3 control-label">Fasilitas Uang Transportasi</label>
                    <div class="col-sm-9">
                        {{ $row->fasilitas_uang_transportasi }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jumlah_diterima" class="col-sm-3 control-label">Jumlah Diterima</label>
                    <div class="col-sm-9">
                        {{ $row->jumlah_diterima }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="offset-sm-3 col-sm-9">
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
                <label for="nama" class="col-sm-3 control-label">Nama</label>
                <div class="col-sm-9">
                    {{ $row->nama }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nip_nik" class="col-sm-3 control-label">NIP/NIK</label>
                <div class="col-sm-9">
                    {{ $row->nip_nik }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="pangkat_gol" class="col-sm-3 control-label">Pangkat/Gol.</label>
                <div class="col-sm-9">
                    {{ $row->pangkat_gol }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jabatan" class="col-sm-3 control-label">Jabatan</label>
                <div class="col-sm-9">
                    {{ $row->jabatan }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="standar_biaya" class="col-sm-3 control-label">Standar Biaya</label>
                <div class="col-sm-9">
                    {{ $row->standar_biaya }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="satker" class="col-sm-3 control-label">Satuan Kerja</label>
                <div class="col-sm-9">
                    {{ $row->satker }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="total_kehadiran" class="col-sm-3 control-label">Total Kehadiran</label>
                <div class="col-sm-9">
                    {{ $row->total_kehadiran }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="fasilitas_kendaraan_dinas" class="col-sm-3 control-label">Fasilitas Kendaraan Dinas</label>
                <div class="col-sm-9">
                    {{ $row->fasilitas_kendaraan_dinas }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="fasilitas_uang_transportasi" class="col-sm-3 control-label">Fasilitas Uang Transportasi</label>
                <div class="col-sm-9">
                    {{ $row->fasilitas_uang_transportasi }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jumlah_diterima" class="col-sm-3 control-label">Jumlah Diterima</label>
                <div class="col-sm-9">
                    {{ $row->jumlah_diterima }}
                </div>
            </div>
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