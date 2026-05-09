<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KeluargaPegawai extends Model
{
    protected $table = 'keluarga_pegawai';

    protected $fillable = [
        'nip',
        'nama',
        'tanggal_lahir',
        'hubungan',
        'tanggungan',
        'sekolah',
    ];
}