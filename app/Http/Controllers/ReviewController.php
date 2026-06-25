<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\PaketTrip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::latest()->get();

        return view('review.index', compact('reviews'));
    }

    public function create()
    {
        if (! Auth::user()?->can_review) {
            abort(403, 'Anda belum dapat memberikan review.');
        }

        $paketTrips = PaketTrip::all();

        return view('review.create', compact('paketTrips'));
    }

    public function store(Request $request)
    {
        if (! Auth::user()?->can_review) {
            abort(403, 'Anda belum dapat memberikan review.');
        }

        $request->validate([
            'paket_trip_id' => 'required|exists:paket_trips,id',
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'required|string',
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'paket_trip_id' => $request->paket_trip_id,
            'rating' => $request->rating,
            'komentar' => $request->komentar,
        ]);

        return redirect()
            ->route('review.index')
            ->with('success', 'Review berhasil ditambahkan.');
    }
}