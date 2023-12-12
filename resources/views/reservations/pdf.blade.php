<!DOCTYPE html>
<html>
<head>
    <title>Reservation Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
        }
        .content {
            margin: 20px;
        }
        .ticket {
            background-color: #e9ecef;
            padding: 10px;
            margin-bottom: 10px;
            text-align: center;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Reservation Details</h1>
    </div>
    <div class="content">
        @foreach ($ticketNumbers as $ticketNumber)
            <div class="ticket">
                <h2>Ticket Number: {{ $ticketNumber }}</h2>
            </div>
        @endforeach
    </div>
