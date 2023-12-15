
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Reservation Details</h1>

        <h2>Tickets</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Ticket ID</th>
                    <th>Scanned</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->id }}</td>
                        <td>{{ $ticket->scanned ? 'Yes' : 'No' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2>Download PDF</h2>
        <a href="{{ route('reservation.pdf', $reservation->id) }}" class="btn btn-primary">Download PDF</a>
    </div>
@endsection
