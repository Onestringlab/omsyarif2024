<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grand extends Model
{
    use HasFactory;
    public $primaryKey  = 'id';
    protected $table = 'grands';
    protected $guarded = [];

    function months()
    {
        return $this->belongsTo('App\Models\Months', 'month_id');
    }
}
