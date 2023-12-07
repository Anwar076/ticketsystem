@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Mijn Reserveringen</h1>
        @if($reservations->isEmpty())
            <p>Geen reserveringen gevonden.</p>
        @else
            <ul>
                @foreach($reservations as $reservation)
                    <li>{{ $reservation->event_name }} - Datum: {{ $reservation->date }}</li>
                    <!-- Voeg andere details van de reservering toe -->
                @endforeach
            </ul>
        @endif
    </div>
@endsection
