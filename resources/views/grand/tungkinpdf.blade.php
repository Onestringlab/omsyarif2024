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

        .table-bordered {
            border-collapse: collapse;
            margin-left: auto;
            margin-right: auto;
            width: 80%;
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
        <center>SLIP TUNJANGAN KINERJA</center>
    </h3>
    <table class="table-bordered">
        <tr>
            <td colspan=" 3"><strong>{{ strtoupper($satker->nama) }}</strong></td>
        </tr>
        <tr>
            <td width="80px">Pembayaran</td>
            <td width="10px">:</td>
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

    <table class="table-bordered">
        <tr>
            <td><strong>Tunjangan Kinerja</strong></td>
            <td class="text-right"><strong>{{ toCurrency($row->tunjangan) }}</strong></td>
        </tr>
        <tr>
            <td>Potongan Absensi & Kinerja</td>
            <td class="text-right">(-) {{ toCurrency($row->jumlahpot) }}</td>
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