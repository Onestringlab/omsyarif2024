@extends('layouts.app')

@section('title')
Slip Gaji Dibayarkan
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
        <a href="{{ asset('/bersihlist') }}">Slip Gaji Bersih</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">
        {{ $row->months->month }} {{ $row->months->year }}
      </li>
    </ol>
  </nav>
  <div class="card border-success">
    <h5 class="card-header text-bg-success"> Slip Gaji Bersih
      {{ $row->months->month }} {{ $row->months->year }}
    </h5>
    <div class="card-body">
      <!-- <div class="mb-3 row">
          <label for="id" class="col-sm-3 control-label"><strong>Id</strong></label>
          <div class="col-sm-9">
            {{ $row->id }}
  </div>
</div> -->
      <!-- <div class="mb-3 row">
          <label for="month_id" class="col-sm-3 control-label"><strong>Month_id</strong></label>
          <div class="col-sm-9">
            {{ $row->month_id }}
          </div>
        </div> -->
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
      <!-- <div class="mb-3 row">
        <label for="npwp" class="col-sm-3 control-label"><strong>NPWP</strong></label>
        <div class="col-sm-9">
          {{ $row->npwp }}
        </div>
      </div> -->
      <!-- <div class="mb-3 row">
        <label for="rekening" class="col-sm-3 control-label"><strong>Rekening</strong></label>
        <div class="col-sm-9">
          {{ $row->rekening }}
        </div>
      </div> -->
      <!-- <div class="mb-3 row">
        <label for="nmbankspan" class="col-sm-3 control-label"><strong>Nama Bank</strong></label>
        <div class="col-sm-9">
          {{ $row->nmbankspan }}
        </div>
      </div> -->
      <div class="mb-3 row">
        <label for="gjpokok" class="col-sm-3 control-label"><strong>Gaji Pokok</strong></label>
        <div class="col-sm-9">
          {{ toCurrency($row->gjpokok) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tjistri" class="col-sm-3 control-label"><strong>Tj. Istri/Suami</strong></label>
        <div class="col-sm-9">
          {{ toCurrency($row->tjistri) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tjanak" class="col-sm-3 control-label"><strong>Tj. Anak</strong></label>
        <div class="col-sm-9">
          {{ toCurrency($row->tjanak) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tjupns" class="col-sm-3 control-label"><strong>Tj. Umum</strong></label>
        <div class="col-sm-9">
          {{ toCurrency($row->tjupns) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tjlain" class="col-sm-3 control-label"><strong>Tj. Ta. Umum</strong></label>
        <div class="col-sm-9">
          {{ toCurrency($row->tjlain) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tjpencil" class="col-sm-3 control-label"><strong>Tj. Papua</strong></label>
        <div class="col-sm-9">
          {{ toCurrency($row->tjpencil) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tjdaerah" class="col-sm-3 control-label"><strong>Tj. Terpencil</strong></label>
        <div class="col-sm-9">
          {{ toCurrency($row->tjdaerah) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tjstruk" class="col-sm-3 control-label"><strong>Tj. Struktur</strong></label>
        <div class="col-sm-9">
          {{ toCurrency($row->tjstruk) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tjfungs" class="col-sm-3 control-label"><strong>Tj. Fungsi </strong></label>
        <div class="col-sm-9">
          {{ toCurrency($row->tjfungs) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tjkompen" class="col-sm-3 control-label"><strong>Tj. Lain</strong></label>
        <div class="col-sm-9">
          {{ toCurrency($row->tjkompen) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="pembul" class="col-sm-3 control-label"><strong>Tj. Bulat</strong></label>
        <div class="col-sm-9">
          {{ toCurrency($row->pembul) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tjberas" class="col-sm-3 control-label"><strong>Tj. Beras</strong></label>
        <div class="col-sm-9">
          {{ toCurrency($row->tjberas) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tjpph" class="col-sm-3 control-label"><strong>Tj. Pajak</strong></label>
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
        <label for="potpfkbul" class="col-sm-3 control-label"><strong>Pot. Beras</strong></label>
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
        <label for="potpph" class="col-sm-3 control-label"><strong>Pot. PPh</strong></label>
        <div class="col-sm-9">
          {{ toCurrency($row->potpph) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="potswrum" class="col-sm-3 control-label"><strong>Pot. Sewa Rumah</strong></label>
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
        <label for="potlain" class="col-sm-3 control-label"><strong>Pot.Lain</strong></label>
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
        <label for="bersih" class="col-sm-3 control-label"><strong>Bersih</strong></label>
        <div class="col-sm-9">
          {{ toCurrency($row->bersih) }}
        </div>
      </div>
      <!-- <div class="mb-3 row">
          <label for="created_at" class="col-sm-3 control-label"><strong>Created_at</strong></label>
          <div class="col-sm-9">
            {{ $row->created_at }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="updated_at" class="col-sm-3 control-label"><strong>Updated_at</strong></label>
          <div class="col-sm-9">
            {{ $row->updated_at }}
          </div>
        </div> -->
      <div class="offset-sm-2 col-sm-9">
        <button type="button" class="btn btn-secondary" onclick="button_cancel()">Kembali</button>
      </div>
    </div>
  </div>
</div>
@endsection