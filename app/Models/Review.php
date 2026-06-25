<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'user_id',
        'paket_trip_id',
        'rating',
        'komentar',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paketTrip()
    {
        return $this->belongsTo(PaketTrip::class);
    }
}