<?php

namespace App\Imports;

use App\Models\SalaryShortages;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ShortStagesModel implements ToModel, WithHeadingRow
{

    private $month_id;
    private $keterangan;

    public function __construct($month_id, $keterangan)
    {
        $this->month_id = $month_id;
        $this->keterangan = $keterangan;
    }

    public function model(array $row)
    {

        $tottun =
            $row['tjistri'] +
            $row['tjanak'] +
            $row['tjupns'] +
            $row['tjstruk'] +
            $row['tjfungs'] +
            $row['tjdaerah'] +
            $row['tjpencil'] +
            $row['tjlain'] +
            $row['tjkompen'] +
            $row['tjberas'] +
            $row['tjpph'] +
            $row['pembul'];

        $kotor =
            $row['gjpokok'] +
            $tottun;

        $totpot =
            $row['potpfkbul'] +
            $row['potpfk2'] +
            $row['potpfk10'] +
            $row['potpph'] +
            $row['potswrum'] +
            $row['bpjs'] +
            ($row['bpjs2'] ?? 0);

        return new SalaryShortages([

            'month_id' => $this->month_id,

            'nip' => $row['nip'],
            'nmpeg' => $row['nmpeg'],

            'gjpokok' => $row['gjpokok'],
            'tjistri' => $row['tjistri'],
            'tjanak' => $row['tjanak'],
            'tjupns' => $row['tjupns'],
            'tjstruk' => $row['tjstruk'],
            'tjfungs' => $row['tjfungs'],
            'tjdaerah' => $row['tjdaerah'],
            'tjpencil' => $row['tjpencil'],
            'tjlain' => $row['tjlain'],
            'tjkompen' => $row['tjkompen'],
            'pembul' => $row['pembul'],
            'tjberas' => $row['tjberas'],
            'tjpph' => $row['tjpph'],

            'tottun' => $tottun,
            'kotor' => $kotor,

            'potpfkbul' => $row['potpfkbul'],
            'potpfk2' => $row['potpfk2'],
            'potpfk10' => $row['potpfk10'],
            'potpph' => $row['potpph'],
            'potswrum' => $row['potswrum'],

            'bpjs' => $row['bpjs'],
            'bpjs2' => $row['bpjs2'] ?? 0,

            'totpot' => $totpot,
            'bersih' => $row['bersih'],

            'keterangan' => $this->keterangan

        ]);
    }
}
