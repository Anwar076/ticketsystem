<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Event extends  Model
{
    protected $dates = ['date'];

    use  HasFactory;
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
