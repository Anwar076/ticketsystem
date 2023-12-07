<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reservering Bevestiging</title>
    <style>
        /* Voeg hier je CSS-stijlen toe voor de pagina-indeling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            text-align: center;
            background-color: #fff;
            border-radius: 8px;
            padding: 40px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Bedankt voor uw reservering!</h2>
        <p>Hier zijn uw gereserveerde ticketnummers:</p>
        <ul>
            @foreach($reservedTickets as $ticket)
                <li>Ticket nummer: {{ $ticket->id }}</li>
            @endforeach
        </ul>
        <a href="{{ route('home') }}" class="btn">Terug naar Homepage</a>
    </div>
</body>
</html>
