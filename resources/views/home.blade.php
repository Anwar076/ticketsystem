@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Aankomende Evenementen</h1>
    <div class="row">
        @foreach($upcomingEvents as $event)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-text">Datum: {{ $event->date->format('Y-m-d') }}</p>
                        <p class="card-text">Tijd: {{ $event->time->format('H:i') }}</p>
                        <p class="card-text">Locatie: {{ $event->location }}</p>
                        <p class="card-text">Beschrijving: {{ $event->description }}</p>
                        <a href="{{ route('event.show', $event) }}" class="btn btn-primary">Bestel Tickets</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
