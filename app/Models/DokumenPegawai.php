<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DokumenPegawai extends Model
{
    protected $table = 'dokumen_pegawai';

    protected $fillable = [
        'nip',
        'jenis_dokumen',
        'nomor_dokumen',
        'tanggal_dokumen',
        'keterangan',
        'nama_file',
        'path_file',
        'uploaded_by',
    ];

    protected $casts = [
        'tanggal_dokumen' => 'date',
    ];

    public const JENIS_DOKUMEN = [
        'naik_pangkat' => 'SK Kenaikan Pangkat',
        'kgb' => 'SK KGB',
        'jabatan' => 'SK Jabatan',
        'kp4' => 'SK KP4',
        'rumah_dinas' => 'SK Rumah Dinas',
        'cuti' => 'Cuti',
        'hukuman_disiplin' => 'Hukuman Disiplin',
        'lain_lain' => 'Dokumen Lain-lain',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'nip', 'nip');
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'nip', 'nip');
    }

    public function getJenisLabelAttribute()
    {
        return self::JENIS_DOKUMEN[$this->jenis_dokumen] ?? $this->jenis_dokumen;
    }
}