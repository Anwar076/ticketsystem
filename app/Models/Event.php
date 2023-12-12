<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Event extends  Model
{
    protected $fillable = [
        'title',
        'date',
        'time',
        'location',
        'description',
        'imageurl',
        'price',


    ];

    use  HasFactory;
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    protected $casts = [
        'date' => 'datetime:d:m:Y'
    ];
}
