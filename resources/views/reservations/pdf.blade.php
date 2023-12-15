
<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f2f2f2;
        }
        .header {
            text-align: center;
            margin-bottom: 50px;
        }
        .ticket {
            border: 1px solid #000;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .ticket h2 {
            color: #333;
            font-size: 18px;
            margin-top: 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1 style="color: #ff6600;">Reservation Details</h1>
    </div>
    @foreach($ticketNumbers as $ticketNumber)
        <div class="ticket">
            <h2>Ticket Number: <span style="color: #ff6600;">{{ $ticketNumber }}</span></h2>
        </div>
    @endforeach
</body>
</html>
