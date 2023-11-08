@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nieuw Evenement Toevoegen</h1>
    <form action="{{ route('admin.events.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Titel</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="date">Datum</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="form-group">
            <label for="time">Tijd</label>
            <input type="time" class="form-control" id="time" name="time" required>
        </div>
        <div class="form-group">
            <label for="location">Locatie</label>
            <input type="text" class="form-control" id="location" name="location" required>
        </div>
        <div class="form-group">
            <label for="description">Beschrijving</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
</div>
@endsection
