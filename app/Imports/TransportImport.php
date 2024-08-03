<?php

namespace App\Imports;

use App\Models\Transport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;


class TransportImport implements ToModel, WithStartRow

{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    private $month_id;

    public function  __construct($month_id)
    {
        $this->month_id = $month_id;
    }

    public function startRow(): int
    {
        return 7;
    }

    public function model(array $row)
    {
        if ($row[1] === null || $row[2] === null) 
        {
            return null;
        } else 
        {
            return new Transport([
                'month_id' => $this->month_id,
                'nama' => $row[1],
                'nip_nik' => $row[2],
                'pangkat_gol' => $row[3],
                'jabatan' => $row[4],
                'standar_biaya' => $row[5],
                'satker' => $row[6],
                'total_kehadiran' => $row[7],
                'fasilitas_kendaraan_dinas' => $row[8],
                'fasilitas_uang_transportasi' => $row[9],
                'jumlah_diterima' => $row[10]
            ]);
        }
    }
}
