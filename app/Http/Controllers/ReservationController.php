<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use PDF;



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

        $historicalReservations = Reservation::where('user_id', $user->id)
            ->whereHas('event', function ($query) {
                $query->whereDate('date', '<', now()->format('Y-m-d'));
            })
            ->whereDoesntHave('tickets', function ($query) {
                $query->where('scanned', false);
            })
            ->get();

        $expiredReservations = Reservation::where('user_id', $user->id)
            ->whereHas('event', function ($query) {
                $query->whereDate('date', '<', now()->format('Y-m-d'));
            })
            ->whereHas('tickets', function ($query) {
                $query->where('scanned', false);
            })
            ->get();

        $futureReservations = Reservation::where('user_id', $user->id)
            ->whereHas('event', function ($query) {
                $query->whereDate('date', '>', now()->format('Y-m-d'));
            })
            ->get();

        return view('reservations.user_index', compact('historicalReservations', 'expiredReservations', 'futureReservations'));
    }
    // maak een niewe functie aan in de ReservationController downloadPdf waarin je de PDF genereert en download
    public function downloadPdf($id)
{
    $reservation = Reservation::with('tickets')->findOrFail($id);
    $ticketNumbers = $reservation->tickets->pluck('id');

    $pdf = PDF::loadView('reservations.pdf', ['ticketNumbers' => $ticketNumbers]);

    return $pdf->download('reservations.pdf');
}
}
