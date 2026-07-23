<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destinasi_Galeris extends Model
{
    protected $table = 'destinasi__galeris';

    protected $fillable = [
        'destinasi_id',
        'gambar',
    ];

    public function destinasi()
    {
        return $this->belongsTo(Destinasi::class);
    }
}
