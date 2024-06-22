<?php

namespace App\Imports;

use App\Models\Grand;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class GrandsImport implements ToModel, WithStartRow

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
		if ($row[1] === null || $row[2] === null) {
			return null;
		} else {
			return new Grand([
				'month_id'	=> $this->month_id,
				'nama' => $row[1],
				'nip' => $row[2],
				'npwp' => '', //$row[3],
				'panggol' => $row[4],
				'jabatan' => $row[5],
				'grad' => $row[6],
				'maxmedmin' => $row[7],
				'tunjangan' => $row[9],
				'potabs' => $row[10],
				'potkim' => $row[11],
				'jumlahpot' => $row[12],
				'jumtunjsetpot' => $row[13],
				'tunjpph' => $row[14],
				'bruto' => $row[15],
				'potpph' => $row[16],
				'netto' => $row[17]
			]);
		}
	}
}
