<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slip Tunjangan Kinerja</title>
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
        <center>SLIP TUNJANGAN KINERJA</center>
    </h3>
    <strong>{{ strtoupper($satker->nama) }}</strong></br>
    <table style="width: 100%;">
        <tr>
            <td>Pembayaran</td>
            <td>:</td>
            <td>Tunjangan Kinerja {{ $row->months->month }} {{ $row->months->year }}</td>
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
        <tr>
            <td colspan="3">
                <hr>
            </td>
        </tr>
    </table>

    <table style="width:100%">
        <tr>
            <td><strong>Tunjangan Kinerja</strong></td>
            <td class="text-right"><strong>{{ toCurrency($row->tunjangan) }}</strong></td>
        </tr>
        <tr>
            <td>Potongan</td>
            <td class="text-right">(-) {{ toCurrency($row->potpph) }}</td>
        </tr>
        <tr>
            <td colspan=2>
                <hr>
            </td>
        </tr>
        <tr>
            <td>Jumlah Setelah Potongan</td>
            <td class="text-right">{{ toCurrency($row->jumtunjsetpot) }}</td>
        </tr>
        <tr>
            <td>Tunjangan PPh</td>
            <td class="text-right">(+) {{ toCurrency($row->tunjpph) }}</td>
        </tr>
        <tr>
            <td colspan=2>
                <hr>
            </td>
        </tr>
        <tr>
            <td>Jumlah Kotor</td>
            <td class="text-right">{{ toCurrency($row->bruto) }}</td>
        </tr>
        <tr>
            <td>Potongan PPh</td>
            <td class="text-right">(-) {{ toCurrency($row->potpph) }}</td>
        </tr>
        <tr>
            <td colspan=2>
                <hr>
            </td>
        </tr>
        <tr>
            <td><strong>Jumlah Bersih</strong></td>
            <td class="text-right"><strong>{{ toCurrency($row->netto) }}</strong></td>
        </tr>
    </table>

</body>

</html>
