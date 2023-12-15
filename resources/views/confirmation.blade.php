
@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h2 class="display-4">Bedankt voor uw reservering!</h2>
        <p class="lead">Hier zijn uw gereserveerde ticketnummers:</p>
        <ul class="list-group">
            @foreach($reservedTickets as $ticket)
                <li class="list-group-item">Ticket nummer: {{ $ticket->id }}</li>
            @endforeach
        </ul>
        <a href="{{ route('home') }}" class="btn btn-primary mt-3">Terug naar Homepage</a>
    </div>
@endsection
