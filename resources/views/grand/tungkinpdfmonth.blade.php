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
            width: 100%;
            margin-left: auto;
            margin-right: auto;
        }

        .wrapper-table td {
            vertical-align: top;
            padding-right: 15px;
        }
    </style>
</head>

<body>
    <table class="wrapper-table">
        <tr>
            @foreach ($rows as $index => $row)
            <td>
                <h3>
                    <center>SLIP TUNJANGAN KINERJA</center>
                </h3>
                <table class="table-bordered">
                    <tr>
                        <td colspan="2"><strong>{{ strtoupper($satker->nama) }}</strong></td>
                    </tr>
                    <tr>
                        <td width="80px">Pembayaran</td>
                        <td>: Tunjangan Kinerja {{ $row->months->month }} {{ $row->months->year }}</td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>: {{ $row->nama }}</td>
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
                        <td><strong>Tunjangan Kinerja</strong></td>
                        <td class="text-right"><strong>{{ toCurrency($row->tunjangan) }}</strong></td>
                    </tr>
                    <tr>
                        <td>Potongan Absensi & Kinerja</td>
                        <td class="text-right">(-) {{ toCurrency($row->jumlahpot) }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">
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
                        <td colspan="2">
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
                        <td colspan="2">
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Jumlah Bersih</strong></td>
                        <td class="text-right"><strong>{{ toCurrency($row->netto) }}</strong></td>
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