@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">User Reservations</h1>

        <div class="row">
            <div class="col-md-4">
                <h2>Historical Reservations</h2>
                @foreach ($historicalReservations as $reservation)
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="card-title">{{ $reservation->event->name }}</h3>
                            <p class="card-text">Date: {{ $reservation->event->date }}</p>
                            <p class="card-text">Tickets Scanned: {{ $reservation->tickets_scanned }}</p>
                            <a href="{{ route('reservations.details', ['id' => $reservation->id]) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-md-4">
                <h2>Expired Reservations</h2>
                @foreach ($expiredReservations as $reservation)
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="card-title">{{ $reservation->event->name }}</h3>
                            <p class="card-text">Date: {{ $reservation->event->date }}</p>
                            <p class="card-text">Tickets Scanned: {{ $reservation->tickets_scanned }}</p>
                            <a href="{{ route('reservations.details', ['id' => $reservation->id]) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-md-4">
                <h2>Future Reservations</h2>
                @foreach ($futureReservations as $reservation)
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="card-title">{{ $reservation->event->name }}</h3>
                            <p class="card-text">Date: {{ $reservation->event->date }}</p>
                            <p class="card-text">Tickets Scanned: {{ $reservation->tickets_scanned }}</p>
                            <a href="{{ route('reservations.details', ['id' => $reservation->id]) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
