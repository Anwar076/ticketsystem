@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Beheer Evenementen</h1>
    <a href="{{ route('admin.events.create') }}" class="btn btn-primary mb-4">Nieuw Evenement Toevoegen</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Titel</th>
                <th style="width: 120px;">Datum</th>
                <th>Tijd</th>
                <th>Locatie</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
            <tr>
                <td>{{ $event->title }}</td>
                <td class="text-nowrap">{{ $event->date->format('d-m-Y') }}</td>
                <td>{{ $event->time }}</td>
                <td>{{ $event->location }}</td>
                <td>
                    <div style="display: flex; gap: 5px;">
                        <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-edit btn-sm">Bewerken</a>
                        <form action="{{ route('admin.events.destroy', $event) }}" method="POST" style="margin: 0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete btn-sm" style="color: #fff; border: none; border-radius: 25px; padding: 12px 24px; font-weight: 600; transition: background-color 0.2s;" onclick="return confirm('Weet je zeker dat je dit evenement wilt verwijderen?')">Verwijderen</button>
                        </form>
                    </div>
                </td>


            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
