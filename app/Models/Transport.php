<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
