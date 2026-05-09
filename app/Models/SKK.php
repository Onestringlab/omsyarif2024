<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SKK extends Model
{
    protected $table = 'skk';

    protected $fillable = [
        'keluarga_pegawai_id',
        'nomor_surat',
        'tanggal_surat',
        'tanggal_berakhir',
        'file_skk',
    ];

    protected $casts = [
        'tanggal_surat' => 'date',
        'tanggal_berakhir' => 'date',
    ];

    public function keluargaPegawai()
    {
        return $this->belongsTo(KeluargaPegawai::class, 'keluarga_pegawai_id');
    }
}