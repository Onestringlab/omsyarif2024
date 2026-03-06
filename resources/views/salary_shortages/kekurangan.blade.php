@extends('layouts.app')

@section('title')
Slip Kekurangan Gaji
@endsection

@section('content')
<div class="container">
    <script>
        function button_cancel() {
            location.replace("{{ asset('/') }}kekuranganlist");
        }
    </script>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ asset('/kekuranganlist') }}">Slip Kekurangan Gaji</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                {{ $row->months->month }} {{ $row->months->year }}
            </li>
        </ol>
    </nav>
    <div class="card border-success">
        <h5 class="card-header text-bg-success">Perhitungan Kekurangan Gaji
            {{ $row->months->month }} {{ $row->months->year }}
        </h5>
        <div class="card-body">

            <div class="mb-3 row">
                <label class="col-sm-2 control-label"><strong>NIP</strong></label>
                <div class="col-sm-10">
                    {{ $row->nip }}
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-2 control-label"><strong>Nama</strong></label>
                <div class="col-sm-10">
                    {{ $row->nmpeg }}
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-2 control-label"><strong>Gaji Pokok</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->gjpokok) }}
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-2 control-label"><strong>Tunjangan Istri</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->tjistri) }}
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-2 control-label"><strong>Tunjangan Anak</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->tjanak) }}
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-2 control-label"><strong>Tunjangan UPNS</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->tjupns) }}
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-2 control-label"><strong>Tunjangan Struktural</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->tjstruk) }}
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-2 control-label"><strong>Tunjangan Fungsional</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->tjfungs) }}
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-2 control-label"><strong>Tunjangan Daerah</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->tjdaerah) }}
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-2 control-label"><strong>Tunjangan Terpencil</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->tjpencil) }}
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-2 control-label"><strong>Tunjangan Lain</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->tjlain) }}
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-2 control-label"><strong>Tunjangan Kompen</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->tjkompen) }}
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-2 control-label"><strong>Pembulatan</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->pembul) }}
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-2 control-label"><strong>Tunjangan Beras</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->tjberas) }}
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-2 control-label"><strong>Tunjangan PPH</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->tjpph) }}
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-2 control-label"><strong>Total Tunjangan</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->tottun) }}
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-2 control-label"><strong>Gaji Kotor</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->kotor) }}
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-2 control-label"><strong>potpfkbul</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->potpfkbul) }}
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-2 control-label"><strong>potpfk2</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->potpfk2) }}
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-2 control-label"><strong>potpfk10</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->potpfk10) }}
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-2 control-label"><strong>potpph</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->potpph) }}
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-2 control-label"><strong>potswrum</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->potswrum) }}
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-2 control-label"><strong>bpjs</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->bpjs) }}
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-2 control-label"><strong>bpjs2</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->bpjs2) }}
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-2 control-label"><strong>Total Potongan</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->totpot) }}
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-2 control-label"><strong>Jumlah Bersih</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->bersih) }}
                </div>
            </div>

            <div class="mb-3 row">
                <label class="col-sm-2 control-label"><strong>Keterangan</strong></label>
                <div class="col-sm-10">
                    {{ $row->keterangan }}
                </div>
            </div>

            <div class="mb-3 row">
                <div class="offset-sm-2 col-sm-9">
                    <button type="button" class="btn btn-secondary" onclick="button_cancel()">Kembali</button>
                </div>
            </div>
        </div>
    </div>
    @endsection