@extends('layouts.app')

@section('title')
Data Gaji Dibayarkan
@endsection

@section('content')
<script>
  function button_cancel() {
    location.replace("{{ asset('/') }}salaries/data/{{ $month_id }}");
  }
</script>
<div class="container">
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ asset('/months') }}">Data</a></li>
      <li class="breadcrumb-item"><a href="{{asset('/')}}salaries/data/{{ $month_id }}">Gaji Dibayarkan</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ ucfirst($action) }}</li>
    </ol>
  </nav>
  <div class="card border-success">
    <h5 class="card-header text-bg-success"> Data Slip Gaji</h5>
    <div class="card-body">
      @if($action == 'insert')
      <form class="form-horizontal" action="{{ asset('/') }}salaries" method="post">
        <!-- <div class="mb-3 row">
          <label for="id" class="col-sm-2 col-form-label"><strong>Id</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="id" value="">
          </div>
        </div> -->
        <!-- <div class="mb-3 row">
          <label for="month_id" class="col-sm-2 col-form-label"><strong>Bulan</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="month_id" value="">
          </div>
        </div> -->
        <div class="mb-3 row">
          <label for="nip" class="col-sm-2 col-form-label"><strong>NIP</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="nip" value="">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="name" class="col-sm-2 col-form-label"><strong>Nama</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="name" value="">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="gol" class="col-sm-2 col-form-label"><strong>Golongan</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="gol" value="">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="rekening" class="col-sm-2 col-form-label"><strong>No. Rekening</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="rekening" value="">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="bank" class="col-sm-2 col-form-label"><strong>Bank</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="bank" value="">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="bersih" class="col-sm-2 col-form-label"><strong>Bersih</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="bersih" value="">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p1" class="col-sm-2 col-form-label"><strong>Koperasi</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="p1" value="0">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p2" class="col-sm-2 col-form-label"><strong>IKAHI</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="p2" value="0">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p3" class="col-sm-2 col-form-label"><strong>PTWP</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="p3" value="0">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p4" class="col-sm-2 col-form-label"><strong>YDSH</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="p4" value="0">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p5" class="col-sm-2 col-form-label"><strong>Sumbangan Honorer</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="p5" value="0">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p6" class="col-sm-2 col-form-label"><strong>IPASPI</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="p6" value="0">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p7" class="col-sm-2 col-form-label"><strong>DYK</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="p7" value="0">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p8" class="col-sm-2 col-form-label"><strong>Senam</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="p8" value="0">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p9" class="col-sm-2 col-form-label"><strong>BRI</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="p9" value="0">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p10" class="col-sm-2 col-form-label"><strong>BDBS</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="p10" value="0">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p11" class="col-sm-2 col-form-label"><strong>Bank Kalbar Syariah</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="p11" value="0">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p12" class="col-sm-2 col-form-label"><strong>Dana Sosial Hakim</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="p12" value="0">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p13" class="col-sm-2 col-form-label"><strong>DYK Cabang</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="p13" value="0">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p14" class="col-sm-2 col-form-label"><strong>Arisan DYK Tahunan</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="p14" value="0">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p15" class="col-sm-2 col-form-label"><strong>Mushola</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="p15" value="0">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="point" class="col-sm-2 col-form-label"><strong>Point</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="point" value="0">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="Bayar" class="col-sm-2 col-form-label"><strong>Bayar</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="bayar" value="0">
          </div>
        </div>
        <!-- <div class="mb-3 row">
          <label for="created_at" class="col-sm-2 col-form-label"><strong>Created_at</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="created_at" value="">
          </div>
        </div> -->
        <!-- <div class="mb-3 row">
          <label for="updated_at" class="col-sm-2 col-form-label"><strong>Updated_at</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="updated_at" value="">
          </div>
        </div> -->
        <div class="mb-3">
          <div class="offset-sm-2 col-sm-10">
            <input type="hidden" name="action" value="{{ $action }}">
            <input type="hidden" name="month_id" value="{{ $month_id }}">
            <button type="submit" class="btn btn-primary">Insert</button>
            <button type="button" class="btn btn-secondary" onclick="button_cancel()">Cancel</button>
          </div>
        </div>
        {{ csrf_field() }}
      </form>
      @elseif($action == 'update')
      <form class="form-horizontal" action="{{ asset('/') }}salaries/{{ $row->id }}" method="post">
        <!-- <div class="mb-3 row">
          <label for="id" class="col-sm-2 col-form-label"><strong>Id</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="id" value="{{ $row->id }}">
          </div>
        </div> -->
        <!-- <div class="mb-3 row">
          <label for="month_id" class="col-sm-2 col-form-label"><strong>Bulan</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="month_id" value="{{ $row->month_id }}">
          </div>
        </div> -->
        <div class="mb-3 row">
          <label for="nip" class="col-sm-2 col-form-label"><strong>NIP</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="nip" value="{{ $row->nip }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="name" class="col-sm-2 col-form-label"><strong>Name</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="name" value="{{ $row->name }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="gol" class="col-sm-2 col-form-label"><strong>Golongan</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="gol" value="{{ $row->gol }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="rekening" class="col-sm-2 col-form-label"><strong>No. Rekening</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="rekening" value="{{ $row->rekening }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="bank" class="col-sm-2 col-form-label"><strong>Bank</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="bank" value="{{ $row->bank }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="bersih" class="col-sm-2 col-form-label"><strong>Bersih</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="bersih" value="{{ $row->bersih }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p1" class="col-sm-2 col-form-label"><strong>Koperasi</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="p1" value="{{ $row->p1 }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p2" class="col-sm-2 col-form-label"><strong>IKAHI</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="p2" value="{{ $row->p2 }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p3" class="col-sm-2 col-form-label"><strong>PTWP</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="p3" value="{{ $row->p3 }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p4" class="col-sm-2 col-form-label"><strong>YDSH</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="p4" value="{{ $row->p4 }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p5" class="col-sm-2 col-form-label"><strong>Sumbangan Honorer</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="p5" value="{{ $row->p5 }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p6" class="col-sm-2 col-form-label"><strong>IPASPI</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="p6" value="{{ $row->p6 }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p7" class="col-sm-2 col-form-label"><strong>DYK</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="p7" value="{{ $row->p7 }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p8" class="col-sm-2 col-form-label"><strong>Senam</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="p8" value="{{ $row->p8 }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p9" class="col-sm-2 col-form-label"><strong>BRI</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="p9" value="{{ $row->p9 }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p10" class="col-sm-2 col-form-label"><strong>BDBS</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="p10" value="{{ $row->p10 }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p11" class="col-sm-2 col-form-label"><strong>Bank Kalbar Syariah</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="p11" value="{{ $row->p11 }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p12" class="col-sm-2 col-form-label"><strong>Dana Sosial Hakim</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="p12" value="{{ $row->p12 }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p13" class="col-sm-2 col-form-label"><strong>DYK Cabang</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="p13" value="{{ $row->p13 }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p14" class="col-sm-2 col-form-label"><strong>Arisan DYK Tahunan</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="p14" value="{{ $row->p14 }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p15" class="col-sm-2 col-form-label"><strong>Mushola</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="p15" value="{{ $row->p15 }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="point" class="col-sm-2 col-form-label"><strong>Potongan Internal</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="point" value="{{ $row->point }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="bayar" class="col-sm-2 col-form-label"><strong>Bayar</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="bayar" value="{{ $row->bayar }}">
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
            <input type="hidden" name="month_id" value="{{ $month_id }}">
            <button type="submit" class="btn btn-warning">Update</button>
            <button type="button" class="btn btn-secondary" onclick="button_cancel()">Cancel</button>
          </div>
        </div>
        {{ csrf_field() }}
      </form>
      @elseif($action == 'delete')
      <form class="form-horizontal" action="{{ asset('/') }}salaries/{{ $row->id }}" method="post">
        <!-- <div class="mb-3 row">
          <label for="id" class="col-sm-2 control-label"><strong>Id</strong></label>
          <div class="col-sm-10">
            {{ $row->id }}
          </div>
        </div> -->
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
          <label for="name" class="col-sm-2 control-label"><strong>Name</strong></label>
          <div class="col-sm-10">
            {{ $row->name }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="gol" class="col-sm-2 control-label"><strong>Golongan</strong></label>
          <div class="col-sm-10">
            {{ $row->gol }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="rekening" class="col-sm-2 control-label"><strong>No. Rekening</strong></label>
          <div class="col-sm-10">
            {{ $row->rekening }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="bank" class="col-sm-2 control-label"><strong>Bank</strong></label>
          <div class="col-sm-10">
            {{ $row->bank }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="bersih" class="col-sm-2 control-label"><strong>Bersih</strong></label>
          <div class="col-sm-10">
            {{ toCurrency($row->bersih) }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p1" class="col-sm-2 control-label"><strong>Koperasi</strong></label>
          <div class="col-sm-10">
            {{ toCurrency($row->p1) }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p2" class="col-sm-2 control-label"><strong>IKAHI</strong></label>
          <div class="col-sm-10">
            {{ toCurrency($row->p2) }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p3" class="col-sm-2 control-label"><strong>PTWP</strong></label>
          <div class="col-sm-10">
            {{ toCurrency($row->p3) }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p4" class="col-sm-2 control-label"><strong>YDSH</strong></label>
          <div class="col-sm-10">
            {{ toCurrency($row->p4) }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p5" class="col-sm-2 control-label"><strong>Sumbangan Honorer</strong></label>
          <div class="col-sm-10">
            {{ toCurrency($row->p5) }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p6" class="col-sm-2 control-label"><strong>IPASPI</strong></label>
          <div class="col-sm-10">
            {{ toCurrency($row->p6) }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p7" class="col-sm-2 control-label"><strong>DYK</strong></label>
          <div class="col-sm-10">
            {{ toCurrency($row->p7) }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p8" class="col-sm-2 control-label"><strong>Senam</strong></label>
          <div class="col-sm-10">
            {{ toCurrency($row->p8) }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p9" class="col-sm-2 control-label"><strong>BRI</strong></label>
          <div class="col-sm-10">
            {{ toCurrency($row->p9) }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p10" class="col-sm-2 control-label"><strong>BDBS</strong></label>
          <div class="col-sm-10">
            {{ toCurrency($row->p10) }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p11" class="col-sm-2 control-label"><strong>Bank Kalbar Syariah</strong></label>
          <div class="col-sm-10">
            {{ toCurrency($row->p11) }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p12" class="col-sm-2 control-label"><strong>Dana Sosial Hakim</strong></label>
          <div class="col-sm-10">
            {{ toCurrency($row->p12) }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p13" class="col-sm-2 control-label"><strong>DYK Cabang</strong></label>
          <div class="col-sm-10">
            {{ toCurrency($row->p13) }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p14" class="col-sm-2 control-label"><strong>Arisan DYK Tahunan</strong></label>
          <div class="col-sm-10">
            {{ toCurrency($row->p14) }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="p15" class="col-sm-2 control-label"><strong>Mushola</strong></label>
          <div class="col-sm-10">
            {{ toCurrency($row->p15) }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="point" class="col-sm-2 control-label"><strong>Potongan Internal</strong></label>
          <div class="col-sm-10">
            {{ toCurrency($row->point) }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="bayar" class="col-sm-2 control-label"><strong>Bayar</strong></label>
          <div class="col-sm-10">
            {{ toCurrency($row->bayar) }}
          </div>
        </div>
        <!-- <div class="mb-3 row">
          <label for="created_at" class="col-sm-2 control-label"><strong>Created_at</strong></label>
          <div class="col-sm-10">
            {{ $row->created_at }}
          </div>
        </div> -->
        <!-- <div class="mb-3 row">
          <label for="updated_at" class="col-sm-2 control-label"><strong>Updated_at</strong></label>
          <div class="col-sm-10">
            {{ $row->updated_at }}
          </div>
        </div> -->
        <div class="mb-3 row">
          <div class="offset-sm-2 col-sm-10">
            @method("DELETE")
            <input type="hidden" name="action" value="{{ $action }}">
            <input type="hidden" name="id" value="{{ $row->id }}">
            <button type="submit" class="btn btn-danger">Delete</button>
            <button type="button" class="btn btn-secondary" onclick="button_cancel()">Cancel</button>
          </div>
        </div>
        {{ csrf_field() }}
      </form>
      @elseif($action == 'detail')
      <!-- <div class="mb-3 row">
        <label for="id" class="col-sm-2 control-label"><strong>Id</strong></label>
        <div class="col-sm-10">
          {{ $row->id }}
        </div>
      </div> -->
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
        <label for="name" class="col-sm-2 control-label"><strong>Name</strong></label>
        <div class="col-sm-10">
          {{ $row->name }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="gol" class="col-sm-2 control-label"><strong>Golongan</strong></label>
        <div class="col-sm-10">
          {{ $row->gol }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="rekening" class="col-sm-2 control-label"><strong>No. Rekening</strong></label>
        <div class="col-sm-10">
          {{ $row->rekening }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="bank" class="col-sm-2 control-label"><strong>Bank</strong></label>
        <div class="col-sm-10">
          {{ $row->bank }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="bersih" class="col-sm-2 control-label"><strong>Bersih</strong></label>
        <div class="col-sm-10">
          {{ toCurrency($row->bersih) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="p1" class="col-sm-2 control-label"><strong>Koperasi</strong></label>
        <div class="col-sm-10">
          {{ toCurrency($row->p1) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="p2" class="col-sm-2 control-label"><strong>IKAHI</strong></label>
        <div class="col-sm-10">
          {{ toCurrency($row->p2) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="p3" class="col-sm-2 control-label"><strong>PTWP</strong></label>
        <div class="col-sm-10">
          {{ toCurrency($row->p3) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="p4" class="col-sm-2 control-label"><strong>YDSH</strong></label>
        <div class="col-sm-10">
          {{ toCurrency($row->p4) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="p5" class="col-sm-2 control-label"><strong>Sumbangan Honorer</strong></label>
        <div class="col-sm-10">
          {{ toCurrency($row->p5) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="p6" class="col-sm-2 control-label"><strong>IPASPI</strong></label>
        <div class="col-sm-10">
          {{ toCurrency($row->p6) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="p7" class="col-sm-2 control-label"><strong>DYK</strong></label>
        <div class="col-sm-10">
          {{ toCurrency($row->p7) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="p8" class="col-sm-2 control-label"><strong>Senam</strong></label>
        <div class="col-sm-10">
          {{ toCurrency($row->p8) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="p9" class="col-sm-2 control-label"><strong>BRI</strong></label>
        <div class="col-sm-10">
          {{ toCurrency($row->p9) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="p10" class="col-sm-2 control-label"><strong>BDBS</strong></label>
        <div class="col-sm-10">
          {{ toCurrency($row->p10) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="p11" class="col-sm-2 control-label"><strong>Bank Kalbar Syariah</strong></label>
        <div class="col-sm-10">
          {{ toCurrency($row->p11) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="p12" class="col-sm-2 control-label"><strong>Dana Sosial Hakim</strong></label>
        <div class="col-sm-10">
          {{ toCurrency($row->p12) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="p13" class="col-sm-2 control-label"><strong>DYK Cabang</strong></label>
        <div class="col-sm-10">
          {{ toCurrency($row->p13) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="p14" class="col-sm-2 control-label"><strong>Arisan DYK Tahunan</strong></label>
        <div class="col-sm-10">
          {{ toCurrency($row->p14) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="p15" class="col-sm-2 control-label"><strong>Mushola</strong></label>
        <div class="col-sm-10">
          {{ toCurrency($row->p15) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="point" class="col-sm-2 control-label"><strong>Potongan Internal</strong></label>
        <div class="col-sm-10">
          {{ toCurrency($row->point) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="bayar" class="col-sm-2 control-label"><strong>Bayar</strong></label>
        <div class="col-sm-10">
          {{ toCurrency($row->bayar) }}
        </div>
      </div>
      <!-- <div class="mb-3 row">
        <label for="created_at" class="col-sm-2 control-label"><strong>Created_at</strong></label>
        <div class="col-sm-10">
          {{ $row->created_at }}
        </div>
      </div> -->
      <!-- <div class="mb-3 row">
        <label for="updated_at" class="col-sm-2 control-label"><strong>Updated_at</strong></label>
        <div class="col-sm-10">
          {{ $row->updated_at }}
        </div>
      </div> -->
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