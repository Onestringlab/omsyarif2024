<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Slip Gaji</title>
  <style>
    body {
      font-size: small;
    }

    .page-break {
      page-break-after: always;
    }

    .text-right {
      text-align: right;
    }

    .table-bordered {
      border-collapse: collapse;
      margin-left: auto;
      margin-right: auto;
      width: 100%;
    }

    .table-border-bottom {
      border-bottom: 1px solid black;
    }

    td {
      padding-left: 5px;
      padding-right: 5px;

    }
  </style>
</head>

<body>
  <h3>
    <center>SLIP GAJI</center>
  </h3>
  <table class="table-bordered">
    <tr>
      <td colspan="3"> <strong>{{ strtoupper($satker->nama) }}</strong></td>
    </tr>
    <tr>
      <td width="80px">Pembayaran</td>
      <td width="10px">:</td>
      <td>Gaji Induk {{ $row->months->month }} {{ $row->months->year }}</td>
    </tr>
    <tr>
      <td>NIP</td>
      <td>:</td>
      <td>{{ $row->nip }}</td>
    </tr>
    <tr>
      <td>Nama</td>
      <td>:</td>
      <td>{{Auth::user()->name}}</td>
    </tr>
    <!-- <tr>
      <td>Nomor Rekening</td>
      <td>:</td>
      <td>{{ $row->rekening}}</td>
    </tr> -->
    <tr>
      <td colspan="3">
        <hr>
      </td>
    </tr>
  </table>

  <table class="table-bordered">
    <tr>
      <td colspan=2 style="width:50%">
        <strong>Penghasilan</strong>
      </td>
      <td colspan=2 style="width:50%">
        <strong>Potongan</strong>
      </td>
    </tr>
    <tr>
      <td>Gaji Pokok</td>
      <td class="text-right">{{toCurrency($row->gjpokok)}}</td>
      <td>Potongan Beras</td>
      <td class="text-right">{{toCurrency($row->potpfkbul)}}</td>
    </tr>
    <tr>
      <td>Tunjangan Istri/Suami</td>
      <td class="text-right">{{toCurrency($row->tjistri)}}</td>
      <td>IWP</td>
      <td class="text-right">{{toCurrency($row->potpfk10)}}</td>
    </tr>
    <tr>
      <td>Tunjangan Anak</td>
      <td class="text-right">{{toCurrency($row->tjanak)}}</td>
      <td>BPJS</td>
      <td class="text-right">{{toCurrency($row->bpjs)}}</td>
    </tr>
    <tr>
      <td>Tunjangan Umum</td>
      <td class="text-right">{{toCurrency($row->tjupns)}}</td>
      <td>BPJS Lain</td>
      <td class="text-right">{{toCurrency($row->bpjs2)}}</td>
    </tr>
    <tr>
      <td>Tunjangan Ta. Umum</td>
      <td class="text-right">{{toCurrency($row->tjlain)}}</td>
      <td>Potongan PPH</td>
      <td class="text-right">{{toCurrency($row->potpph)}}</td>
    </tr>
    <tr>
      <td>Tunjangan Papua</td>
      <td class="text-right">{{toCurrency($row->tjdaerah)}}</td>
      <td>Sewa Rumah</td>
      <td class="text-right">{{toCurrency($row->potswrum)}}</td>
    </tr>
    <tr>
      <td>Tunjangan Terpencil</td>
      <td class="text-right">{{toCurrency($row->tjpencil)}}</td>
      <td>Tunggakan</td>
      <td class="text-right">{{toCurrency($row->potpfk2)}}</td>
    </tr>
    <tr>
      <td>Tunjangan Struktural</td>
      <td class="text-right">{{toCurrency($row->tjstruk)}}</td>
      <td>Utang</td>
      <td class="text-right">{{toCurrency($row->potkelbtj)}}</td>
    </tr>
    <tr>
      <td>Tunjangan Fungsional</td>
      <td class="text-right">{{toCurrency($row->tjfungs)}}</td>
      <td>Potongan Lain</td>
      <td class="text-right">{{toCurrency($row->potlain)}}</td>
    </tr>
    <tr>
      <td>Tunjangan Lain</td>
      <td class="text-right">{{toCurrency($row->tjkompen)}}</td>
      <td>Taperum</td>
      <td class="text-right">{{toCurrency($row->pottabrum)}}</td>
    </tr>
    <tr>
      <td>Tunjangan Pembulatan</td>
      <td class="text-right">{{toCurrency($row->pembul)}}</td>
      <td colspan="2">
        <hr>
      </td>
    </tr>
    <tr>
      <td>Tunjangan Beras</td>
      <td class="text-right">{{toCurrency($row->tjberas)}}</td>
      <td>Jumlah Potongan</td>
      <td class="text-right">{{toCurrency($row->totpot)}}</td>
    </tr>
    <tr>
      <td>Tunjangan Pajak</td>
      <td class="text-right">{{toCurrency($row->tjpph)}}</td>
      <td colspan="2">
        <hr>
      </td>
    </tr>
    <tr>
      <<td colspan="2">
        <hr>
        </td>
        <td>Jumlah Bersih</td>
        <td class="text-right">{{toCurrency($row->bersih)}}</td>
    </tr>
    <tr>
      <td>
        Jumlah Kotor
      </td>
      <td class="text-right">{{toCurrency($row->kotor)}}</td>
      <td colspan="2">
        <hr>
      </td>
    </tr>
  </table>

</body>

</html>