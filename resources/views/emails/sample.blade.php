<!-- resources/views/emails/reservation_confirmation.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reservering Bevestiging</title>
</head>
<body>
    //how to make a
    <h1>Reservering Bevestiging</h1>

    <p>Beste {{ $user->name }},</p>

    <p>Bedankt voor je reservering. Hier zijn je gereserveerde tickets:</p>

    <ul>
        @foreach($reservedTickets as $ticket)
            <li>Ticket ID: {{ $ticket->id }} - Type: {{ $ticket->type }}</li>
        @endforeach
    </ul>

    <p>Hartelijk dank voor je reservering. We wensen je veel plezier op het evenement!</p>

    <p>Met vriendelijke groeten,<br>Het Team</p>
</body>
</html>
