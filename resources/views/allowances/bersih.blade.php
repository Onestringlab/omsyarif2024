@extends('layouts.app')

@section('title')
Slip Gaji
@endsection

@section('content')
<div class="container">
  <script>
    function button_cancel() {
      location.replace("{{ asset('/') }}bersihlist");
    }
  </script>
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ asset('/bersihlist') }}">Slip Gaji</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">
        {{ $row->months->month }} {{ $row->months->year }}
      </li>
    </ol>
  </nav>
  <div class="card border-success">
    <h5 class="card-header text-bg-success">Perhitungan Gaji
      {{ $row->months->month }} {{ $row->months->year }}
    </h5>
    <div class="card-body">

      <div class="mb-3 row">
        <label for="nip" class="col-sm-3 control-label"><strong>NIP</strong></label>
        <div class="col-sm-9">
          {{ $row->nip }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="nmpeg" class="col-sm-3 control-label"><strong>Nama</strong></label>
        <div class="col-sm-9">
          {{Auth::user()->name}}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="gjpokok" class="col-sm-3 control-label"><strong>Gaji Pokok</strong></label>
        <div class="col-sm-9">
          {{ toCurrency($row->gjpokok) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tjistri" class="col-sm-3 control-label"><strong>Tunjangan Istri/Suami</strong></label>
        <div class="col-sm-9">
          {{ toCurrency($row->tjistri) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tjanak" class="col-sm-3 control-label"><strong>Tunjangan Anak</strong></label>
        <div class="col-sm-9">
          {{ toCurrency($row->tjanak) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tjupns" class="col-sm-3 control-label"><strong>Tunjangan Umum</strong></label>
        <div class="col-sm-9">
          {{ toCurrency($row->tjupns) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tjlain" class="col-sm-3 control-label"><strong>Tunjangan Ta. Umum</strong></label>
        <div class="col-sm-9">
          {{ toCurrency($row->tjlain) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tjpencil" class="col-sm-3 control-label"><strong>Tunjangan Papua</strong></label>
        <div class="col-sm-9">
          {{ toCurrency($row->tjpencil) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tjdaerah" class="col-sm-3 control-label"><strong>Tunjangan Terpencil</strong></label>
        <div class="col-sm-9">
          {{ toCurrency($row->tjdaerah) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tjstruk" class="col-sm-3 control-label"><strong>Tunjangan Struktural</strong></label>
        <div class="col-sm-9">
          {{ toCurrency($row->tjstruk) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tjfungs" class="col-sm-3 control-label"><strong>Tunjangan Fungsional </strong></label>
        <div class="col-sm-9">
          {{ toCurrency($row->tjfungs) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tjkompen" class="col-sm-3 control-label"><strong>Tunjangan Lain</strong></label>
        <div class="col-sm-9">
          {{ toCurrency($row->tjkompen) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="pembul" class="col-sm-3 control-label"><strong>Tunjangan Pembulatan</strong></label>
        <div class="col-sm-9">
          {{ toCurrency($row->pembul) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tjberas" class="col-sm-3 control-label"><strong>Tunjangan Beras</strong></label>
        <div class="col-sm-9">
          {{ toCurrency($row->tjberas) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tjpph" class="col-sm-3 control-label"><strong>Tunjangan Pajak</strong></label>
        <div class="col-sm-9">
          {{ toCurrency($row->tjpph) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="kotor" class="col-sm-3 control-label"><strong>Kotor</strong></label>
        <div class="col-sm-9">
          {{ toCurrency($row->kotor) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="potpfkbul" class="col-sm-3 control-label"><strong>Potongan Beras</strong></label>
        <div class="col-sm-9">
          {{ toCurrency($row->potpfkbul) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="potpfk10" class="col-sm-3 control-label"><strong>IWP</strong></label>
        <div class="col-sm-9">
          {{ toCurrency($row->potpfk10) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="bpjs" class="col-sm-3 control-label"><strong>BPJS</strong></label>
        <div class="col-sm-9">
          {{ toCurrency($row->bpjs) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="bpjs2" class="col-sm-3 control-label"><strong>BPJS2</strong></label>
        <div class="col-sm-9">
          {{ toCurrency($row->bpjs2) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="potpph" class="col-sm-3 control-label"><strong>Potongan PPh</strong></label>
        <div class="col-sm-9">
          {{ toCurrency($row->potpph) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="potswrum" class="col-sm-3 control-label"><strong>Potongan Sewa Rumah</strong></label>
        <div class="col-sm-9">
          {{ toCurrency($row->potswrum) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="potpfk2" class="col-sm-3 control-label"><strong>Tunggakan</strong></label>
        <div class="col-sm-9">
          {{ toCurrency($row->potpfk2) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="potkelbtj" class="col-sm-3 control-label"><strong>Utang</strong></label>
        <div class="col-sm-9">
          {{ toCurrency($row->potkelbtj) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="potlain" class="col-sm-3 control-label"><strong>Potongan Lain</strong></label>
        <div class="col-sm-9">
          {{ toCurrency($row->potlain) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="pottabrum" class="col-sm-3 control-label"><strong>Taperum</strong></label>
        <div class="col-sm-9">
          {{ toCurrency($row->pottabrum) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="totpot" class="col-sm-3 control-label"><strong>Total Potongan</strong></label>
        <div class="col-sm-9">
          {{ toCurrency($row->totpot) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="bersih" class="col-sm-3 control-label"><strong>Gaji Bersih</strong></label>
        <div class="col-sm-9">
          {{ toCurrency($row->bersih) }}
        </div>
        <div class="offset-sm-2 col-sm-9">
          <button type="button" class="btn btn-secondary" onclick="button_cancel()">Kembali</button>
        </div>
      </div>
    </div>
  </div>
  @endsection