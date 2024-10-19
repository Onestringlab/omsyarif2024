<?php

namespace App\Imports;

use App\Models\Potongan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class PotongansImport implements ToModel, WithHeadingRow, WithCalculatedFormulas, WithMultipleSheets
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

  public function sheets(): array
  {
    return [0 => $this];
  }

  public function model(array $row)
  {
    return new Potongan([
      'month_id' => $this->month_id,
      'nip' =>  $row['nip'],
      'nama' =>  $row['nama'],
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
      'jumlah' => $row['jumlah']
    ]);
  }
}
