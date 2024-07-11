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
            <td>{{ Auth::user()->name }}</td>
        </tr>
        <!-- <tr>
      <td>Nomor Rekening</td>
      <td>:</td>
      <td>{{ $row->rekening }}</td>
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
                Simp. Wajib Koperasi
            </td>
            <td class="text-right">
                {{ toCurrency($row->p1) }}
            </td>
            <td></td>
        </tr>
        <tr>
            <td class="text-right">
                2.
            </td>
            <td>
                Simp. Sukarela Koperasi
            </td>
            <td class="text-right">
                {{ toCurrency($row->p2) }}
            </td>
            <td></td>
        </tr>
        <tr>
            <td class="text-right">
                3.
            </td>
            <td>
                Angsuran Koperasi
            </td>
            <td class="text-right">
                {{ toCurrency($row->p3) }}
            </td>
            <td></td>
        </tr>
        <tr>
            <td class="text-right">
                4.
            </td>
            <td>IKAHI</td>
            <td class="text-right">
                {{ toCurrency($row->p4) }}
            </td>
            <td></td>
        </tr>
        <tr>
            <td class="text-right">
                5.
            </td>
            <td>IPASPI</td>
            <td class="text-right">
                {{ toCurrency($row->p5) }}
            </td>
            <td></td>
        </tr>
        <tr>
            <td class="text-right">
                6.
            </td>
            <td>PTWP</td>
            <td class="text-right">
                {{ toCurrency($row->p6) }}
            </td>
            <td></td>
        </tr>
        <tr>
            <td class="text-right">
                7.
            </td>
            <td>DYK A</td>
            <td class="text-right">
                {{ toCurrency($row->p7) }}
            </td>
            <td></td>
        </tr>
        <tr>
            <td class="text-right">
                8.
            </td>
            <td>DYK B</td>
            <td class="text-right">
                {{ toCurrency($row->p8) }}
            </td>
            <td></td>
        </tr>
        <tr>
            <td class="text-right">
                9.
            </td>
            <td>DYK C</td>
            <td class="text-right">
                {{ toCurrency($row->p9) }}
            </td>
            <td></td>
        </tr>
        <tr>
            <td class="text-right">
                10.
            </td>
            <td>Sumbangan A</td>
            <td class="text-right">
                {{ toCurrency($row->p10) }}
            </td>
            <td></td>
        </tr>
        <tr>
            <td class="text-right">
                11.
            </td>
            <td>Sumbangan B</td>
            <td class="text-right">
                {{ toCurrency($row->p11) }}
            </td>
        </tr>
        <tr>
            <td class="text-right">
                12.
            </td>
            <td>Sumbangan C</td>
            <td class="text-right">
                {{ toCurrency($row->p12) }}
            </td>
            <td></td>
        </tr>
        <tr>
            <td class="text-right">
                13.
            </td>
            <td>Potongan A</td>
            <td class="text-right">
                {{ toCurrency($row->p13) }}
            </td>
            <td></td>
        </tr>
        <tr>
            <td class="text-right" style="width:5%">
                14.
            </td>
            <td>Potongan B</td>
            <td class="text-right">
                {{ toCurrency($row->p14) }}
            </td>
            <td></td>
        </tr>
        <tr>
            <td class="text-right" style="width:5%">
                15.
            </td>
            <td>Potongan C</td>
            <td class="text-right">
                {{ toCurrency($row->p15) }}
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
        <tr>
            <td colspan="4">
                <strong>Keterangan:<strong>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                {{ $satker->keterangan }}
            </td>
        </tr>
    </table>
</body>

</html>
