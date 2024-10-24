<?php

namespace App\Imports;

use App\Models\Presence;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
// use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PresencesImport implements ToModel, WithStartRow
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
		return 12;
	}

	public function model(array $row)
	{
		if ($row[1] == '' || $row[2] == '') {
			return null;
		} else {
			return new Presence([
				'month_id'	=> $this->month_id,
				'nama' 			=> $row[1],
				'nip' 			=> $row[2],
				'jabatan' 	=> $row[3],
				'vd' => ($row[4] == '-') ? 0 : $row[4],
				'tkd' => ($row[5] == '-') ? 0 : $row[5],
				'tl1' => ($row[6] == '-') ? 0 : $row[6],
				'tl2' => ($row[7] == '-') ? 0 : $row[7],
				'tl3' => ($row[8] == '-') ? 0 : $row[8],
				'tl4' => ($row[9] == '-') ? 0 : $row[9],
				'thm' => ($row[10] == '-') ? 0 : $row[10],
				'vp' => ($row[11] == '-') ? 0 : $row[11],
				'ik' => ($row[12] == '-') ? 0 : $row[12],
				'psw1' => ($row[13] == '-') ? 0 : $row[13],
				'psw2' => ($row[14] == '-') ? 0 : $row[14],
				'psw3' => ($row[15] == '-') ? 0 : $row[15],
				'psw4' => ($row[16] == '-') ? 0 : $row[16],
				'thp' => ($row[17] == '-') ? 0 : $row[17],
				'i' => ($row[18] == '-') ? 0 : $row[18],
				'dls' => ($row[19] == '-') ? 0 : $row[19],
				'ct' => ($row[20] == '-') ? 0 : $row[20],
				'clt' => ($row[21] == '-') ? 0 : $row[21],
				'cpp' => ($row[22] == '-') ? 0 : $row[22],
				'ctl' => ($row[23] == '-') ? 0 : $row[23],
				'tb' => ($row[24] == '-') ? 0 : $row[24],
				'ld' => ($row[25] == '-') ? 0 : $row[25],
				'bmt' => ($row[26] == '-') ? 0 : $row[26],
				'ib' => ($row[27] == '-') ? 0 : $row[27],
				'tmk' => ($row[28] == '-') ? 0 : $row[28],
				'cs1' => ($row[29] == '-') ? 0 : $row[29],
				'cs14' => ($row[30] == '-') ? 0 : $row[30],
				'cm1' => ($row[31] == '-') ? 0 : $row[31],
				'cm2' => ($row[32] == '-') ? 0 : $row[32],
				'cm3' => ($row[33] == '-') ? 0 : $row[33],
				'cm41' => ($row[34] == '-') ? 0 : $row[34],
				'cm42' => ($row[35] == '-') ? 0 : $row[35],
				'cm43' => ($row[36] == '-') ? 0 : $row[36],
				'cap1' => ($row[37] == '-') ? 0 : $row[37],
				'cap10' => ($row[38] == '-') ? 0 : $row[38],
				'cb1' => ($row[39] == '-') ? 0 : $row[39],
				'cb2' => ($row[40] == '-') ? 0 : $row[40],
				'cb3' => ($row[41] == '-') ? 0 : $row[41],
				'tk' => ($row[42] == '-') ? 0 : $row[42],
				'ptk' => ($row[43] == '-') ? 0 : $row[43],
				'kum' => 0, #($row[44] == '-') ? 0 : $row[44],
				'kut' => 0, #($row[45] == '-') ? 0 : $row[45]
			]);
		}
	}
}
