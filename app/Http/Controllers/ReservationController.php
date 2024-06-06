<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the reservations.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Logika untuk mendapatkan data reservasi
        // Sebagai contoh, kita hanya akan mengembalikan view 'reservations.index'
        // Anda bisa menyesuaikan dengan logika yang sesuai dengan aplikasi Anda

        return view('reservation');
    }

    public function store(ReservationRequest $request)
    {
        $reservation = Reservation::create($request->validated());

        return redirect()->back()->with('success', 'Reservation created successfully!');
    }
}