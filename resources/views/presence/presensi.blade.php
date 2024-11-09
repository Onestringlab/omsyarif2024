@extends('layouts.app')

@section('title')
Presensi Pegawai
@endsection

@section('content')
<div class="container">
  <script>
    function button_cancel() {
      location.replace("{{ asset('/') }}presensilist");
    }
  </script>
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ asset('/presensilist') }}">Presensi</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">
        {{ $row->months->month }} {{ $row->months->year }}
      </li>
    </ol>
  </nav>
  <div class="card border-success">
    <h5 class="card-header text-bg-success"> Rekapitulasi Kehadiran dari Tanggal 16 Bulan sebelum {{ $row->months->month }} s.d. 15 {{ $row->months->month }} {{ $row->months->year }}
    </h5>
    <div class="card-body">
      <div class="mb-3 row">
        <label for="nip" class="col-sm-2 control-label"><strong>NIP</strong></label>
        <div class="col-sm-10">
          {{ $row->nip }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="nama" class="col-sm-2 control-label"><strong>Nama</strong></label>
        <div class="col-sm-10">
          {{ $row->nama }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="jabatan" class="col-sm-2 control-label"><strong>Jabatan</strong></label>
        <div class="col-sm-10">
          {{ $row->jabatan }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="vd" class="col-sm-2 control-label"><strong>{{ toFWU('DATANG TEPAT WAKTU') }}</strong></label>
        <div class="col-sm-10">
          {{ $row->vd }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tkd" class="col-sm-2 control-label"><strong>{{ toFWU('TERLAMBAT KARENA DINAS') }}</strong></label>
        <div class="col-sm-10">
          {{ $row->tkd }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tl1" class="col-sm-2 control-label"><strong>{{ toFWU('TERLAMBAT 1 S.D 30 MENIT') }}</strong></label>
        <div class="col-sm-10">
          {{ $row->tl1 }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tl2" class="col-sm-2 control-label"><strong>{{ toFWU('TERLAMBAT 31 S.D 60 MENIT') }}</strong></label>
        <div class="col-sm-10">
          {{ $row->tl2 }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tl3" class="col-sm-2 control-label"><strong>{{ toFWU('TERLAMBAT 61 S.D 90 MENIT') }}</strong></label>
        <div class="col-sm-10">
          {{ $row->tl3 }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tl4" class="col-sm-2 control-label"><strong>{{ toFWU('TERLAMBAT > 90 MENIT') }}</strong></label>
        <div class="col-sm-10">
          {{ $row->tl4 }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="thm" class="col-sm-2 control-label"><strong>{{ toFWU('TIDAK MENGISI DAFTAR HADIR (MASUK)') }}</strong></label>
        <div class="col-sm-10">
          {{ $row->thm }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="vp" class="col-sm-2 control-label"><strong>{{ toFWU('PULANG TEPAT WAKTU') }}</strong></label>
        <div class="col-sm-10">
          {{ $row->vp }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="ik" class="col-sm-2 control-label"><strong>{{ toFWU('IZIN KELUAR KANTOR (PULANG)') }}</strong></label>
        <div class="col-sm-10">
          {{ $row->ik }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="psw1" class="col-sm-2 control-label"><strong>{{ toFWU('PULANG SEBELUM WAKTUNYA 1 S.D 30 MENIT') }}</strong></label>
        <div class="col-sm-10">
          {{ $row->psw1 }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="psw2" class="col-sm-2 control-label"><strong>{{ toFWU('PULANG SEBELUM WAKTUNYA 31 S.D 60 MENIT') }}</strong></label>
        <div class="col-sm-10">
          {{ $row->psw2 }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="psw3" class="col-sm-2 control-label"><strong>{{ toFWU('PULANG SEBELUM WAKTUNYA 61 S.D 90 MENIT') }}</strong></label>
        <div class="col-sm-10">
          {{ $row->psw3 }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="psw4" class="col-sm-2 control-label"><strong>{{ toFWU('PULANG SEBELUM WAKTUNYA > 90 MENIT') }}</strong></label>
        <div class="col-sm-10">
          {{ $row->psw4 }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="thp" class="col-sm-2 control-label"><strong>{{ toFWU('TIDAK MENGISI DAFTAR HADIR (PULANG)') }}</strong></label>
        <div class="col-sm-10">
          {{ $row->thp }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="i" class="col-sm-2 control-label"><strong>{{ toFWU('IZIN TIDAK MASUK KANTOR') }}</strong></label>
        <div class="col-sm-10">
          {{ $row->i }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="dls" class="col-sm-2 control-label"><strong>{{ toFWU('DINAS LUAR + SPPD') }}</strong></label>
        <div class="col-sm-10">
          {{ $row->dls }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="ct" class="col-sm-2 control-label"><strong>{{ toFWU('CUTI TAHUNAN') }}</strong></label>
        <div class="col-sm-10">
          {{ $row->ct }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="clt" class="col-sm-2 control-label"><strong>{{ toFWU('CUTI TAHUNAN') }}</strong></label>
        <div class="col-sm-10">
          {{ $row->clt }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="cpp" class="col-sm-2 control-label"><strong>{{ toFWU('CUTI PERSIAPAN PENSIUN') }}</strong></label>
        <div class="col-sm-10">
          {{ $row->cpp }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="ctl" class="col-sm-2 control-label"><strong>{{ toFWU('CUTI DILUAR TANGGUNGAN NEGARA') }}</strong></label>
        <div class="col-sm-10">
          {{ $row->ctl }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tb" class="col-sm-2 control-label"><strong>{{ toFWU('TUGAS BELAJAR') }}</strong></label>
        <div class="col-sm-10">
          {{ $row->tb }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="ld" class="col-sm-2 control-label"><strong>{{ toFWU('HARI LIBUR DAERAH') }}</strong></label>
        <div class="col-sm-10">
          {{ $row->ld }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="ib" class="col-sm-2 control-label"><strong>{{ toFWU('IZIN BELAJAR') }}</strong></label>
        <div class="col-sm-10">
          {{ $row->ib }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tmk" class="col-sm-2 control-label"><strong>{{ toFWU('TIDAK MASUK KERJA') }}</strong></label>
        <div class="col-sm-10">
          {{ $row->tmk }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="cs1" class="col-sm-2 control-label"><strong>{{ toFWU('CUTI SAKIT 1 S.D 14 HARI') }}</strong></label>
        <div class="col-sm-10">
          {{ $row->cs1 }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="cs14" class="col-sm-2 control-label"><strong>{{ toFWU('CUTI SAKIT >14 HARI') }}</strong></label>
        <div class="col-sm-10">
          {{ $row->cs14 }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="cm1" class="col-sm-2 control-label"><strong>{{ toFWU('CUTI MELAHIRKAN PERTAMA') }}</strong></label>
        <div class="col-sm-10">
          {{ $row->cm1 }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="cm2" class="col-sm-2 control-label"><strong>{{ toFWU('CUTI MELAHIRKAN KEDUA') }}</strong></label>
        <div class="col-sm-10">
          {{ $row->cm2 }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="cm3" class="col-sm-2 control-label"><strong>{{ toFWU('CUTI MELAHIRKAN KETIGA') }}</strong></label>
        <div class="col-sm-10">
          {{ $row->cm3 }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="cm41" class="col-sm-2 control-label"><strong>{{ toFWU('CUTI MELAHIRKAN KEEMPAT DAN SETERUSNYA, BULAN PERTAMA') }}</strong></label>
        <div class="col-sm-10">
          {{ $row->cm41 }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="cm42" class="col-sm-2 control-label"><strong>{{ toFWU('CUTI MELAHIRKAN KEEMPAT DAN SETERUSNYA, BULAN KEDUA') }}</strong></label>
        <div class="col-sm-10">
          {{ $row->cm42 }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="cm43" class="col-sm-2 control-label"><strong>{{ toFWU('CUTI MELAHIRKAN KEEMPAT DAN SETERUSNYA, BULAN KETIGA') }}</strong></label>
        <div class="col-sm-10">
          {{ $row->cm43 }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="cap1" class="col-sm-2 control-label"><strong>{{ toFWU('CUTI ALASAN PENTING S.D 10 HARI') }}</strong></label>
        <div class="col-sm-10">
          {{ $row->cap1 }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="cap10" class="col-sm-2 control-label"><strong>{{ toFWU('CUTI ALASAN PENTING > 10 HARI') }}</strong></label>
        <div class="col-sm-10">
          {{ $row->cap10 }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="cb1" class="col-sm-2 control-label"><strong>{{ toFWU('CUTI BESAR BULAN PERTAMA') }}</strong></label>
        <div class="col-sm-10">
          {{ $row->cb1 }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="cb2" class="col-sm-2 control-label"><strong>{{ toFWU('CUTI BESAR BULAN KEDUA') }}</strong></label>
        <div class="col-sm-10">
          {{ $row->cb2 }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="cb3" class="col-sm-2 control-label"><strong>{{ toFWU('CUTI BESAR BULAN KETIGA') }}</strong></label>
        <div class="col-sm-10">
          {{ $row->cb3 }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tk" class="col-sm-2 control-label"><strong>{{ toFWU('TOTAL KEHADIRAN') }}</strong></label>
        <div class="col-sm-10">
          {{ $row->tk }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="ptk" class="col-sm-2 control-label"><strong>{{ toFWU('PENGURANGAN TUNJANGAN KINERJA') }}</strong></label>
        <div class="col-sm-10">
          {{ $row->ptk }}
        </div>
      </div>
      <!-- <div class="mb-3 row">
        <label for="kum" class="col-sm-2 control-label"><strong>{{ toFWU('KEHADIRAN UNTUK UANG MAKAN') }}</strong></label>
        <div class="col-sm-10">
          {{ $row->kum }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="kut" class="col-sm-2 control-label"><strong>{{ toFWU('KEHADIRAN UNTUK UANG TRANSPORT') }}</strong></label>
        <div class="col-sm-10">
          {{ $row->kut }}
        </div>
      </div> -->
      <div class="mb-3 row">
        <label for="status" class="col-sm-2 control-label"><strong>{{ toFWU('Status') }}</strong></label>
        <div class="col-sm-10">
          {{ $row->status }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="alasan" class="col-sm-2 control-label"><strong>{{ toFWU('Alasan') }}</strong></label>
        <div class="col-sm-10">
          {{ $row->alasan }}
        </div>
      </div>
      <div class="offset-sm-2 col-sm-9">
        <button type="button" class="btn btn-secondary" onclick="button_cancel()">Kembali</button>
      </div>
    </div>
  </div>
</div>
@endsection