<?php

namespace App\Imports;

use App\Models\Allowances;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AdhocImport implements ToModel, WithHeadingRow
{
    private $month_id;

    public function __construct($month_id)
    {
        $this->month_id = $month_id;
    }

    public function model(array $row)
    {

        $gjpokok = $row['penghasilan'] ?? 0;
        $tjpph   = $row['tunjpph'] ?? 0;

        $potpph  = $row['pph'] ?? 0;
        $bpjs    = $row['iuran'] ?? 0;
        $bpjs2   = $row['iurankel'] ?? 0;

        $totpot = $potpph + $bpjs + $bpjs2;

        return new Allowances([

            'month_id' => $this->month_id,

            'nip' => $row['nikppnpn'],
            'nmpeg' => $row['nmppnpn'],

            'npwp' => '',
            'rekening' => '',
            'nmbankspan' => '',

            'gjpokok' => $gjpokok,

            'tjistri' => 0,
            'tjanak' => 0,
            'tjupns' => 0,
            'tjstruk' => 0,
            'tjfungs' => 0,
            'tjdaerah' => 0,
            'tjpencil' => 0,
            'tjlain' => 0,
            'tjkompen' => 0,
            'pembul' => 0,
            'tjberas' => 0,

            'tjpph' => $tjpph,

            'tottun' => $tjpph,

            'kotor' => $gjpokok + $tjpph,

            'potpfkbul' => 0,
            'potpfk2' => 0,
            'potpfk10' => 0,

            'potpph' => $potpph,
            'potswrum' => 0,
            'potkelbtj' => 0,
            'potlain' => 0,
            'pottabrum' => 0,

            'bpjs' => $bpjs,
            'bpjs2' => $bpjs2,

            'totpot' => $totpot,

            'bersih' => $row['nilterima'] ?? ($gjpokok + $tjpph - $totpot),
        ]);
    }
}
