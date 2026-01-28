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
    ];

    public function daerah()
    {
        return $this->belongsTo(Daerah::class, 'daerah_id');
    }
}
