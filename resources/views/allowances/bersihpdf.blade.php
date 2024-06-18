<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Slip Gaji Bersih</title>
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

    td {
      padding-left: 5px;
      padding-right: 5px;

    }
  </style>
</head>

<body>
  <h3>
    <center>SLIP GAJI BERSIH</center>
  </h3>
  <strong>{{ strtoupper($satker->nama) }}</strong></br>
  <table style="width: 100%;">
    <tr>
      <td>Pembayaran</td>
      <td>:</td>
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

  <table style="width:100%">
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
      <td>Pot. Beras</td>
      <td class="text-right">{{toCurrency($row->potpfkbul)}}</td>
    </tr>
    <tr>
      <td>T.Istri/Suami</td>
      <td class="text-right">{{toCurrency($row->tjistri)}}</td>
      <td>IWP</td>
      <td class="text-right">{{toCurrency($row->potpfk10)}}</td>
    </tr>
    <tr>
      <td>T.Anak</td>
      <td class="text-right">{{toCurrency($row->tjanak)}}</td>
      <td>BPJS</td>
      <td class="text-right">{{toCurrency($row->bpjs)}}</td>
    </tr>
    <tr>
      <td>T.Umum</td>
      <td class="text-right">{{toCurrency($row->tjupns)}}</td>
      <td>BPJS Lain</td>
      <td class="text-right">{{toCurrency($row->bpjs2)}}</td>
    </tr>
    <tr>
      <td>T.Ta. Umum</td>
      <td class="text-right">{{toCurrency($row->tjlain)}}</td>
      <td>Pot. PPH</td>
      <td class="text-right">{{toCurrency($row->potpph)}}</td>
    </tr>
    <tr>
      <td>T.Papua</td>
      <td class="text-right">{{toCurrency($row->tjdaerah)}}</td>
      <td>Sewa Rumah</td>
      <td class="text-right">{{toCurrency($row->potswrum)}}</td>
    </tr>
    <tr>
      <td>T.Terpencil</td>
      <td class="text-right">{{toCurrency($row->tjpencil)}}</td>
      <td>Tunggakan</td>
      <td class="text-right">{{toCurrency($row->potpfk2)}}</td>
    </tr>
    <tr>
      <td>T.Struktur</td>
      <td class="text-right">{{toCurrency($row->tjstruk)}}</td>
      <td>Utang</td>
      <td class="text-right">{{toCurrency($row->potkelbtj)}}</td>
    </tr>
    <tr>
      <td>T.Fungsi</td>
      <td class="text-right">{{toCurrency($row->tjfungs)}}</td>
      <td>Pot. Lain</td>
      <td class="text-right">{{toCurrency($row->potlain)}}</td>
    </tr>
    <tr>
      <td>T.Lain</td>
      <td class="text-right">{{toCurrency($row->tjkompen)}}</td>
      <td>Taperum</td>
      <td class="text-right">{{toCurrency($row->pottabrum)}}</td>
    </tr>
    <tr>
      <td>T.Bulat</td>
      <td class="text-right">{{toCurrency($row->pembul)}}</td>
      <td colspan="2">
        <hr>
      </td>
    </tr>
    <tr>
      <td>T. Beras</td>
      <td class="text-right">{{toCurrency($row->tjberas)}}</td>
      <td>Jml. Potongan</td>
      <td class="text-right">{{toCurrency($row->totpot)}}</td>
    </tr>
    <tr>
      <td>T.Pajak</td>
      <td class="text-right">{{toCurrency($row->tjpph)}}</td>
      <td colspan="2">
        <hr>
      </td>
    </tr>
    <tr>
      <<td colspan="2">
        <hr>
        </td>
        <td>Jml. Bersih</td>
        <td class="text-right">{{toCurrency($row->bersih)}}</td>
    </tr>
    <tr>
      <td>
        Jml.Kotor
      </td>
      <td class="text-right">{{toCurrency($row->kotor)}}</td>
      <td colspan="2">
        <hr>
      </td>
    </tr>
  </table>

</body>

</html>