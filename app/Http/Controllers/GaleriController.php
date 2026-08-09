<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use App\Models\Destinasi_Galeris;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        $destinasiId = $request->query('destinasi');

        $galeris = Destinasi_Galeris::with('destinasi')
            ->when($destinasiId, fn($q) => $q->where('destinasi_id', $destinasiId))
            ->latest()
            ->get();

        $destinasiList = Destinasi::has('galeri')->orderBy('nama_destinasi')->get();

        return view('galeri.index', compact('galeris', 'destinasiList', 'destinasiId'));
    }
}