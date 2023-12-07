<!-- resources/views/events/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $event->title }}</h1>
        <p>Datum: {{ $event->date }}</p>
        <!-- Andere details van het evenement kunnen hier worden weergegeven -->
    </div>
@endsection
a
