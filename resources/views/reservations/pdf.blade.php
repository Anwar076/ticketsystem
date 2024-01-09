<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .ticket {
            width: 500px;

            margin: 20px auto;
            padding: 30px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }

        .ticket-header {
            background-color: #32a287;
            color: #fff;
            padding: 10px 0;
            border-radius: 5px 5px 0 0;
        }

        .ticket-header h1 {
            margin: 0;
            font-size: 28px;
        }

        .ticket-info {
            margin-top: 30px;
            text-align: left;
            height: 200px;
        }

        .ticket-info p {
            margin: 10px 0;
        }

        .ticket-footer {
            margin-top: 30px;
            color: #888;
        }

        .ticket-footer p {
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <!-- Loop door de tickets -->
    @foreach($tickets as $ticket)
    <div class="ticket">
        <div class="ticket-header">
            <h1>Ticket</h1>
        </div>
        <div class="ticket-info">
            <p><strong>Event Name:</strong> {{ $event->title }}</p>
            <p><strong>Event Date:</strong> {{ \Carbon\Carbon::parse($event->date)->format('Y-m-d') }}</p>
            <p><strong>Event Time:</strong> {{ $event->time }}</p>
            <p><strong>Event Location:</strong> {{ $event->location }}</p>
            <p><strong>Ticket Number:</strong> {{ $ticket->id }}</p>
            <!-- Voeg hier extra informatie toe, afbeeldingen, of styling naar wens -->
            <!-- Rest van de code -->
        </div>
        <div class="ticket-footer">
            <p>Thank you for using our service</p>
        </div>
    </div>
    @endforeach
</body>

</html>
