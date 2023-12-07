<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TicketOrderController extends Controller
{
    public function reserveTickets(Request $request, $eventId)
    {
        // Controleer of de gebruiker is ingelogd
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Controleer het maximum aantal tickets per gebruiker en totale capaciteit van het evenement
        // Voer de benodigde logica uit voordat u de reservering opslaat

        // Maak een reservering voor de ingelogde gebruiker
        $user = auth()->user();
        $reservation = new Reservation();
        $reservation->user_id = $user->id;
        $reservation->event_id = $eventId;
        $reservation->save();

        // Maak tickets voor de reservering
        $numTicketsToReserve = $request->input('num_tickets');
        for ($i = 0; $i < $numTicketsToReserve; $i++) {
            $ticket = new Ticket();
            $ticket->reservation_id = $reservation->id;
            $ticket->scanned = false;
            // Vul hier andere ticketgegevens in, bijvoorbeeld: $ticket->type = 'VIP';
            $ticket->save();
        }

        // Stuur een bevestigingse-mail
        $reservedTickets = Ticket::where('reservation_id', $reservation->id)->get();

        Mail::send('emails.sample', ['user' => $user, 'reservedTickets' => $reservedTickets], function ($message) use ($user) {
            $message->to($user->email)->subject('Reservering bevestiging');
        });

        // Terugkeren naar de bevestigingspagina of een andere actie
        return view('confirmation')->with('reservedTickets', $reservedTickets);
    }

    public function showOrderForm($eventId)
    {
        // Logica om het bestelformulier weer te geven voor een specifiek evenement met $eventId
        return view('tickets.order')->with('eventId', $eventId);
    }
    public function getScannedTickets()
    {
        // Ophaallogica voor gescande tickets
        $scannedTickets = Ticket::where('scanned', true)->get();

        // Doe iets met $scannedTickets, zoals retourneren naar de view
        return view('ticket.index', ['scannedTickets' => $scannedTickets]);
    }
}
