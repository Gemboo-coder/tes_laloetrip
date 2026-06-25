<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}