<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SalaryShortages extends Model
{
    use HasFactory;

    public $primaryKey = 'id';
    protected $table = 'salary_shortages';

    protected $fillable = [
        'nip',
        'month_id',
        'nmpeg',
        'npwp',
        'rekening',
        'nmbankspan',
        'gjpokok',
        'tjistri',
        'tjanak',
        'tjupns',
        'tjstruk',
        'tjfungs',
        'tjdaerah',
        'tjpencil',
        'tjlain',
        'tjkompen',
        'pembul',
        'tjberas',
        'tjpph',
        'tottun',
        'kotor',
        'potpfkbul',
        'potpfk2',
        'potpfk10',
        'potpph',
        'potswrum',
        'totpot',
        'bersih',
        'bpjs',
        'bpjs2',
        'keterangan'
    ];

    function months()
    {
        return $this->belongsTo('App\Models\Months', 'month_id');
    }
}
