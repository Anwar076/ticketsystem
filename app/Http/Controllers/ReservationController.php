<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use PDF;
use App\Models\Event;



class ReservationController extends Controller

{
    public function show($id)
    {
        $reservation = Reservation::with('tickets')->findOrFail($id);

        return view('reservations.details', ['tickets' => $reservation->tickets, 'reservation' => $reservation]);
    }
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

        $pdf = PDF::loadView('reservations.pdf', ['tickets' => $reservation->tickets, 'ticketNumbers' => $ticketNumbers]);

        return $pdf->download('reservations.pdf');
    }


//     public function checkMaxTicketAndEventCapacity($userId, $eventId)
//     {
//         $userReservations = Reservation::where('user_id', $userId)
//             ->where('event_id', $eventId)
//             ->get();

//         $event = Event::findOrFail($eventId);

//         $maxTicketPerUser = $event->max_ticket_per_user;
//         $eventCapacity = $event->capacity;

//         $totalTicketsReserved = 0;
//         foreach ($userReservations as $reservation) {
//             $totalTicketsReserved += $reservation->tickets->count();
//         }

//         $remainingTickets = $eventCapacity - $totalTicketsReserved;

//         if ($totalTicketsReserved >= $maxTicketPerUser) {
//             return "Maximum ticket limit per user reached.";
//         }

//         if ($totalTicketsReserved >= $eventCapacity) {
//             return "Event capacity reached.";
//         }

//         return "Remaining tickets: " . $remainingTickets;
//     }
}
