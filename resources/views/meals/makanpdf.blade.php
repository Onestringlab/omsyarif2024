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
        <center>SLIP UANG MAKAN</center>
    </h3>
    <table class="table-bordered">
        <tr>
            <td colspan=" 3"> <strong>{{ strtoupper($satker->nama) }}</strong></td>
        </tr>
        <tr>
            <td width="80px">Pembayaran</td>
            <td width="10px">:</td>
            <td>Uang Makan {{ $row->months->month }} {{ $row->months->year }}</td>
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
            <td colspan=2>
                <hr>
            </td>
        </tr>
        <tr>
            <td>Jumlah Kotor</td>
            <td class="text-right">{{ toCurrency($row->kotor) }}</td>
        </tr>
        <tr>
            <td colspan=2>
                &nbsp;
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
            <td colspan=2>
                <hr>
            </td>
        </tr>
        <tr>
            <td><strong>Jumlah Bersih</strong></td>
            <td class="text-right"><strong>{{ toCurrency($row->bersih) }}</strong></td>
        </tr>
    </table>

</body>

</html>