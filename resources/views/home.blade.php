@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Aankomende Evenementen</h1>
    <h2>Welkom op de evenementenpagina van Anwar Agrich</h2>
    <div class="row">
        @foreach($upcomingEvents as $event)
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card ticket-card" style="height: 100%;">
                <div class="card-img-top">
                    <img src="{{ $event->imageurl }}" alt="{{ $event->title }}" class="img-fluid">
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $event->title }}</h5>
                    <p class="card-text"><strong>Datum:</strong> {{ $event->date->format('d-m-Y') }}</p>
                    <p class="card-text"><strong>Tijd:</strong> {{ \Carbon\Carbon::parse($event->time)->format('H:i') }}</p>
                    <p class="card-text"><strong>Locatie:</strong> {{ $event->location }}</p>
                    <p class="card-text"><strong>Beschrijving:</strong> {{ $event->description }}</p>
                    <div class="mt-auto">
                        <a href="{{ route('event.show', $event) }}" class="btn btn-primary">Bestel Tickets</a>
                    </div>
                </div>
            </div>
        </div>





        @endforeach
    </div>
</div>

@endsection
