<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'scanned',


    ];

    public function reservation()
    {
        return $this->belongsTo(reservation::class);
    }
}

