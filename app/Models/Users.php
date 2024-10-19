<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
  public $primaryKey  = 'id';
  protected $table = 'users';

  public function satuankerja()
  {
    return $this->belongsTo(Satker::class, 'satker', 'kode');
  }
}
