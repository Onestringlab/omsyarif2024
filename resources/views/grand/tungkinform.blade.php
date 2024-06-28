@extends('layouts.app')

@section('title')
Tunjangan Kinerja
@endsection

@section('content')
<div class="container">
  <script>
    function button_cancel() {
      location.replace("{{ asset('/') }}tungkinlist");
    }
  </script>
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ asset('/tungkinlist') }}">Tunjangan Kinerja</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">
        {{ $row->months->month }} {{ $row->months->year }}
      </li>
    </ol>
  </nav>
  <div class="card border-success">
    <h5 class="card-header text-bg-success"> Tunjangan Kinerja
      {{ $row->months->month }} {{ $row->months->year }}
    </h5>
    <div class="card-body">
      <form class="form-horizontal" action="{{ asset('/') }}tungkinedit" method="post">
        <!-- <div class="mb-3 row">
          <label for="nama" class="col-sm-2 control-label"><strong>Nama</strong></label>
          <div class="col-sm-10">
            {{ $row->nama }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="nip" class="col-sm-2 control-label"><strong>NIP</strong></label>
          <div class="col-sm-10">
            {{ $row->nip }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="npwp" class="col-sm-2 control-label"><strong>NPWP</strong></label>
          <div class="col-sm-10">
            {{ $row->npwp }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="panggol" class="col-sm-2 control-label"><strong>Pangkat/Gol.</strong></label>
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
          <label for="grad" class="col-sm-2 control-label"><strong>Grade</strong></label>
          <div class="col-sm-10">
            {{ $row->grad }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="maxmedmin" class="col-sm-2 control-label"><strong>Max/Med/Min</strong></label>
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
          <label for="potabs" class="col-sm-2 control-label"><strong>Pot. Abs.</strong></label>
          <div class="col-sm-10">
            {{ toCurrency($row->potabs) }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="potkim" class="col-sm-2 control-label"><strong>Pot. Kin.</strong></label>
          <div class="col-sm-10">
            {{ toCurrency($row->potkim) }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="jumlahpot" class="col-sm-2 control-label"><strong>Jumlah Pot.</strong></label>
          <div class="col-sm-10">
            {{ toCurrency($row->jumlahpot) }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="jumtunjsetpot" class="col-sm-2 control-label"><strong>Jumlah Tunjangan Setelah Pot.</strong></label>
          <div class="col-sm-10">
            {{ toCurrency($row->jumtunjsetpot) }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tunjpph" class="col-sm-2 control-label"><strong>Tunj. PPH</strong></label>
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
          <label for="potpph" class="col-sm-2 control-label"><strong>Pot.PPH</strong></label>
          <div class="col-sm-10">
            {{ toCurrency($row->potpph) }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="netto" class="col-sm-2 control-label"><strong>Netto</strong></label>
          <div class="col-sm-10">
            {{ toCurrency($row->netto) }}
          </div>
        </div> -->
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
            <input type="hidden" name="id" value="{{ $row->id }}">
            <input type="hidden" name="month_id" value="{{ $row->month_id }}">
            <button type="submit" class="btn btn-warning">Edit</button>
            <button type="button" class="btn btn-secondary" onclick="button_cancel()">Batal</button>
          </div>
        </div>
        {{ csrf_field() }}
      </form>
    </div>
  </div>
</div>
@endsection