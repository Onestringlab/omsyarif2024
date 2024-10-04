@extends('layouts.app')

@section('title')
Data Potongan
@endsection

@section('content')
<script>
    function button_cancel() {
        location.replace("{{ asset('/') }}potongans/data/{{ $month_id }}");
    }

</script>
<div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ asset('/months') }}">Data</a></li>
            <li class="breadcrumb-item"><a href="{{ asset('/') }}potongans/data/{{ $month_id }}">Potongan</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ ucfirst($action) }}</li>
        </ol>
    </nav>
    <div class="card border-success">
        <h5 class="card-header text-bg-success"> Data Potongan</h5>
        <div class="card-body">
            @if($action == 'insert')
                <form class="form-horizontal" action="{{ asset('/') }}potongans" method="post">
                    <div class="mb-3 row">
                        <label for="nip" class="col-sm-2 col-form-label"><strong>NIP</strong></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="nip" value="" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-2 col-form-label"><strong>Nama</strong></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="nama" value="" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p1" class="col-sm-2 col-form-label"><strong>{{ $nkt->p1}}</strong></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="p1" value="0">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p2" class="col-sm-2 col-form-label"><strong>{{ $nkt->p2 }}</strong></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="p2" value="0">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p3" class="col-sm-2 col-form-label"><strong>{{ $nkt->p3 }}</strong></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="p3" value="0">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p4" class="col-sm-2 col-form-label"><strong>{{ $nkt->p4 }}</strong></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="p4" value="0">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p5" class="col-sm-2 col-form-label"><strong>{{ $nkt->p5 }}</strong></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="p5" value="0">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p6" class="col-sm-2 col-form-label"><strong>{{ $nkt->p6 }}</strong></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="p6" value="0">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p7" class="col-sm-2 col-form-label"><strong>{{ $nkt->p7 }}</strong></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="p7" value="0">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p8" class="col-sm-2 col-form-label"><strong>{{ $nkt->p8 }}</strong></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="p8" value="0">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p9" class="col-sm-2 col-form-label"><strong>{{ $nkt->p9 }}</strong></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="p9" value="0">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p10" class="col-sm-2 col-form-label"><strong>{{ $nkt->p10 }}</strong></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="p10" value="0">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p11" class="col-sm-2 col-form-label"><strong>{{ $nkt->p11 }}</strong></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="p11" value="0">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p12" class="col-sm-2 col-form-label"><strong>{{ $nkt->p12 }}</strong></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="p12" value="0">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p13" class="col-sm-2 col-form-label"><strong>{{ $nkt->p13 }}</strong></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="p13" value="0">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p14" class="col-sm-2 col-form-label"><strong>{{ $nkt->p14 }}</strong></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="p14" value="0">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p15" class="col-sm-2 col-form-label"><strong>{{ $nkt->p15 }}</strong></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="p15" value="0">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="point" class="col-sm-2 col-form-label"><strong>Jumlah</strong></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="jumlah" value="0">
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
                <form class="form-horizontal" action="{{ asset('/') }}potongans/{{ $row->id }}"
                    method="post">
                    <div class="mb-3 row">
                        <label for="nip" class="col-sm-2 col-form-label"><strong>NIP</strong></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="nip" value="{{ $row->nip }}" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-2 col-form-label"><strong>Nama</strong></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="nama" value="{{ $row->nama }}" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p1" class="col-sm-2 col-form-label"><strong>{{ $nkt->p1 }}</strong></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="p1" value="{{ $row->p1 }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p2" class="col-sm-2 col-form-label"><strong>{{ $nkt->p2 }}</strong></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="p2" value="{{ $row->p2 }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p3" class="col-sm-2 col-form-label"><strong>{{ $nkt->p3 }}</strong></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="p3" value="{{ $row->p3 }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p4" class="col-sm-2 col-form-label"><strong>{{ $nkt->p4 }}</strong></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="p4" value="{{ $row->p4 }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p5" class="col-sm-2 col-form-label"><strong>{{ $nkt->p5 }}</strong></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="p5" value="{{ $row->p5 }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p6" class="col-sm-2 col-form-label"><strong>{{ $nkt->p6 }}</strong></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="p6" value="{{ $row->p6 }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p7" class="col-sm-2 col-form-label"><strong>{{ $nkt->p7 }}</strong></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="p7" value="{{ $row->p7 }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p8" class="col-sm-2 col-form-label"><strong>{{ $nkt->p8 }}</strong></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="p8" value="{{ $row->p8 }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p9" class="col-sm-2 col-form-label"><strong>{{ $nkt->p9 }}</strong></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="p9" value="{{ $row->p9 }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p10" class="col-sm-2 col-form-label"><strong>{{ $nkt->p10 }}</strong></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="p10" value="{{ $row->p10 }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p11" class="col-sm-2 col-form-label"><strong>{{ $nkt->p11 }}</strong></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="p11" value="{{ $row->p11 }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p12" class="col-sm-2 col-form-label"><strong>{{ $nkt->p12 }}</strong></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="p12" value="{{ $row->p12 }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p13" class="col-sm-2 col-form-label"><strong>{{ $nkt->p13 }}</strong></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="p13" value="{{ $row->p13 }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p14" class="col-sm-2 col-form-label"><strong>{{ $nkt->p14 }}</strong></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="p14" value="{{ $row->p14 }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p15" class="col-sm-2 col-form-label"><strong>{{ $nkt->p15 }}</strong></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="p15" value="{{ $row->p15 }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jumlah" class="col-sm-2 col-form-label"><strong>Jumlah</strong></label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="jumlah" value="{{ $row->jumlah }}">
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
                <form class="form-horizontal" action="{{ asset('/') }}potongans/{{ $row->id }}"
                    method="post">
                    <div class="mb-3 row">
                        <label for="month_id" class="col-sm-2 control-label"><strong>Bulan</strong></label>
                        <div class="col-sm-10">
                            {{ $row->months->month }} - {{ $row->months->year }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nip" class="col-sm-2 control-label"><strong>NIP</strong></label>
                        <div class="col-sm-10">
                            {{ $row->nip }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-2 control-label"><strong>Nama</strong></label>
                        <div class="col-sm-10">
                            {{ $row->nama }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p1" class="col-sm-2 control-label"><strong>{{ $nkt->p1}}</strong></label>
                        <div class="col-sm-10">
                            {{ toCurrency($row->p1) }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p2" class="col-sm-2 control-label"><strong>{{ $nkt->p2 }}</strong></label>
                        <div class="col-sm-10">
                            {{ toCurrency($row->p2) }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p3" class="col-sm-2 control-label"><strong>{{ $nkt->p3 }}</strong></label>
                        <div class="col-sm-10">
                            {{ toCurrency($row->p3) }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p4" class="col-sm-2 control-label"><strong>{{ $nkt->p4 }}</strong></label>
                        <div class="col-sm-10">
                            {{ toCurrency($row->p4) }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p5" class="col-sm-2 control-label"><strong>{{ $nkt->p5 }}</strong></label>
                        <div class="col-sm-10">
                            {{ toCurrency($row->p5) }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p6" class="col-sm-2 control-label"><strong>{{ $nkt->p6 }}</strong></label>
                        <div class="col-sm-10">
                            {{ toCurrency($row->p6) }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p7" class="col-sm-2 control-label"><strong>{{ $nkt->p7 }}</strong></label>
                        <div class="col-sm-10">
                            {{ toCurrency($row->p7) }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p8" class="col-sm-2 control-label"><strong>{{ $nkt->p8 }}</strong></label>
                        <div class="col-sm-10">
                            {{ toCurrency($row->p8) }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p9" class="col-sm-2 control-label"><strong>{{ $nkt->p9 }}</strong></label>
                        <div class="col-sm-10">
                            {{ toCurrency($row->p9) }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p10" class="col-sm-2 control-label"><strong>{{ $nkt->p10 }}</strong></label>
                        <div class="col-sm-10">
                            {{ toCurrency($row->p10) }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p11" class="col-sm-2 control-label"><strong>{{ $nkt->p11 }}</strong></label>
                        <div class="col-sm-10">
                            {{ toCurrency($row->p11) }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p12" class="col-sm-2 control-label"><strong>{{ $nkt->p12 }}</strong></label>
                        <div class="col-sm-10">
                            {{ toCurrency($row->p12) }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p13" class="col-sm-2 control-label"><strong>{{ $nkt->p13 }}</strong></label>
                        <div class="col-sm-10">
                            {{ toCurrency($row->p13) }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p14" class="col-sm-2 control-label"><strong>{{ $nkt->p14 }}</strong></label>
                        <div class="col-sm-10">
                            {{ toCurrency($row->p14) }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="p15" class="col-sm-2 control-label"><strong>{{ $nkt->p15 }}</strong></label>
                        <div class="col-sm-10">
                            {{ toCurrency($row->p15) }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="point" class="col-sm-2 control-label"><strong>Jumlah</strong></label>
                        <div class="col-sm-10">
                            {{ toCurrency($row->jumlah) }}
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
                    <label for="month_id" class="col-sm-2 control-label"><strong>Bulan</strong></label>
                    <div class="col-sm-10">
                        {{ $row->months->month }} {{ $row->months->year }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nip" class="col-sm-2 control-label"><strong>NIP</strong></label>
                    <div class="col-sm-10">
                        {{ $row->nip }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="name" class="col-sm-2 control-label"><strong>Nama</strong></label>
                    <div class="col-sm-10">
                        {{ $row->nama }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p1" class="col-sm-2 control-label"><strong>{{ $nkt->p1}}</strong></label>
                    <div class="col-sm-10">
                        {{ toCurrency($row->p1) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p2" class="col-sm-2 control-label"><strong>{{ $nkt->p2 }}</strong></label>
                    <div class="col-sm-10">
                        {{ toCurrency($row->p2) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p3" class="col-sm-2 control-label"><strong>{{ $nkt->p3 }}</strong></label>
                    <div class="col-sm-10">
                        {{ toCurrency($row->p3) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p4" class="col-sm-2 control-label"><strong>{{ $nkt->p4 }}</strong></label>
                    <div class="col-sm-10">
                        {{ toCurrency($row->p4) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p5" class="col-sm-2 control-label"><strong>{{ $nkt->p5 }}</strong></label>
                    <div class="col-sm-10">
                        {{ toCurrency($row->p5) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p6" class="col-sm-2 control-label"><strong>{{ $nkt->p6 }}</strong></label>
                    <div class="col-sm-10">
                        {{ toCurrency($row->p6) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p7" class="col-sm-2 control-label"><strong>{{ $nkt->p7 }}</strong></label>
                    <div class="col-sm-10">
                        {{ toCurrency($row->p7) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p8" class="col-sm-2 control-label"><strong>{{ $nkt->p8 }}</strong></label>
                    <div class="col-sm-10">
                        {{ toCurrency($row->p8) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p9" class="col-sm-2 control-label"><strong>{{ $nkt->p9 }}</strong></label>
                    <div class="col-sm-10">
                        {{ toCurrency($row->p9) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p10" class="col-sm-2 control-label"><strong>{{ $nkt->p10 }}</strong></label>
                    <div class="col-sm-10">
                        {{ toCurrency($row->p10) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p11" class="col-sm-2 control-label"><strong>{{ $nkt->p11 }}</strong></label>
                    <div class="col-sm-10">
                        {{ toCurrency($row->p11) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p12" class="col-sm-2 control-label"><strong>{{ $nkt->p12 }}</strong></label>
                    <div class="col-sm-10">
                        {{ toCurrency($row->p12) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p13" class="col-sm-2 control-label"><strong>{{ $nkt->p13 }}</strong></label>
                    <div class="col-sm-10">
                        {{ toCurrency($row->p13) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p14" class="col-sm-2 control-label"><strong>{{ $nkt->p14 }}</strong></label>
                    <div class="col-sm-10">
                        {{ toCurrency($row->p14) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p15" class="col-sm-2 control-label"><strong>{{ $nkt->p15 }}</strong></label>
                    <div class="col-sm-10">
                        {{ toCurrency($row->p15) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="bayar" class="col-sm-2 control-label"><strong>Jumlah</strong></label>
                    <div class="col-sm-10">
                        {{ toCurrency($row->jumlah) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="offset-sm-2 col-sm-10">
                        <button type="button" class="btn btn-secondary" onclick="button_cancel()">Back</button>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
