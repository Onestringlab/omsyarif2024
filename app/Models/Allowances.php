<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Allowances extends Model
{
	use HasFactory;

	public $primaryKey  = 'id';
	protected $table = 'allowances';
	protected $fillable = [
		'month_id', 'nip', 'nmpeg', 'npwp', 'rekening', 'nmbankspan', 'gjpokok', 'tjistri', 'tjanak',
		'tjupns', 'tjstruk', 'tjfungs', 'tjdaerah', 'tjpencil', 'tjlain', 'tjkompen', 'pembul',
		'tjberas', 'tjpph', 'tottun', 'kotor', 'potpfkbul', 'potpfk2', 'potpfk10', 'potpph',
		'potswrum', 'potkelbtj', 'potlain', 'pottabrum', 'totpot', 'bersih', 'bpjs', 'bpjs2'
	];

	function months()
	{
		return $this->belongsTo('App\Models\Months', 'month_id');
	}
}
