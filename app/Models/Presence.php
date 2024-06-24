<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Presence extends Model
{
	use HasFactory;
	public $primaryKey  = 'id';
	protected $table = 'presences';
	protected $guarded = [];

	function months()
	{
		return $this->belongsTo('App\Models\Months', 'month_id');
	}
}
