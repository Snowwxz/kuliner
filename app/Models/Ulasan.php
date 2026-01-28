<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;

    protected $table = 'ulasan';

    protected $fillable = [
        'kuliner_id',
        'nama_pengulas',
        'rating',
        'isi_ulasan',
    ];

    public function kuliner()
    {
        return $this->belongsTo(Kuliner::class, 'kuliner_id');
    }
}
