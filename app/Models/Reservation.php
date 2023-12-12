<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
    public function getScannedTicketsCountAttribute()
    {
        return $this->tickets->where('scanned', true)->count();
    }
    public function getUnscannedTicketsCountAttribute()
    {
        return $this->tickets->where('scanned', false)->count();
    }
}
