<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slip Uang Transportasi</title>
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
        <center>SLIP UANG TRANSPORTASI</center>
    </h3>
    <strong>{{ strtoupper($satker->nama) }}</strong></br>
    <table style="width: 100%;">
        <tr>
            <td>Pembayaran</td>
            <td>:</td>
            <td>Uang Transportasi {{ $row->months->month }} {{ $row->months->year }}</td>
        </tr>
        <tr>
            <td>NIP</td>
            <td>:</td>
            <td>{{ $row->nip_nik }}</td>
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
            <td>Jumlah Kehadiran</td>
            <td class="text-right">{{ toCurrency($row->total_kehadiran) }} hari</td>
        </tr>
        <tr>
            <td>Fasilitas Kendaraan Dinas</td>
            <td class="text-right">{{ toCurrency($row->fasilitas_kendaraan_dinas) }} hari</td>
        </tr>
        <tr>
            <td>Fasilitas Uang Tranportasi </td>
            <td class="text-right">{{ toCurrency($row->fasilitas_uang_transportasi) }} hari</td>
        </tr>
        <tr>
            <td>Standar Biaya</td>
            <td class="text-right">(x) {{ toCurrency($row->standar_biaya) }}</td>
        </tr>
        <tr>
            <td colspan=2>
                <hr>
            </td>
        </tr>
        <tr>
            <td>Jumlah</td>
            <td class="text-right">{{ toCurrency($row->jumlah_diterima) }}</td>
        </tr>
        <tr>
            <td colspan=2>
                &nbsp;
            </td>
        </tr>
    </table>

</body>

</html>