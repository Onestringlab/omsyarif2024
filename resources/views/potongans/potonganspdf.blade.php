<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slip POTONGAN</title>
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
        <center>SLIP POTONGAN</center>
    </h3>
    <strong>{{ strtoupper($satker->nama) }}</strong></br>
    <table style="width: 100%;">
        <tr>
            <td>Pemotongan</td>
            <td>:</td>
            <td>Penghasilan {{ $row->months->month }} {{ $row->months->year }}</td>
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
            <td colspan="2">
                <strong>Potongan</strong>
            </td>
            <td></td>
        </tr>
        <tr>
            <td class="text-right" style="width:5%">
                1.
            </td>
            <td>
                {{ $nkt->p1 }}
            </td>
            <td class="text-right">
                {{ toCurrency($row->p1) }}
            </td>
        </tr>
        <tr>
            <td class="text-right">
                2.
            </td>
            <td>
                {{ $nkt->p2 }}
            </td>
            <td class="text-right">
                {{ toCurrency($row->p2) }}
            </td>
        </tr>
        <tr>
            <td class="text-right">
                3.
            </td>
            <td>
                {{ $nkt->p3 }}  
            </td>
            <td class="text-right">
                {{ toCurrency($row->p3) }}
            </td>
        </tr>
        <tr>
            <td class="text-right">
                4.
            </td>
            <td>{{ $nkt->p4 }}</td>
            <td class="text-right">
                {{ toCurrency($row->p4) }}
            </td>
        </tr>
        <tr>
            <td class="text-right">
                5.
            </td>
            <td>{{ $nkt->p5 }}</td>
            <td class="text-right">
                {{ toCurrency($row->p5) }}
            </td>
        </tr>
        <tr>
            <td class="text-right">
                6.
            </td>
            <td>{{ $nkt->p6 }}</td>
            <td class="text-right">
                {{ toCurrency($row->p6) }}
            </td>
        </tr>
        <tr>
            <td class="text-right">
                7.
            </td>
            <td>{{ $nkt->p7 }}</td>
            <td class="text-right">
                {{ toCurrency($row->p7) }}
            </td>
        </tr>
        <tr>
            <td class="text-right">
                8.
            </td>
            <td>{{ $nkt->p8 }}</td>
            <td class="text-right">
                {{ toCurrency($row->p8) }}
            </td>
        </tr>
        <tr>
            <td class="text-right">
                9.
            </td>
            <td>{{ $nkt->p9 }}</td>
            <td class="text-right">
                {{ toCurrency($row->p9) }}
            </td>
        </tr>
        <tr>
            <td class="text-right">
                10.
            </td>
            <td>{{ $nkt->p1 }}0</td>
            <td class="text-right">
                {{ toCurrency($row->p10) }}
            </td>
        </tr>
        <tr>
            <td class="text-right">
                11.
            </td>
            <td>{{ $nkt->p11 }}</td>
            <td class="text-right">
                {{ toCurrency($row->p11) }}
            </td>
        </tr>
        <tr>
            <td class="text-right">
                12.
            </td>
            <td>{{ $nkt->p12 }}</td>
            <td class="text-right">
                {{ toCurrency($row->p12) }}
            </td>
        </tr>
        <tr>
            <td class="text-right">
                13.
            </td>
            <td>{{ $nkt->p13 }}</td>
            <td class="text-right">
                {{ toCurrency($row->p13) }}
            </td>
        </tr>
        <tr>
            <td class="text-right" style="width:5%">
                14.
            </td>
            <td>{{ $nkt->p14 }}</td>
            <td class="text-right">
                {{ toCurrency($row->p14) }}
            </td>
        </tr>
        <tr>
            <td class="text-right" style="width:5%">
                15.
            </td>
            <td>{{ $nkt->p15 }}</td>
            <td class="text-right">
                {{ toCurrency($row->p15) }}
            </td>
        </tr>
        <tr>
            <td class="text-right" colspan="3">
                <hr>
            </td>
        </tr>
        <tr>
            <td class="text-right"></td>
            <td>
                <strong>Jumlah</strong>
            </td>
            <td class="text-right">
                <strong>{{ toCurrency($row->jumlah) }}</strong>
            </td>
        </tr>
    </table>
</body>

</html>
