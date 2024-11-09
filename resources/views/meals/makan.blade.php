@extends('layouts.app')

@section('title')
Slip Uang Makan
@endsection

@section('content')
<div class="container">
    <script>
        function button_cancel() {
            location.replace("{{ asset('/') }}makanlist");
        }
    </script>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ asset('/makanlist') }}">Slip Uang Makan</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                {{ $row->months->month }} {{ $row->months->year }}
            </li>
        </ol>
    </nav>
    <div class="card border-success">
        <h5 class="card-header text-bg-success">Perhitungan Uang Makan
            {{ $row->months->month }} {{ $row->months->year }}
        </h5>
        <div class="card-body">
            <div class="mb-3 row">
                <label for="nip" class="col-sm-2 control-label"><strong>NIP</strong></label>
                <div class="col-sm-10">
                    {{ $row->nip }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nmpeg" class="col-sm-2 control-label"><strong>Nama Pegawai</strong></label>
                <div class="col-sm-10">
                    {{ $row->nmpeg }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="kdgol" class="col-sm-2 control-label"><strong>Kode Golongan</strong></label>
                <div class="col-sm-10">
                    {{ $row->kdgol }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jmlhari" class="col-sm-2 control-label"><strong>Jumlah Hari</strong></label>
                <div class="col-sm-10">
                    {{ $row->jmlhari }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tarif" class="col-sm-2 control-label"><strong>Tarif</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->tarif) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="pph" class="col-sm-2 control-label"><strong>Pph</strong></label>
                <div class="col-sm-10">
                    {{ $row->pph }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="kotor" class="col-sm-2 control-label"><strong>Kotor</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->kotor) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="potongan" class="col-sm-2 control-label"><strong>Potongan</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->potongan) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="makan" class="col-sm-2 control-label"><strong>Bersih</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->bersih) }}
                </div>
            </div>
            <div class="offset-sm-2 col-sm-9">
                <button type="button" class="btn btn-secondary" onclick="button_cancel()">Kembali</button>
            </div>
        </div>
    </div>
</div>
@endsection