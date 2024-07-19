<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Http\Requests\ReservationRequest; // Import Form Request

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
        try {
            // Simpan data ke dalam database
            $reservation = new Reservation();
            $reservation->nama = $request->nama;
            $reservation->email = $request->email;
            $reservation->no_telepon = $request->no_telepon;
            $reservation->layanan = $request->layanan;
            $reservation->tanggal = $request->tanggal;
            $reservation->deskripsi = $request->deskripsi;
            $reservation->save();

            // Redirect dengan pesan sukses
            return redirect()->back()->with('success', 'Berhasil.');
        } catch (\Exception $e) {
            // Redirect dengan pesan error
            return redirect()->back()->with('error', 'Gagal.');
        }
    }
}
