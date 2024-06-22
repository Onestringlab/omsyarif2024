<?php

namespace App\Imports;

use App\Models\Salaries;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SalaryModel implements ToModel, WithHeadingRow
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

  public function model(array $row)
  {
    return new Salaries([
      'month_id' => $this->month_id,
      'name' =>  $row['nmpeg'],
      'nip' => $row['nip'],
      'gol' => $row['gol'],
      'rekening' =>  '', //$row['rekening'],
      'bank' =>  '', //$row['nm_bank'],
      'bersih' =>  $row['bersih'],
      'p1' =>  $row['p1'],
      'p2' =>  $row['p2'],
      'p3' =>  $row['p3'],
      'p4' =>  $row['p4'],
      'p5' =>  $row['p5'],
      'p6' =>  $row['p6'],
      'p7' =>  $row['p7'],
      'p8' =>  $row['p8'],
      'p9' =>  $row['p9'],
      'p10' =>  $row['p10'],
      'p11' =>  $row['p11'],
      'p12' =>  $row['p12'],
      'p13' =>  $row['p13'],
      'p14' =>  $row['p14'],
      'p15' =>  $row['p15'],
      'point' => $row['potinternal'],
      'bayar' => $row['bayar']
    ]);
  }
}
