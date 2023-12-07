<!-- resources/views/admin/tickets/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Beheer Tickets</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Actie</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->id }}</td>
                        <td>{{ $ticket->type }}</td>
                        <td>{{ $ticket->scanned ? 'Gescand' : 'Niet gescand' }}</td>
                        <td>
                            @if (!$ticket->scanned)
                                <form method="POST" action="{{ route('admin.tickets.update', $ticket->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-primary">Markeer als gescand</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
