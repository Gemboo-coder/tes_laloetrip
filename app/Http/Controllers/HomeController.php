<?php

namespace App\Http\Controllers;

use App\Models\PaketTrip;
use App\Models\Destinasi;
use App\Models\Galeri;
use App\Models\Review;

class HomeController extends Controller
{
    public function index()
    {
        $paketTrips = PaketTrip::latest()->take(3)->get();
        $destinasis = Destinasi::latest()->take(6)->get();
        $galeris = Galeri::latest()->take(8)->get();
        $reviews = Review::latest()->take(5)->get();

        return view('home.index', compact(
            'paketTrips',
            'destinasis',
            'galeris',
            'reviews'
        ));
    }
}