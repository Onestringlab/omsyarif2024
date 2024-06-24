<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Satker extends Model
{
    use HasFactory;
    protected $table = 'satker';

    protected $fillable = [
    'kode', 'nama', 'alamat'
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'satker', 'kode');
    }
}
