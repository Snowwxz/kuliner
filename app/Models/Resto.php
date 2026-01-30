<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_resto',
        'deskripsi',
        'alamat',
        'jam_buka',
        'jam_tutup',
        'gambar',
        'daerah_id',
    ];

    public function daerah()
    {
        return $this->belongsTo(Daerah::class);
    }

    public function kuliners()
    {
        return $this->hasMany(Kuliner::class, 'resto_id');
    }
}
