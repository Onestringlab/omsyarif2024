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
            width: 100%;
        }

        .table-border-bottom {
            border-bottom: 1px solid black;
        }

        td {
            padding-left: 5px;
            padding-right: 5px;
        }

        .wrapper-table {
            width: 95%;
            margin-left: auto;
            margin-right: auto;
        }

        .wrapper-table td {
            vertical-align: top;
        }
    </style>
</head>

<body>
    <table class="wrapper-table">
        <tr>
            @foreach ($rows as $index => $row)
            <td width="50%">
                <h3>
                    <center>SLIP UANG MAKAN</center>
                </h3>
                <table class="table-bordered">
                    <tr>
                        <td colspan="2"><strong>{{ strtoupper($satker->nama) }}</strong></td>
                    </tr>
                    <tr>
                        <td width="80px">Pembayaran</td>
                        <td>: Uang Makan {{ $row->months->month }} {{ $row->months->year }}</td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>: {{$row->nmpeg}}</td>
                    </tr>
                    <tr>
                        <td>NIP</td>
                        <td>: {{ $row->nip }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <hr>
                        </td>
                    </tr>
                </table>

                <table class="table-bordered">
                    <tr>
                        <td colspan="2">
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
                        <td colspan="2">
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Jumlah Kotor</strong></td>
                        <td class="text-right"><strong>{{ toCurrency($row->kotor) }}</strong></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                             
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <strong>Potongan</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>Pajak Penghasilan</td>
                        <td class="text-right">(-) {{ toCurrency($row->potongan) }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Jumlah Bersih</strong></td>
                        <td class="text-right"><strong>{{ toCurrency($row->bersih) }}</strong></td>
                    </tr>
                </table>
                <br><br>
                <br><br>
            </td>
            @if ($index % 2 == 1)
        </tr>
        <tr>
            @endif
            @endforeach
            @if (count($rows) % 2 == 1)
            <td></td>
            @endif
        </tr>
    </table>
</body>

</html>