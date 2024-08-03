<?php

namespace App\Imports;

use App\Models\Meal;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;


class MealsImport implements ToModel, WithStartRow

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
	return 2;
	}

	public function model(array $row)
	{
		if ($row[1] === null || $row[2] === null) {
			return null;
		} else {
			return new Meal([
				'month_id' => $this->month_id,
				'kdsatker' => Auth::user()->satker,
				'bln' => $row[1],
				'tahun' => $row[2],
				'tanggal' =>$row[3],
				'nogaji' =>$row[4],
				'nip' => $row[5],
				'nmpeg' => $row[6],
				'kdgol' => $row[7],
				'npwp' => '',
				'kdbankspan' =>'', 
				'nmbankspan' => '', 
				'norek' => '', 
				'nmrek' => '', 
				'nmcabbank' => '', 
				'jmlhari' => $row[14],
				'tarif' => $row[15],
				'pph' => $row[16],
				'kotor' => $row[17],
				'potongan' => $row[18],
				'bersih' => $row[19]
			]);
		}
	}
}
