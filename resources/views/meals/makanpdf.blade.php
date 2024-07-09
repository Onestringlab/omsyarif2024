<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slip Uang Makan</title>
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
        <center>SLIP UANG MAKAN</center>
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
        <tr>
            <td colspan="3">
                <hr>
            </td>
        </tr>
    </table>

    <table style="width:100%">
        <tr>
            <td colspan=2>
                <strong>Penghasilan</strong>
            </td>
        </tr>
        <tr>
            <td>Jumlah Kehadiran</td>
            <td class="text-right">{{ toCurrency($row->jmlhari) }}</td>
        </tr>
        <tr>
            <td>Tarif</td>
            <td class="text-right">(x) {{ toCurrency($row->tarif) }}</td>
        </tr>
        <tr>
            <td>Jumlah Kotor</td>
            <td class="text-right">{{ toCurrency($row->kotor) }}</td>
        </tr>
        <tr>
            <td colspan=2>
                <hr>
            </td>
        </tr>
        <tr>
            <td colspan=2>
                <strong>Potongan</strong>
            </td>
        </tr>
        <tr>
            <td>Pajak Penghasilan</td>
            <td class="text-right">(-) {{ toCurrency($row->potongan) }}</td>
        </tr>
        <tr>
            <td>Jumlah Bersih</td>
            <td class="text-right"><strong>{{ toCurrency($row->bersih) }}</strong></td>
        </tr>
        <tr>
            <td colspan=2>
                <hr>
            </td>
        </tr>
    </table>

</body>

</html>
