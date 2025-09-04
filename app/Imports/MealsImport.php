<?php

namespace App\Imports;

use App\Models\Meal;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;


class MealsImport implements ToModel, WithHeadingRow, WithCalculatedFormulas, WithMultipleSheets//, WithStartRow

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

	// public function startRow(): int
	// {
	// return 2;
	// }

	public function model(array $row)
	{
		if ($row['bln'] === null || $row['thn'] === null) {
			return null;
		} else {
			$nogaji = $row['nogaji'] ?? ($row['nomakan'] ?? null);
			if(isset($row['potongan'])){
				$pph = $row['pph'];
				$potongan = $row['potongan'];
			}
			else {
				$pph = ($row['pph'] / $row['kotor']) * 100;
				$potongan = $row['pph'];
			}
			return new Meal([
				'month_id' => $this->month_id,
				'kdsatker' => Auth::user()->satker,
				'bln' => $row['bln'],
				'tahun' => $row['thn'],
				'tanggal' =>$row['tgl'],
				'nogaji' => $nogaji,
				'nip' => $row['nip'],
				'nmpeg' => $row['nmpeg'],
				'kdgol' => $row['kdgol'],
				'npwp' => '',
				'kdbankspan' =>'', 
				'nmbankspan' => '', 
				'norek' => '', 
				'nmrek' => '', 
				'nmcabbank' => '', 
				'jmlhari' => $row['jmlhari'],
				'tarif' => $row['tarif'],
				'pph' => $pph,
				'kotor' => $row['kotor'],
				'potongan' => $potongan,
				'bersih' => $row['bersih']
			]);
		}
	}
	public function sheets(): array
	{
		return [0 => $this];
	}
}
