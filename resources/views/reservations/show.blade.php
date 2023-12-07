<!-- reservations/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Reservering Details</h1>

        @if($reservation)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $reservation->event_name }}</h5>
                    <p class="card-text">Datum: {{ $reservation->date }}</p>
                    <!-- Andere reserveringsdetails -->
                </div>
            </div>
        @else
            <p>Geen reservering gevonden.</p>
        @endif
    </div>
@endsection
