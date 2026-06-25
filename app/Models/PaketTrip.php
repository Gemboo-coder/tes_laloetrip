<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaketTrip extends Model
{
    protected $fillable = [
        'nama_paket',
        'jenis_paket',
        'deskripsi',
        'harga',
        'durasi',
        'slug',
        'thumbnail',
    ];

    public function destinasis()
    {
        return $this->belongsToMany(
            Destinasi::class,
            'destinasi_paket_trip'
        );
    }

    public function galeris()
    {
        return $this->hasMany(Galeri::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}