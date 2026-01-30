<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuliner extends Model
{
    use HasFactory;

    protected $table = 'kuliner';

    protected $fillable = [
        'nama_kuliner',
        'daerah_id',
        'deskripsi',
        'bahan_utama',
        'cara_penyajian',
        'gambar',
        'rating',
        'gmaps_link',
        'harga',
        'alamat',
        'jam_buka',
        'jam_tutup',
        'resto_id',
    ];

    public function daerah()
    {
        return $this->belongsTo(Daerah::class, 'daerah_id');
    }

    public function ulasan()
    {
        return $this->hasMany(Ulasan::class, 'kuliner_id');
    }

    public function resto()
    {
        return $this->belongsTo(Resto::class, 'resto_id');
    }

    public function getAverageRatingAttribute()
    {
        return round($this->ulasan()->avg('rating'), 1) ?: 0;
    }
}
