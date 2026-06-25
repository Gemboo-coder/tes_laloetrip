<?php

namespace App\Http\Controllers;

use App\Models\PaketTrip;

class PaketTripController extends Controller
{
    public function index()
    {
        $paketTrips = PaketTrip::all();

        return view('paket.paket', compact('paketTrips'));
    }

    public function show($slug)
    {
        $paketTrip = PaketTrip::where('slug', $slug)
            ->firstOrFail();

        return view('paket.show', compact('paketTrip'));
    }
}