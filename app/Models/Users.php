<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
  public $primaryKey  = 'id';
  protected $table = 'users';
}