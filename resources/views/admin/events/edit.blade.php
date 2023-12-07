@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Evenement Bewerken</h1>
    <form action="{{ route('admin.events.update', $event) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Titel</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $event->title }}" required>
        </div>
        <div class="form-group">
            <label for="date">Datum</label>
            @php
            // Converteer de datum naar het juiste formaat 'YYYY-MM-DD' voor het inputveld
            $formattedDate = \Carbon\Carbon::parse($event->date)->format('Y-m-d');
            @endphp
            <input type="date" class="form-control" id="date" name="date" value="{{ $formattedDate }}" required>
        </div>
        <div class="form-group">
            <label for="time">Tijd</label>
            <input type="time" class="form-control" id="time" name="time" value="{{ $event->time }}" required>
        </div>
        <div class="form-group">
            <label for="location">Locatie</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ $event->location }}" required>
        </div>
        <div class="form-group">
            <label for="description">Beschrijving</label>
            <textarea class="form-control" id="description" name="description">{{ $event->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="price">Prijs</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" min="0" value="{{ $event->price }}">
        </div>
        <div class="form-group">
            <label for="image">Afbeelding uploaden</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
</div>
@endsection
