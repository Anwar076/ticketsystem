@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Beheer Gebruikers</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Naam</th>
                <th>Email</th>
                <th>Rol(len)</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @foreach ($user->roles as $role)
                        {{ $role->name }}
                        @if (!$loop->last)
                            <span>, </span>
                        @endif
                    @endforeach
                </td>
                <td>
                    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary">Bewerken</a>
                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Weet je zeker dat je deze gebruiker wilt verwijderen?')">Verwijderen</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
