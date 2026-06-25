<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $fillable = [
        'paket_trip_id',
        'judul',
        'kategori',
        'gambar',
    ];

    public function paketTrip()
    {
        return $this->belongsTo(PaketTrip::class);
    }
}