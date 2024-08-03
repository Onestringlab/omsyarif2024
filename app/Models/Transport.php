<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transport extends Model
{
    use HasFactory;

    protected $fillable = [
        'month_id',
        'nama',
        'nip_nik',
        'pangkat_gol',
        'jabatan',
        'standar_biaya',
        'satker',
        'total_kehadiran',
        'fasilitas_kendaraan_dinas',
        'fasilitas_uang_transportasi',
        'jumlah_diterima',
    ];

    function months()
    {
        return $this->belongsTo('App\Models\Months', 'month_id');
    }
}
