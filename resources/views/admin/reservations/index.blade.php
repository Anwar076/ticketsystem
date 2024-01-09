@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Manage Reservations</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Event</th>
                    <th>Date</th>
                    <th>Scanned</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->id }}</td>
                        <td>{{ $reservation->user->name }}</td>
                        <td>{{ $reservation->event->name }}</td>
                        <td>{{ $reservation->event_date }}</td>
                        <td>{{ $reservation->scanned ? 'Yes' : 'No' }}</td>
                        <td>
                            <a href="{{ route('reservations.show', $reservation) }}">Details</a>
                            <form action="{{ route('reservations.destroy', $reservation) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Cancel Reservation</button>
                            </form>
                            <form action="{{ route('reservations.updateScanned', $reservation) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit">Toggle Scanned Status</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
