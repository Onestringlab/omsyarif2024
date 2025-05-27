<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slip Uang Transportasi</title>
    <style>
        @page {
            size: A4;
            margin: 15mm 5mm 5mm 0mm;
        }

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
            padding-left: 20px;
            padding-right: 10px;
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
                    <center>SLIP UANG TRANSPORTASI</center>
                </h3>
                <table class="table-bordered">
                    <tr>
                        <td colspan="2"><strong>{{ strtoupper($satker->nama) }}</strong></td>
                    </tr>
                    <tr>
                        <td width="80px">Pembayaran</td>
                        <td>: Uang Transportasi {{ $row->months->month }} {{ $row->months->year }}</td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>: {{ $row->nama }}</td>
                    </tr>
                    <tr>
                        <td>NIP/NIK</td>
                        <td>: {{ $row->nip_nik }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <hr>
                        </td>
                    </tr>
                </table>

                <table class="table-bordered">
                    <tr>
                        <td>Jumlah Kehadiran</td>
                        <td class="text-right">{{ toCurrency($row->total_kehadiran) }} Hari</td>
                    </tr>
                    <tr>
                        <td>Fasilitas Kendaraan Dinas</td>
                        <td class="text-right">(-) {{ toCurrency($row->fasilitas_kendaraan_dinas) }} Hari</td>
                    </tr>
                    <tr>
                        <td>Fasilitas Uang Transportasi </td>
                        <td class="text-right">{{ toCurrency($row->fasilitas_uang_transportasi) }} Hari</td>
                    </tr>
                    <tr>
                        <td>Standar Biaya</td>
                        <td class="text-right">(x) {{ toCurrency($row->standar_biaya) }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <td>Jumlah</td>
                        <td class="text-right">{{ toCurrency($row->jumlah_diterima) }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                             
                        </td>
                    </tr>
                </table>
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