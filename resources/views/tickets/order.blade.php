@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Order Tickets</h1>
        <form action="{{ route('event.reserve', $eventId) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="num_tickets">Number of Tickets:</label>
                <input type="number" id="num_tickets" name="num_tickets" min="1" required>
            </div>
            <button type="submit" class="btn btn-primary">Reserve Tickets</button>
        </form>
    </div>
@endsection
