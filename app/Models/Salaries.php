<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salaries extends Model
{

  use HasFactory;

  public $primaryKey  = 'id';
  protected $table = 'salaries';
  protected $fillable = [
    'month_id', 'nip', 'name', 'gol', 'rekening', 'bank', 'bersih',
    'p1', 'p2', 'p3', 'p4', 'p5', 'p6', 'p7', 'p8', 'p9',
    'p10', 'p11', 'p12', 'p13', 'p14', 'p15', 'point', 'bayar'

  ];

  function months()
  {
    return $this->belongsTo('App\Models\Months', 'month_id');
  }
}
