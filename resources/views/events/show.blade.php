<!-- resources/views/events/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $event->title }}</h1>
        <p>Datum: {{ $event->date }}</p>
        <p>Locatie: {{ $event->location }}</p>
        <p>Beschrijving: {{ $event->description }}</p>
        <p>Maximaal aantal tickets: {{ $event->max_tickets }}</p>
        <p>Rest aantal tickets: {{ $event->tickets_left }}</p>
        <p>Prijs per ticket: {{ $event->price }}</p>
        <a href="{{ route('event.order', $event->id) }}" class="btn btn-primary">Tickets bestellen</a>
        <!-- Andere details van het evenement kunnen hier worden weergegeven -->
    </div>
@endsection
a
