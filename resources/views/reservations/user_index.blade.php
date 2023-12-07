@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Mijn Reserveringen</h1>

        @if($reservations->isEmpty())
            <p>Je hebt geen reserveringen.</p>
        @else
            @foreach($reservations as $reservation)
                <h2>{{ $reservation->event_name }}</h2>
                <p>Datum: {{ $reservation->event_date }}</p>

                @if($reservation->tickets->isEmpty())
                    <p>Geen tickets beschikbaar voor deze reservering.</p>
                @else
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Ticketnummer</th>
                                <th>Gescand</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservation->tickets as $ticket)
                                <tr>
                                    <td>{{ $ticket->id }}</td>
                                    <td>
                                        @if($ticket->scanned)
                                            <span style="color: green;">✔️</span>
                                        @else
                                            <span style="color: red;">❌</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            @endforeach
        @endif
    </div>
@endsection
