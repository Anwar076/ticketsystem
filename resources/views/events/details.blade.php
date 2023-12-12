@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mt-4">Reserveringsdetails</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-4">Tickets</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Ticketnummer</th>
                        <th>Scanstatus</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($event->reservations as $reservation)
                    @foreach ($reservation->tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->id }}</td>
                        <td>{{ $ticket->scanned ? 'Gescand' : 'Niet gescand' }}</td>
                    </tr>
                    @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-4">Download details als PDF</h2>
            <a href="{{ route('reservation.pdf', $reservation->id) }}" class="btn btn-primary">Download PDF</a>
        </div>
    </div>
</div>
@endsection
