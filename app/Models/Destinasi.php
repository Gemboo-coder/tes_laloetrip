<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Destinasi_Galeris;

class Destinasi extends Model
{
    protected $fillable = [
        'nama_destinasi',
        'kategori',
        'slug',
        'deskripsi',
        'gambar',
    ];

    public function paketTrips()
    {
        return $this->belongsToMany(
            PaketTrip::class,
            'destinasi_paket_trip'
        );
    }

    public function galeri()
    {
        return $this->hasMany(Destinasi_Galeris::class, 'destinasi_id');
    }
}