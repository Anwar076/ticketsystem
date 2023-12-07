<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $historicalReservations = Reservation::where('user_id', $user->id)
            ->whereDate('event_date', '<', now()->format('Y-m-d'))
            ->where('scanned', true)
            ->get();

        $expiredReservations = Reservation::where('user_id', $user->id)
            ->whereDate('event_date', '<', now()->format('Y-m-d'))
            ->where('scanned', false)
            ->get();

        $futureReservations = Reservation::where('user_id', $user->id)
            ->whereDate('event_date', '>', now()->format('Y-m-d'))
            ->get();

        return view('reservations.index', compact('historicalReservations', 'expiredReservations', 'futureReservations'));
    }

    public function userReservations()
    {
        $user = Auth::user();
        $reservations = Reservation::where('user_id', $user->id)->get();

        return view('reservations.user_index', ['reservations' => $reservations]);
    }

    public function showReservation($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('reservations.show', ['reservation' => $reservation]);
    }
}
