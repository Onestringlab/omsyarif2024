<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nomenklatur extends Model
{
    use HasFactory;

    public $primaryKey  = 'id';
    protected $table = 'nomenklaturs';

    function satker()
    {
        return $this->belongsTo('App\Models\Satker','kode_satker', 'kode');
    }
}
