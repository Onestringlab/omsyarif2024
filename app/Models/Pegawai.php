<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pegawai extends Model
{
    protected $table = 'pegawai';

    protected $fillable = [
        'nip',
        'kdsatker_induk',
        'kdsatker_bekerja',
        'kdsatker_bayar',
        'kdanak',
        'nama',
        'jenis_kelamin',
        'golongan',
        'nama_golongan',
        'jabatan',
        'kdduduk',
        'kdgapok',
        'kdkawin',
        'pberas',
        'kdhakim',
        'kdpapua',
        'kdpencil',
        'tahungapok',
        'kdbpjs2',
        'bulanakhir',
        'tahunakhir',
        'kdjab',
        'jablain',
        'tumum',
        'sewarumah',
    ];

    protected $casts = [
        'pberas' => 'integer',
        'kdhakim' => 'integer',
        'kdpapua' => 'integer',
        'kdpencil' => 'integer',
        'tumum' => 'decimal:2',
        'sewarumah' => 'decimal:2',
    ];

    /**
     * Pegawai wajib terhubung ke user berdasarkan NIP.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'nip', 'nip');
    }

    /**
     * Scope: batasi data pegawai sesuai satker user login.
     */
    public function scopeSatkerLogin($query)
    {
        return $query->whereHas('user', function ($q) {
            $q->where('satker', auth()->user()->satker);
        });
    }

    /**
     * Scope: filter berdasarkan satker tertentu.
     */
    public function scopeSatker($query, string $kodeSatker)
    {
        return $query->whereHas('user', function ($q) use ($kodeSatker) {
            $q->where('satker', $kodeSatker);
        });
    }

    public function dokumen()
    {
        return $this->hasMany(DokumenPegawai::class, 'nip', 'nip');
    }

    public function keluarga()
    {
        return $this->hasMany(KeluargaPegawai::class, 'nip', 'nip');
    }
}