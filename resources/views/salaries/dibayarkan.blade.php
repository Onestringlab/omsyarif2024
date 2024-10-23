@extends('layouts.app')

@section('title')
Slip Potongan
@endsection

@section('content')
<div class="container">
    <script>
        function button_cancel() {
            location.replace("{{ asset('/') }}dibayarkanlist");
        }
    </script>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ asset('/dibayarkanlist') }}">Slip Potongan</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                {{ $row->months->month }} {{ $row->months->year }}
            </li>
            </li>
        </ol>
    </nav>
    <div class="card border-success">
        <h5 class="card-header text-bg-success"> Slip Potongan {{ $row->months->month }}
            {{ $row->months->year }}
        </h5>
        <div class="card-body">
            <div class="mb-3 row">
                <label for="month_id" class="col-sm-3 control-label"><strong>Bulan </strong></label>
                <div class="col-sm-9">
                    {{ $row->months->month }} {{ $row->months->year }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nip" class="col-sm-3 control-label"><strong>NIP</strong></label>
                <div class="col-sm-9">
                    {{ $row->nip }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="name" class="col-sm-3 control-label"><strong>Nama</strong></label>
                <div class="col-sm-9">
                    {{ Auth::user()->name }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="gol" class="col-sm-3 control-label"><strong>Golongan</strong></label>
                <div class="col-sm-9">
                    {{ $row->gol }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="bersih" class="col-sm-3 control-label"><strong>Bersih</strong></label>
                <div class="col-sm-9">
                    {{ toCurrency($row->bersih) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="p1" class="col-sm-3 control-label"><strong>Simpanan Wajib Koperasi
                    </strong></label>
                <div class="col-sm-9">
                    {{ toCurrency($row->p1) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="p2" class="col-sm-3 control-label"><strong>Simpanan Sukarela Koperasi
                    </strong></label>
                <div class="col-sm-9">
                    {{ toCurrency($row->p2) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="p3" class="col-sm-3 control-label"><strong>Angsuran Koperasi
                    </strong></label>
                <div class="col-sm-9">
                    {{ toCurrency($row->p3) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="p4" class="col-sm-3 control-label"><strong>IKAHI</strong></label>
                <div class="col-sm-9">
                    {{ toCurrency($row->p4) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="p5" class="col-sm-3 control-label"><strong>IPASPI</strong></label>
                <div class="col-sm-9">
                    {{ toCurrency($row->p5) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="p6" class="col-sm-3 control-label"><strong>PTWP</strong></label>
                <div class="col-sm-9">
                    {{ toCurrency($row->p6) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="p7" class="col-sm-3 control-label"><strong>Iuran DYK
                    </strong></label>
                <div class="col-sm-9">
                    {{ toCurrency($row->p7) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="p8" class="col-sm-3 control-label"><strong>Arisan DYK
                    </strong></label>
                <div class="col-sm-9">
                    {{ toCurrency($row->p8) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="p9" class="col-sm-3 control-label"><strong>DYK Lainnya
                    </strong></label>
                <div class="col-sm-9">
                    {{ toCurrency($row->p9) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="p10" class="col-sm-3 control-label"><strong>Sumbangan A</strong></label>
                <div class="col-sm-9">
                    {{ toCurrency($row->p10) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="p11" class="col-sm-3 control-label"><strong>Sumbangan B</strong></label>
                <div class="col-sm-9">
                    {{ toCurrency($row->p11) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="p12" class="col-sm-3 control-label"><strong>Sumbangan C</strong></label>
                <div class="col-sm-9">
                    {{ toCurrency($row->p12) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="p13" class="col-sm-3 control-label"><strong>Potongan A
                    </strong></label>
                <div class="col-sm-9">
                    {{ toCurrency($row->p13) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="p14" class="col-sm-3 control-label"><strong>Potongan B
                    </strong></label>
                <div class="col-sm-9">
                    {{ toCurrency($row->p14) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="p15" class="col-sm-3 control-label"><strong>Potongan C
                    </strong></label>
                <div class="col-sm-9">
                    {{ toCurrency($row->p15) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="point" class="col-sm-3 control-label"><strong>Potongan Internal</strong></label>
                <div class="col-sm-9">
                    {{ toCurrency($row->point) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="bayar" class="col-sm-3 control-label"><strong>Bayar</strong></label>
                <div class="col-sm-9">
                    {{ toCurrency($row->bayar) }}
                </div>
            </div>
            <div class="offset-sm-2 col-sm-9">
                <button type="button" class="btn btn-secondary" onclick="button_cancel()">Kembali</button>
            </div>
        </div>
    </div>
</div>
@endsection