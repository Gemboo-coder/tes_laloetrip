<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DestinasiPaketTrip extends Model
{
    protected $table = 'destinasi_paket_trip';

    protected $fillable = [
        'paket_trip_id',
        'destinasi_id',
    ];
}