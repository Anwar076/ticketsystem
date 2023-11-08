@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Evenement Bewerken</h1>
    <form action="{{ route('admin.events.update', $event) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Titel</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $event->title }}" required>
        </div>
        <div class="form-group">
            <label for="date">Datum</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ $event->date }}" required>
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
        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
</div>
@endsection
    