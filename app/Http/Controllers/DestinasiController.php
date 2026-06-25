<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;

class DestinasiController extends Controller
{
    public function index()
    {
        $destinasis = Destinasi::all();

        return view('destinasi.index', compact('destinasis'));
    }

    public function show($slug)
    {
        $destinasi = Destinasi::where('slug', $slug)
            ->firstOrFail();

        return view('destinasi.show', compact('destinasi'));
    }
}