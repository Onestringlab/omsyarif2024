<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Slip Gaji Dibayarkan</title>
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
  </style>
</head>

<body>
  <h3>
    <center>SLIP GAJI DIBAYARKAN</center>
  </h3>
  <strong>PENGADILAN TINGGI PONTIANAK</strong></br>
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
        <strong>Gaji bersih</strong>
      </td>
      <td style="width:25%"></td>
      <td style="width:25%" class="text-right">
        <strong>{{ toCurrency($row->bersih) }}</strong>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <strong>Potongan</strong>
      </td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td class="text-right" style="width:5%">
        1.
      </td>
      <td>
        Koperasi
      </td>
      <td class="text-right">
        {{toCurrency($row->p1)}}
      </td>
      <td></td>
    </tr>
    <tr>
      <td class="text-right">
        2.
      </td>
      <td>
        IKAHI
      </td>
      <td class="text-right">
        {{toCurrency($row->p2)}}
      </td>
      <td></td>
    </tr>
    <tr>
      <td class="text-right">
        3.
      </td>
      <td>
        PTWP
      </td>
      <td class="text-right">
        {{toCurrency($row->p3)}}
      </td>
      <td></td>
    </tr>
    <tr>
      <td class="text-right">
        4.
      </td>
      <td>YDSH</td>
      <td class="text-right">
        {{toCurrency($row->p4)}}
      </td>
      <td></td>
    </tr>
    <tr>
      <td class="text-right">
        5.
      </td>
      <td>Sumbangan Honorer</td>
      <td class="text-right">
        {{toCurrency($row->p5)}}
      </td>
      <td></td>
    </tr>
    <tr>
      <td class="text-right">
        6.
      </td>
      <td>IPASPI</td>
      <td class="text-right">
        {{toCurrency($row->p6)}}
      </td>
      <td></td>
    </tr>
    <tr>
      <td class="text-right">
        7.
      </td>
      <td>DYK</td>
      <td class="text-right">
        {{toCurrency($row->p7)}}
      </td>
      <td></td>
    </tr>
    <tr>
      <td class="text-right">
        8.
      </td>
      <td>Senam</td>
      <td class="text-right">
        {{toCurrency($row->p8)}}
      </td>
      <td></td>
    </tr>
    <tr>
      <td class="text-right">
        9.
      </td>
      <td>BRI</td>
      <td class="text-right">
        {{toCurrency($row->p9)}}
      </td>
      <td></td>
    </tr>
    <tr>
      <td class="text-right">
        10.
      </td>
      <td>BDBS</td>
      <td class="text-right">
        {{toCurrency($row->p10)}}
      </td>
      <td></td>
    </tr>
    <tr>
      <td class="text-right">
        11.
      </td>
      <td>Bank Kalbar Syariah</td>
      <td class="text-right">
        {{toCurrency($row->p11)}}
      </td>
    </tr>
    <tr>
      <td class="text-right">
        12.
      </td>
      <td>Dana Sosial Hakim</td>
      <td class="text-right">
        {{toCurrency($row->p12)}}
      </td>
      <td></td>
    </tr>
    <tr>
      <td class="text-right">
        13.
      </td>
      <td>DYK Cabang</td>
      <td class="text-right">
        {{toCurrency($row->p13)}}
      </td>
      <td></td>
    </tr>
    <tr>
      <td class="text-right" style="width:5%">
        14.
      </td>
      <td>Arisan DYK Tahunan</td>
      <td class="text-right">
        {{toCurrency($row->p14)}}
      </td>
      <td></td>
    </tr>
    <tr>
      <td class="text-right" style="width:5%">
        15.
      </td>
      <td>Mushola</td>
      <td class="text-right">
        {{toCurrency($row->p15)}}
      </td>
    </tr>
    <tr>
      <td class="text-right">
      </td>
      <td></td>
      <td class="text-right">
        <hr>
      </td>
    </tr>
    <tr>
      <td class="text-right">
      </td>
      <td></td>
      <td>
        <strong>Jumlah Potongan</strong>
      </td>
      <td class="text-right">
        <strong>{{ toCurrency($row->point) }}</strong>
      </td>
    </tr>
    <tr>
      <td class="text-right"></td>
      <td></td>
      <td></td>
      <td class="text-right">
        <hr>
      </td>
    </tr>
    <tr>
      <td class="text-right">
      </td>
      <td></td>
      <td>
        <strong>Gaji Dibayarkan</strong>
      </td>
      <td class="text-right">
        <strong>{{ toCurrency($row->bayar) }}</strong>
      </td>
    </tr>
  </table>
</body>

</html>