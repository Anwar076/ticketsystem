@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Beheer Evenementen</h1>
    <a href="{{ route('admin.events.create') }}" class="btn btn-primary mb-4">Nieuw Evenement Toevoegen</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Titel</th>
                <th>Datum</th>
                <th>Locatie</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
            <tr>
                <td>{{ $event->title }}</td>
                <td>{{ $event->date }}</td>
                <td>{{ $event->location }}</td>
                <td>
                    <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-primary custom-button">Bewerken</a>
                    <form action="{{ route('admin.events.destroy', $event) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger custom-button" onclick="return confirm('Weet je zeker dat je dit evenement wilt verwijderen?')">Verwijderen</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
