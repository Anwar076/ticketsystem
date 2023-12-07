@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Bestel Tickets voor {{ $event->title }}</h1>
        <form action="{{ route('event.order.store', $event) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="quantity">Hoeveelheid tickets:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" min="1" required>
            </div>
            <button type="submit" class="btn btn-primary">Bestel</button>
        </form>
    </div>
@endsection
