
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Reserveringsoverzicht</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Evenement</th>
                    <th>Gebruiker</th>
                    <th>Aantal tickets</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->event->name }}</td>
                        <td>{{ $reservation->user->name }}</td>
                        <td>{{ $reservation->ticket_count }}</td>
                        <td>{{ $reservation->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
