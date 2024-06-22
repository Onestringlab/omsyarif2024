<?php

namespace App\Imports;

use App\Models\Allowances;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithProgressBar;


class AllowanceModel implements ToModel, WithHeadingRow
{
  /**
   * @param array $row
   *
   * @return \Illuminate\Database\Eloquent\Model|null
   */

  private $month_id;
  private $totun;

  public function  __construct($month_id)
  {
    $this->month_id = $month_id;
  }

  public function model(array $row)
  {
    return new Allowances([
      'month_id' => $this->month_id,
      'nip' => $row['nip'],
      'nmpeg' => $row['nmpeg'],
      'npwp' => '', // $row['npwp'],
      'rekening' => '', // $row['rekening'],
      'nmbankspan' =>'', // $row['nmbankspan'],
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
      'tottun' => $row['tjistri'] + $row['tjanak'] + $row['tjupns'] + $row['tjstruk'] + $row['tjfungs'] + $row['tjdaerah'] + $row['tjpencil'] + $row['tjlain'] + $row['tjkompen'] +  $row['tjberas'] + $row['tjpph'] + $row['pembul'],
      'kotor' => $row['gjpokok'] + $row['tjistri'] + $row['tjanak'] + $row['tjupns'] + $row['tjstruk'] + $row['tjfungs'] + $row['tjdaerah'] + $row['tjpencil'] + $row['tjlain'] + $row['tjkompen'] +  $row['tjberas'] + $row['tjpph'] + $row['pembul'],
      'potpfkbul' => $row['potpfkbul'],
      'potpfk2' => $row['potpfk2'],
      'potpfk10' => $row['potpfk10'],
      'potpph' => $row['potpph'],
      'potswrum' => $row['potswrum'],
      'potkelbtj' => $row['potkelbtj'],
      'potlain' => $row['potlain'],
      'pottabrum' => $row['pottabrum'],
      'bpjs' => $row['bpjs'],
      'bpjs2' => $row['bpjs2'] ?? 0,
      'totpot' => $row['potpfkbul'] + $row['potpfk2'] + $row['potpfk10'] + $row['potpph'] + $row['potswrum'] + $row['potkelbtj'] + $row['potlain'] + $row['pottabrum'] + $row['bpjs'] + ($row['bpjs2'] ?? 0),
      'bersih' => $row['bersih'],
    ]);
  }
}
