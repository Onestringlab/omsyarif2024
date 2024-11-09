@extends('layouts.app')

@section('title')
Slip Uang Transportasi
@endsection

@section('content')
<div class="container">
    <script>
        function button_cancel() {
            location.replace("{{ asset('/') }}kendaraanlist");
        }
    </script>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ asset('/kendaraanlist') }}">Slip Uang Transportasi</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                {{ $row->months->month }} {{ $row->months->year }}
            </li>
        </ol>
    </nav>
    <div class="card border-success">
        <h5 class="card-header text-bg-success"> Perhitungan Uang Transportasi {{ $row->months->month }} {{ $row->months->year }}
        </h5>
        <div class="card-body">
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
                    {{ toCurrency($row->standar_biaya) }}
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
                    {{ $row->total_kehadiran }} Hari
                </div>
            </div>
            <div class="mb-3 row">
                <label for="fasilitas_kendaraan_dinas" class="col-sm-3 control-label">Fasilitas Kendaraan Dinas</label>
                <div class="col-sm-9">
                    {{ $row->fasilitas_kendaraan_dinas }} Hari
                </div>
            </div>
            <div class="mb-3 row">
                <label for="fasilitas_uang_transportasi" class="col-sm-3 control-label">Fasilitas Uang Transportasi</label>
                <div class="col-sm-9">
                    {{ $row->fasilitas_uang_transportasi }} Hari
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jumlah_diterima" class="col-sm-3 control-label">Jumlah Diterima</label>
                <div class="col-sm-9">
                    {{ toCurrency($row->jumlah_diterima) }}
                </div>
            </div>
            <div class="offset-sm-3 col-sm-9">
                <button type="button" class="btn btn-secondary" onclick="button_cancel()">Kembali</button>
            </div>
        </div>
    </div>
</div>
@endsection