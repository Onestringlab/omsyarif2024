@extends('layouts.app')

@section('title')
Slip Potongan
@endsection

@section('content')
<div class="container">
    <script>
        function button_cancel() {
            location.replace("{{ asset('/') }}potongansslip");
        }
    </script>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ asset('/potongansslip') }}">Slip Potongan</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                {{ $row->months->month }} {{ $row->months->year }}
            </li>
            </li>
        </ol>
    </nav>
    <div class="card border-success">
        <h5 class="card-header text-bg-success"> Perhitungan Potongan {{ $row->months->month }}
            {{ $row->months->year }}
        </h5>
        <div class="card-body">
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
                <label for="p1" class="col-sm-3 control-label"><strong>{{ $nkt->p1 }}
                    </strong></label>
                <div class="col-sm-9">
                    {{ toCurrency($row->p1) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="p2" class="col-sm-3 control-label"><strong>{{ $nkt->p2 }}
                    </strong></label>
                <div class="col-sm-9">
                    {{ toCurrency($row->p2) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="p3" class="col-sm-3 control-label"><strong>{{ $nkt->p3 }}
                    </strong></label>
                <div class="col-sm-9">
                    {{ toCurrency($row->p3) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="p4" class="col-sm-3 control-label"><strong>{{ $nkt->p4 }}</strong></label>
                <div class="col-sm-9">
                    {{ toCurrency($row->p4) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="p5" class="col-sm-3 control-label"><strong>{{ $nkt->p5 }}</strong></label>
                <div class="col-sm-9">
                    {{ toCurrency($row->p5) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="p6" class="col-sm-3 control-label"><strong>{{ $nkt->p6 }}</strong></label>
                <div class="col-sm-9">
                    {{ toCurrency($row->p6) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="p7" class="col-sm-3 control-label"><strong>{{ $nkt->p7 }}
                    </strong></label>
                <div class="col-sm-9">
                    {{ toCurrency($row->p7) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="p8" class="col-sm-3 control-label"><strong>{{ $nkt->p8 }}
                    </strong></label>
                <div class="col-sm-9">
                    {{ toCurrency($row->p8) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="p9" class="col-sm-3 control-label"><strong>{{ $nkt->p9 }}
                    </strong></label>
                <div class="col-sm-9">
                    {{ toCurrency($row->p9) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="p10" class="col-sm-3 control-label"><strong>{{ $nkt->p10 }}</strong></label>
                <div class="col-sm-9">
                    {{ toCurrency($row->p10) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="p11" class="col-sm-3 control-label"><strong>{{ $nkt->p11 }}</strong></label>
                <div class="col-sm-9">
                    {{ toCurrency($row->p11) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="p12" class="col-sm-3 control-label"><strong>{{ $nkt->p12 }}</strong></label>
                <div class="col-sm-9">
                    {{ toCurrency($row->p12) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="p13" class="col-sm-3 control-label"><strong>{{ $nkt->p13 }}
                    </strong></label>
                <div class="col-sm-9">
                    {{ toCurrency($row->p13) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="p14" class="col-sm-3 control-label"><strong>{{ $nkt->p14 }}
                    </strong></label>
                <div class="col-sm-9">
                    {{ toCurrency($row->p14) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="p15" class="col-sm-3 control-label"><strong>{{ $nkt->p15 }}
                    </strong></label>
                <div class="col-sm-9">
                    {{ toCurrency($row->p15) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="point" class="col-sm-3 control-label"><strong>Jumlah</strong></label>
                <div class="col-sm-9">
                    {{ toCurrency($row->jumlah) }}
                </div>
            </div>
            <div class="offset-sm-2 col-sm-9">
                <button type="button" class="btn btn-secondary" onclick="button_cancel()">Kembali</button>
            </div>
        </div>
    </div>
</div>
@endsection