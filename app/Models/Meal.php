<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;
    public $primaryKey  = 'id';
    protected $table = 'meals';
    protected $guarded = [];

    function months()
    {
        return $this->belongsTo('App\Models\Months', 'month_id');
    }
}
